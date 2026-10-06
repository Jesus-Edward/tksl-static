<?php
    // session_start();

    require __DIR__. "/../server/conn.php";
    $errors = [];

    if(isset($_POST['signup-btn'])){

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm-password']);


        if (empty($email) || empty($name) || empty($password) || empty($confirm_password)) {
            $errors[] = "All fields are required.";

            $_SESSION['errors'] = $errors;
            header("location: " . url("register"));
            exit();
        }

        verify_csrf("/register");

        if ($password !== $confirm_password) {
            $errors[] = "Password do not match.";

            $_SESSION['errors'] = $errors;
            header("location: " . url("register"));
            exit();
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";

            $_SESSION['errors'] = $errors;
            header("location: " . url("register"));
            exit();
        }

        $hash = password_hash($password, PASSWORD_ARGON2ID, ['memory_cost' => 65536]);

        $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $errors[] = "Email already taken";
            $_SESSION['errors'] = $errors;
            header("location: " . url("register"));
            exit();
        }

        mysqli_stmt_close($stmt);

        if (empty($errors)) {
            $sql = "INSERT INTO users (`name`, `email`, `password`) VALUES(?,?,?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hash);

            if (mysqli_stmt_execute($stmt)) {
                $success[] = "Registration successful";
                header("location: " . url("login"));
                exit();
            }
        }else {
            $_SESSION['errors'] = $errors;
            header("location: " . url("register"));
            exit();
        }
    }
?>

