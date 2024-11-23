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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
<style>
  .user_rank{
  width: 90%;
  margin: 0 auto;
  background-color: #233142;
  padding: 15px 10px;
  display: grid;
  grid-template-columns: 15% 60% 25%;
  justify-content: center;
  border-radius: 10px;
  margin-bottom: 10px;
  margin-top: 10px;
  color: #fff;
  text-align: center;
}
</style>
<section class="section" id="ranking">
            
            <div style="color:black;font-weight:bold;justify-content:center;align-items:center;">
              <h1>Reyting    (<i class="ri-copper-diamond-line"></i>)</h1>
              <?php
              
                  $sql = "SELECT * FROM ranking ORDER BY rank DESC";   
                  $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                  $userrank = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  $count = 1;
                  foreach($userrank as $userr){
                     if($user_id == $userr['user_id']){
                           echo "
                              <div class='user_rank' style='background:linear-gradient(red, blue);'>
                                 <span>#{$count}</span>
                                 <span>{$userr['full_name']}</span>
                                 <span>{$userr['rank']}</span>
                              </div>
                        ";
                     }
                     if($user_id != $userr['user_id']){
                           echo "
                              <div class='user_rank'>
                                 <span>#{$count}</span>
                                 <span>{$userr['full_name']}</span>
                                 <span>{$userr['rank']}</span>
                              </div>
                        ";
                     }
                     $count ++;
                  }
              
              ?>
            
            </div>
         </section>

<?php include("bottom.php"); ?>