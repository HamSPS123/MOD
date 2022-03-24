<?php
include ("oop/connect.php");

    
    if(isset($_POST['getData'])){

        $start = mysqli_real_escape_string($conn, $_POST['start']);
        $limit = mysqli_real_escape_string($conn, $_POST['limit']);
        
        $sql = "";
        if(isset($_POST['act'])){
        if($_POST["act"] == "type"){
            $sql = "where du.doc_id=".$_POST["sql"];
        }
        if($_POST["act"] == "fy"){
            $sql = "where fy_id='".$_POST["sql"]."'";
        }
        if($_POST["act"] == "search"){
            // $_POST["sql"] = "%".$_POST["sql"]."%";
            $sql = "where CONCAT(doc_name,fy_id,`description`,DATE_FORMAT(up_date, '%d/%m/%Y')) LIKE '%$_POST[sql]%'";
        }
    }
        // echo "SELECT up_id,du.doc_id,doc_name,fy_id,`description`,cover,DATE_FORMAT(up_date, '%d/%m/%Y') as up_date,file_upload FROM document_upload du LEFT JOIN document_type dt ON du.doc_id=dt.doc_id $sql ORDER BY up_id DESC LIMIT $start,$limit";
        $result = mysqli_query($conn, "SELECT up_id,du.doc_id,doc_name,fy_id,`description`,cover,DATE_FORMAT(up_date, '%d/%m/%Y') as up_date,file_upload FROM document_upload du LEFT JOIN document_type dt ON du.doc_id=dt.doc_id $sql ORDER BY up_id DESC LIMIT $start,$limit");
        if(mysqli_num_rows($result) > 0){
            $response = "";
            foreach($result as $data){
                $response .= '
                <div class="col-md-4 mb-4">
                    <div class="card  h-100">
                        <a href="image/pdf/'. $data['file_upload'] .'" style="color: #000;" target="_blank">
                            <div class="card-body">

                                <div class="position-relative image-hover">
                                    <img src="image/'.$data['cover'].'" class="img-fluid img-fit" alt="world-news" />
                                    <span class="thumb-title"> <span class="fs-10 mr-1">'.$data['up_date'].'</span></span>
                                </div>

                                <h5 class="font-weight-bold mt-3">
                                    '.$data['doc_name'].'
                                </h5>
                                <p class="fs-15 font-weight-normal text-show">
                                    '.$data['description'].'
                                </p>
                                <a href="image/pdf/'.$data['file_upload'].'"
                                    class="font-weight-bold text-dark pt-2 btn btn-outline-success"
                                    target="_blank">ອ່ານຕໍ່</a>
                            </div>
                        </a>
                    </div>
                </div>
                ';
            }
            exit($response);
        }else{
            exit('reachedMax');
        }
    }
?>