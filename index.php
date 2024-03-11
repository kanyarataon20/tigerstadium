<?php 
    require('./utility.php');
    ConnectDB();
    
    $sql = 'SELECT * FROM stadium ';
    $rs = mysqli_query($GLOBALS['conn'],$sql);

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

  <div class="nav">
    <div class="col-md ">
      <?php require('./navbar.php') ?>
    </div>
  </div>
<form method="post" id="form0">
               
               <input type="text" class="form-control" placeholder="ชื่อสนาม"
               name="txtSearch">
                   <button name="btnS" class="btn btn-outline-info" type="submit"><i class="bi bi-search"></i>ค้นหา</button>
   
               </form>

               <?php
                    while($data =  mysqli_fetch_assoc($rs)){
                ?>
                  
  <br><br>
  <div class="card" style="width:400px">
    <div class="card-body">
      <h4 class="card-title"><?php echo $data['staName']; ?></h4>
      <p class="card-text">ประเภท สนามฟุตบอลหญ้าเทียมใหญ่</p>
      <p class="card-text">เปิด 09.00 ปิด 23.00</p>

      <a href="stadiumbooking.php?staId=<?php echo $data['staId']; ?>" class="btn btn-success">จองสนาม</a>
    </div>
    <img class="card-img-bottom" src="./img/t_1555640051727988408.jpg" alt="Card image" style="width:100%">
  </div>
  
  <?php } ?>

    <br><br>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>