<?php

    require_once __DIR__ . "/../server/conn.php";

class OrderItem
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function create(array $item): bool
    {
        $sql = "INSERT INTO order_items
                (
                    order_id,
                    product_id,
                    product_name,
                    price,
                    quantity
                )
                VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "iisdi",
            $item['order_id'],
            $item['product_id'],
            $item['product_name'],
            $item['price'],
            $item['quantity'],
        );

        return mysqli_stmt_execute($stmt);
    }
}