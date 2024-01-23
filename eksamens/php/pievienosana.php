<?php

include 'db.php';

class DataInsertion {
    private $db;

    public function __construct(DB $db) {
        $this->db = $db;
    }

    public function insertData($vards, $epasts, $zinojums) {
        $conn = $this->db->conn;

        $vards = $conn->real_escape_string($vards);
        $epasts = $conn->real_escape_string($epasts);
        $zinojums = $conn->real_escape_string($zinojums);

        // Insert data into 'zinojums' table
        $sql = "INSERT INTO `zinojums` (`zinojums`) VALUES ('$zinojums')";
        if ($conn->query($sql) === false) {
            echo "Error inserting data into 'zinojums' table: " . $conn->error;
            exit();
        }

        $zinojuma_id = $conn->insert_id;

        // Insert data into 'users' table
        $sql = "INSERT INTO `users` (`vards`, `epasts`, `zinojuma_id`) VALUES ('$vards', '$epasts', '$zinojuma_id')";
        if ($conn->query($sql) === false) {
            echo "Error inserting data into 'users' table: " . $conn->error;
            exit();
        }

        echo "Data successfully inserted!";
    }
}

$db = new DB();
$dataInsertion = new DataInsertion($db);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vards = $_POST['vards'];
    $epasts = $_POST['epasts'];
    $zinojums = $_POST['zinojums'];

    $dataInsertion->insertData($vards, $epasts, $zinojums);
}

?>
