<?php
$errors = [];

function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: " . url('/admin/master/login'));
        $errors[] = "Please login first.";
        $_SESSION['errors'] = $errors;
        exit();
    }
}

function protectAuthPage() {
    if (isset($_SESSION['user_id'])) {
        header("Location: " . url('/'));
        exit();
    }
}

function requiredRole(string $role) {
    requireLogin();
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== $role) {
        header("Location: " . url('/'));
        exit();
    }
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function blockFileRedirect () {
    if(!defined('ROUTER')) {
        header("Location: " . url('/'));
        exit();
    };
}
