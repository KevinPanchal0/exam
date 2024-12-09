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

    public function insert_borrowing($Book_ID, $Stud_ID, $date_borrowed, $date_return)
    {
        $this->initDB();

        $query = "INSERT INTO borrowing (Book_ID, Stud_ID, date_borrowed, date_return) VALUES($Book_ID, $Stud_ID, '$date_borrowed','$date_return');";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function update_borrowing($Book_ID, $Stud_ID, $date_borrowed, $date_return, $borrowing_ID)
    {
        $this->initDB();

        $query = "UPDATE borrowing SET Book_ID = $Book_ID, Stud_ID = $Stud_ID, date_borrowed = '$date_borrowed', date_return = '$date_return' WHERE borrowing_ID = $borrowing_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function delete_borrowing_by_ID($borrowing_ID)
    {

        $this->initDB();

        $query = "DELETE FROM borrowing WHERE borrowing_ID = $borrowing_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function fetch_all_borrowing()
    {

        $this->initDB();

        $query = "SELECT * FROM borrowing;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function fetch_single_borrowing($borrowing_ID)
    {

        $this->initDB();

        $query = "SELECT * FROM borrowing WHERE borrowing_ID = $borrowing_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }
}
