<?php
include("conn.php");
$user_id = $_SESSION["user_id"];
if($user_id=="" || $user_id==null){
  header("Location:login.php");
}

$sql = "SELECT * FROM users WHERE ID = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>

   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/styles.css">

      <title>Educating template || Usman</title>
   </head>
   <body>
      <!--=============== NAVBAR ===============-->
      
      <nav class="nav">
         <ul class="nav__list">
            <li>
               <a href="#lessons" class="nav__link active-link">
                  <i class="ri-home-8-line"></i>
               </a>
            </li>
            <li>
               <a href="#exercises" class="nav__link">
                  <i class="ri-questionnaire-line"></i>
               </a>
            </li>


            <!-- Expand list -->
            <li>
               <button class="nav__expand" id="nav-expand">
                  <i class="ri-add-line nav__expand-icon" id="nav-expand-icon"></i>
               </button>

               <ul class="nav__expand-list" id="nav-expand-list">
                  <!-- <li>
                     <a href="#" class="nav__expand-link">
                        <i class="ri-git-repository-line"></i>
                        <span>Kitoblar</span>
                     </a>
                  </li> -->
      
                  <li>
                     <a href="keyeng.php" class="nav__expand-link">
                        <i class="ri-file-word-line"></i>
                        <span>So'z o'yini(English)</span>
                     </a>
                  </li>
      
                  <li>
                     <a href="keyuz.php" class="nav__expand-link">
                        <i class="ri-file-word-line"></i>
                        <span>So'z o'yini(O'zbek)</span>
                     </a>
                  </li>
               </ul>
            </li>
         
            

            <li>
               <a href="#ranking" class="nav__link">
                  <i class="ri-bar-chart-grouped-fill"></i>
               </a>
            </li>
                        <li>
               <a href="#profile" class="nav__link">
                  <i class="ri-settings-line"></i>
               </a>
            </li>
         </ul>
      </nav>

      <!--==================== MAIN ====================-->
      <main class="container">
         <section class="section" id="lessons">
          <div style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:15px;color:black;font-weight:bold;overflow-y:scroll;">
            <h1>Darslar</h1>
               <?php
               $sql = "SELECT * FROM lessons";
               $stmt = $pdo->prepare($sql);
               $stmt->execute();
               $lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);
               if($lessons != null){
                   foreach($lessons as $lesson){
                     echo "
                     
                        <div class='__dars_div' style='box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:15px;color:black;font-weight:bold;'>
                           <h3>{$lesson['lesson_name']}</h3>
                           <a href='open-lesson.php?id={$lesson['ID']}' id='start_button'>Boshlash</a><br>
                        </div><br>
                     
                     ";
                  }
               }
               
               ?>
          </div>
         </section>

         <section class="section" id="exercises">
           <div style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;padding:25px 15px;border-radius:15px;color:black;font-weight:bold;overflow-y:scroll;">
            <h1>Topshiriqlar</h1>
            <div class="exe__boxes">
            <?php
               $sql = "SELECT * FROM exercises";
               $stmt = $pdo->prepare($sql);
               $stmt->execute();
               $lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);
               if($lessons != null){
                   foreach($lessons as $lesson){
                     $link = "";
                     if($lesson['ex_turi'] == "HangMan"){
                        $link = "hangman.php?id=".$lesson['ID'];
                     }
                     if($lesson['ex_turi'] == "SozTopish"){
                        $link = "soztopish.php?id=".$lesson['ID'];
                     }
                     echo "
                        <div style='background-color:#fff;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;color:#000;'>
                           <h4>{$lesson['ex_name']} - {$lesson['ex_turi']}</h4><br>
                           <a href='{$link}' style='padding:7px 10px;margin-top:15px;text-decoration:none;background-color:darkblue;border-radius:7px;color:#fff;'>Kirish</a>
                        </div>
                     ";
                   }
               }
               ?>
            </div>
            </div>
         </section>

         <section class="section" id="ranking">
            
            <div style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;padding:25px 15px;border-radius:15px;color:black;font-weight:bold;overflow-y:scroll;justify-content:center;align-items:center;">
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

         <section class="section" id="profile">
            
            <div style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;padding:25px 15px;border-radius:15px;color:black;font-weight:bold;">
              <h1>Profil</h1>
              <div class="profile_img">
                <img src="images/profile.jpg" alt="" style="width:100%;height:100%;">
              </div>
            <div class="example_texts">
              <div id="1" style="margin-bottom:15px;margin-top:15px;"><?php echo $user["ism"]." ".$user["familiya"]?></div>
              <div id="2" style="margin-bottom:30px;margin-top:15px;"><?php echo $user["e_mail"];?></div>
              <div id="3"><a href="logout.php" style="padding:15px;border-radius:15px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;margin-top:15px;margin-left:10px;color:red;"><i class="ri-logout-circle-r-line"></i></a></div>
            </div>
            </div>
            
            </div>
         </section>
         <script src="https://widget.cxgenie.ai/widget.js" data-aid="b442779c-8f42-4b71-84a0-c30555bf3d4d"
		
		 data-lang="uz"></script>
      </main>
      
      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>
      <script type="text/javascript">
document.getElementById('english').addEventListener('click', ()=>{
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
})
</script>



<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
   </body>
</html>