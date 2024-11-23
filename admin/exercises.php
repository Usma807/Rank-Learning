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
    <form action="add-ex.php" method="post" class="form-group container mb-3">
        <h3 class="text-center">Topshiriq qo'shish</h3>
        <input type="text" placeholder="Topshiriq nomi.." name="ex_name" class="form-control mb-2">
        <select name="ex_turi" class="form-control mb-2">
            <option value="">Iltimos topshiriq turini tanlang</option>
            <option value="HangMan">HangMan o'yini</option>
            <option value="SozTopish">So'z topish o'yini</option>
        </select>
        <input type="text" placeholder="Termin.." name="ex_termin" class="form-control mb-2">
        <textarea id="ex_tavsif" name="ex_tavsif" placeholder="Termin tavsifi.." class="form-control mb-2">
            
        </textarea><br>
        <input type="submit" class="btn btn-success" value="Qo'shish" class="form-control">
    </form><br>
<hr><br>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Topshiriq nomi</th>
            <th scope="col">Topshiriq turi</th>
            <th scope="col">Termin</th>
            <th scope="col">Termin tavsifi</th>
            <th scope="col">O'chirish</th>
            </tr>
        </thead>
        <tbody>
            
        <?php

            $sql = "SELECT * FROM exercises";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $count = 1;
            if($lessons != null){
                foreach($lessons as $lesson){
                    $ex_id = $lesson["ID"];
                    $ex_name = $lesson["ex_name"];
                    $ex_turi = $lesson["ex_turi"];
                    $ex_termin = $lesson["ex_termin"];
                    $ex_tavsif = $lesson["ex_tavsif"];
                    echo "
                        <tr>
                            <th scope='row'>$count</th>
                            <td>$ex_name</td>
                            <td>$ex_turi</td>
                            <td>$ex_termin</td>
                            <td>$ex_tavsif</td>
                            <td><a href='delete-ex.php?id=$ex_id' class='btn btn-danger text-light'>O'chirish</a></td>
                        </tr>
                    ";
                    $count++;
    
                }
            }



        ?>
        </tbody>
        </table>
</div>
<script src="../tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea#ex_tavsif',
        height: 300,
        plugins:[
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 
            'table', 'emoticons', 'template', 'codesample'
        ],
        toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' + 
        'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
        'forecolor backcolor emoticons',
        menu: {
            favs: {title: 'menu', items: 'code visualaid | searchreplace | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table',
        content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
    });
</script>

<?php include("bottom.php"); ?>