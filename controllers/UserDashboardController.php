<?php

require __DIR__ . '/../server/conn.php';
require_once __DIR__ . "/../models/Order.php";
require_once __DIR__ . "/../models/User.php";

class UserDashboardController
{
    private mysqli $conn;
    private Order $order;
    private User $user;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
        $this->order = new Order($conn);
        $this->user = new User($conn);
    }

    public function index()
    {
        $user_id = $_SESSION['user_id'];
        $user = $this->user->auth();
        $orders = $this->order->user_order($user_id);
        return $this->render('user_dashboard', [
            'orders' => $orders,
            'user' => $user
        ]);
    }

    public function update_user()
    {
        $success_msgs = [];
        $errors = [];
        $user_id = $_SESSION['user_id'];
        $user = $this->user->auth();
        
        if (isset($_POST['update-btn'])) {
            $name =  trim($_POST['name']) ?? $user['name'];
            $email =  trim($_POST['email']) ?? $user['email'];

            verify_csrf('/dashboard');

            $image_name = null;

            if (isset($_FILES['profile-pic']) && $_FILES['profile-pic']['error'] === UPLOAD_ERR_OK) {
                $file_name = $_FILES['profile-pic']['name'];
                $file_tmp = $_FILES['profile-pic']['tmp_name'];
                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $image_name = uniqid('user_', true) . '.' . $ext;

                $uploadDir = __DIR__ . '/../public/uploads/users/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                move_uploaded_file($file_tmp, $uploadDir . $image_name);

                $stmt = mysqli_prepare($this->conn, "UPDATE users SET name=?, email=?, photo=? WHERE id = ?");
                mysqli_stmt_bind_param($stmt, 'sssi', $name, $email, $image_name, $user_id);

                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                $success_msgs[] = "Profile updated successfully";
                $_SESSION['success'] = $success_msgs;
                header("Location: " . url('/dashboard'));
                exit();
            } else {
                if (empty($name) || empty($email)) {
                    $errors[] = "Provide required fields";
                    $_SESSION['errors'] = $errors;
                    header("Location: " . url('/dashboard'));
                    exit();
                }

                $stmt = mysqli_prepare($this->conn, "UPDATE users SET name=?, email=? WHERE id = ?");
                mysqli_stmt_bind_param($stmt, 'ssi', $name, $email, $user_id);
                mysqli_stmt_execute($stmt);
                $success_msgs[] = "Profile updated successfully";
                $_SESSION['success'] = $success_msgs;
                header("Location: " . url('/dashboard'));
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

            verify_csrf('/dashboard');

            $user = $this->user->get_user_password($email);

            if ($confirm_password !== $password) {
                $errors[] = "Passowrd do not match";
                $_SESSION['errors'] = $errors;
                header("location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }

            if (password_verify($password, $user['password'])) {
                $errors[] = "You cannot use your old password";
                $_SESSION['errors'] = $errors;
                header("location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }

            if (empty($errors)) {
                $this->user->update_password([
                    'email' => $email,
                    'password' => $hash
                ]);

                $success_msgs[] = "Password successfully changed";
                $_SESSION['success'] = $success_msgs;
                header("location: " . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header("location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }

    private function render(string $view, $data = [])
    {
        extract($data, EXTR_SKIP);
        require __DIR__ . "/../views/{$view}.php";
    }
}
