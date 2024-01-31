<?php
include 'db.php';

$db = new DB();
$conn = $db->conn;

$sortOption = $_POST['sortOption'];
$searchQuery = $_POST['searchQuery'];

// Default sorting is by the latest zinojums
$orderBy = "ORDER BY z.id DESC";

if ($sortOption === 'oldest') {
    $orderBy = "ORDER BY z.id ASC";
}

// Additional condition for searching
$searchCondition = "";
if (!empty($searchQuery)) {
    $searchCondition = "AND (z.zinojums LIKE '%$searchQuery%' OR u.vards LIKE '%$searchQuery%' OR u.epasts LIKE '%$searchQuery%')";
}

// Fetch zinojums with user information from the database
$result = $conn->query("SELECT z.*, u.vards, u.epasts FROM `zinojums` z
                         JOIN `users` u ON z.user_id = u.id
                         WHERE 1 $searchCondition
                         $orderBy");

if ($result->num_rows > 0) {
    echo "<ul class='zinojums-list'>";
    while ($row = $result->fetch_assoc()) {
        echo "<li class='zinojums-item'>";
        echo "<p class='zinojums-author'>Added by: {$row['vards']} ({$row['epasts']}) {$row['datums']}</p>";
        echo "<p>{$row['zinojums']}</p>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Nav Pieejams Neviens Zinojums</p>";
}
?>
