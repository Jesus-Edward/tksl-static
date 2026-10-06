<?php

require __DIR__ . "/../../server/conn.php";
require_once __DIR__ . "/../../models/Order.php";

class AdminOrderController
{

    private Order $order;

    public function __construct()
    {
        global $conn;
        $this->order = new Order($conn);
    }

    function index()
    {
        $orders = $this->order->all();
        return $this->rend('order/index', [
            'orders' => $orders
        ]);
    }

    function view_order(int $id)
    {
        $order = $this->order->single($id);
        return $this->rend('order/view-order', [
            'order' => $order
        ]);
    }

    public function updateStatus()
    {
        if (ob_get_length()) ob_clean();
        header('Content-Type: application/json');
        // $success_msgs = [];
        // $errors = [];
        // if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['update-status-btn'])) {
        //     header("Location: " . $_SERVER['HTTP_REFERER']);
        //     exit();
        // }

        // verify_csrf('/order/index');

        $orderId = (int) $_POST['order_id'];
        $status  = trim($_POST['status']);

        $allowed = ['pending', 'contacted', 'completed', 'cancelled'];

        if (!in_array($status, $allowed, true)) {
            echo json_encode(['success' => false, 'message' => 'Invalid status']);
            exit();
        }

        if ($this->order->updateStatus($orderId, $status)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update status']);
            exit();
        }

    }


    private function render(string $view, $data = [])
    {
        extract($data, EXTR_SKIP);
        ob_start();
        require __DIR__ . "/../../views/admin/pages/{$view}.php";
        $content = ob_get_clean();
        require __DIR__ . "/../../views/admin/partials/layout.php";
    }

     private function rend(string $view, $data = [])
    {
        extract($data, EXTR_SKIP);
        ob_start();
        require __DIR__ . "/../../views/modern_admin/pages/{$view}.php";
        $content = ob_get_clean();
        require __DIR__ . "/../../views/modern_admin/partials/layout.php";
    }
}
