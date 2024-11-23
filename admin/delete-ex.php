<?php
    include("conn.php");
    $user_id = $_SESSION["user_id"];
    $id = $_GET['id'];

    $sql = "DELETE FROM exercises WHERE ID = :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":user_id", $id);
            $stmt->execute();
            $_SESSION["status"] = "Muvaffaqiyatli o'chirildi!";
            header("Location: exercises.php");

?>