<?php

if (!function_exists('dd')) {
    function dd(mixed $value) {
        echo "<pre>";
        var_dump($value);
        exit();
        echo "</pre>";
    }
}

if (!function_exists('url')) {
    function url(string $path = ''): string
    {
        return BASE_PATH . '/' . ltrim($path, '/');
    }
}

if (!function_exists('full_url')) {
    function full_url(string $path = ''): string
    {
        return BASE_URL . '/' . ltrim($path, '/');
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }
}

if (!function_exists('verify_csrf')) {
    function verify_csrf(string $uri): void {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            $_SESSION['errors'][] = "CSRF token mismatch";
            header('Location: ' . url($uri));
            exit();
        }
    }
}

if (!function_exists('slugify')) {
    function slugify(string $value): string
    {
        // Convert special characters to their closest ASCII characters
        $value = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value);

        // Convert to lowercase
        $value = strtolower($value);

        // Replace anything that isn't a letter or number with a hyphen
        $value = preg_replace('/[^a-z0-9]+/', '-', $value);

        // Remove hyphens from the beginning and end
        return trim($value, '-');
    }
}

if (!function_exists('timeAgo')) {
    function timeAgo(string $datetime) {
        $time = strtotime($datetime);
        $diff = time() - $time;
        
        if ($diff < 1) { return 'just now'; }
        
        $intervals = [
            12 * 30 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60      => 'month',
            24 * 60 * 60           => 'day',
            60 * 60                => 'hour',
            60                     => 'minute',
            1                      => 'second'
        ];
    
        foreach ($intervals as $secs => $str) {
            $d = $diff / $secs;
            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
            }
        }
    }
}

if (!function_exists('generateOrderNumber')) {
    function generateOrderNumber(int $orderId): string
    {
        return '#ORD-' . str_pad($orderId, 4, '0', STR_PAD_LEFT);
    }
}
