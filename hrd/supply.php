<?php
  $title = "ໜ້າຫຼັກ";
  $path = "../";
  $links = "";
  $session_path = "../";
  include ("../header-footer/header.php");


?>

<style>
table {
    font-size: 20px;
    font-family: '10B Muc Zeit', 'Noto Sans Lao' !important;
    font-weight: bold !important;
}
</style>


<div class="row">
    <div class="col-xs-12 col-md-6">
        <h2>ແຜນຮັບນັກ​ຮຽນ </h2>
        <h5>ກະລຸນາປ້ອນຈຳນວນຮອງຮັບນັກສຶກສາໃນສາຖາບັນຂອງທ່ານ</h5>
    </div>
    <div class="col-xs-12 col-md-6" align="right">
        <h5>ລວມທັງໝົດ <input type="number" value="0" name="totalall" id="totalall"
                style="border: none;width:80px;font-weight: bold;"></h5>
        <button type="button" class="btn btn-sm btn-primary"><span class="fa fa-paper-plane"> &nbsp&nbsp
            </span>ສົ່ງແຜນຮັບນັກ​ຮຽນ</button> <br> <br>
    </div>
</div>

<div class="table-responsive">

<table id="detail_table" class="table table-hover">
    <thead>
        <tr>
            <th>ລະຫັດ</th>
            <th colspan="2">ສະຖາບັນ</th>
            <th style="padding-left:75px;">ຈຳນວນ</th>
            <th style="padding-left:75px;">ສຳພາດ </th>
        </tr>
    </thead>
    <tbody>
        <tr class="parent" id="row123" title="Click to expand/collapse" style="cursor: pointer;">
            <td style="font-weight: bold;">A001</td>
            <td colspan="2">ມະຫາວິທະຍາໄລແຫ່ງຊາດ <i class="fas fa-angle-down right"
                    style="float:right;line-height: 1.6;"></i></td>
            <td style="padding-left:68px;">
                <input class="quantity" min="0" name="total1" id="total1" value="0" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight:bold!important;" disabled><span
                    class="fa fa-user"></span>
            </td>
            <td style="padding-left:68px;">
                <input class="quantity" min="0" name="total1" id="total1" value="0" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight:bold!important;" disabled><span
                    class="fa fa-user"></span>
            </td>
        </tr>
        <tr class="child-row123" style="display: table-row;">
            <td> </td>
            <td style="padding-left:50px;">ຄະນະວິສະວະກຳຄອມພິວເຕີ</td>
            <td>ສາຂາວິທະຍາສາດຄອມພິວເຕີ &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ປະລິນຍາຕີ ລະບົບຕໍ່ເນື່ອງ</td>
            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
        </tr>
        <tr class="child-row123" style="display: table-row;">
            <td></td>
            <td></td>
            <td>ສາຂາວິທະຍາສາດຄອມພິວເຕີ &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ປະລິນຍາຕີ</td>
            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num2" id="num2" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num2" id="num2" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
        </tr>

        <tr class="child-row123" style="display: table-row;">
            <td></td>
            <td style="padding-left:50px;">ຄະນະວິທະຍາສາດທຳມະຊາດ</td>
            <td>ສາຂາວິທະຍາສາດຄອມພິວເຕີ &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ຊັ້ນສູງ</td>

            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num3" id="num3" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num3" id="num3" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
        </tr>

        <tr class="child-row123" style="display: table-row;">
            <td></td>
            <td></td>
            <td>ສາຂາວິທະຍາສາດຄອມພິວເຕີ &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ຊັ້ນກາງ</td>

            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num4" id="num4" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num4" id="num4" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
        </tr>

        <tr class="parent" id="row456" title="Click to expand/collapse" style="cursor: pointer;">
            <td style="font-weight: bold;">A002</td>
            <td colspan="2">ມະຫາວິທະຍາໄລວິທະຍາສາດສຸຂະພາບ <i class="fas fa-angle-left right"
                    style="float:right;line-height: 1.6;"></i></td>

            <td style="padding-left:68px;">
                <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled><span class="fa fa-user"></span>
            </td>
            <td style="padding-left:68px;">
                <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled><span class="fa fa-user"></span>
            </td>
        </tr>




        <tr class="child-row456" style="display: none;">
            <td></td>
            <td> </td>
            <td> </td>

            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
        </tr>
        <tr class="child-row456" style="display: none;">
            <td> </td>
            <td> </td>
            <td> </td>

            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
        </tr>
        <tr class="child-row456" style="display: none;">
            <td> </td>
            <td> </td>
            <td> </td>

            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
        </tr>

        <tr class="parent" id="row789" title="Click to expand/collapse" style="cursor: pointer;">
            <td style="font-weight: bold;">A003</td>
            <td colspan="2">ມະຫາວິທະຍາໄລວິທະຍາສາດສຸຂະພາບ <i class="fas fa-angle-left right"
                    style="float:right;line-height: 1.6;"></i></td>

            <td style="padding-left:68px;">
                <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled><span class="fa fa-user"></span>
            </td>
            <td style="padding-left:68px;">
                <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled><span class="fa fa-user"></span>
            </td>
        </tr>
        <tr class="child-row789" style="display: none;">
            <td> </td>
            <td> </td>
            <td> </td>

            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
        </tr>
        <tr class="child-row789" style="display: none;">
            <td> </td>
            <td> </td>
            <td> </td>

            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
        </tr>
        <tr class="child-row789" style="display: none;">
            <td> </td>
            <td> </td>
            <td> </td>
            <td>
                <div class="def-number-input number-input safari_only">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="num1" id="num1" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </td>
        </tr>
    </tbody>
</table>

</div>





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
</script>
<script>
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
