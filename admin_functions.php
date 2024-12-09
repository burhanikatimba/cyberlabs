<?php
function getPrograms($conn) {
    $query = "SELECT * FROM programs";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getUsers($conn) {
    $query = "SELECT * FROM users";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
