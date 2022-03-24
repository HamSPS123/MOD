<?php
  $title = "ແຜນແບ່ງປັນທຶນການສຶກສາ";
  $path = "../";
  $links = "";
  $session_path = "../";
  include ("../header-footer/header.php");


?>


<div class="row">
    <div class="col-xs-12 col-md-6">
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ເລືອກກົມ
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">ກົມການສຶກສາຊັ້ນສູງ  - 2020-2021</a>
          <a class="dropdown-item" href="#">ກົມສ້າງຄູ  - 2020-2021</a>
          <a class="dropdown-item" href="#">ກົມອາຊີວະສຶກສາ  - 2020-2021</a>
          <a class="dropdown-item" href="#">ກະຊວງທີ່ມີ   - 2020-2021</a>
        </div>
        <button type="button" class="btn btn-sm btn-primary"><span class="fa fa-paper-plane"> &nbsp&nbsp
        </span>ແບ່ງປັນທຶນການສຶກສາ</button>
      </div>
    </div>
</div>
    <br>
<div class="table-responsive">
<table id="detail_table" class="table-bordered" style="width: 3000px;">
        <tr >
            <th rowspan="2" style="text-align: center!important;margin: 0 auto;">ລຳດັບ</th>
            <th rowspan="2" style="text-align: center;">ສາຂາວິຊາຮຽນ</th>
            <th rowspan="2" style="text-align: center;">ແຜນຮັບນັກ​ຮຽນ</th>
            <th  rowspan="2" style="text-align: center;">ລວມ</th>
            <th colspan="8" style="text-align: center; position:st">ແບ່ງປັນ</th>
            <th colspan="7" style="text-align: center;">ຈ່າຍຄ່າຮຽນ</th>
        </tr>
        <tr style="text-align: center;">
          <th>ແຂວງ</th>
          <th>ມະຫາໄລ</th>
          <th>ສຳພາດ</th>
          <th>ສອບເສັງ</th>
          <th>ນ/ຮ ພິການ</th>
          <th>ນ/ຮ ຫ້ອງ 2 ພາສາ</th>
          <th>ສສກ ແບ່ງ</th>
          <th>ສຳພາດ</th>
          <th>ນ/ຮ</th>
          <th>ພ/ງ</th>
          <th>ສອບເສັງ</th>
          <th>ນ/ຮ ຕໍ່ເນື່ອງ</th>
          <th>ນ/ຮ ຫ້ອງ 2 ພາສາ ລາວ-ຝລັ່ງ</th>
          <th>ນ/ຮ ຕ່າງປະເທດ</th>
          <th>ພ/ງ ເອກະຊົນ</th>
        </tr>

        <tr style="background-color:#5199FA;color:white;">
          <td colspan="2" style="text-align:center;">ມະຫາວິທະຍາໄລແຫ່ງຊາດ</td>
          <td style="text-align:center">
                            <input class="quantity" min="0" name="num1" id="num1" value="100" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;" disabled>
                            </td>
          <?php for ($x = 0; $x <= 15; $x++) {
            echo '           <td style="text-align:center">
                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;" disabled>
                              </td>
              ';
            } ?>
        </tr>
        <tr class="parent" id="row1" title="Click to expand/collapse" style="cursor: pointer;background-color:#B1CDF3;color:white;">
          <td>
            1
          </td>
          <td>ຄະນະສຶກສາສາດ</td>
          <td style="text-align:center">
                            <input class="quantity" min="0" name="num1" id="num1" value="30" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white" disabled>
                            </td>
          <?php for ($x = 0; $x <= 15; $x++) {
            echo '           <td style="text-align:center">
                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;" disabled>
                              </td>
              ';
            } ?>
        </tr>
        <!-- parent-end -->
        <tr class="child-row1" style="display: table-row;">
          <td></td>
          <td style="padding-left:50px;">ຄູຈິດຕະສຶກສາສາດ</td>
          <td style="text-align:center">
                            <input class="quantity" min="0" name="num1" id="num1" value="10" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                            </td>
                            <td style="text-align:center">
                                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                                              </td>
          <?php for ($x = 0; $x <= 14; $x++) {
              echo'  <td style="text-align:center">
                            <div class="def-number-input number-input safari_only">
                                <button  onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepDown()"
                                    class="minus"></button>
                                <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                                    style="font-weight:bold!important;">
                                <button onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepUp()"
                                    class="plus"></button>
                            </div>
                        </td>';
            } ?>
        </tr>

        <tr class="child-row1" style="display: table-row;">
          <td></td>
          <td style="padding-left:50px;">ບໍລິຫານການສຶກສາ</td>
          <td style="text-align:center">
                            <input class="quantity" min="0" name="num1" id="num1" value="10" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                            </td>
                            <td style="text-align:center">
                                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                                              </td>
          <?php for ($x = 0; $x <= 14; $x++) {
            echo '         <td style="text-align:center">
                            <div class="def-number-input number-input safari_only">
                            <button  onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepDown()"
                                class="minus"></button>
                            <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                                style="font-weight:bold!important;">
                            <button onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepUp()"
                                    class="plus"></button>
                            </div>
                        </td>';
            } ?>
        </tr>

        <tr class="child-row1" style="display: table-row;">
          <td></td>
          <td style="padding-left:50px;">ຄູຄະນິດສາດ</td>
          <td style="text-align:center">
                            <input class="quantity" min="0" name="num1" id="num1" value="10" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                            </td>
                            <td style="text-align:center">
                                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                                              </td>
          <?php for ($x = 0; $x <= 14; $x++) {
            echo '         <td style="text-align:center">
                            <div class="def-number-input number-input safari_only">
                            <button  onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepDown()"
                                class="minus"></button>
                            <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                                style="font-weight:bold!important;">
                            <button onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepUp()"
                                    class="plus"></button>
                            </div>
                        </td>';
            } ?>
        </tr>


        <tr class="parent" id="row2" title="Click to expand/collapse" style="cursor: pointer;background-color:#B1CDF3;color:white;">
          <td>
            2
          </td>
          <td>ຄະນະອັກສອນສາດ</td>
          <td style="text-align:center">
                            <input class="quantity" min="0" name="num1" id="num1" value="40" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;" disabled>
                            </td>
                            <td style="text-align:center">
                                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;" disabled>
                                              </td>
          <?php for ($x = 0; $x <= 14; $x++) {
            echo '           <td style="text-align:center">
                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;" disabled>
                              </td>
              ';
            } ?>
        </tr>

        <tr class="child-row2" style="display: table-row;">
          <td></td>
          <td style="padding-left:50px;">ພາສາລາວ-ວັນນະຄະດີ</td>
          <td style="text-align:center">
                            <input class="quantity" min="0" name="num1" id="num1" value="15" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                            </td>
                            <td style="text-align:center">
                                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                                              </td>
          <?php for ($x = 0; $x <= 14; $x++) {
            echo '         <td style="text-align:center">
                            <div class="def-number-input number-input safari_only">
                            <button  onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepDown()"
                                class="minus"></button>
                            <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                                style="font-weight:bold!important;">
                            <button onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepUp()"
                                    class="plus"></button>
                            </div>
                        </td>';
            } ?>
        </tr>

        <tr class="child-row2" style="display: table-row;">
          <td></td>
          <td style="padding-left:50px;">ພາສາຝຣັ່ງ</td>
          <td style="text-align:center">
                            <input class="quantity" min="0" name="num1" id="num1" value="15" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                            </td>
                            <td style="text-align:center">
                                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                                              </td>
          <?php for ($x = 0; $x <= 14; $x++) {
            echo '         <td style="text-align:center">
                            <div class="def-number-input number-input safari_only">
                            <button  onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepDown()"
                                class="minus"></button>
                            <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                                style="font-weight:bold!important;">
                            <button onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepUp()"
                                    class="plus"></button>
                            </div>
                        </td>';
            } ?>
        </tr>

        <tr class="child-row2" style="display: table-row;">
          <td></td>
          <td style="padding-left:50px;">ພາສາອັງກິດ</td>
          <td style="text-align:center">
                            <input class="quantity" min="0" name="num1" id="num1" value="10" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                            </td>
                            <td style="text-align:center">
                                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                                              </td>
          <?php for ($x = 0; $x <= 14; $x++) {
            echo '         <td style="text-align:center">
                            <div class="def-number-input number-input safari_only">
                            <button  onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepDown()"
                                class="minus"></button>
                            <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                                style="font-weight:bold!important;">
                            <button onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepUp()"
                                    class="plus"></button>
                            </div>
                        </td>';
            } ?>
        </tr>

        <tr class="parent" id="row3" title="Click to expand/collapse" style="cursor: pointer;background-color:#B1CDF3;color:white;">
          <td>
            3
          </td>
          <td>ຄະນະວິທະຍາສາດສັງຄົມ</td>
          <td style="text-align:center">
                            <input class="quantity" min="0" name="num1" id="num1" value="30" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;" disabled>
                            </td>
                            <td style="text-align:center">
                                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;" disabled>
                                              </td>
          <?php for ($x = 0; $x <= 14; $x++) {
            echo '           <td style="text-align:center">
                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;" disabled>
                              </td>
              ';
            } ?>

        </tr>

        <tr class="child-row3" style="display: table-row;">
          <td></td>
          <td style="padding-left:50px;">ປະຫວັດສາດ ແລະ ມະນຸດວິທະຍາ</td>
          <td style="text-align:center">
                            <input class="quantity" min="0" name="num1" id="num1" value="10" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                            </td>
                            <td style="text-align:center">
                                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                                              </td>
          <?php for ($x = 0; $x <= 14; $x++) {
            echo '         <td style="text-align:center">
                            <div class="def-number-input number-input safari_only">
                            <button  onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepDown()"
                                class="minus"></button>
                            <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                                style="font-weight:bold!important;">
                            <button onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepUp()"
                                    class="plus"></button>
                            </div>
                        </td>';
            } ?>
        </tr>

        <tr class="child-row3" style="display: table-row;">
          <td></td>
          <td style="padding-left:50px;">ສັງຄົມສົງເຄາະ</td>
          <td style="text-align:center">
                            <input class="quantity" min="0" name="num1" id="num1" value="10" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                            </td>
                            <td style="text-align:center">
                                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                                              </td>
          <?php for ($x = 0; $x <= 14; $x++) {
            echo '         <td style="text-align:center">
                            <div class="def-number-input number-input safari_only">
                            <button  onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepDown()"
                                class="minus"></button>
                            <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                                style="font-weight:bold!important;">
                            <button onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepUp()"
                                    class="plus"></button>
                            </div>
                        </td>';
            } ?>
        </tr>

        <tr class="child-row3" style="display: table-row;">
          <td></td>
          <td style="padding-left:50px;">ການເມືອງ ແລະ ບໍລິຫານລັດຖະກິດ</td>
          <td style="text-align:center">
                            <input class="quantity" min="0" name="num1" id="num1" value="10" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                            </td>
                            <td style="text-align:center">
                                              <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                                              </td>
          <?php for ($x = 0; $x <= 14; $x++) {
            echo '         <td style="text-align:center">
                            <div class="def-number-input number-input safari_only">
                            <button  onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepDown()"
                                class="minus"></button>
                            <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                                style="font-weight:bold!important;">
                            <button onclick="this.parentNode.querySelector(';echo"'input[type=number]'";echo').stepUp()"
                                    class="plus"></button>
                            </div>
                        </td>';
            } ?>
        </tr>
</table>
</div>
<!-- endtable -->








<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

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


  $('.plus').on('click', function() {
    $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) + parseInt($('#num4').val()));
    $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
    $("#totalall").val(parseInt($("#total1").val()));
  });
  $('.minus').on('click', function() {
    $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) + parseInt($('#num4').val()));
    $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
    $("#totalall").val(parseInt($("#total1").val()));
  });

$("#num1").change(function() {
    $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) + parseInt($('#num4').val()));
    $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
    $("#totalall").val(parseInt($("#total1").val()));
})
$("#num2").change(function() {
    $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) + parseInt($('#num4').val()));
    $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
    $("#totalall").val(parseInt($("#total1").val()));
})

$("#num3").change(function() {
    $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) + parseInt($('#num4').val()));
    $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
    $("#totalall").val(parseInt($("#total1").val()));
})
$("#num4").change(function() {
    $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) + parseInt($('#num4').val()));
    $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
    $("#totalall").val(parseInt($("#total1").val()));
})

$("#num5").change(function() {
    $("#total4").val(parseInt($("#num3").val()) + parseInt($('#num4').val()));
    $("#total5").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
    $("#totalall").val(parseInt($("#total1").val()));
})
</script>

<?php
 include ("../header-footer/footer.php");
?>
