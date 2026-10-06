<?php
require __DIR__ . "/../../server/conn.php";
require __DIR__ . "/../../models/Category.php";

class CategoryController {

    private Category $category;

    public function __construct()
    {
        global $conn;
        $this->category = new Category($conn);
    }    

    public function index() {
        $categories = $this->category->all();
        $this->rend('category/index', [
            'categories' => $categories
        ]);
    }

    public function create() {
        $this->rend('category/create');
    }

    public function store() {

        $success_msg = [];
        if (isset($_POST['create-category'])) {

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header("Location: " . url('/category/index'));
                exit();
            }
            
            $name = trim($_POST['name']);
            $slug = slugify($name);
        
            $errors = [];
    
            if (empty($name)) {
                $errors[] = "Name field are required.";
            }

            verify_csrf("category/create");
    
            if ($this->category->find($slug)) {
                $errors[] = "Slug must be unique";
            }
    
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: " . url('/category/create'));
                exit();
            }
    
            $success = $this->category->create([
                'name' => $name,
                'slug' => $slug
            ]);
    
            if (!$success) {
                $_SESSION['errors'] = "Failed to create category";
                header("Location: " . url('/category/create'));
                exit();
            }
    
            $success_msg[] = "Category created successfully";
            $_SESSION['success'] = $success_msg;
            header("Location: " . url('/category/index'));
            exit();
        }

    }

    public function edit(string $slug) {
        $category = $this->category->find($slug);
        $this->rend('category/edit', [
            'category' => $category
        ]);
    }

    public function update(int $id) {
        $success_msg = [];
        if (isset($_POST['update-category'])) {

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header("Location: " . url('/category/index'));
                exit();
            }
            
            $name = trim($_POST['name']);
            $slug = slugify($name);
    
    
            $errors = [];
    
            if (empty($name)) {
                $errors[] = "Name field are required.";
            }

            verify_csrf("category/edit".$slug);
    
            if ($this->category->existing($slug) > 1) {
                $errors[] = "Slug must be unique";
            }
    
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: " . url('/category/edit'));
                exit();
            }
    
            $success = $this->category->update($id, [
                'name' => $name,
                'slug' => $slug
            ]);
    
            if (!$success) {
                $_SESSION['errors'] = "Failed to update category";
                header("Location: " . url('/category/edit'));
                exit();
            }

            $success_msg[] = "Category updated successfully";
    
            $_SESSION['success'] = $success_msg;
            header("Location: " . url('/category/index'));
            exit();
        }

    }

    public function delete(string $slug) {
        $success = [];
        if (isset($_POST["delete-btn"])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method'])) {
                verify_csrf("category/index");
                $this->category->destroy($slug);
                $success[] = "Category deleted successfully";
                $_SESSION['success'] = $success;
                header("Location: " . url('/category/index'));
                exit;
            }
        }
    }

    private function render(string $view, $data = []) {
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