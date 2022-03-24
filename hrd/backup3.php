<?php
  $title = "ໜ້າຫຼັກ";
  $path = "../";
  $links = "";
  $session_path = "../";
  include ("../header-footer/header.php");
  $conn = mysqli_connect("Localhost", "root", "", "test");

?>

<style>
table {
    font-size: 20px;
    font-family: '10B Muc Zeit', 'Noto Sans Lao' !important;
    font-weight: bold !important;
}
</style>




<form action="senddemand.php" target="_blank" method="Post">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h2>ແຜນສ້າງນັກຮຽນ</h2>
            <h5>ກະລຸນາປ້ອນຈຳນວນນັກສຶກສາທີ່ຕ້ອງການຂໍທຶນ</h5>
        </div>
        <div class="col-xs-12 col-md-6" align="right">
            <h5>ລວມທັງໝົດ <input type="number" class="totalall" value="0" name="totalall" id="totalall"
                    style="border: none;width:100px;font-weight: bold;"></h5>
            <button type="submit" name="send" id="btnSend" class="btn btn-sm btn-primary send"><span class="fa fa-paper-plane"> &nbsp&nbsp
                </span>ສົ່ງແຜນຂໍທຶນການສຶກສາ</button> <br> <br>
        </div>
    </div>



    <div class="table-responsive">
        <table id="detail_table" class="table-bordered" style="width: 1500px;">
            <tr>
                <th rowspan="2" style="text-align: center!important;margin: 0 auto;">ລຳດັບ</th>
                <th rowspan="2" style="text-align: center;">ສາຂາວິຊາຮຽນ</th>
                <th rowspan="2" style="text-align: center;">ລະດັບຊັ້ນ</th>
                <th rowspan="2" style="text-align: center;">ລວມ</th>
                <th colspan="2" style="text-align: center; position:st">ຈຳນວນ</th>
            </tr>
            <tr style="text-align: center;">
                <th>ນັກຮຽນ</th>
                <th>ພະນັກງານ</th>
            </tr>
            <?php
                // $unitversity = mysqli_query($conn,"select * from unitversity");
                // foreach($unitversity as $uni){
            ?>
            <tr style="background-color:#5199FA;color:white;">
                <td colspan="3" style="text-align:center;">
                    <!-- <?php echo $uni['unit_name'] ?> -->
                    ມະຫາວິທະຍາໄລແຫ່ງຊາດ
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalUni1" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalUniStd1" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalUniEmp1" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
            </tr>
            <tr class="parent" id="row1" title="Click to expand/collapse"
                style="cursor: pointer;background-color:#B1CDF3;color:white;">
                <td>
                    1
                </td>
                <td colspan="2">ຄະນະສຶກສາສາດ</td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalFac1" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalFacStd1" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalFacEmp1" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
            </tr>
            <!-- parent-end -->
            <tr class="child-row1" style="display: table-row;">
                <td></td>
                <td style="padding-left:50px;">ຄູຈິດຕະສຶກສາສາດ  <input type="hidden" name="fac_1" value="ຄະນະສຶກສາສາດ"></td>
                <td style="text-align:center">
                    ປະລິນຍາຕີ
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalCourse1" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                </td>
                <td>
                <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="std_1" id="numStd1" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
                </td>
                <td>
                <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="emp_1" id="numEmp1" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
                </td>
            </tr>

            <tr class="child-row1" style="display: table-row;">
                <td></td>
                <td style="padding-left:50px;">ບໍລິຫານການສຶກສາ <input type="hidden" name="fac_2" value="ບໍລິຫານການສຶກສາ"></td>
                <td style="text-align:center">
                    ປະລິນຍາຕີ
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalCourse2" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                </td>

                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus demandBtn"></button>
                        <input class="quantity demandInput" min="0" name="std_2" id="numStd2" value="0" type="number"
                            style="font-weight:bold!important;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus demandBtn"></button>
                    </div>
                </td>
                <td>
                <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="emp_2" id="numEmp2" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
                </td>

            </tr>

            <tr class="child-row1" style="display: table-row;">
                <td></td>
                <td style="padding-left:50px;">ຄູຄະນິດສາດ <input type="hidden" name="fac_3" value="ຄູຄະນິດສາດ"></td>
                <td style="text-align:center">
                    ປະລິນຍາຕີ
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalCourse3" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                </td>

                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus demandBtn"></button>
                        <input class="quantity demandInput" min="0" name="std_3" id="numStd3" value="0" type="number"
                            style="font-weight:bold!important;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus demandBtn"></button>
                    </div>
                </td>

                <td>
                <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="emp_3" id="numEmp3" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
                </td>

            </tr>




            <tr class="parent" id="row2" title="Click to expand/collapse"
                style="cursor: pointer;background-color:#B1CDF3;color:white;">
                <td>
                    1
                </td>
                <td colspan="2">ຄະນະສຶກສາສາດ</td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalFac2" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalFacStd2" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalFacEmp2" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
            </tr>
            <!-- parent-end -->
            <tr class="child-row2" style="display: table-row;">
                <td></td>
                <td style="padding-left:50px;">ຄູຈິດຕະສຶກສາສາດ  <input type="hidden" name="fac_1" value="ຄະນະສຶກສາສາດ"></td>
                <td style="text-align:center">
                    ປະລິນຍາຕີ
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalCourse4" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                </td>
                <td>
                <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="std_1" id="numStd4" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
                </td>
                <td>
                <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="emp_1" id="numEmp4" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
                </td>
            </tr>

            <tr class="child-row2" style="display: table-row;">
                <td></td>
                <td style="padding-left:50px;">ບໍລິຫານການສຶກສາ <input type="hidden" name="fac_2" value="ບໍລິຫານການສຶກສາ"></td>
                <td style="text-align:center">
                    ປະລິນຍາຕີ
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalCourse5" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                </td>

                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus demandBtn"></button>
                        <input class="quantity demandInput" min="0" name="std_2" id="numStd5" value="0" type="number"
                            style="font-weight:bold!important;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus demandBtn"></button>
                    </div>
                </td>
                <td>
                <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="emp_2" id="numEmp5" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
                </td>

            </tr>

            <tr class="child-row2" style="display: table-row;">
                <td></td>
                <td style="padding-left:50px;">ຄູຄະນິດສາດ <input type="hidden" name="fac_3" value="ຄູຄະນິດສາດ"></td>
                <td style="text-align:center">
                    ປະລິນຍາຕີ
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalCourse6" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                </td>

                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus demandBtn"></button>
                        <input class="quantity demandInput" min="0" name="std_3" id="numStd6" value="0" type="number"
                            style="font-weight:bold!important;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus demandBtn"></button>
                    </div>
                </td>

                <td>
                <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="emp_3" id="numEmp6" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
                </td>

            </tr>

