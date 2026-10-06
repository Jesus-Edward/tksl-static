<?php
    require __DIR__ . "/../server/conn.php";
  
    $errors = [];

    if (isset($_POST["signin-btn"])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (empty($email) || empty($password)) {
            $errors[] = "All fields are required";
            header("location: " . url("login"));
            exit();
        }

        verify_csrf("/admin/master/login");

        $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email = ?");
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password']) ) {
            session_regenerate_id(true);
            $_SESSION['is_loggedIn'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            if ($user['role'] === 'admin') {
                header("location: " . url("admin/dashboard"));
                exit();
            }else {
                header("location: " . url("/dashboard"));
                exit();
            }

        }else {
            $errors[] = "Invalid Credentials";

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("location: " . url("login"));
                exit();
            }
        }
    }


