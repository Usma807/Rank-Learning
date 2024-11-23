<?php
include("conn.php");
$user_id = $_GET["user_id"];
$full_name = $_GET["full_name"];
$rank = $_GET["rank"];
if($user_id=="" || $user_id==null){
  header("Location:login.php");
}

$sql = "SELECT * FROM ranking";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $userrank = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $userr = "";
        $count = 0;
        foreach($userrank as $id){
          if($user_id == $id['user_id']){
            $userr = $id['rank'];
            $count++;
          }
        }
if($count == 0){
    $sql = "INSERT INTO ranking(full_name, user_id, rank) VALUES(:full_name, :user_id, :rank)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":full_name", $full_name);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":rank", $rank);
        $stmt->execute();
}
if($count > 0){
    $gotrank = $userr + $rank;
    $endrank = (string)$gotrank;
    $sql = "UPDATE ranking SET rank = :rank WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":rank", $endrank);
        $stmt->execute();
}
header("Location: index.php#exercises");
?>