<?php

class config
{

    private $HOSTNAME = "localhost";
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $DB = "exam";

    private $conn;

    function initDB()
    {
        $this->conn = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->DB);

        if (!$this->conn) {
            echo "Connection of Server is failed";
        }
    }

    public function insert_student($name, $gender, $age, $contact_ID, $email, $pass)
    {
        $this->initDB();

        $query = "INSERT INTO students(name,gender,age,contact_ID,email,pass) VALUES('$name','$gender',$age,$contact_ID,'$email','$pass');";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function update_students($name, $gender, $age, $contact_ID, $Stud_ID)
    {
        $this->initDB();

        $query = "UPDATE students SET name = '$name', gender = '$gender', age = $age, contact_ID = $contact_ID WHERE Stud_ID = $Stud_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function delete_student_by_ID($Stud_ID)
    {

        $this->initDB();

        $query = "DELETE FROM students WHERE Stud_ID = $Stud_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function fetch_all_students()
    {

        $this->initDB();

        $query = "SELECT * FROM students;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function fetch_single_students($Stud_ID)
    {

        $this->initDB();

        $query = "SELECT * FROM students WHERE Stud_ID = $Stud_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }
}
