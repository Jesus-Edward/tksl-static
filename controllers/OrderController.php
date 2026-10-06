<?php

    require __DIR__ . '/../server/conn.php';
    require_once __DIR__ . "/../models/Order.php";
    require_once __DIR__ . "/../models/OrderItem.php";
    require_once __DIR__ . "/../models/Product.php";

class OrderController
{

    private mysqli $conn;
    private Order $order;
    private OrderItem $order_item;
    private Product $product;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
        $this->order = new Order($conn);
        $this->order_item = new OrderItem($conn);
        $this->product = new Product($conn);
    }

    public function store()
    {
        $errors = [];
        $success_msgs = [];
        if (isset($_POST['order-btn'])) {

            // if (!isset($_SESSION['user_id'])) {
            //     $errors[] = "Please login to make an order";
            //     $_SESSION['errors'] = $errors;
            //     header("Location: " . url('/admin/master/login'));
            //     exit();
            // }

            $slug = (int) $_POST['slug'];

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $recaptcha_v2_secret = $_ENV['RECAPTCHA_V2_SECRET'];
            $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';

            if (empty($recaptcha_response)) {
                $errors[] = "Please complete the CAPTCHA to place an order";
                $_SESSION['errors'] = $errors;
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
                'secret' => $recaptcha_v2_secret,
                'response' => $recaptcha_response,
                'remoteip' => $_SERVER['REMOTE_ADDR'],
            ]));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $verify = curl_exec($ch);

            $captchaResult = json_decode($verify);
            if (!$captchaResult->success) {
                $errors[] = "CAPTCHA verification failed, please try again.";
                $_SESSION['errors'] = $errors;
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $productId = (int) $_POST['product_id'];
            $productName = trim($_POST['product_name']);
            $price = (float) $_POST['price'];
            $quantity = (int) $_POST['quantity'];
            $total = (int) $_POST['total'];
    
            $customerName = trim($_POST['customer_name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $company = trim($_POST['company'] ?? '');
            $city = trim($_POST['city'] ?? '');
            $country = trim($_POST['country'] ?? '');
            $address = trim($_POST['address']);
            $notes = trim($_POST['notes'] ?? '');

            $calculated_total = $price * $quantity;
    
            verify_csrf('/single-product/'.$slug);
    
            if (empty($customerName) || empty($email) || empty($phone) || empty($address) || $quantity < 1) {
                $errors[] = 'Please fill all required fields.';
                $_SESSION['errors'] = $errors;
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $product = $this->product->findById($productId);

            if ($price !== (float) $product['price']) {
                $errors[] = 'Invalid product price';
                $_SESSION['errors'] = $errors;
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }

            if ($total !== (int) $calculated_total) {
                $errors[] = 'Invalid product total';
                $_SESSION['errors'] = $errors;
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
        
            mysqli_begin_transaction($this->conn);
    
            try {
    
                $orderId = $this->order->create([
                    'name' => $customerName,
                    'order_number' => null,
                    'email' => $email,
                    'phone' => $phone,
                    'company' => $company,
                    'address' => $address,
                    'city' => $city,
                    'country' => $country,
                    'notes' => $notes,
                    'total_amount' => $total,
                ]);

                $order_number = generateOrderNumber($orderId);
                $this->order->updateOrderNumber($order_number, $orderId);
    
                $this->order_item->create([
                    'order_id' => $orderId,
                    'product_id' => $productId,
                    'product_name' => $productName,
                    'price' => $price,
                    'quantity' => $quantity,
                ]);
    
                mysqli_commit($this->conn);
    
                $success_msgs[] = 'Order submitted successfully. We will contact you shortly.';
                $_SESSION['success'] = $success_msgs;
                header("Location: " . url('/order/success-message'));
                exit();
            } catch (Exception $e) {
    
                mysqli_rollback($this->conn);
    
                $_SESSION['errors'] = [$e->getMessage()];
            }
    
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function success_message() {
        return $this->render('order-success');
    }

    private function render(string $view, $data = [])
    {
        extract($data, EXTR_SKIP);
        require __DIR__ . "/../views/{$view}.php";
    }
}
