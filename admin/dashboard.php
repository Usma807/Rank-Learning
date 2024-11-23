<?php
    include("conn.php");
    $user_id = $_SESSION["user_id"];
    if($user_id=="" || $user_id==null){
    header("Location:index.php");
    }

    $sql = "SELECT * FROM admins WHERE ID = :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->execute();
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<?php include("top.php"); ?>

<?php

if(isset($_SESSION["status"])){
    echo "
        <span class='rounded shadow p-3 bg-success text-light' style='position:fixed;top:70px;right:150px;'>
            <span>{$_SESSION['status']}</span>
        </span>
    ";
    unset($_SESSION["status"]);
};


?>


<table class="table">
    <a href="#" id="addnew" class="btn btn-success mb-2">Yangi qo'shish</a>
    <a href="clear-user-data.php" class="btn btn-danger mb-2" style="float:right;">Barcha ma'lumotlarni o'chirish</a>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ism</th>
      <th scope="col">Familiya</th>
      <th scope="col">O'quvchi ID</th>
      <th scope="col">Email</th>
      <th scope="col">Parol</th>
      <th scope="col">O'chirish</th>
    </tr>
  </thead>
  <tbody>
    
<?php

    $sql = "SELECT * FROM users";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = 1;
    foreach($users as $user){
        $ism = $user["ism"];
        $familiya = $user["familiya"];
        $email = $user["e_mail"];
        $oquvchi_id = $user["oquvchi_id"];
        $parol = $user["parol"];
        $userid = $user["ID"];
        echo "
            <tr>
                <th scope='row'>$count</th>
                <td>$ism</td>
                <td>$familiya</td>
                <td>$oquvchi_id</td>
                <td>$email</td>
                <td>$parol</td>
                <td><a href='delete-user.php?id=$userid' class='btn btn-danger text-light'>O'chirish</a></td>
            </tr>
        ";
        $count++;

    }



?>
 </tbody>
 </table>

<style>
    .addnew{
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(0,0,0,.9);
        padding: 20px;
    }
    .active{
        display: block;
        animation: anime 1000ms;
    }
    @keyframes anime{
        0%{
            transform: translateY(-100%);
        }
        100%{
            transform: translateY(0%);
        }
    }
</style>

<div class="addnew">
    <form action="add-new.php" method="post" class="form-group container p-5 bg-light shadow rounded">
        <h3 class="text-center">Yangi qo'shish</h3>
        <input type="text" placeholder="Ism.." name="ism" class="form-control mb-2">
        <input type="text" placeholder="Familiya.." name="familiya" class="form-control mb-2">
        <input type="text" placeholder="O'quvchi ID.." name="oquvchi_id" class="form-control mb-2">
        <input type="text" placeholder="Email.." name="e_mail" class="form-control mb-2">
        <input type="text" placeholder="Parol.." name="parol" class="form-control mb-2">
        <input type="submit" class="btn btn-success" value="Qo'shish" class="form-control">
        <input type="button" class="btn btn-danger" id="cancelBtn" value="Rad etish" class="form-control">
    </form>
</div>


<script>
    document.getElementById('cancelBtn').addEventListener('click', (e)=>{
        e.preventDefault();
        document.querySelector('.addnew').classList.remove('active');
    });
    document.getElementById('addnew').addEventListener('click', (e)=>{
        e.preventDefault();
        document.querySelector('.addnew').classList.add('active');
    });
</script>
<?php include("bottom.php"); ?>