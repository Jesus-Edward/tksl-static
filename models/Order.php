<?php

require_once __DIR__ . "/../server/conn.php";

class Order
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function all()
    {
        $sql = "SELECT o.*, oi.product_name, oi.price, oi.quantity FROM orders o INNER JOIN order_items oi ON oi.order_id = o.id ORDER BY o.created_at DESC";
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            throw new Exception("Failed to fetch orders: " . mysqli_error($this->conn));
        }
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function single(int $id)
    {
        $sql = "SELECT o.*, oi.product_name, oi.price, oi.quantity FROM orders o INNER JOIN order_items oi ON oi.order_id = o.id WHERE o.id=? ORDER BY o.created_at DESC LIMIT 1";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$result) {
            throw new Exception("Failed to fetch orders: " . mysqli_error($this->conn));
        }
        return mysqli_fetch_assoc($result);
    }
    
    public function recent()
    {
        $sql = "SELECT o.*, oi.product_name, oi.price, oi.quantity
        FROM orders o
        INNER JOIN order_items oi ON oi.order_id = o.id
        ORDER BY o.created_at DESC
        LIMIT 10";

        $result = mysqli_query($this->conn, $sql);

        if (!$result) {
            throw new Exception("Failed to fetch recent orders: " . mysqli_error($this->conn));
    }

return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }
    

    public function create(array $data): int
    {
        $sql = "INSERT INTO orders
            (
                user_id,
                name,
                email,
                phone,
                company,
                address,
                city,
                country,
                notes,
                total_amount
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "issssssssd",
            $data['user_id'],
            $data['name'],
            $data['email'],
            $data['phone'],
            $data['company'],
            $data['address'],
            $data['city'],
            $data['country'],
            $data['notes'],
            $data['total_amount']
        );

        mysqli_stmt_execute($stmt);

        return mysqli_insert_id($this->conn);
    }

    public function updateOrderNumber(string $order_number, int $orderId)
    {
        $sql = "UPDATE orders SET order_number = ? WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $sql);

        mysqli_stmt_bind_param($stmt, "si", $order_number, $orderId);

        return mysqli_stmt_execute($stmt);
    }

    public function updateStatus(int $orderId, string $status): bool
    {
        $sql = "UPDATE orders SET status = ? WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $sql);

        mysqli_stmt_bind_param($stmt, "si", $status, $orderId);

        return mysqli_stmt_execute($stmt);
    }

    public function user_order(int $user_id)
    {
        $sql = "SELECT o.*, oi.product_name, oi.price, oi.quantity FROM orders o INNER JOIN order_items oi ON oi.order_id = o.id WHERE o.user_id = ? ORDER BY o.created_at DESC";

        $stmt = mysqli_prepare($this->conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $user_id);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function total_orders() {
        $sql = "SELECT COUNT(*) AS total_orders FROM orders";

        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $total_orders = $row['total_orders'];
        return $total_orders;
    }

    public function pending() {
        $sql = "SELECT COUNT(*) AS pending_orders
        FROM orders
        WHERE status = 'pending'";

        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $pending_orders = $row['pending_orders'];
        return $pending_orders;
    }
    public function contacted() {
        $sql = "SELECT COUNT(*) AS contacted_orders
        FROM orders
        WHERE status = 'contacted'";

        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $contacted_orders = $row['contacted_orders'];
        return $contacted_orders;
    }
    public function completed() {
        $sql = "SELECT COUNT(*) AS completed_orders
        FROM orders
        WHERE status = 'completed'";

        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $completed_orders = $row['completed_orders'];
        return $completed_orders;
    }
    public function cancelled() {
        $sql = "SELECT COUNT(*) AS cancelled_orders
        FROM orders
        WHERE status = 'cancelled'";

        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $cancelled_orders = $row['cancelled_orders'];
        return $cancelled_orders;
    }
}
