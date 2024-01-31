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

        // Insert data into 'users' table first
        $sql = "INSERT INTO `users` (`vards`, `epasts`) VALUES ('$vards', '$epasts')";
        if ($conn->query($sql) === false) {
            echo "Error inserting data into 'users' table: " . $conn->error;
            exit();
        }

        // Get the last inserted user ID
        $user_id = $conn->insert_id;

        // Insert data into 'zinojums' table with the current date and time
        $datums = date("Y-m-d H:i:s"); // Current date and time
        $sql = "INSERT INTO `zinojums` (`zinojums`, `user_id`, `datums`) VALUES ('$zinojums', '$user_id', '$datums')";
        if ($conn->query($sql) === false) {
            echo "Error inserting data into 'zinojums' table: " . $conn->error;

            // If there's an error, you may want to roll back the previous insertion
            $rollbackSql = "DELETE FROM `users` WHERE `id` = '$user_id'";
            $conn->query($rollbackSql);

            exit();
        }

        echo "Data successfully inserted!";
    }
}

$db = new DB();
$dataInsertion = new DataInsertion($db);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vards = trim($_POST['vards']);
    $epasts = trim($_POST['epasts']);
    $zinojums = trim($_POST['zinojums']);

    if (empty($vards) || empty($epasts) || empty($zinojums)) {
        echo "Please fill in all fields.";
    } else {
        $dataInsertion->insertData($vards, $epasts, $zinojums);
    }
}
?>