<!-- secondrow -->


<tr style="background-color:#5199FA;color:white;">
                <td colspan="3" style="text-align:center;">
                    <!-- <?php echo $uni['unit_name'] ?> -->
                    ມະຫາວິທະຍາໄລແຫ່ງຊາດ
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalUni11" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalUniStd11" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalUniEmp11" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
            </tr>
            <tr class="parent" id="row11" title="Click to expand/collapse"
                style="cursor: pointer;background-color:#B1CDF3;color:white;">
                <td>
                    1
                </td>
                <td colspan="2">ຄະນະສຶກສາສາດ</td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalFac11" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalFacStd11" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalFacEmp11" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
            </tr>
            <!-- parent-end -->
            <tr class="child-row11" style="display: table-row;">
                <td></td>
                <td style="padding-left:50px;">ຄູຈິດຕະສຶກສາສາດ  <input type="hidden" name="fac_11" value="ຄະນະສຶກສາສາດ"></td>
                <td style="text-align:center">
                    ປະລິນຍາຕີ
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalCourse11" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                </td>
                <td>
                <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="std_1" id="numStd11" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
                </td>
                <td>
                <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="emp_1" id="numEmp11" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
                </td>
            </tr>

            <tr class="child-row11" style="display: table-row;">
                <td></td>
                <td style="padding-left:50px;">ບໍລິຫານການສຶກສາ <input type="hidden" name="fac_22" value="ບໍລິຫານການສຶກສາ"></td>
                <td style="text-align:center">
                    ປະລິນຍາຕີ
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalCourse22" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                </td>

                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus demandBtn"></button>
                        <input class="quantity demandInput" min="0" name="std_2" id="numStd22" value="0" type="number"
                            style="font-weight:bold!important;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus demandBtn"></button>
                    </div>
                </td>
                <td>
                <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="emp_2" id="numEmp22" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
                </td>

            </tr>

            <tr class="child-row11" style="display: table-row;">
                <td></td>
                <td style="padding-left:50px;">ຄູຄະນິດສາດ <input type="hidden" name="fac_33" value="ຄູຄະນິດສາດ"></td>
                <td style="text-align:center">
                    ປະລິນຍາຕີ
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="totalCourse33" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                </td>

                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus demandBtn"></button>
                        <input class="quantity demandInput" min="0" name="std_3" id="numStd33" value="0" type="number"
                            style="font-weight:bold!important;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus demandBtn"></button>
                    </div>
                </td>

                <td>
                <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="emp_3" id="numEmp33" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
                </td>

            </tr>
        <?php
        // }
        ?>

        </table>
    </div>
    <!-- endtable -->

</form>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(window).load(function() {
var intervalId = window.setInterval(function(){
  check_total();
}, 500);
    function check_total(){
        var totalall = $('#totalall').val();
        console.log(totalall);
        if(totalall == '' || totalall == '0'){
            $("#btnSend").attr("disabled", true);
        }
        else{
            $("#btnSend").attr("disabled", false);
        }
    }
});
</script>
<script type="text/javascript">
$(document).ready(function() {

    $('tr.parent')
        .css("cursor", "pointer")
        .attr("title", "Click to expand/collapse")
        .click(function() {
            $(this).siblings('.child-' + this.id).toggle();
        });
    $('tr[@class^=child-]').hide().children('td');
});

