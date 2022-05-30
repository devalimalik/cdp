<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Tests extends Controller {
    public function __construct() {
        $this->userModel = $this->model('Test');
    }

    public function index(){
        if(!isLoggedIn()) {
            header("Location: " . URLROOT.'/users/login');
        }

        $data = [
            'title' => 'Tests',
            'tests' => $this->userModel->getAllTests(),
        ];

        $this->view('tests/index', $data);
    }

    public function take(){
        if(!isLoggedIn()) {
            header("Location: " . URLROOT.'/users/login');
        }
        $data = [
            'title' => 'Take',
            'test' => [],
            'questions' => [],
        ];
        if(isset($_GET['test']) && !empty($_GET['test'])){
            $data['questions'] = $this->userModel->getAllQuestions(test_input($_GET['test']));
            $data['test'] = $this->userModel->getTestById(test_input($_GET['test']));
        }
        

        $this->view('tests/take', $data);
    }



    public function result(){
        if(!isLoggedIn()) {
            header("Location: " . URLROOT.'/users/login');
        }
        $data = [
            'title' => 'check',
            'test' => $this->userModel->getTestById(test_input($_POST['test_id'])),
            'score' => '',
            'total' => ''
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $test_id = test_input($_POST['test_id']);
            $questions = $this->userModel->getAllQuestions($test_id);
            $count = 0;
            $score = 0;
            foreach($questions as $quest){
                $count++;
                if($quest->answer == $_POST['answer'.$count]){
                    $score++;
                }
            }
            $data['total'] = $count;
            $data['score'] = $score;

            $exist = $this->userModel->checkResultByTestId($test_id);
            if($exist){
                $out= $this->userModel->updateresult($score, $count, $test_id);
            }else{
                $out= $this->userModel->addresult($score, $count, $test_id);
                
            }
            

        }

        $this->view('tests/result', $data);
    }

    public function history(){
        if(!isLoggedIn()) {
            header("Location: " . URLROOT.'/users/login');
        }

        $data = [
            'title' => 'History',
            'results' => $this->userModel->getResultHistory(),
        ];

        $this->view('tests/history', $data);        
    }

}
