<?php 

    define('DB_SERVER', 'acw2033ndw0at1t7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
    define('DB_USER', 'm3i1m0ppyehvoh4f');
    define('DB_PASS', 'jjm70j4tqbvcfs71');
    define('DB_NAME', 'fwzfgv1uf33fibh9');
    
    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }

        public function insert($firstname, $lastname, $email, $phonenumber,	$address) {
            $result = mysqli_query($this->dbcon, "INSERT INTO users(first_name, last_name, email, phone_number, address) VALUES('$firstname', '$lastname', '$email', '$phonenumber', '$address')");
            return $result;
        }

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM users");
            return $result;
        }

        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM users WHERE id = '$userid'");
            return $result;
        }

        public function update($firstname, $lastname, $email, $phonenumber,	$address, $userid) {
            $result = mysqli_query($this->dbcon, "UPDATE users SET 
                first_name = '$firstname',
                last_name = '$lastname',
                email = '$email',
                phone_number = '$phonenumber',
                address = '$address'
                WHERE id = '$userid'
            ");
            return $result;
        }

        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM users WHERE id = '$userid'");
            return $deleterecord;
        }

    }
    

?>