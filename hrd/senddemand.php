<?php
if(isset($_POST['send'])){
    for($i=1;$i<=3;$i++){

        echo $_POST['fac_'.$i]." ",$_POST['std_'.$i]." ",$_POST['emp_'.$i];
        echo "<br>";
    }
}

$func = array("PlusNumStd1", "MinNumStd1", "numStd1","PlusNumEmp1","MinNumEmp1","numEmp1");

$unit_emp = array("unit_emp1","unit_emp2","unit_emp3");
$fac_emp = array("fac_emp1","fac_emp2","fac_emp3");
$emp = array("emp1","emp2","emp3");

$unit_std = array("unit_std1","unit_std2","unit_std3");
$fac_std = array("fac_std1","fac_std2","fac_std3");
$std = array("std1","std2","std3");

    // for ($x = 0; $x <= 5; $x++) {
    //     echo $test[$x];
    //     echo "<br>";
    //   }
    $i = 0;
    foreach($func as $row){
        echo "$('.".$func[$i]."').on('click', fucntion(){";
        echo"<br>";
        // loop 1: loop unitversity
        // loop 2: loop faculty
        $i_total_fac_std = 0;
        
        echo "content";
        echo "<br>";

        echo "content";
        echo "<br>";

        echo "content";
        echo "<br>";

        echo "content";
        echo "<br>";

        echo "content";
        echo "<br>";

        echo "content";

        echo "<br>";
        echo "});";
        echo "<br>";
        $i++;
    }
echo "<br>";
echo "<br>";
echo "<br>";


?>

<script>
var numStd = [];
    numStd += [1];
     numStd += [2];
     numStd += [3];
     var total = 0;
 var i = 0;
   for (;numStd[i];) {
        console.log(numStd[i]);
        total += parseInt(numStd[i]);
    i++;
    }
    console.log("Total is : "+total);
//  $("#totalFacEmp1").val(parseInt($("#numEmp1").val()) + parseInt($("#numEmp2").val()) + parseInt($("#numEmp3").val()));
</script>