<?php

require_once __DIR__ . "/../server/conn.php";

class User {

    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function auth() {
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT email, name, photo, role, created_at, password_updated_at FROM users WHERE id = ? LIMIT 1";

        $stmt = mysqli_prepare($this->conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $user_id);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        return mysqli_fetch_assoc($result);
    }

    public function update_user_photo(array $data) {
        $stmt = mysqli_prepare($this->conn, "UPDATE users SET name=?, email=?, photo=? WHERE id = ?");
        $name = $data['name'];
        $email = $data['email'];
        $image_name = $data['image_name'];
        $user_id = $data['user_id'];
        mysqli_stmt_bind_param($stmt, 'sssi', $name, $email, $image_name, $user_id);

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function update_user_details(array $data) {
        $stmt = mysqli_prepare($this->conn, "UPDATE users SET name=?, email=? WHERE id = ?");
        $name = $data['name'];
        $email = $data['email'];
        $user_id = $data['user_id'];
        mysqli_stmt_bind_param($stmt, 'ssi', $name, $email, $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function get_user_password(string $email) {
        $stmt1 = mysqli_prepare($this->conn, "SELECT password FROM users WHERE email = ?");
        mysqli_stmt_bind_param($stmt1, 's', $email);
        mysqli_stmt_execute($stmt1);
        $result = mysqli_stmt_get_result($stmt1);
        $user = $result->fetch_assoc();
        return $user;
    }

    public function update_password(array $data) {
        $stmt = mysqli_prepare($this->conn, "UPDATE users SET password=?, password_updated_at=NOW() WHERE email=?");
        $email = $data['email'];
        $hash = $data['password'];
        mysqli_stmt_bind_param($stmt, 'ss', $hash, $email);
        mysqli_stmt_execute($stmt);
    }

}