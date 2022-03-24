<?php
  $title = "ລາຍງານແຜນແບ່ງປັນ";
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
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <select name="fy_id" id="fy_id" class="form-control" data-live-search="true"
                            title="ເລືອກສົກຮຽນ">
                        </select>
                        <select name="adj" id="adj" class="form-control" data-live-search="true" title="ເລືອກກົມ">

                        </select>
                        <div class="input-group-append">
                            <button name="pdf" id="pdf" class="btn btn-danger">PDF</button>
                            <button name="excel" id="excel" class="btn btn-success">Excel</button>
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
</div>

<script>
$(document).ready(function() {
    $('#fy_id').selectpicker();
    $('#adj').selectpicker();

    load_data('fy_data', '');

    function load_data(type, fy_id = '') {
        $.ajax({
            url: "load_data.php",
            method: "POST",
            data: {
                type: type,
                fy_id: fy_id
            },
            dataType: "json",
            success: function(data) {
                var html = '';
                for (var count = 0; count < data.length; count++) {
                    html += '<option value="' + data[count].id + '">' + data[count].name +
                        '</option>';
                }
                if (type == 'fy_data') {
                    $('#fy_id').html(html);
                    $('#fy_id').selectpicker('refresh');
                } else {
                    $('#adj').html(html);
                    $('#adj').selectpicker('refresh');
                }
            }
        })
    }

    $(document).on('change', '#fy_id', function() {
        var fy_id = $('#fy_id').val();
        load_data('adj_data', fy_id);
    });
});

$('#adj').change(function() {
    var query = $('#adj').val();

    $(document).ajaxSend(function() {
        $("#overlay").fadeIn(300);
        $("#result").fadeOut(300);
    });
    $.ajax({
        url: "fetch_table.php",
        method: "POST",
        data: {
            query: query
        },
        success: function(data) {
            $('#result').html(data);
        }
    }).done(function() {
        setTimeout(function() {
            $("#result").fadeIn(300);
            $("#overlay").fadeOut(300);
        }, 500);
    });
})

document.getElementById("pdf").onclick = function() {
    var adj = document.getElementById("adj").value;
    window.open('pdf/pdf_dept_001.php?adj=' + adj + '', '_blank');
};

document.getElementById("excel").onclick = function() {
    var adj = document.getElementById("adj").value;
    window.open('excel/excel_hrd.php?adj=' + adj + '', '_blank');
};
</script>

<?php
 include ("../../header-footer/footer.php");
?>