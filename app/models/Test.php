<?php
class Test {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function getAllTests(){
        $this->db->query('SELECT * From tests');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getTestById($id){
        $this->db->query('SELECT * From tests WHERE id=:id');
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }

    public function getAllQuestions($id){
        $this->db->query('SELECT * From questions WHERE test_id=:tid');
        $this->db->bind(':tid', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function checkResultByTestId($id){
        $this->db->query('SELECT * From results WHERE t_id=:tid AND usr_id=:usr_id');
        $this->db->bind(':tid', $id);
        $this->db->bind(':usr_id', $_SESSION['user_id']);
        //Check if result is already added
        if(count($this->db->resultSet()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateresult($score, $total, $id){
        $this->db->query('UPDATE results SET score=:score, total=:total WHERE t_id=:t_id AND usr_id=:usr_id');
        $this->db->bind(':score', $score);
        $this->db->bind(':total', $total);
        $this->db->bind(':t_id', $id);
        $this->db->bind(':usr_id', $_SESSION['user_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function addresult($score, $total, $id){
        $this->db->query('INSERT INTO results (t_id,usr_id, score, total) VALUES(:t_id,:usr_id, :score, :total)');
        $this->db->bind(':t_id', $id);
        $this->db->bind(':usr_id', $_SESSION['user_id']);
        $this->db->bind(':score', $score);
        $this->db->bind(':total', $total);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getResultHistory(){
        $this->db->query('SELECT t.name, r.score, r.total, r.created_at  From tests as t INNER JOIN results as r ON t.id = r.t_id WHERE r.usr_id = :usr_id');
        $this->db->bind(':usr_id', $_SESSION['user_id']);
        $results = $this->db->resultSet();
        return $results;        
    }

}
