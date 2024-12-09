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

    public function insert_book($bk_title, $author, $pub_date, $Stat_ID)
    {
        $this->initDB();

        $query = "INSERT INTO book(bk_title, author, pub_date, Stat_ID) VALUES('$bk_title','$author','$pub_date',$Stat_ID);";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function update_books($bk_title, $author, $pub_date, $Stat_ID, $book_ID)
    {
        $this->initDB();

        $query = "UPDATE book SET bk_title = '$bk_title', author = '$author', pub_date = '$pub_date', Stat_ID = $Stat_ID WHERE book_ID = $book_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function delete_book_by_ID($book_ID)
    {

        $this->initDB();

        $query = "DELETE FROM book WHERE book_ID = $book_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function fetch_all_books()
    {

        $this->initDB();

        $query = "SELECT * FROM book;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function fetch_single_books($book_ID)
    {

        $this->initDB();

        $query = "SELECT * FROM book WHERE book_ID = $book_ID;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }
}
