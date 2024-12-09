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

    public function insert_transaction($trans_name, $Stud_ID, $borrowing_ID, $trans_date)
    {
        $this->initDB();

        $query = "INSERT INTO transaction (trans_name, Stud_ID, borrowing_ID, trans_date) VALUES('$trans_name',$Stud_ID,$borrowing_ID,'$trans_date');";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function update_transactions($trans_name, $Stud_ID, $borrowing_ID, $trans_date, $trans_ID)
    {
        $this->initDB();

        $query = "UPDATE transaction SET trans_name = '$trans_name', Stud_ID = '$Stud_ID', borrowing_ID = '$borrowing_ID', trans_date = '$trans_date' WHERE trans_ID = $trans_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function delete_transaction_by_ID($trans_ID)
    {

        $this->initDB();

        $query = "DELETE FROM transaction WHERE trans_ID = $trans_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function fetch_all_transactions()
    {

        $this->initDB();

        $query = "SELECT * FROM transaction;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function fetch_single_transaction($trans_ID)
    {

        $this->initDB();

        $query = "SELECT * FROM transaction WHERE trans_ID = $trans_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }
}
