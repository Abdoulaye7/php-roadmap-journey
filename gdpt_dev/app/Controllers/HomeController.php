<?php
namespace App\Controllers;

class HomeController extends Controller {
    public function index() {
       
        $message = "HomeController";
        $this->render('home', compact('message'));
    }
}
?>