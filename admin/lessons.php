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
<div class="addlesson">
    <form action="add-lesson.php" method="post" class="form-group container mb-3">
        <h3 class="text-center">Dars qo'shish</h3>
        
        <input type="text" placeholder="Dars nomi.." name="lesson_name" class="form-control mb-2">
        <input type="text" placeholder="Taqdimot linki.." name="lesson_link" class="form-control mb-2">
        <input type="submit" class="btn btn-success" value="Qo'shish" class="form-control">
    </form><br>
<hr><br>
    <table class="table">
    <a href="clear-user-data.php" class="btn btn-danger mb-2" style="float:right;">Barcha ma'lumotlarni o'chirish</a>
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Dars nomi</th>
            <th scope="col">Taqdimot linki</th>
            <th scope="col">O'chirish</th>
            </tr>
        </thead>
        <tbody>
            
        <?php

            $sql = "SELECT * FROM lessons";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $count = 1;
            if($lessons != null){
                foreach($lessons as $lesson){
                    $lesson_id = $lesson["ID"];
                    $lessonname = $lesson["lesson_name"];
                    $lesson_link = $lesson["lesson_link"];
                    echo "
                        <tr>
                            <th scope='row'>$count</th>
                            <td>$lessonname</td>
                            <td><div style='width:100px;height:100px;border-radius:10px;'>$lesson_link</div></td>
                            <td><a href='delete-lesson.php?id=$lesson_id' class='btn btn-danger text-light'>O'chirish</a></td>
                        </tr>
                    ";
                    $count++;
    
                }
            }



        ?>
        </tbody>
        </table>
</div>

<?php include("bottom.php"); ?>