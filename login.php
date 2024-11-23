<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login.css">
    <title>Kirish</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">
       <div class="row border rounded-5 p-3 bg-white shadow box-area">
         <div class="col-md-12 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2 class="welcome_text">Xush kelibsiz!</h2>
                     <?php
                     if(isset($_SESSION["status"])){
                        echo "<span style='color:red'>".$_SESSION["status"]."</span>";
                      };
                      unset($_SESSION["status"]);
                     ?>
                     <?php
                     if(isset($_SESSION["status_register"])){
                        echo "<span style='color:green'>".$_SESSION["status_register"]."</span>";
                      };
                      unset($_SESSION["status_register"]);
                     ?>
                </div>
                <form action="login-action.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="oquvchi_id" class="form-control form-control-lg bg-light fs-6" required placeholder="O'quvchi ID">
                </div>
                <div class="input-group mb-3">
                 <input type="password" class="form-control" id="password" name="parol" placeholder="Parol" required>
                 <span class="input-group-text"><i class="far fa-eye-slash" id="togglePassword"></i></span>
              </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Meni eslab qol</small></label>
                        <a href="register.php" style="margin-left: 20px;">Ro'yxatdan o'tish.</a>
                    </div>
                   
                </div>
                <div class="input-group mb-3">
                    <button style="background:linear-gradient(red, blue);padding:10px 25px;color:#fff;border:none;border-radius:10px;font-weight:bold;">Kirish</button>
                </div>
               </form>
          </div>
       </div>
<script>
  const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
   
// toggle the type attribute
const type = password.getAttribute("type") === "password" ? "text" : "password";
password.setAttribute("type", type);

// toggle the eye icon
this.classList.toggle('fa-eye');
});
</script>
</body>
</html>