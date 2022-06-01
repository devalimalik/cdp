<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Resumes extends Controller {
    public function __construct() {
        $this->userModel = $this->model('Resume');
    }

    public function index(){
        if(!isLoggedIn()) {
            header("Location: " . URLROOT.'/users/login');
        }
        $bs = $this->userModel->getBasicData();
        $intr = [];
        $skl = [];
        if(isset($bs[0]->id)){
            $intr = $this->userModel->getIntrests($bs[0]->id);
            $skl = $this->userModel->getSkills($bs[0]->id);
        }
        
        $data = [
            'title' => 'Resume',
            'name' => '',
            'email' => '',
            'contact' => '',
            'address' => '',
            'introduction' => '',
            'qualification' => '',
            'experience' => '',
            'basic' => $bs,
            'skills' => $skl, 
            'intrests' => $intr,
            'Error' => []
        ];


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $data['name'] = test_input($_POST['name']);
            $data['email'] = test_input($_POST['email']);
            $data['contact'] = test_input($_POST['contact']); 
            $data['address'] = test_input($_POST['address']);
            $data['introduction'] = test_input($_POST['introduction']);
            $data['qualification'] = test_input($_POST['qualification']);
            $data['experience'] = test_input($_POST['experience']);

            $data = [
                'title' => 'Resume',
                'name' => $data['name'],
                'email' => $data['email'],
                'contact' => $data['contact'],
                'address' => $data['address'],
                'introduction' => $data['introduction'],
                'qualification' => $data['qualification'],
                'experience' => $data['experience'],
                // 'basic' => $this->userModel->getBasicData(),
                'basic' => $bs,
                'intrests' => $intr,
                'skills' => $skl,
                'Error' => [
                    'nameError' => '',
                    'emailError' => '',
                    'contactError' => '',
                    'addressError' => '',
                    'introductionError' => '',
                    'qError' => '',
                    'eError' => '',
                ]
            ];

            if($data['name'] == ''){
                $data['Error']['nameError'] = 'Name Cannot be Empty';                
            }
            if($data['email'] == ''){
                $data['Error']['emailError'] = 'Email Cannot be Empty';                
            }
            if($data['contact'] == ''){
                $data['Error']['contactError'] = 'contact Cannot be Empty';                
            }
            if($data['address'] == ''){
                $data['Error']['addressError'] = 'address Cannot be Empty';                
            }
            if($data['introduction'] == ''){
                $data['Error']['introductionError'] = 'introduction Cannot be Empty';                
            }
            if($data['qualification'] == ''){
                $data['Error']['qError'] = 'qualification Cannot be Empty';                
            }
            if($data['experience'] == ''){
                $data['Error']['eError'] = 'experience Cannot be Empty';                
            }

            if($data['Error']['nameError']== '' && $data['Error']['emailError']== '' && $data['Error']['contactError']== '' && $data['Error']['addressError']== '' && $data['Error']['introductionError']== '' && $data['Error']['qError']== '' && $data['Error']['eError']== ''){
                if(count($bs) == 0){ //add data
                    if($this->userModel->addBasicData($data['name'], $data['email'], $data['contact'], $data['address'], $data['introduction'], $data['qualification'], $data['experience'])){
                        $data['basic'] = $this->userModel->getBasicData();
                    }
                }else{ // update data

                }
            }
            
        }

        $this->view('resume/index', $data);
    }

    public function addintrest(){
        if(!isLoggedIn()) {
            header("Location: " . URLROOT.'/users/login');
        }
        $rid = NULL;

        if(isset($_GET['rid']) && !empty($_GET['rid'])){
            $rid = test_input($_GET['rid']);
            if($this->userModel->checkBasicData() == 'no'){
                header('Location:'.URLROOT.'/resumes/index');
            }
        }

        $data = [
            'title' => 'Intrest',
            'name' => '',
            'rid' => $rid,
            'Error' => []
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $data['name'] = test_input($_POST['name']);
            $data['rid'] = test_input($_POST['rid']);

            $data = [
                'title' => 'Intrest',
                'name' => $data['name'],
                'rid' => $data['rid'],
                'Error' => [
                    'nameError' => ''
                ]
            ];

            if($data['name'] == ''){
                $data['Error']['nameError'] = 'Please Enter Intrest';
            }

            if($data['Error']['nameError'] == ''){
                if($this->userModel->addintrest($data['name'], $data['rid'])){
                    header('Location:'.URLROOT.'/resumes/index');
                }else{
                    $data['Error']['nameError'] = 'Something Went wrong!';
                }
            }

        }

        $this->view('resume/addintrest', $data);
    }

    public function deleteintrest(){
        if(!isLoggedIn()) {
            header("Location: " . URLROOT.'/users/login');
        }

        if(isset($_GET['iid']) && $_GET['iid'] != ''){
            if($this->userModel->deleteintrest(test_input($_GET['iid']))){
                header('Location:'.URLROOT.'/resumes/index');
            }
        }
    }


    public function addskill(){
        if(!isLoggedIn()) {
            header("Location: " . URLROOT.'/users/login');
        }
        $rid = NULL;

        if(isset($_GET['rid']) && !empty($_GET['rid'])){
            $rid = test_input($_GET['rid']);
            if($this->userModel->checkBasicData() == 'no'){
                header('Location:'.URLROOT.'/resumes/index');
            }
        }

        $data = [
            'title' => 'Skill',
            'name' => '',
            'rid' => $rid,
            'Error' => []
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $data['name'] = test_input($_POST['name']);
            $data['rid'] = test_input($_POST['rid']);
            $data = [
                'title' => 'Skill',
                'name' => $data['name'],
                'rid' => $data['rid'],
                'Error' => [
                    'nameError' => ''
                ]
            ];

            if($data['name'] == ''){
                $data['Error']['nameError'] = 'Please Enter Skill';
            }

            if($data['Error']['nameError'] == ''){
                if($this->userModel->addskill($data['name'], $data['rid'])){
                    header('Location:'.URLROOT.'/resumes/index');
                }else{
                    $data['Error']['nameError'] = 'Something Went wrong!';
                }
            }

        }

        $this->view('resume/addskill', $data);
    }

    public function deleteskill(){
        if(!isLoggedIn()) {
            header("Location: " . URLROOT.'/users/login');
        }

        if(isset($_GET['iid']) && $_GET['iid'] != ''){
            if($this->userModel->deleteskill(test_input($_GET['iid']))){
                header('Location:'.URLROOT.'/resumes/index');
            }
        }
    }


    public function download(){
        if(!isLoggedIn()) {
            header("Location: " . URLROOT.'/users/login');
        }
        $bs = $this->userModel->getBasicData();

        $intr = [];
        $skl = [];
        if(isset($bs[0]->id)){
            $intr = $this->userModel->getIntrests($bs[0]->id);
            $skl = $this->userModel->getSkills($bs[0]->id);
        }

        echo '<pre>';
        print_r($bs);
        echo '<pre>';
        print_r($intr);
        echo '<pre>';
        print_r($skl);
    }
}
