<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        if(isLoggedIn()) {
            header("Location: " . URLROOT.'/pages/index');
        }
        $data = [
            'title' => 'Register',
            'username' => '',
            'email' => '',
            'password' => '',
            'Error' => []
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form

              $data = [
                'title' => 'Register',
                'username' => test_input($_POST['username']),
                'email' => test_input($_POST['email']),
                'password' => test_input($_POST['password']),
                'Error' => [
                    'usernameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                ]
            ];

            $usernameValidation = "/^[a-zA-Z0-9 ]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate username on letters/numbers
            if (empty($data['username'])) {
                $data['Error']['usernameError'] = 'Please enter username.';
            } elseif (!preg_match($usernameValidation, $data['username'])) {
                $data['Error']['usernameError'] = 'username can only contain letters and numbers.';
            } elseif(strlen($data['username']) < 4){
              $data['Error']['usernameError'] = 'username must be of at least 4 characters';
            } 

            //Validate email
            if (empty($data['email'])) {
                $data['Error']['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['Error']['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) {
                $data['Error']['emailError'] = 'Email is already taken.';
                }
            }

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['Error']['passwordError'] = 'Please enter password.';
            } elseif(strlen($data['password']) < 8){
              $data['Error']['passwordError'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['Error']['passwordError'] = 'Password must be have at least one numeric value.';
            }


            // Make sure that errors are empty
            if (empty($data['Error']['usernameError']) &&  empty($data['Error']['emailError']) && empty($data['Error']['passwordError']) ) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->register($data)) {                    
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('users/register', $data);
    }

    public function login() {
        if(isLoggedIn()) {
            header("Location: " . URLROOT . "/pages/index");
        }
        $data = [
            'title' => 'Login',
            'email' => '',
            'password' => '',
            'Error' => []
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'title' => 'Login',
                'email' => test_input($_POST['email']),
                'password' => test_input($_POST['password']),
                'Error' => [
                    'emailError' => '',
                    'passwordError' => '',
                    'generalError' => '',
                ]
            ];
            //Validate email
            if (empty($data['email'])) {
                $data['Error']['emailError'] = 'Please enter a email.';
            }elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['Error']['emailError'] = 'Please enter the correct format.';}

            //Validate password
            if (empty($data['password'])) {
                $data['Error']['passwordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['Error']['emailError']) && empty($data['Error']['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['Error']['generalError'] = 'Password or username is incorrect. Please try again.';

                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'title' => 'Login',
                'email' => '',
                'password' => '',
                'Error' => []
            ];
        }
        $this->view('users/login', $data);
    }

    public function profile(){
        if(!isLoggedIn()) {
            header("Location: " . URLROOT.'/users/login');
        }
        $data = [
            'title' => 'Profile',
            'username' => '',
            'email' => '',
            'password' => '',
            'Error' => []
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'title' => 'Register',
                'username' => test_input($_POST['username']),
                'email' => '',
                'password' => test_input($_POST['password']),
                'Error' => []
            ];

            if($data['username'] == $_SESSION['username'] && $data['email'] ==  $_SESSION['email'] && $data['password'] == ''){
                $data['Error'] = [
                    'generalError' => 'Nothing to update!'
                ];
            } else{
                $usernameValidation = "/^[a-zA-Z0-9 ]*$/";
                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

                if($data['username'] != $_SESSION['username']){
                    //Validate username on letters/numbers
                    if (empty($data['username'])) {
                        $data['Error']['usernameError'] = 'Username cannot be empty';
                    } elseif (!preg_match($usernameValidation, $data['username'])) {
                        $data['Error']['usernameError'] = 'username can only contain letters and numbers.';
                    } elseif(strlen($data['username']) < 4){
                    $data['Error']['usernameError'] = 'username must be of at least 4 characters';
                    } 
                }else{
                    $data['username'] = $_SESSION['username'];
                }

                if($data['password'] != ''){
                    // Validate password on length, numeric values,
                    if(empty($data['password'])){
                        $data['Error']['passwordError'] = 'password cannot be empty';
                    } elseif(strlen($data['password']) < 8){
                        $data['Error']['passwordError'] = 'Password must be of at least 8 characters';
                    } elseif (preg_match($passwordValidation, $data['password'])) {
                        $data['Error']['passwordError'] = 'Password must have at least one numeric value';
                    }
                }

                // check for errors

                if(count($data['Error']) <= 0){
                    // Hash password
                    $pass = '';
                    $username = '';
                    if($data['password'] != ''){
                        $pass = password_hash($data['password'], PASSWORD_DEFAULT);
                    }
                    if($data['username'] != $_SESSION['username']){
                        $username = $data['username'];
                    }

                   

                    //Update user from model function
                    if ($this->userModel->update($username, $pass)) {                    
                        //Redirect to the login page
                        header('location: ' . URLROOT . '/users/logout');
                    } else {
                        die('Something went wrong.');
                    }
                }
            }
            
        }
        $this->view('users/profile', $data);
    }
    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        header('location:' . URLROOT . '/pages/index');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        session_destroy();
        header('location:' . URLROOT . '/users/login');
    }
}
