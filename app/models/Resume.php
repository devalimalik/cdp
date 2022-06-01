<?php
class Resume {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function addBasicData($n,$e,$c,$a,$i,$q,$exp){
        $this->db->query('INSERT into resumes (rusr_id,name,email,contact,address,introduction,qualification,experience) VALUES(:usr,:n,:e,:c,:a,:i,:q,:exp)');

        $this->db->bind(':usr', $_SESSION['user_id']);
        $this->db->bind(':n', $n);
        $this->db->bind(':e', $e);
        $this->db->bind(':c', $c);
        $this->db->bind(':a', $a);
        $this->db->bind(':i', $i);
        $this->db->bind(':q', $q);
        $this->db->bind(':exp', $exp);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function checkBasicData(){
        //Prepared statement
        $this->db->query('SELECT * FROM resumes WHERE rusr_id = :usr_id');

        $this->db->bind(':usr_id', $_SESSION['user_id']);
        $obh=$this->db->execute();

        //Check if info already present
        if($this->db->rowCount() > 0) {
            return 'yes';
        } else {
            return 'no';
        }
    }

    public function getBasicData(){
        $b = $this->checkBasicData();
        if($b == 'yes'){
            $this->db->query('SELECT * From resumes WHERE rusr_id = :id');
            $this->db->bind(':id', $_SESSION['user_id']);
            $results = $this->db->resultSet();
            return $results;
        }else{
            return [];
        }
    }




    // Intrests
    public function getIntrests($rid){
        $this->db->query('SELECT * From intrests WHERE int_r_id = :rid');
        $this->db->bind(':rid', $rid);
        $results = $this->db->resultSet();
        return $results;
    }

    public function addIntrest($name, $rid){
        $this->db->query('INSERT into intrests (int_r_id,name) VALUES(:rid,:name)');

        $this->db->bind(':rid', $rid);
        $this->db->bind(':name', $name);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }       
    }

    public function deleteintrest($iid){
        $this->db->query('DELETE FROM intrests WHERE id = :iid');

        $this->db->bind(':iid', $iid);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }       
    }

    
    // Skills
    public function getSkills($rid){
        $this->db->query('SELECT * From skills WHERE skl_r_id = :rid');
        $this->db->bind(':rid', $rid);
        $results = $this->db->resultSet();
        return $results;
    }

    public function addSkill($name, $rid){
        $this->db->query('INSERT into skills (skl_r_id,name) VALUES(:rid,:name)');

        $this->db->bind(':rid', $rid);
        $this->db->bind(':name', $name);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }       
    }

    public function deleteskill($iid){
        $this->db->query('DELETE FROM skills WHERE id = :iid');

        $this->db->bind(':iid', $iid);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }       
    }
}