<?php

require_once __DIR__ . "/../server/conn.php";

class Category {
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function all () {
        $sql = "SELECT * FROM categories ORDER BY id DESC";
        $result = mysqli_query($this->conn, $sql);
        if(!$result) {
            throw new Exception("Failed to fetch categories: " . mysqli_error($this->conn));
        }
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function find(string $slug) {
        $sql = "SELECT * FROM categories WHERE slug = ? LIMIT 1";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $slug);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $category = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        return $category ?: null;
    }

    public function create(array $data) {
        $sql = "INSERT INTO categories (name, slug) VALUE (?,?)";
        $stmt = mysqli_prepare($this->conn, $sql);
        $name = $data['name'];
        $slug = $data['slug'];
        mysqli_stmt_bind_param($stmt, "ss", $name, $slug);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $success;
    }

    public function update(int $id, array $data) {
        $sql = "UPDATE categories SET name = ?, slug = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        $name = $data['name'];
        $slug = $data['slug'];
        mysqli_stmt_bind_param($stmt, "ssi", $name, $slug, $id);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $success;
    }

    public function destroy(string $slug) {
        $sql = "DELETE FROM categories WHERE slug = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $slug);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $success;
    }

    public function existing(string $slug) {
        $existed = $this->find($slug);
        if ($existed > 1) {
            return true;
        }
    }
}
