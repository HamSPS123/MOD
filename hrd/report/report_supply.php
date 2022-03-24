<?php
  $title = "ລາຍງານແຜນຮັບ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>

<style>
.result {
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
}

#overlay {
    top: 0;
    z-index: 100;
    width: 100%;
    height: 100%;
    display: none;
    text-align: center;
}

#overlay img {
    width: 150px;
}
</style>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h3><?= $title ?></h3>
            <div class="col-md-6">
                <div class="input-group">
                    <select name="fy" id="fy" class="form-control form-control-sm" data-live-search="true"
                        title="ເລືອກສົກຮຽນ">

                    </select>
                    <select name="dept" id="dept" class="form-control form-control-sm" data-live-search="true"
                        title="ເລືອກພະແນກ"></select>
                    <div class="input-group-append">
                        <button name="pdf" id="pdf" class="btn btn-danger btn-sm">PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body" id="result">
        <p class="mt-2 text-center result">ກະລຸນາເລືອກຂໍ້ມູນທີ່ຕ້ອງການສະແດງ</p>
    </div>
</div>

<div id="overlay">
    <img src="<?= $path ?>image/loading3.gif" alt="">
</div>

<script>
$(document).ready(function() {
    $('#fy').selectpicker();
    $('#dept').selectpicker();

    document.getElementById('pdf').disabled = true;

    load_data('supply_data', '');

    function load_data(supply, fy) {
        $.ajax({
            url: 'load_data.php',
            method: 'POST',
            data: {
                supply: supply,
                fy: fy
            },
            dataType: 'json',
            success: function(data) {
                var html = '';
                for (var count = 0; count < data.length; count++) {
                    html += '<option value="' + data[count].id + '">' + data[count].name +
                        '</option>';
                }

                if (supply == "supply_data") {
                    $("#fy").html(html);
                    $("#fy").selectpicker('refresh');
                } else {
                    $("#dept").html(html);
                    $("#dept").selectpicker('refresh');
                }
            }
        })
    }
    $(document).on('change', '#fy', function() {
        var fy_id = $('#fy').val();
        load_data('dept_data', fy_id);
    })

});

$('#dept').change(function() {
    var fy = $('#fy').val();
    var dept = $('#dept').val();

    $(document).ajaxSend(function() {
        $("#overlay").fadeIn(300);
        $("#result").fadeOut(300);
    });

    $.ajax({
        url: "fetch_supply.php",
        method: "POST",
        data: {
            fy: fy,
            dept: dept
        },
        success: function(data) {
            $('#result').html(data);
        }
    }).done(function() {
        setTimeout(function() {
            $("#result").fadeIn(300);
            $("#overlay").fadeOut(300);
            document.getElementById('pdf').disabled = false;
        }, 500);
    });
})

document.getElementById("pdf").onclick = function() {
    var fy = document.getElementById("fy").value;
    var dept = document.getElementById("dept").value;
    window.open('pdf/pdf_report_supply.php?fy=' + fy + '&dept='+ dept +'', '_blank');
};
</script>
<?php
 include ("../../header-footer/footer.php");
?>