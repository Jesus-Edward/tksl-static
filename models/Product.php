<?php

require_once __DIR__ . "/../server/conn.php";

class Product
{

    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function all()
    {
        $sql = "SELECT p.*, c.id AS category_id, c.name AS category_name FROM products AS p INNER JOIN categories AS c ON p.category_id = c.id ORDER BY id DESC";

        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            throw new Exception("Failed to fetch products: " . mysqli_error($this->conn));
        }

        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $products;
    }

    public function total_products() {
        $sql = "SELECT COUNT(*) AS total_products FROM products";

        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $total_products = $row['total_products'];
        return $total_products;
    }

    public function create(array $data)
    {
        $sql = "INSERT INTO products (name, slug, category_id, qty, price, offer_price, image, image1, image2, image3, description) VALUE (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $sql);
        $name = $data['name'];
        $slug = $data['slug'];
        $category_id = $data['category_id'];
        $qty = $data['qty'];
        $price = $data['price'];
        $offer_price = $data['offer_price'] ?? 0;
        $image = $data['image'];
        $image1 = $data['image1'];
        $image2 = $data['image2'];
        $image3 = $data['image3'];
        $description = $data['description'];
        mysqli_stmt_bind_param($stmt, "ssiisssssss", $name, $slug, $category_id, $qty, $price, $offer_price, $image, $image1, $image2, $image3, $description);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if (!$success) {
            return false;
        }
        return [
            'id' => $this->conn->insert_id
        ];
    }

    public function find(string $slug)
    {

        $sql = "SELECT p.*, c.id AS category_id, c.name AS category_name FROM products AS p INNER JOIN categories AS c ON p.category_id = c.id WHERE p.slug = ? GROUP BY p.id ORDER BY p.id DESC LIMIT 1";

        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt) {
            throw new Exception(
                "Failed to prepare query: " . mysqli_error($this->conn)
            );
        }

        mysqli_stmt_bind_param($stmt, "s", $slug);

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception(
                "Failed to execute query: " . mysqli_stmt_error($stmt)
            );
        }

        $result = mysqli_stmt_get_result($stmt);

        if (!$result) {
            throw new Exception(
                "Failed to fetch products: " . mysqli_stmt_error($stmt)
            );
        }

        $product = mysqli_fetch_assoc($result);

        return $product;
    }
    public function findById(int $id)
    {

        $sql = "SELECT p.*, c.id AS category_id, c.name AS category_name FROM products AS p INNER JOIN categories AS c ON p.category_id = c.id WHERE p.id = ? GROUP BY p.id ORDER BY p.id DESC LIMIT 1";

        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt) {
            throw new Exception(
                "Failed to prepare query: " . mysqli_error($this->conn)
            );
        }

        mysqli_stmt_bind_param($stmt, "i", $id);

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception(
                "Failed to execute query: " . mysqli_stmt_error($stmt)
            );
        }

        $result = mysqli_stmt_get_result($stmt);

        if (!$result) {
            throw new Exception(
                "Failed to fetch products: " . mysqli_stmt_error($stmt)
            );
        }

        $product = mysqli_fetch_assoc($result);

        return $product;
    }

    public function update(int $id, array $data)
    {
        $sql = "UPDATE products SET name = ?, slug = ?, category_id=?, qty=?, price=?, offer_price=?, image=?, image1=?, image2=?, image3=?, description=?  WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        $name = $data['name'];
        $slug = $data['slug'];
        $category_id = $data['category_id'];
        $qty = $data['qty'];
        $price = $data['price'];
        $offer_price = $data['offer_price'] ?? 0;
        $image = $data['image'];
        $image1 = $data['image1'];
        $image2 = $data['image2'];
        $image3 = $data['image3'];
        $description = $data['description'];
        mysqli_stmt_bind_param($stmt, "ssiisssssssi", $name, $slug, $category_id, $qty, $price, $offer_price, $image, $image1, $image2, $image3, $description, $id);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $success;
    }

    public function destroy(int $id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $success;
    }

    public function count(?int $categoryId = null): int
    {
        if ($categoryId) {
            $sql = "SELECT COUNT(*) AS total
                FROM products
                WHERE category_id = ?";

            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $categoryId);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        } else {
            $result = mysqli_query(
                $this->conn,
                "SELECT COUNT(*) AS total FROM products"
            );
        }

        $row = mysqli_fetch_assoc($result);

        return (int) $row['total'];
    }

    public function paginate(int $limit, int $offset, ?int $categoryId = null): array
    {
        if ($categoryId) {
            $sql = 

                "SELECT p.*, c.id AS category_id, c.name AS category_name FROM products AS p INNER JOIN categories AS c ON p.category_id = c.id WHERE p.category_id = ? GROUP BY p.id ORDER BY p.id DESC LIMIT ? OFFSET ?";

            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, "iii", $categoryId, $limit, $offset);
        } else {
            $sql = "SELECT p.*, c.id AS category_id, c.name AS category_name FROM products AS p INNER JOIN categories AS c ON p.category_id = c.id GROUP BY p.id ORDER BY p.id DESC LIMIT ? OFFSET ?";

            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, "ii", $limit, $offset);
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getByCategory(int $categoryId): array
    {
        $sql = "SELECT *
            FROM products
            WHERE category_id = ?
            ORDER BY id DESC";

        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $categoryId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function related(int $category_id, int $id) {
        $sql = "SELECT * FROM products WHERE category_id = ? AND id != ? ORDER BY RAND() LIMIT 8";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ii', $category_id, $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
