<?php

require __DIR__ . "/../../server/conn.php";
require __DIR__ . "/../../models/User.php";
require __DIR__ . "/../../models/Order.php";
require __DIR__ . "/../../models/Product.php";

class AdminDashboardController
{

    private User $user;
    private Order $order;
    private Product $product;

    public function __construct()
    {
        global $conn;
        $this->user = new User($conn);
        $this->order = new Order($conn);
        $this->product = new Product($conn);
    }
    public function index()
    {
        $user = $this->user->auth();
        $product_count = $this->product->total_products();
        $order_count = $this->order->total_orders();
        $orders = $this->order->recent();
        $pending = $this->order->pending();
        $contacted = $this->order->contacted();
        $completed = $this->order->completed();
        $cancelled = $this->order->cancelled();
        return $this->rend('index', [
            'user' => $user,
            'orders' => $orders,
            'pending' => $pending,
            'contacted' => $contacted,
            'completed' => $completed,
            'cancelled' => $cancelled,
            'product_count' => $product_count,
            'order_count' => $order_count,
        ]);
    }

    public function modern_index()
    {
        $user = $this->user->auth();
        $orders = $this->order->recent();
        $pending = $this->order->pending();
        $contacted = $this->order->contacted();
        $completed = $this->order->completed();
        $cancelled = $this->order->cancelled();
        return $this->rend('index', [
            'user' => $user,
            'orders' => $orders,
            'pending' => $pending,
            'contacted' => $contacted,
            'completed' => $completed,
            'cancelled' => $cancelled,
        ]);
    }

    public function details()
    {
        $user = $this->user->auth();
        return $this->rend('details', [
            'user' => $user,
        ]);
    }

    public function change_password()
    {
        $user = $this->user->auth();
        return $this->rend('change-password', [
            'user' => $user,
        ]);
    }

    public function update_details()
    {
        $success_msgs = [];
        $errors = [];
        $user_id = $_SESSION['user_id'];
        $user = $this->user->auth();

        if (isset($_POST['update-btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $name =  trim($_POST['name']) ?? $user['name'];
            $email =  trim($_POST['email']) ?? $user['email'];

            verify_csrf('/admin/details');

            $image_name = null;

            if (isset($_FILES['profile-pic']) && $_FILES['profile-pic']['error'] === UPLOAD_ERR_OK) {
                $file_name = $_FILES['profile-pic']['name'];
                $file_tmp = $_FILES['profile-pic']['tmp_name'];
                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $image_name = uniqid('user_', true) . '.' . $ext;

                $uploadDir = __DIR__ . '/../../public/uploads/admin/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                move_uploaded_file($file_tmp, $uploadDir . $image_name);

                $this->user->update_user_photo([
                    'name' => $name,
                    'email' => $email,
                    'image_name' => $image_name,
                    'user_id' => $user_id
                ]);
                $success_msgs[] = "Profile updated successfully";
                $_SESSION['success'] = $success_msgs;
                header("Location: " . url('/admin/details'));
                exit();
            } else {
                if (empty($name) || empty($email)) {
                    $errors[] = "Provide required fields";
                    $_SESSION['errors'] = $errors;
                    header("Location: " . url('/admin/details'));
                    exit();
                }

                $this->user->update_user_details([
                    'name' => $name,
                    'email' => $email,
                    'user_id' => $user_id
                ]);
                $success_msgs[] = "Profile updated successfully";
                $_SESSION['success'] = $success_msgs;
                header("Location: " . url('/admin/details'));
                exit();
            }
        }
    }

    public function update_password()
    {
        $success_msgs = [];
        $errors = [];

        if (isset($_POST['change-password-btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = trim($_POST['password']);
            $confirm_password = trim($_POST['confirm_password']);
            $email = trim($_POST['email']);
            $hash = password_hash($password, PASSWORD_ARGON2ID);

            verify_csrf('/admin/details');

            $user = $this->user->get_user_password($email);

            if ($confirm_password !== $password) {
                $errors[] = "Passowrd do not match";
                $_SESSION['errors'] = $errors;
                header("location: " . url('/admin/details'));
                exit();
            }

            if (password_verify($password, $user['password'])) {
                $errors[] = "You cannot use your old password";
                $_SESSION['errors'] = $errors;
                header("location: " . url('/admin/details'));
                exit();
            }

            if (empty($errors)) {
                $this->user->update_password([
                    'email' => $email,
                    'password' => $hash
                ]);

                $success_msgs[] = "Password successfully changed";
                $_SESSION['success'] = $success_msgs;
                header("location: " . url('/admin/details'));
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header("location: " . url('/admin/details'));
                exit();
            }
        }
    }

    private function render(string $view, $data = [])
    {
        extract($data, EXTR_SKIP);
        ob_start();
        require __DIR__ . "/../../views/admin/{$view}.php";
        $content = ob_get_clean();
        require __DIR__ . "/../../views/admin/partials/layout.php";
    }
    private function rend(string $view, $data = [])
    {
        extract($data, EXTR_SKIP);
        ob_start();
        require __DIR__ . "/../../views/modern_admin/{$view}.php";
        $content = ob_get_clean();
        require __DIR__ . "/../../views/modern_admin/partials/layout.php";
    }
}
