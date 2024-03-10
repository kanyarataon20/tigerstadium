<?php 
    require('./utility.php');
    ConnectDB();
    $err = '';
    if(isset($_POST['btnl'])){
        $sql = 'SELECT * FROM member WHERE memtel="'.$_POST['memtel'].'" ';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        if(mysqli_num_rows($rs)==0){
            $sql = ' INSERT INTO member (memtel,memfirst,memlass,mememail,mempass,memstatus)
            VALUES ("'.$_POST['memtel'].'","'.$_POST['memfirst'].'","'.md5($_POST['memlass']).'","'.$_POST['mememail'].'","'.$_POST['mempass'].'","0") ';
            mysqli_query($GLOBALS['conn'],$sql);
            header("Location:login.php");

        }else{
            $err = '<div class="alert alert-danger">อีเมลล์นี้ถูกใช้งานไปแล้ว</div>';
            header("Location:login.php");


        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สนามเสือ</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./ycss.css">
<style>
    #hTop {
        background-image: url("img/bg.jpg");
        height: 450px;
    }
</style>


<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-2 border" >
            <div class="row ">
            <a href="./admin/index.php" class="navbar-brand text-info">
                <img src="./img/lo1.png" width="100px" height="100px">

                </a>
            </div>
        </nav>
        
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 border rounded mt-2 p-2 ">
                    <h1>ป้อนข้อมูลของคุณเพื่อเริ่มต้นใช้งาน..</h1>
                    <form method="post">
                    <input type="mail" name="mememail" placeholder="e-mail" class="form-control w-100 my-2" required>
                    <input type="password" name = "mempass" placeholder="รหัสผ่าน" class="form-control w-100 my-2" required>
                    <input type="text" name="memfirst" placeholder="ชื่อ" class="form-control w-100 my-2" required>
                    <input type="text" name="memlass" placeholder="นามสกุล" class="form-control w-100 my-2" required>
                    <input type="text" name="memtel" placeholder="เบอร์โทรศัพท์" class="form-control w-100 my-2" required>
                    <button name="btnl" class="btn btn-secondary p-3 w-100 mt-3" type="submit">สมัครสมาชิก</button>
                    </form>
                    <?php echo $err; ?>
                </div>
                <div class="col"></div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
