<?php
include 'db.php';

$db = new DB();
$conn = $db->conn;

$sortOption = $_POST['sortOption'];

// Default sorting is by the latest zinojums
$orderBy = "ORDER BY z.datums DESC, z.id DESC";

if ($sortOption === 'oldest') {
    $orderBy = "ORDER BY z.datums ASC, z.id ASC";
}

// Fetch zinojums with user information from the database
$result = $conn->query("SELECT z.*, u.vards, u.epasts FROM `zinojums` z
                         JOIN `users` u ON z.user_id = u.id
                         $orderBy");

if ($result->num_rows > 0) {
    echo "<ul class='zinojums-list'>";
    while ($row = $result->fetch_assoc()) {
        echo "<li class='zinojums-item'>";
        echo "<p class='zinojums-author'>Pievienoja: {$row['vards']} ({$row['epasts']}) {$row['datums']}</p>";
        echo "<p>{$row['zinojums']}</p>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Nav Pieejams Neviens Zinojums.</p>";
}
?>
