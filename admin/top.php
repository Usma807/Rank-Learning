<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      ul{
        width: 90%;
        margin: 0 auto;
        background-color: #fff;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 0px 5px;
        margin-top: 5px;
        padding: 10px 15px;
        border-radius: 15px;
        margin-bottom: 15px;
      }
      ul li{
        display: inline-block;
        padding: 5px 10px;
        border-radius: 7px;
        margin: 0px 10px;
        font-weight: bold;
      }
      ul li:hover:not(li:nth-child(5)){
        background-color: black;
        color: #fff;
        transition: .3s ease;
      }
      ul li a{
        text-decoration: none;
        font-weight: bold;
      }

    </style>
</head>
<body>
<nav class="container">
<div class="">
      <ul>
        <li>
          <a class="nav-link" aria-current="page" href="dashboard.php">Foydalanuvchilar</a>
        </li>
        <li>
          <a class="nav-link" href="lessons.php">Darslar</a>
        </li>
        <li>
          <a class="nav-link" href="exercises.php">Topshiriqlar</a>
        </li>
        <li>
          <a class="nav-link" href="ranking.php">Reyting</a>
        </li>
        <li style="float:right;"><a href="logout.php"><img src="logout.png" alt="" style="width:30px; height:30px; border-radius:50%;"></a></li>
        <li style="float:right;background-color:black;color:#fff;">
          <a href="#" role="button" style="color:#fff;">
                <?php echo $admin["admin_id"]; ?>
          </a>
        </li>
      </ul>
    </div>
</nav>


<main class="container rounded shadow p-5 mt-2">