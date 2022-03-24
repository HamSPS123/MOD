<?php
  $title = "ລາຍງານແຜນສ້າງ";
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
                        <select name="fy_id" id="fy_id" class="selectpicker" data-live-search="true"
                            title="ເລືອກສົກຮຽນ">
                        </select>
                        <select name="adj" id="adj" class="selectpicker" data-live-search="true" title="ເລືອກກົມ">
                            
                        </select>
                        <select name="province" id="province" class="selectpicker" data-live-search="true" title="ເລືອກແຂວງ">

                        </select>
                        <div class="input-group-append">
                            <button name="pdf" id="pdf" class="btn btn-danger" disabled>PDF</button>
                            <button name="excel" id="excel" class="btn btn-success" disabled>Excel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="card">
      <div id="result" class="card-body">
          <p class="m-0 text-center result">ກະລຸນາເລືອກຂໍ້ມູນທີ່ຕ້ອງການສະແດງ</p>
      </div>
    </div>


    <div id="overlay">
        <img src="<?= $path ?>image/loading3.gif" alt="">
    </div>
</div>


<script>
$(document).ready(function() {
    $('#fy_id').selectpicker();
    $('#province').selectpicker();
    $('#adj').selectpicker();

    load_data('demand_data', '');

    function load_data(demand, fy_id = '') {
        $.ajax({
            url: "load_data.php",
            method: "POST",
            data: {
                demand: demand,
                fy_id: fy_id
            },
            dataType: "json",
            success: function(data) {
                var html = '';
                if(demand == "province_data"){
                    html += '<option selected value="">ທັງໝົດ</option>';
                }
                for (var count = 0; count < data.length; count++) {
                    html += '<option value="' + data[count].id + '">' + data[count].name +
                        '</option>';
                }
                if (demand == 'demand_data') {
                    $('#fy_id').html(html);
                    $('#fy_id').selectpicker('refresh');
                } else if (demand == 'adj_data') {
                    $('#adj').html(html);
                    $('#adj').selectpicker('refresh');
                }else{
                    $('#province').html(html);
                    $('#province').selectpicker('refresh');
                }
            }
        })
    }

    $(document).on('change', '#fy_id', function() {
        var fy_id = $('#fy_id').val();
        load_data('adj_data', fy_id);
    });

    $(document).on('change', '#adj', function(){
        load_data('province_data', '');
    });
});

// $('#adj').change(function(){
//     load_data('province', '');
// })

// $('#adj').change(function() {
//     var query = $('#adj').val();

//     $(document).ajaxSend(function() {
//         $("#overlay").fadeIn(300);
//         $("#result").fadeOut(300);
//     });
//     $.ajax({
//         url: "fetch_demand.php",
//         method: "POST",
//         data: {
//             query: query
//         },
//         success: function(data) {
//             $('#result').html(data);
//         }
//     }).done(function() {
//         setTimeout(function() {
//             $("#result").fadeIn(300);
//             $("#overlay").fadeOut(300);
//         }, 500);
//     });
// })

document.getElementById("pdf").onclick = function() {
    var adj = document.getElementById("adj").value;
    window.open('pdf/pdf_demand.php?adj=' + adj + '', '_blank');
};

document.getElementById("excel").onclick = function() {
    var adj = document.getElementById("adj").value;
    window.open('excel/excel_hrd.php?adj=' + adj + '', '_blank');
};
</script>
<?php
 include ("../../header-footer/footer.php");
?>