</script>
<script>

// ປຸ່ມບວກກັບລົບ
$('.demandBtn').on('click', function() {
    
    $("#totalFacStd1").val(parseInt($("#numStd1").val()) + parseInt($("#numStd2").val()) + parseInt($("#numStd3").val()));
    $("#totalFacStd2").val(parseInt($("#numStd4").val()) + parseInt($("#numStd5").val()) + parseInt($("#numStd6").val()));

    

    $("#totalFacEmp1").val(parseInt($("#numEmp1").val()) + parseInt($("#numEmp2").val()) + parseInt($("#numEmp3").val()));
    $("#totalFacEmp2").val(parseInt($("#numEmp4").val()) + parseInt($("#numEmp5").val()) + parseInt($("#numEmp6").val()));
// unit 1
    $("#totalUniStd1").val(parseInt($("#totalFacStd1").val()) + parseInt($("#totalFacStd2").val()));
    $("#totalUniEmp1").val(parseInt($("#totalFacEmp1").val()) + parseInt($("#totalFacEmp2").val()));

    $("#totalCourse1").val(parseInt($("#numStd1").val()) + parseInt($("#numEmp1").val()));
    $("#totalCourse2").val(parseInt($("#numStd2").val()) + parseInt($("#numEmp2").val()));
    $("#totalCourse3").val(parseInt($("#numStd3").val()) + parseInt($("#numEmp3").val()));

    $("#totalCourse4").val(parseInt($("#numStd4").val()) + parseInt($("#numEmp4").val()));
    $("#totalCourse5").val(parseInt($("#numStd5").val()) + parseInt($("#numEmp5").val()));
    $("#totalCourse6").val(parseInt($("#numStd6").val()) + parseInt($("#numEmp6").val()));

    $("#totalFac1").val(parseInt($("#totalFacStd1").val()) + parseInt($("#totalFacEmp1").val()));
    $("#totalFac2").val(parseInt($("#totalFacStd2").val()) + parseInt($("#totalFacEmp2").val()));







    $("#totalFacStd11").val(parseInt($("#numStd11").val()) + parseInt($("#numStd22").val()) + parseInt($("#numStd33").val()));
    
    $("#totalFacEmp11").val(parseInt($("#numEmp11").val()) + parseInt($("#numEmp22").val()) + parseInt($("#numEmp33").val()));
//  unit 2

    $("#totalUniStd11").val(parseInt($("#totalFacStd11").val()));
    $("#totalUniEmp11").val(parseInt($("#totalFacEmp11").val()));

    
    $("#totalCourse11").val(parseInt($("#numStd11").val()) + parseInt($("#numEmp11").val()));
    $("#totalCourse22").val(parseInt($("#numStd22").val()) + parseInt($("#numEmp22").val()));
    $("#totalCourse33").val(parseInt($("#numStd33").val()) + parseInt($("#numEmp33").val()));
    $("#totalFac11").val(parseInt($("#totalFacStd11").val()) + parseInt($("#totalFacEmp11").val()));


    //  ລວມມະຫາໄລ
    $("#totalUni11").val(parseInt($("#totalUniStd11").val()) + parseInt($("#totalUniEmp11").val()));
    $("#totalUni1").val(parseInt($("#totalUniStd1").val()) + parseInt($("#totalUniEmp1").val()));

    
    $("#totalall").val(parseInt($("#totalUni1").val()) + parseInt($("#totalUni11").val()));
});
//
//ປຸ່ມປ້ອນຂໍ້ມູນ
$('.demandInput').keyup(function() {
    $("#totalFacStd1").val(parseInt($("#numStd1").val()) + parseInt($("#numStd2").val()) + parseInt($("#numStd3").val()));
    $("#totalUniStd1").val(parseInt($("#totalFacStd1").val()));
    $("#totalFacEmp1").val(parseInt($("#numEmp1").val()) + parseInt($("#numEmp2").val()) + parseInt($("#numEmp3").val()));
    $("#totalUniEmp1").val(parseInt($("#totalFacEmp1").val()));
    $("#totalCourse1").val(parseInt($("#numStd1").val()) + parseInt($("#numEmp1").val()));
    $("#totalCourse2").val(parseInt($("#numStd2").val()) + parseInt($("#numEmp2").val()));
    $("#totalCourse3").val(parseInt($("#numStd3").val()) + parseInt($("#numEmp3").val()));
    $("#totalFac1").val(parseInt($("#totalFacStd1").val()) + parseInt($("#totalFacEmp1").val()));
    $("#totalUni1").val(parseInt($("#totalUniStd1").val()) + parseInt($("#totalUniEmp1").val()));
    $("#totalall").val(parseInt($("#totalUni1").val()));
});



















// $(window).load(function(){


  
// });
</script>

<?php
 include ("../header-footer/footer.php");
?>