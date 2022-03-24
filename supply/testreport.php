<?php
  include ('../oop/obj.php');
  if(isset($_POST['btnLogin'])){
    $obj->login_supply($_POST['email'],$_POST['pass']);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="image/logo.png">
    <title>ກະຊວງສຶກສາທິການແລະກິລາ</title>
    <link rel="stylesheet" href="../dist/css/alt/style2.css">
    <link rel="stylesheet" href="../dist/css/alt/style.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="shortcut icon" href="../image/logo.png" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../dist/js/sweetalert.min.js"></script>
</head>

<body>
    <?php
        $queryResult = mysqli_query($conn,"call test_report();");
        $firstRow = true;
        echo "
        <div class='table-responsive'>
        <table style='width: 3000px;'>";
        while ($queryRow = $queryResult->fetch_assoc()) {
            if ($firstRow) {
                echo "<tr>";
                foreach(array_keys($queryRow) as $name) {
                    echo "<th>$name</th>";
                }
                echo "</tr>";
                $firstRow = false;
            }
            echo "<tr>";
            foreach($queryRow as $value){
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>
        </div>
        ";
    
  ?>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>