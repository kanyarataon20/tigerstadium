
<?php 
    require('./utility.php');
    ConnectDB();
    $err = '';
    if(isset($_POST['btn1'])){
        $sql = 'SELECT * FROM member WHERE mememil="'.$_POST['mmememil'].'" AND mempass = "'.md5($_POST['mempass']).'"';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        $data = mysqli_fetch_assoc($rs);
        if(mysqli_num_rows($rs)>0){
            if($data['memstatus']==1){
                $_SESSION['user'] = $data;
                header("Location:admin.php");
            }else if($data['memstatus']==0){
                $_SESSION['user'] = $data;
                header("Location:userupLog.php");
            }else{
                 $_SESSION['user'] = $data;
                }
        }else{
                $err = '<div class="alert alert-danger">อีเมลล์หรือรหัสผ่านผิดพลาด</div>';
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
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-2 border" >
            <div class="row ">
                <a href="./admin/index.php" class="navbar-brand text-info">
                <img src="img/lo1.png" width="100px" height="100px">
                </a>
            </div>
        </nav>
        
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-6 border rounded mt-2 p-2 ">
                    <form method="post">
                    <h1>เข้าใช้งาน</h1>
                    <input name="mememail" type="email" placeholder="email" class="form-control w-100 my-2" required>
                    <input name="mempass" type="password" placeholder="รหัสผ่าน" class="form-control w-100 my-2" required>
                    <button name="btn1" class="btn btn-secondary p-3 w-100 mt-3" type="submit">Log in</button>
                    ยังไม่มีบัญชีผู้ใช้งาน? <a class="text-secondary" href="pjregist.php">สมัครสมาชิก</a>
                    <?php echo $err ?>

            </form>
                </div>
                <div class="col"></div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
