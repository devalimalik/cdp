<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Unis extends Controller {
    public function __construct() {
        $this->userModel = $this->model('Course');
    }

    public function index(){
        if(!isLoggedIn()) {
            header("Location: " . URLROOT.'/users/login');
        }

        $data = [
            'title' => 'Uni Info',
            'programs' => $this->userModel->getAllPrograms(),
        ];

        $this->view('unis/index', $data);
    }

    public function search(){
        if(!isLoggedIn()) {
            header("Location: " . URLROOT.'/users/login');
        }
        
        $data = [
            'title' => 'Finder',
            'programs' => $this->userModel->getAllPrograms(),
            'courses' => $this->userModel->getAllCourses(),
            'cities' => $this->userModel->getAllCities(),
            'program' => '',
            'city' => '',
            'course' => '',
            'test' => ''
        ];

        if(isset($_GET['program']) && !empty($_GET['program']))
        {
            $data['program'] = test_input($_GET['program']);
            $data['courses'] = $this->userModel->findUnisByProgram($data['program']);  
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(empty($_POST['program']) && empty($_POST['city']))
            {
            }
            elseif(!empty($_POST['program']) && !empty($_POST['city']))
            {
                $p= test_input($_POST['program']);
                $c= test_input($_POST['city']);
                $data['courses'] = $this->userModel->findUnisByCP($p, $c);
                $data['program']= $p;
                $data['city']= $c;
            }elseif($_POST['program'] != '')
            {
                $data['courses'] = $this->userModel->findUnisByProgram(test_input($_POST['program']));
                $data['program']= test_input($_POST['program']);
            }elseif($_POST['city'] != ''){
                $data['courses'] = $this->userModel->findUnisByCity(test_input($_POST['city']));
                $data['city']= test_input($_POST['city']);
            }
        
        }

        $this->view('unis/search', $data);
    }

}
