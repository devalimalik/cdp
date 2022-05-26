<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (username, email, password) VALUES(:username, :email, :password)');

        //Bind values
        $this->db->bind(':username', $data['username']);$this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($username = '', $pass = ''){
        $op = false;
        $opr = 0;
        if($pass != '' && strlen($pass) > 7){
            $this->db->query('UPDATE users SET password = :pass WHERE id = :user_id');
            //Bind values
            $this->db->bind(':pass', $pass);
            $this->db->bind(':user_id', $_SESSION['user_id']);
            $op = $this->db->execute();
            $opr++;
        }

        if($username != $_SESSION['username'] && $username != ''){
            $this->db->query('UPDATE users SET username = :username WHERE id = :user_id');
            //Bind values
            $this->db->bind(':username', $username);
            $this->db->bind(':user_id', $_SESSION['user_id']);
            $op = $this->db->execute();
            $_SESSION['username'] = $username;
            $opr++;
        }

        //Execute function
        if($opr == 0)
        {
            return true;
        }
        return $op;
    }

    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    public function findUsersCount() {
        $this->db->query('SELECT * FROM users');
        $results = $this->db->resultSet();
        return $results;
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserwithEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        return $row;
    }

}
