<?php
namespace App\Controllers;

class Controller {
    protected function render($view, $data = []) {
        extract($data);
        require __DIR__ . "/../Views/$view.php";
    }
}
