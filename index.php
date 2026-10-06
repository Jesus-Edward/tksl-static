<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . "/router/Router.php";
require_once __DIR__ . '/controllers/admin/AdminDashboardController.php';
require_once __DIR__ . '/controllers/admin/CategoryController.php';
require_once __DIR__ . '/controllers/admin/ProductController.php';
require_once __DIR__ . '/controllers/admin/AdminOrderController.php';
require_once __DIR__ . '/controllers/LogoutController.php';
require_once __DIR__ . '/controllers/UserDashboardController.php';
require_once __DIR__ . '/controllers/StoreController.php';
require_once __DIR__ . '/controllers/OrderController.php';
require_once __DIR__ . '/api/ContactForm.php';
require_once __DIR__ . '/middlewares/AuthenticatedUser.php';

define('ROUTER', true);
$router = new Router();

$router->get('/', function() {
    include_once __DIR__ . '/views/index.php';
});
$router->get('/about', function() {
    include_once __DIR__ . '/views/about.php';
});
$router->get('/base-oil', function() {
    include_once __DIR__ . '/views/base-oil.php';
});
$router->get('/global-logistics', function() {
    include_once __DIR__ . '/views/global-logistics.php';
});
$router->get('/oil-and-gas', function() {
    include_once __DIR__ . '/views/oil-and-gas.php';
});
$router->get('/contact', function() {
    include_once __DIR__ . '/views/contact.php';
});
$router->post('/send/contact/form', function() {
    (new ContactForm())->send();
});
$router->get('/store', function() {
    (new StoreController())->store();
});
$router->get('/single-product/{slug}', function($slug) {
    (new StoreController())->single_product($slug);
});
$router->get('/admin/master/login', function() {
    include_once __DIR__ . '/views/login.php';
});
$router->get('/admin/master/register', function() {
    include_once __DIR__ . '/views/register.php';
});
$router->post('/store', function() {
    include_once __DIR__ . '/controllers/RegisterController.php';
});
$router->post('/authenticate', function() {
    include_once __DIR__ . '/controllers/LoginController.php';
});
$router->post('/logout', function() {
    (new LogoutController())->logout();
});
$router->get('/admin/dashboard', function() {
    (new AdminDashboardController())->index();
});
$router->get('/admin/details', function() {
    (new AdminDashboardController())->details();
});
$router->post('/admin/update/details', function() {
    (new AdminDashboardController())->update_details();
});
$router->post('/admin/update/password', function() {
    (new AdminDashboardController())->update_password();
});
$router->get('/admin/change/password', function() {
    (new AdminDashboardController())->change_password();
});
$router->get('/category/index', function() {
    (new CategoryController())->index();
});
$router->get('/category/create', function() {
    (new CategoryController())->create();
});
$router->post('/category/store', function() {
    (new CategoryController())->store();
});
$router->get('/category/edit/{slug}', function($slug) {
    (new CategoryController())->edit($slug);
});
$router->post('/category/update/{id}', function($id) {
    (new CategoryController())->update($id);
});
$router->delete('/category/delete/{slug}', function($slug) {
    (new CategoryController())->delete($slug);
});
$router->get('/product/index', function() {
    (new ProductController())->index();
});
$router->get('/product/create', function() {
    (new ProductController())->create();
});
$router->post('/product/store', function() {
    (new ProductController())->store();
});
$router->get('/product/edit/{slug}', function($slug) {
    (new ProductController())->edit($slug);
});
$router->post('/product/update/{id}', function($id) {
    (new ProductController())->update($id);
});
$router->delete('/product/delete/{id}', function($id) {
    (new ProductController())->delete($id);
});
$router->post('/make-order', function() {
    (new OrderController())->store();
});
$router->get('/order/success-message', function() {
    (new OrderController())->success_message();
});
$router->get('/order/index', function() {
    (new AdminOrderController())->index();
});
$router->get('/view-order/{id}', function($id) {
    (new AdminOrderController())->view_order($id);
});
$router->post('/update-status', function() {
    (new AdminOrderController())->updateStatus();
});


$router->dispatch($_SERVER['REQUEST_URI']);