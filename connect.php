<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=badsite', "badsite", "Password123!");
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
