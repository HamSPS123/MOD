<?php
  $title = "ລາຍງານແຜນແບ່ງປັນ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ($path."header-footer/header.php");
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
                        <select name="province" id="province" class="form-control" data-live-search="true"
                            title="ເລືອກແຂວງ">

                        </select>
                        <div class="input-group-append">
                            <button name="pdf" id="pdf" class="btn btn-outline-success" disabled><i
                                    class="fas fa-print"></i> ສ້າງລາຍງານ</button>
                            <!-- <button name="excel" id="excel" class="" disabled>Excel</button> -->
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
</div>

<script>
$(document).ready(function() {
    $('#fy_id').selectpicker();
    $('#adj').selectpicker();
    $('#province').selectpicker();

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
                if (type == 'adj_data') {
                    html += '<option value="All">---ເລືອກທັງໝົດ (ສະຫຼຸບລວມ)---</option>';
                } else if (type == 'province_data') {
                    html += '<option value="All">---ເລືອກທັງໝົດ---</option>'
                }
                for (var i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].id + '">' + data[i].name +
                        '</option>';
                }
                if (type == 'fy_data') {
                    $('#fy_id').html(html);
                    $('#fy_id').selectpicker('refresh');
                } else if (type == 'adj_data') {
                    $('#adj').html(html);
                    $('#adj').selectpicker('refresh');
                } else {
                    $('#province').html(html);
                    $('#province').selectpicker('refresh');
                }
            }
        })
    }

    $(document).on('change', '#fy_id', function() {
        var fy_id = $('#fy_id').val();
        load_data('adj_data', fy_id);
        fetch_data('fetch_all', '');
    });

    $(document).on('change', '#adj', function() {
        var adj = $(this).val();
        fetch_data("dept_data", adj, '');
        if (adj == 'All') {
            fetch_data('fetch_all', '');
            load_data('province_data', '');
        } else {
            load_data('province_data', '');
        }
    });

    $(document).on('change', '#province', function() {
        var adj = $('#adj').val();
        var province = $('#province').val();
        if(province == "All" && adj == "All"){
            fetch_data('fetch_all', '');
        }
        else if(province != "All" && adj == "All"){
            fetch_data('fetch_all_province','',province);
        }
        else if (province == "All" && adj != "All") {
            fetch_data("dept_data", adj, '')
        } else {
            fetch_data('province_data', adj, province);
        }
    });

    function fetch_data(type, adj, province = "") {
        // adj = $('#adj').val();
        // province = $('#province').val();

        $(document).ajaxSend(function() {
            $("#overlay").fadeIn(300);
            $("#result").fadeOut(300);
        });
        if (type == "fetch_all") {
            var fy = document.getElementById("fy_id").value;
            $.ajax({
                url: "fetch_all.php",
                method: "POST",
                data: {
                    fy: fy
                },
                success: function(data) {
                    $('#result').html(data);
                }
            }).done(function() {
                setTimeout(function() {
                    $("#result").fadeIn(300);
                    $("#overlay").fadeOut(300);
                    document.getElementById("pdf").disabled = false;
                }, 500);
            });
        }
        else if(type == 'fetch_all_province'){
            var fy = document.getElementById("fy_id").value;
            $.ajax({
                url: "fetch_all_province.php",
                method: "POST",
                data: {
                    fy: fy,
                    province: province
                },
                success: function(data) {
                    $('#result').html(data);
                }
            }).done(function() {
                setTimeout(function() {
                    $("#result").fadeIn(300);
                    $("#overlay").fadeOut(300);
                    document.getElementById("pdf").disabled = false;
                }, 500);
            });
        }
         else if (type == 'dept_data') {
            $.ajax({
                url: "fetch_table.php",
                method: "POST",
                data: {
                    adj: adj
                },
                success: function(data) {
                    $('#result').html(data);
                }
            }).done(function() {
                setTimeout(function() {
                    $("#result").fadeIn(300);
                    $("#overlay").fadeOut(300);
                    document.getElementById("pdf").disabled = false;
                }, 500);
            });
        } else {
            $.ajax({
                url: "fetch_province.php",
                method: "POST",
                data: {
                    adj: adj,
                    province: province
                },
                success: function(data) {
                    $('#result').html(data);
                }
            }).done(function() {
                setTimeout(function() {
                    $("#result").fadeIn(300);
                    $("#overlay").fadeOut(300);
                    document.getElementById("pdf").disabled = false;
                }, 500);
            });
        }

    }
});



$('#province').change(function() {

})

document.getElementById("pdf").onclick = function() {
    var adj = document.getElementById("adj").value;
    var province = document.getElementById("province").value;
    var fy = document.getElementById("fy_id").value;
    
    if((adj == "" || adj == "All") && (province == "" || province == "All")){
        window.open('pdf/pdf_fetch_all.php?fy=' + fy + '', '_blank');
    }else if((adj == "" || adj == "All") && (province != "" || province != "All")){
        window.open('pdf/pdf_fetch_province.php?fy=' + fy + '&province='+ province +'', '_blank');
    }else if((adj != "" || adj != "All") && (province == "" || province == "All")){
        window.open('pdf/pdf_dept.php?adj=' + adj + '', '_blank');
    } else {
        window.open('pdf/pdf_hrd_province.php?adj=' + adj + '&province=' + province + '', '_blank');
    }
};

// document.getElementById("excel").onclick = function() {
//     var adj = document.getElementById("adj").value;
//     window.open('excel/excel_hrd.php?adj=' + adj + '', '_blank');
// };
</script>

<?php
 include ($path."header-footer/footer.php");
?>