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

    public function insert_book_status($book_id, $status_name)
    {
        $this->initDB();

        $query = "INSERT INTO book_status (book_id, status_name) VALUES($book_id,'$status_name');";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function update_book_status($book_id, $status_name, $Stat_ID)
    {
        $this->initDB();

        $query = "UPDATE book_status SET book_id = $book_id,status_name = '$status_name' WHERE Stat_ID = $Stat_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function delete_book_status_by_ID($Stat_ID)
    {

        $this->initDB();

        $query = "DELETE FROM book_status WHERE Stat_ID = $Stat_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function fetch_all_book_status()
    {

        $this->initDB();

        $query = "SELECT * FROM book_status;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function fetch_single_book_status($Stat_ID)
    {

        $this->initDB();

        $query = "SELECT * FROM book_status WHERE Stat_ID = $Stat_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }
}
