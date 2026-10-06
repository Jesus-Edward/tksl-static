<?php

require __DIR__ . '/../server/conn.php';
require_once __DIR__ . "/../models/Category.php";
require_once __DIR__ . "/../models/Product.php";

class StoreController
{

    private mysqli $conn;
    private Product $product;
    private Category $category;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
        $this->product = new Product($conn);
        $this->category = new Category($conn);
    }

    public function store()
    {
        $selectedCategory = isset($_GET['category'])
            ? (int) $_GET['category']
            : null;

        $perPage = 12;

        $currentPage = isset($_GET['page'])
            ? max(1, (int) $_GET['page'])
            : 1;

        $totalProducts = $this->product->count($selectedCategory);

        $totalPages = (int) ceil($totalProducts / $perPage);

        $offset = ($currentPage - 1) * $perPage;

        $products = $this->product->paginate(
            $perPage,
            $offset,
            $selectedCategory
        );
        $categories = $this->category->all();
        return $this->render('store', [
            'categories'       => $categories,
            'products'         => $products,
            'selectedCategory' => $selectedCategory,
            'currentPage'      => $currentPage,
            'totalPages'       => $totalPages
        ]);
    }

    public function single_product(string $slug) {
        $product = $this->product->find($slug);
        $related_products = $this->product->related($product['category_id'], $product['id']);
        return $this->render('single_product', [
            'product' => $product,
            'related_products' => $related_products
        ]);
    }

    private function render(string $view, $data = [])
    {
        extract($data, EXTR_SKIP);
        require __DIR__ . "/../views/{$view}.php";
    }
}
