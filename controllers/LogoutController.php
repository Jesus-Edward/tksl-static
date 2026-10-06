<?php

class LogoutController {
    public function logout() {
        if (isset($_POST['Logout-btn'])) {
            $_SESSION = array();
            session_destroy();
            header("location: " . url('/'));
            exit();
        }
    }
}