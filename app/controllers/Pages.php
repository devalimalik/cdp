<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Pages extends Controller {

    public function __construct() {
        //$this->userModel = $this->model('User');
        // $this->userModel = $this->model('Book');
    }

    public function index() {
        $data = [
            'title' => 'Home'
        ];

        $this->view('index', $data);
    }
}
