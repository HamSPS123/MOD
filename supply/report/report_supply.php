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
            <div class="col-md-4">
                <div class="input-group">
                    <select name="fy" id="fy" class="form-control" data-live-search="true" title="ເລືອກສົກຮຽນ">
                        <?php
                        $option = mysqli_query($conn, "SELECT * FROM fy");
                        foreach($option as $data){
                          ?>
                        <option value="<?= $data['fy_id'] ?>"><?= $data['fy_id'] ?></option>
                        <?php
                        }
                      ?>
                    </select>
                    <div class="input-group-append">
                        <button name="pdf" id="pdf" class="btn btn-danger">PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="result">
    <p class="mt-2 text-center result">ກະລຸນາເລືອກຂໍ້ມູນທີ່ຕ້ອງການສະແດງ</p>
</div>

<div id="overlay">
    <img src="<?= $path ?>image/loading3.gif" alt="">
</div>

<script>
$(document).ready(function() {
    $('#fy').selectpicker();
});

$('#fy').change(function() {
    var fy = $('#fy').val();

    $.ajax({
        url: "fetch_supply.php",
        method: "POST",
        data: {
            query: fy
        },
        success: function(data) {
          $('#result').html(data);
        }
    })
})

document.getElementById("pdf").onclick = function () {
        var fy = document.getElementById("fy").value;
        window.open('pdf/pdf_report_supply.php?fy='+fy+'', '_blank');
    };
</script>
<?php
 include ("../../header-footer/footer.php");
?>