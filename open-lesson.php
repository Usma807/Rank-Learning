<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Educating template</title>
</head>
<style>
  .video_lesson{
    width: 90%;
    margin: 0 auto;
    background-color: black;
    border-radius: 10px;
    padding: 80px 10px;
  }
  
  #complete{
    background-color: hsl(225, 95%, 56%);
    text-decoration: none;
    color: #fff;
    border-radius: 10px;
    padding: 15px;
    outline: none;
    border: none;
    font-weight: bold;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  }
</style>
<body>
  <?php
 include("conn.php");
  $lesson_id = $_GET["id"];

  $sql = "SELECT * FROM lessons WHERE ID = $lesson_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $lesson = $stmt->fetch(PDO::FETCH_ASSOC);
  
  echo "
    {$lesson['lesson_link']}
  ";

  ?>
  <div style="padding:10px;margin-top:20px;">
    <a href="index.php#lessons" id="complete">Ortga</a>
  </div>
  
</body>
</html>