<?php

require __DIR__ . '/../../server/conn.php';
require_once __DIR__ . "/../../models/Category.php";
require_once __DIR__ . "/../../models/Product.php";

class ProductController
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

    public function index()
    {
        $products = $this->product->all();
        return $this->rend('product/index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = $this->category->all();
        return $this->rend('product/create', [
            'categories' => $categories
        ]);
    }

    public function store()
    {

        if (isset($_POST['create-product'])) {

            $imageNames = [null, null, null, null];

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header("Location: " . url('/product/index'));
                exit();
            }

            $name = trim($_POST['name']);
            $slug = slugify($name);
            $category = trim($_POST['category']);
            $qty = trim($_POST['qty']);
            $price = trim($_POST['price']);
            $offer_price = trim($_POST['offer_price'] ?? '');
            $description = trim($_POST['description']);

            $success_msg = [];
            $errors = [];

            if (empty($name) || empty($category) || empty($price) || empty($description) || empty($qty)) {
                $errors[] = "Fields are required.";
            }

            if ($qty < 1) {
                $errors[] = "Invalid Quantity";
                header("Location: " . url("/product/create/"));
                exit();
            }

            verify_csrf("/product/create");

            if (!isset($_FILES['images']) || empty($_FILES['images']['name'][0])) {
                $errors[] = "At least one image is required.";
            }

            $uploadDirectory = __DIR__ . '/../../public/uploads/products/';

            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true);
            }

            foreach ($_FILES['images']['name'] as $index => $originalName) {

                if ($index >= 4) {
                    break;
                }

                if ($_FILES['images']['error'][$index] !== UPLOAD_ERR_OK) {
                    throw new Exception("Failed to upload image.");
                }

                $tmpName = $_FILES['images']['tmp_name'][$index];

                $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'avif'];

                if (!in_array($extension, $allowedExtensions, true)) {
                    $errors[] = "Invalid image type";
                }

                $filename  = uniqid('product_', true) . '.' . $extension;
                $destination = $uploadDirectory . $filename;

                if (!move_uploaded_file($tmpName, $destination)) {
                    throw new Exception("Failed to save image.");
                }

                $imageNames[$index] = $filename;
            }

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: " . url('/product/create'));
                exit();
            }

            $product = $this->product->create([
                'name' => $name,
                'slug' => $slug,
                'category_id' => $category,
                'qty' => $qty,
                'price' => $price,
                'offer_price' => $offer_price !== '' ? $offer_price : 0,
                'image' => $imageNames[0],
                'image1' => $imageNames[1],
                'image2' => $imageNames[2],
                'image3' => $imageNames[3],
                'description' => $description
            ]);

            if (!$product) {
                $_SESSION['errors'] = "Failed to create product";
                header("Location: " . url('/product/create'));
                exit();
            }

            $success_msg[] = "Product created successfully";
            $_SESSION['success'] = $success_msg;
            header("Location: " . url('/product/index'));
            exit();
        }
    }

    public function edit(string $slug)
    {
        $product = $this->product->find($slug);
        $categories = $this->category->all();
        return $this->rend('product/edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(int $id)
    {

        if (isset($_POST['update-product'])) {
            $success_msg = [];
            $errors = [];

            $existing = $this->product->findById($id);
            $slug = $existing['slug'];

            verify_csrf("/product/edit/$slug");


            if (!$existing) {
                $errors[] = "No product found!";
            }

            $name        = trim($_POST['name']);
            $new_slug        = slugify($name);
            $category_id = (int) $_POST['category'];
            $qty         = trim($_POST['qty']);
            $price       = trim($_POST['price']);
            $offer_price = trim($_POST['offer_price'] ?? '');
            $description = trim($_POST['description']);

            if (empty($name) || empty($category_id) || empty($price) || empty($description) || empty($qty)) {
                $errors[] = "All required fields must be filled.";
                $_SESSION['errors'] = $errors;
                header("Location: " . url("/product/edit/$slug"));
                exit();
            }

            if ($qty < 1) {
                $errors[] = "Invalid Quantity";
                $_SESSION['errors'] = $errors;
                header("Location: " . url("/product/edit/$slug"));
                exit();
            }

            $uploadDir = __DIR__ . '/../../public/uploads/products/';

            $allowed = ['jpg', 'jpeg', 'png', 'webp', 'avif'];

            // Keep existing images by default
            $images = [
                'image'  => $existing['image'],
                'image1' => $existing['image1'],
                'image2' => $existing['image2'],
                'image3' => $existing['image3'],
            ];

            foreach ($images as $fields => $oldFile) {

                if (!isset($_FILES[$fields]) || $_FILES[$fields]['error'] === UPLOAD_ERR_NO_FILE) continue;

                if ($_FILES[$fields]['error'] !== UPLOAD_ERR_OK) {
                    // $errors[] = "Failed to upload {$fields}.";
                    continue;
                }

                $extension = strtolower(pathinfo($_FILES[$fields]['name'], PATHINFO_EXTENSION));

                if (!in_array($extension, $allowed, true)) {
                    $errors[] = "{$fields} has an invalid image type.";
                    continue;
                }

                $newName = uniqid('product_', true) . '.' . $extension;
                $destination = $uploadDir . $newName;

                if (!move_uploaded_file($_FILES[$fields]['tmp_name'], $destination)) {
                    $errors[] = "Failed to save {$fields}.";
                    continue;
                }

                // Delete old image only after successful upload
                if ($oldFile) {
                    $oldPath = $uploadDir . $oldFile;

                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $images[$fields] = $newName;
            }

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: " . url("/product/edit/$slug"));
                exit();
            }

            $this->product->update($id, [
                'name'         => $name,
                'slug'         => $new_slug,
                'category_id'  => $category_id,
                'qty'          => $qty,
                'price'        => $price,
                'offer_price'  => $offer_price ?: 0,
                'description'  => $description,
                'image'        => $images['image'],
                'image1'       => $images['image1'],
                'image2'       => $images['image2'],
                'image3'       => $images['image3'],
            ]);

            $success_msg[] = 'Product updated successfully';
            $_SESSION['success'] = $success_msg;

            header("Location: " . url('/product/index'));
            exit();
        }
    }

    public function delete(int $id)
    {
        if (isset($_POST['delete-btn'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method'])) {
    
                $success_msg = [];
                $errors = [];
    
                verify_csrf("/product/index");
    
                $product = $this->product->findById($id);
    
                if (!$product) {
                    $errors[] = 'Product not found.';
                    $_SESSION['errors'] = $errors;
                    header("Location: " . url('/product/index'));
                    exit();
                }
    
                $uploadDirectory = __DIR__ . '/../../public/uploads/products/';
    
                try {
    
                    // Delete product from database first
                    $deleted = $this->product->destroy($id);
    
                    if (!$deleted) {
                        $errors[] = 'Failed to delete product.';
                        $_SESSION['errors'] = $errors;
                    }
    
                    // Delete associated images from storage
                    $images = [
                        $product['image'],
                        $product['image1'],
                        $product['image2'],
                        $product['image3']
                    ];
    
                    foreach ($images as $image) {
    
                        if (empty($image)) {
                            continue;
                        }
    
                        $imagePath = $uploadDirectory . basename($image);
    
                        if (is_file($imagePath)) {
                            unlink($imagePath);
                        }
                    }
    
                    $success_msgs[] = 'Product deleted successfully.';
                    $_SESSION['success'] = $success_msgs;
                    header("Location: " . url('/product/index'));
                    exit();
    
                } catch (Exception $e) {
    
                    $_SESSION['errors'] = [$e->getMessage()];
                }
    
                header("Location: " . url('/product/index'));
                exit();
            }
        }
    }


    private function render(string $view, $data = [])
    {
        extract($data, EXTR_SKIP);
        ob_start();
        require __DIR__ . "/../../views/admin/pages/{$view}.php";
        $content = ob_get_clean();
        require __DIR__ . "/../../views/admin/partials/layout.php";
    }

    private function rend(string $view, $data = [])
    {
        extract($data, EXTR_SKIP);
        ob_start();
        require __DIR__ . "/../../views/modern_admin/pages/{$view}.php";
        $content = ob_get_clean();
        require __DIR__ . "/../../views/modern_admin/partials/layout.php";
    }
}
