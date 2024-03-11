

<?php
require('./utility.php');
ConnectDB();
$err = '';
if (isset($_POST['btn1'])) {
  $sql = 'SELECT * FROM list WHERE memtel="' . $_POST['memtel'] . '" ';
  $rs = mysqli_query($GLOBALS['conn'], $sql);

  if (mysqli_num_rows($rs) == 0) {
    $sql = 'INSERT INTO list (memtel,staId,dateIn,dateOut)
            VALUES ("' . $_POST['memtel'] . '","' . $_POST['staId'] . '","' . $_POST['dateIn'] . '","' . $_POST['dateOut'] . '") ';
    mysqli_query($GLOBALS['conn'], $sql);
  } else {
  }
}

$dateIn = (isset($_GET['dateIn'])) ? $_GET['dateIn'] : date("Y-m-d");
$dateOut = (isset($_GET['dateOut'])) ? $_GET['dateOut'] : date("Y-m-d");
$memtel = (isset($_GET['memtel'])) ? $_GET['memtel'] : "";
$staId = (isset($_GET['staId'])) ? $_GET['staId'] : "";

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

  <br><br><br><br><br>

 
  <div class="container-flui">
    <div class=" bg-secondary text-white p-5  text-center">
      <h1>จองสนาม/h1>
    </div>
    <center>
      <div class="row">
        <?php
        $sql = "SELECT * FROM list
 LEFT JOIN stadium ON list.staId = stadium.staId 
 LEFT JOIN member ON list.memtel = member.memtel ";
        $rs = mysqli_query($GLOBALS['conn'], $sql);


        while ($data =  mysqli_fetch_assoc($rs)) {
         

          $sql2 = 'SELECT * FROM member WHERE memtel="' . $data['memtel'] . '"';
          $rs2 = mysqli_query($GLOBALS['conn'], $sql2);
          $_SESSION['member'] = mysqli_fetch_assoc($rs2);

          $nowdate = date("Y-m-d H:i");
          


        ?>


          <div class="col">
            <div class="col-6 border rounded mt-2 p-2 ">

              <form method="GET">
              <label>วันที่เข้าพัก</label>
                <input type="date" name="dateIn" class="form-control w-100 my-2" value="<?php echo $dateIn; ?>" readonly>
                <label>วันที่ออก</label>
                <input type="date" name="dateOut" class="form-control w-100 my-2" value="<?php echo $dateOut; ?>" readonly>

                <input type="hidden" name="memtel" class="form-control w-100 my-2" value="<?php echo $_SESSION['member']['memtel']; ?>">


              </form><br>

              <form method="post" action="index.php">

                <input type="hidden" name="dateIn" class="form-control w-100 my-2" value="<?php echo $dateIn; ?>">
                <input type="hidden" name="dateOut" class="form-control w-100 my-2" value="<?php echo $dateOut; ?>">

                <label>เบอร์</label>
                <input type="text" name="log_id" class="form-control w-100 my-2" value="<?php echo $_SESSION['logincus']['memtel']; ?>" required><br>

                


                
                <button name="btn1" class="btn btn-outline-success text-end" type="submit">บันทึกข้อมูล</button>

              </form>
              <?php echo $err; ?>
              <a href="./inbkcus.php"><button class="btn btn-outline-info" type="submit">ย้อนกลับ</button></a>

            <?php } ?>
            </div>
          </div>



      </div>

    <br><br>

   


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>