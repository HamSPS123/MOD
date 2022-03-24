<?php
  $title = "ແຈກຢາຍທຶນການສຶກສາ";
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
      </div>
    </div>
</div>
    <br>



    <div class="table-responsive2">
    <table id="detail_table" class="table-bordered" style="width: 3000px;">
            <tr>
                <th rowspan="2" style="text-align: center;margin: 0 auto;">ລຳດັບ</th>
                <th rowspan="2" style="text-align: center;">ສາຂາວິຊາຮຽນ</th>
                <th  rowspan="2" style="text-align: center;">ລວມ</th>
                <th colspan="8" style="text-align: center;" class="tet">ແບ່ງປັນ</th>
                <th colspan="7" style="text-align: center;" class="tet">ຈ່າຍຄ່າຮຽນ</th>
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
              <td colspan="2" style="text-align:center">ມະຫາວິທະຍາໄລແຫ່ງຊາດ</td>
              <?php for ($x = 0; $x <= 15; $x++) {
                echo '           <td style="text-align:center">
                                  <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;" disabled>
                                  </td>
                  ';
                } ?>
                <td></td>

            </tr>
            <tr class="parent" id="row1" title="Click to expand/collapse" style="cursor: pointer;background-color:#B1CDF3;color:white;">
              <td style="color:white;">
                1
              </td>
              <td style="color:white;">ຄະນະສຶກສາສາດ</td>
              <?php for ($x = 0; $x <= 15; $x++) {
                echo '           <td style="text-align:center">
                                  <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;" disabled>
                                  </td>
                  ';

                } ?>
                <td></td>
            </tr>

            <tr class="child-row1" style="display: table-row;">
              <td></td>
              <td><a href="#" class="fa fa-info toolcolor btnUpdate_cust" style="margin-left:20px;"></a><small style="font-size:16px;margin-left:40px;">ຄູຈິດຕະສຶກສາສາດ</small></td>
              <?php for ($x = 0; $x <= 15; $x++) {
                  echo'  <td style="text-align:center">
<input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
                            </td>';
                } ?>

            </tr>

            <tr class="child-row1" style="display: table-row;">
              <td></td>
              <td><a href="#" class="fa fa-info toolcolor btnUpdate_cust" style="margin-left:20px;"></a><small style="font-size:16px;margin-left:40px;">ບໍລິຫານການສຶກສາ</small></td>
              <?php for ($x = 0; $x <= 15; $x++) {
                echo '         <td style="text-align:center">
<input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
                            </td>';
                } ?>

            </tr>

            <tr class="child-row1" style="display: table-row;">
              <td></td>
              <td><a href="#" class="fa fa-info toolcolor btnUpdate_cust" style="margin-left:20px;"></a><small style="font-size:16px;margin-left:40px;">ຄູຄະນິດສາດ</small></td>
              <?php for ($x = 0; $x <= 15; $x++) {
                echo '         <td style="text-align:center">
<input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
                            </td>';
                } ?>

            </tr>


            <tr class="parent" id="row2" title="Click to expand/collapse" style="cursor: pointer;background-color:#B1CDF3;color:white;">
              <td>
                2
              </td>
              <td>ຄະນະອັກສອນສາດ</td>
              <?php for ($x = 0; $x <= 15; $x++) {
                echo '           <td style="text-align:center">
                                  <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;" disabled>
                                  </td>
                  ';
                } ?>
                <td></td>
            </tr>

            <tr class="child-row2" style="display: table-row;">
              <td></td>
              <td><a href="#" class="fa fa-info toolcolor btnUpdate_cust" style="margin-left:20px;"></a><small style="font-size:16px;margin-left:40px;">ພາສາລາວ-ວັນນະຄະດີ</small></td>
              <?php for ($x = 0; $x <= 15; $x++) {
                echo '         <td style="text-align:center">
<input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
                            </td>';
                } ?>

            </tr>

            <tr class="child-row2" style="display: table-row;">
              <td></td>
              <td><a href="#" class="fa fa-info toolcolor btnUpdate_cust" style="margin-left:20px;"></a><small style="font-size:16px;margin-left:40px;">ພາສາຝຣັ່ງ</small></td>
              <?php for ($x = 0; $x <= 15; $x++) {
                echo '         <td style="text-align:center">
<input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
                            </td>';
                } ?>

            </tr>

            <tr class="child-row2" style="display: table-row;">
              <td></td>
              <td><a href="#" class="fa fa-info toolcolor btnUpdate_cust" style="margin-left:20px;"></a><small style="font-size:16px;margin-left:40px;">ພາສາອັງກິດີ</small></td>
              <?php for ($x = 0; $x <= 15; $x++) {
                echo '         <td style="text-align:center">
<input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
                            </td>';
                } ?>

            </tr>

            <tr class="parent" id="row3" title="Click to expand/collapse" style="cursor: pointer;background-color:#B1CDF3;color:white;">
              <td>
                3
              </td>
              <td>ຄະນະວິທະຍາສາດສັງຄົມ</td>
              <?php for ($x = 0; $x <= 15; $x++) {
                echo '           <td style="text-align:center">
                                  <input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;" disabled>
                                  </td>
                  ';
                } ?>
                <td></td>

            </tr>

            <tr class="child-row3" style="display: table-row;">
              <td></td>
              <td><a href="#" class="fa fa-info toolcolor btnUpdate_cust" style="margin-left:20px;"></a><small style="font-size:16px;margin-left:40px;">ປະຫວັດສາດ ແລະ ມະນຸດວິທະຍາ</small></td>
              <?php for ($x = 0; $x <= 15; $x++) {
                echo '         <td style="text-align:center">
<input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
                            </td>';
                } ?>

            </tr>

            <tr class="child-row3" style="display: table-row;">
              <td></td>
              <td><a href="#" class="fa fa-info toolcolor btnUpdate_cust" style="margin-left:20px;"></a><small style="font-size:16px;margin-left:40px;">ສັງຄົມສົງເຄາະ</small></td>
              <?php for ($x = 0; $x <= 15; $x++) {
                echo '         <td style="text-align:center">
<input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
                            </td>';
                } ?>

            </tr>

            <tr class="child-row3" style="display: table-row;">
              <td></td>
              <td><a href="#" class="fa fa-info toolcolor btnUpdate_cust" style="margin-left:20px;"></a><small style="font-size:16px;margin-left:40px;">ການເມືອງ ແລະ ບໍລິຫານລັດຖະກິດ</small></td>
              <?php for ($x = 0; $x <= 15; $x++) {
                echo '         <td style="text-align:center">
<input class="quantity" min="0" name="num1" id="num1" value="0" type="number" style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
                            </td>';
                } ?>

            </tr>
    </table>
</div><br>


<br>

    <div id="result"></div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript">
    $(document).on('click', '.btnUpdate_cust', function() {
          load_data('%%','0');
          function load_data(query, page) {
              $.ajax({
                  url: "fetch_step2.php",
                  method: "POST",
                  data: {
                      query: query,
                      page: page
                  },
                  success: function(data) {
                      $('#result').html(data);
                  }
              });
          }
          });

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
