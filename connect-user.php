<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=badsite', "badsite-user", "Password123");
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
