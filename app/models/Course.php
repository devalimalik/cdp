<?php
class Course {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function findUnisByProgram($pid) {
        $this->db->query('SELECT u.name as uname , u.city as ucity, p.type as pdegree, p.name as pname, p.duration as pduration, c.fee as cfee, c.deadline as dline FROM universities AS u INNER JOIN courses AS c ON c.u_id=u.id INNER JOIN programs AS p ON p.id=c.p_id WHERE p.name =:pid');
        $this->db->bind(':pid', $pid);
        $results = $this->db->resultSet();
        return $results;
    }

    public function findUnisByCity($city) {
        $this->db->query('SELECT u.name as uname , u.city as ucity, p.type as pdegree, p.name as pname, p.duration as pduration, c.fee as cfee, c.deadline as dline FROM universities AS u INNER JOIN courses AS c ON c.u_id=u.id INNER JOIN programs AS p ON p.id=c.p_id WHERE u.city =:city');
        $this->db->bind(':city', $city);
        $results = $this->db->resultSet();
        return $results;
    }

    public function findUnisByCP($program,$city) {
        $this->db->query('SELECT u.name as uname , u.city as ucity, p.type as pdegree, p.name as pname, p.duration as pduration, c.fee as cfee, c.deadline as dline FROM universities AS u INNER JOIN courses AS c ON c.u_id=u.id INNER JOIN programs AS p ON p.id=c.p_id WHERE u.city =:city AND p.name=:pname');
        $this->db->bind(':city', $city);
        $this->db->bind(':pname', $program);
        $results = $this->db->resultSet();
        return $results;
    }
    

    public function getAllCities(){
        $this->db->query('SELECT DISTINCT city FROM universities;');
        $results = $this->db->resultSet();
        return $results;  
    }
    public function getAllCourses(){
        $this->db->query('SELECT u.name as uname , u.city as ucity, p.type as pdegree, p.name as pname, p.duration as pduration, c.fee as cfee, c.deadline as dline FROM universities AS u INNER JOIN courses AS c ON c.u_id=u.id INNER JOIN programs AS p ON p.id=c.p_id');
        $results = $this->db->resultSet();
        return $results;   
    }

    public function getAllPrograms(){
        $this->db->query('SELECT * From programs');
        $results = $this->db->resultSet();
        return $results;
    }

}
