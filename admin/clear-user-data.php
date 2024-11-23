<?php
    include("conn.php");

    $sql = "TRUNCATE TABLE users";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            header("Location: dashboard.php");

?>