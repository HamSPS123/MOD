<?php
 include ('connect.php');
date_default_timezone_set("Asia/Bangkok");
$datenow = time();
$Date = date("Y-m-d",$datenow);
$Time = date("H:i:s",$datenow);
class obj{
    public $conn;
    public $search;
    public static function login_supply($email,$pass){
        global $conn;
        // $password = "') or '1'='1';");//";
        session_start();
        $pass = md5($pass);
        $resultck = mysqli_query($conn, "call select_userSupply('$email','$pass')");
        if($email == "")
        {
            echo"<script>";
            echo"window.location.href='index?email=null';";
            echo"</script>";
        }
        else if($pass == "")
        {
            echo"<script>";
            echo"window.location.href='index?pass=null';";
            echo"</script>";
        }
        else if(!mysqli_num_rows($resultck))
        {
            echo"<script>";
            echo"window.location.href='index?login=false';";
            echo"</script>";
        }
        else 
        {
            if(mysqli_num_rows($resultck) <= 0){
                echo"<meta http-equiv-'refresh' content='1;URL=/'>";
            }
            else{
               
                while($user = mysqli_fetch_array($resultck))
                {
                    if($user['stt_id'] == 3)
                    {
                        $_SESSION['mod_user_ses_id'] = session_id();
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['sup_name'] = $user['sup_name'];
                        $_SESSION['uni_id'] = $user['uni_id'];
                        $_SESSION['mod_ses_status_id'] = 3;
                        echo"<meta http-equiv='refresh' content='1;URL=Main'>";
                    }
                    else
                    {
                        unset($_SESSION['mod_user_ses_id']);
                        unset($_SESSION['user_id']);
                        unset($_SESSION['email']);
                        unset($_SESSION['sup_name']);
                        unset($_SESSION['uni_id']);
                        unset($_SESSION['mod_ses_status_id']);
                        session_destroy();
                        echo"<script>";
                        echo"window.location.href='index?permission=found';";
                        echo"</script>";
                    }

                }
            }
        }  
    }

    public static function login_department($email,$pass){
        global $conn;
        // $password = "') or '1'='1';");//";
        session_start();
        $pass = md5($pass);
        $resultck = mysqli_query($conn, "call login_department('$email','$pass')");
        if($email == "")
        {
            echo"<script>";
            echo"window.location.href='index?email=null';";
            echo"</script>";
        }
        else if($pass == "")
        {
            echo"<script>";
            echo"window.location.href='index?pass=null';";
            echo"</script>";
        }
        else if(!mysqli_num_rows($resultck))
        {
            echo"<script>";
            echo"window.location.href='index?login=false';";
            echo"</script>";
        }
        else 
        {
            if(mysqli_num_rows($resultck) <= 0){
                echo"<meta http-equiv-'refresh' content='1;URL=/'>";
            }
            else{
               
                while($user = mysqli_fetch_array($resultck))
                {
                    if($user['stt_id'] == 5)
                    {
                        $_SESSION['mod_user_ses_id'] = session_id();
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['usr_name'] = $user['usr_name'];
                        $_SESSION['dept_id'] = $user['dept_id'];
                        $_SESSION['mod_ses_status_id'] = 5;
                        echo"<meta http-equiv='refresh' content='1;URL=Main'>";
                    }
                    else
                    {
                        unset($_SESSION['mod_user_ses_id']);
                        unset($_SESSION['user_id']);
                        unset($_SESSION['email']);
                        unset($_SESSION['usr_name']);
                        unset($_SESSION['dept_id']);
                        unset($_SESSION['mod_ses_status_id']);
                        session_destroy();
                        echo"<script>";
                        echo"window.location.href='index?permission=found';";
                        echo"</script>";
                    }

                }
            }
        }  
    }
    public static function login_hrd($email,$pass){
        global $conn;
        // $password = "') or '1'='1';");//";
        session_start();
        $pass = md5($pass);
        $resultck = mysqli_query($conn, "call select_hrd('$email','$pass')");
        if($email == "")
        {
            echo"<script>";
            echo"window.location.href='index?email=null';";
            echo"</script>";
        }
        else if($pass == "")
        {
            echo"<script>";
            echo"window.location.href='index?pass=null';";
            echo"</script>";
        }
        else if(!mysqli_num_rows($resultck))
        {
            echo"<script>";
            echo"window.location.href='index?login=false';";
            echo"</script>";
        }
        else 
        {
            if(mysqli_num_rows($resultck) <= 0){
                echo"<meta http-equiv-'refresh' content='1;URL=/'>";
            }
            else{
               
                while($user = mysqli_fetch_array($resultck))
                {
                    if($user['stt_id'] == 1)
                    {
                        $_SESSION['mod_user_ses_id'] = session_id();
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['hrd_name'] = $user['hrd_name'];
                        $_SESSION['uni_id'] = $user['uni_id'];
                        $_SESSION['mod_ses_status_id'] = 1;
                        echo"<meta http-equiv='refresh' content='1;URL=main'>";
                    }else if($user['stt_id'] == 4){
                        $_SESSION['mod_user_ses_id'] = session_id();
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['hrd_name'] = $user['hrd_name'];
                        $_SESSION['uni_id'] = $user['uni_id'];
                        $_SESSION['mod_ses_status_id'] = 4;
                        echo"<meta http-equiv='refresh' content='1;URL=../admin/main'>";
                    }
                    else
                    {
                        unset($_SESSION['mod_user_ses_id']);
                        unset($_SESSION['user_id']);
                        unset($_SESSION['email']);
                        unset($_SESSION['hrd_name']);
                        unset($_SESSION['uni_id']);
                        unset($_SESSION['mod_ses_status_id']);
                        session_destroy();
                        echo"<script>";
                        echo"window.location.href='index?permission=found';";
                        echo"</script>";
                    }

                }
            }
        }  
    }

    public static function login_demand($email,$pass){
        global $conn;
        // $password = "') or '1'='1';");//";
        session_start();
        $pass = md5($pass);
        $resultck = mysqli_query($conn, "call select_userDemand('$email','$pass')");
        if($email == "")
        {
            echo"<script>";
            echo"window.location.href='index?email=null';";
            echo"</script>";
        }
        else if($pass == "")
        {
            echo"<script>";
            echo"window.location.href='index?pass=null';";
            echo"</script>";
        }
        else if(!mysqli_num_rows($resultck))
        {
            echo"<script>";
            echo"window.location.href='index?login=false';";
            echo"</script>";
        }
        else 
        {
            if(mysqli_num_rows($resultck) <= 0){
                echo"<meta http-equiv-'refresh' content='1;URL=/'>";
            }
            else{
               
                while($user = mysqli_fetch_array($resultck))
                {
                    if($user['stt_id'] == 2)
                    {
                        $_SESSION['mod_user_ses_id'] = session_id();
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['demand_name'] = $user['demand_name'];
                        $_SESSION['p_m_id'] = $user['p_m_id'];
                        $_SESSION['mod_ses_status_id'] = 2;
                        echo"<meta http-equiv='refresh' content='1;URL=main'>";
                    }
                    else
                    {
                        unset($_SESSION['mod_user_ses_id']);
                        unset($_SESSION['user_id']);
                        unset($_SESSION['email']);
                        unset($_SESSION['demand_name']);
                        unset($_SESSION['p_m_id']);
                        unset($_SESSION['mod_ses_status_id']);
                        session_destroy();
                        echo"<script>";
                        echo"window.location.href='index?permission=found';";
                        echo"</script>";
                    }

                }
            }
        }  
    }
    public static function logout($status){
        global $session_path;
        session_start();
        if($status == 1){
            unset($_SESSION['mod_user_ses_id']);
            unset($_SESSION['user_id']);
            unset($_SESSION['email']);
            unset($_SESSION['hrd_name']);
            unset($_SESSION['uni_id']);
            unset($_SESSION['mod_ses_status_id']);
            session_destroy();
        }
        if($status == 2){
            unset($_SESSION['mod_user_ses_id']);
            unset($_SESSION['user_id']);
            unset($_SESSION['email']);
            unset($_SESSION['demand_name']);
            unset($_SESSION['p_m_id']);
            unset($_SESSION['mod_ses_status_id']);
            session_destroy();
        }
        if($status == 3){
            unset($_SESSION['mod_user_ses_id']);
            unset($_SESSION['user_id']);
            unset($_SESSION['email']);
            unset($_SESSION['sup_name']);
            unset($_SESSION['uni_id']);
            unset($_SESSION['mod_ses_status_id']);
            session_destroy();
        }
        if($status == 4){
            unset($_SESSION['mod_user_ses_id']);
            unset($_SESSION['user_id']);
            unset($_SESSION['email']);
            unset($_SESSION['hrd_name']);
            unset($_SESSION['uni_id']);
            unset($_SESSION['mod_ses_status_id']);
            session_destroy();
        }
        if($status == 5){
            unset($_SESSION['mod_user_ses_id']);
            unset($_SESSION['user_id']);
            unset($_SESSION['email']);
            unset($_SESSION['usr_name']);
            unset($_SESSION['dept_id']);
            unset($_SESSION['mod_ses_status_id']);
            session_destroy();
        }
        
        
        echo"<script>";
        echo"window.location.href='$session_path';";
        echo"</script>";
    }
    public static function machine(){
        global $machine;
        $machine = "";
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $arp= "arp -a $ipAddress";
        $ip = shell_exec($arp);
        if($ipAddress == "::1"){
            $ipall = "ipconfig /all";
            $ipserver = shell_exec($ipall);
            $ipserver = strstr($ipserver,'Wi-Fi',false);
            $ipserver = strstr($ipserver,'Physical Address',false);
            $ipserver = strstr($ipserver,' DHCP',true);
            $ipserver = strstr($ipserver,': ',false);
            $machine = strtoupper(substr($ipserver,2,-3));
        }
        else{
            $machine = strtoupper(substr($ip,109,-16));
        }
    }
    public static function get_machine(){
        global $conn;
        global $machine_id;
        global $Date;
        $machine_id = mysqli_query($conn,"select * from machine where expire >= '$Date';");
        
    }
    public static function generate($machine_id){
        global $machine_no;
        $group1 = substr($machine_id,2,2);
        $group2 = substr($machine_id,4,2);
        $group3 = substr($machine_id,10,2);
        $group4 = substr($machine_id,12,2);
        $group5 = substr($machine_id,18,2);
        $group6 = substr($machine_id,20,2);
        $machine_no = $group1."-".$group2."-".$group3."-".$group4."-".$group5."-".$group6;
        
    }
    public static function select_user(){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        global $resultuser; 
        $resultuser = mysqli_query($conn,"call select_user()");      
    }

    public static function insert_user($stt_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;

        $resultin_user = mysqli_query($conn, "call insert_user('$stt_id')");
        if(!$resultin_user){
            echo"<script>";
            echo"window.location.href='user?save=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='user?save2=success';";
            echo"</script>";
        }
    }

    public static function update_user($user_id,$stt_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;

        $resultup_user = mysqli_query($conn, "call update_user('$user_id','$stt_id')");
        if(!$resultup_user){
            echo"<script>";
            echo"window.location.href='user?update=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='user?update2=success';";
            echo"</script>";
        }
    }

    public static function delete_user($user_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        
        $check_userHRD = mysqli_query($conn,"select * from hrd_user where user_id='$user_id'");//ກວດສອບອີເມວວ່າມີແລ້ວ ຫຼື ຍັງ
        $check_userDemand = mysqli_query($conn,"select * from demand_user where user_id='$user_id'");//ກວດສອບອີເມວວ່າມີແລ້ວ ຫຼື ຍັງ
        $check_userSupply = mysqli_query($conn,"select * from supply_user where user_id='$user_id'");//ກວດສອບອີເມວວ່າມີແລ້ວ ຫຼື ຍັງ

        if (mysqli_num_rows($check_userHRD) > 0) {
            echo"<script>";
            echo"window.location.href='user?check=fail';";
            echo"</script>";
        }else if(mysqli_num_rows($check_userDemand) > 0){
            echo"<script>";
            echo"window.location.href='user?check=fail';";
            echo"</script>";
        }else if(mysqli_num_rows($check_userSupply) > 0){
            echo"<script>";
            echo"window.location.href='user?check=fail';";
            echo"</script>";
        }else{
            $resultdel_user = mysqli_query($conn, "call delete_user('$user_id')");
            
            if(!$resultdel_user){
                echo"<script>";
                echo"window.location.href='user?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='user?del2=success';";
                echo"</script>";
            }
        }
    }

    public static function select_userDemand(){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        global $resultdemand;
        $resultdemand = mysqli_query($conn,"call userDemand()");      
    }

    public static function insert_userDemand($demand_name,$surname,$gender,$tel,$email,$pass,$user_id,$p_m_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
         
        $pass = md5($pass);

        $check_email = mysqli_query($conn,"select * from demand_user where email='$email'");//ກວດສອບອີເມວວ່າມີແລ້ວ ຫຼື ຍັງ
        $check_userDemand = mysqli_query($conn,"select * from demand_user where user_id='$user_id'");//ກວດສອບວ່າລະຫັດນີ້ມີແລ້ວ ຫຼື ຍັງ
        if(mysqli_num_rows($check_email) > 0){
            echo"<script>";
            echo"window.location.href='user-demand?email=same';";
            echo"</script>";
        }else if(mysqli_num_rows($check_userDemand) > 0){
            echo"<script>";
            echo"window.location.href='user-demand?user_id=same';";
            echo"</script>";
        }else{ 
            //ກວດສອບວ່າຜູ້ໃຊ້ນີ້ຖືກກັບ demand ແລ້ວບໍ່?
            $check_user_stt = mysqli_query($conn, "select * from user where user_id='$user_id'");
            $rowmp = mysqli_fetch_array($check_user_stt, MYSQLI_ASSOC);
            if ($rowmp['stt_id'] != 2) {
                echo"<script>";
                echo"window.location.href='user-demand?stt=not';";
                echo"</script>";
            }else{
                $resultDemand = mysqli_query($conn, "call insert_userDemand('$demand_name','$surname','$gender','$tel','$email','$pass','$user_id','$p_m_id')");
                if(!$resultDemand){
                    echo"<script>";
                    echo"window.location.href='user-demand?save=fail';";
                    echo"</script>";
                }
                else{
                    echo"<script>";
                    echo"window.location.href='user-demand?save2=success';";
                    echo"</script>";
                }
            }
        }
    }

    public static function update_Demand($demand_name,$surname,$gender,$tel,$email,$pass,$p_m_id,$demand_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;

        $flag = preg_match('/^[a-f0-9]{32}$/', $pass);
        if($flag){ // flag true means string is a valid md5 encrypation
            echo"";
        }else{
            $pass = md5($pass);
        }

        // echo"<script>";
        //         echo"alert('$pass')";
        //         echo"</script>";

        $resultmp = mysqli_query($conn, "select * from demand_user where demand_id='$demand_id'");
        $rowmp = mysqli_fetch_array($resultmp, MYSQLI_ASSOC);

        //ກວດສອບອີເມວ ແລະ ລະຫັດຜ່ານຖ້າຄືກັນແມ່ນໃຫ້ທຳງານໃນສ່ວນນີ້
        if ($email == $rowmp['email']) {
            $result_update = mysqli_query($conn, "call update_userDemand('$demand_name','$surname','$gender','$tel','$email','$pass','$p_m_id','$demand_id')");
            if(!$result_update){
                echo"<script>";
                echo"window.location.href='user-demand?update=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='user-demand?update2=success';";
                echo"</script>";
            }
        }else{
            //ກວດສອບຖ້າອີເມວບໍ່ເທົ່າກັນ
            if ($email != $rowmp['email']) {
                $check_email = mysqli_query($conn, "SELECT * FROM demand_user WHERE email = '$email'");
                if (mysqli_num_rows($check_email) > 0) {
                    echo"<script>";
                    echo"window.location.href='user-demand?email=same';";
                    echo"</script>";
                }else{
                    $result_update = mysqli_query($conn, "call update_userDemand('$demand_name','$surname','$gender','$tel','$email','$pass','$p_m_id','$demand_id')");
                    if(!$result_update){
                        echo"<script>";
                        echo"window.location.href='user-demand?update=fail';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"window.location.href='user-demand?update2=success';";
                        echo"</script>";
                    }
                }
            }
        }
            
    }

    public static function delete_userDemand($user_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        global $result_del_dem;

        $check_plan = mysqli_query($conn, "SELECT * FROM create_plan WHERE user_id='$user_id'"); //ກວດສອບລະຫັດການເຂົ້າໃຊ້ລະຫັດ
        if (mysqli_num_rows($check_plan) > 0) {
            echo"<script>";
                echo"window.location.href='user-demand?delete=warning';";
                echo"</script>";
        }else{
            $result_del_dem = mysqli_query($conn, "call delete_userDemand('$user_id')");
            if(!$result_del_dem){
                echo"<script>";
                echo"window.location.href='user-demand?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='user-demand?del2=success';";
                echo"</script>";
            }
        }

    }
    public static function select_userDepartment(){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        global $result_sup;
        $result_sup = mysqli_query($conn,"call select_userDepartment()");      
    }
    public static function select_userSupply(){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        global $result_sup;
        $result_sup = mysqli_query($conn,"call userSupply()");      
    }

    public static function insert_Supply($sup_name,$surname,$gender,$tel,$email,$pass,$user_id,$uni_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        $pass = md5($pass);

        $check_email = mysqli_query($conn,"select * from supply_user where email='$email'");//ກວດສອບອີເມວວ່າມີແລ້ວ ຫຼື ຍັງ
        $check_userSupply = mysqli_query($conn,"select * from supply_user where user_id='$user_id'");//ກວດສອບວ່າລະຫັດນີ້ມີແລ້ວ ຫຼື ຍັງ
        if(mysqli_num_rows($check_email) > 0){
            echo"<script>";
            echo"window.location.href='user-supply?email=same';";
            echo"</script>";
        }else if(mysqli_num_rows($check_userSupply) > 0){
            echo"<script>";
            echo"window.location.href='user-supply?user_id=same';";
            echo"</script>";
        }else{ 

            //ກວດສອບວ່າຜູ້ໃຊ້ນີ້ຖືກກັບ supply ແລ້ວບໍ່?
            $check_user_stt = mysqli_query($conn, "select * from user where user_id='$user_id'");
            $rowmp = mysqli_fetch_array($check_user_stt, MYSQLI_ASSOC);
            if ($rowmp['stt_id'] != 3) {
                echo"<script>";
                echo"window.location.href='user-supply?stt=not';";
                echo"</script>";
            }else{
                $result_sup = mysqli_query($conn, "call insert_userSupply('$sup_name','$surname','$gender','$tel','$email','$pass','$user_id','$uni_id')");
                if(!$result_sup){
                    echo"<script>";
                    echo"window.location.href='user-supply?save=fail';";
                    echo"</script>";
                }
                else{
                    echo"<script>";
                    echo"window.location.href='user-supply?save2=success';";
                    echo"</script>";
                }
            }
        }
    }
    public static function insert_userDepartment($user_name,$surname,$gender,$tel,$email,$pass,$user_id,$dept_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        $pass = md5($pass);

        $check_email = mysqli_query($conn,"select * from department_user where email='$email'");//ກວດສອບອີເມວວ່າມີແລ້ວ ຫຼື ຍັງ
        $check_userSupply = mysqli_query($conn,"select * from department_user where user_id='$user_id'");//ກວດສອບວ່າລະຫັດນີ້ມີແລ້ວ ຫຼື ຍັງ
        if(mysqli_num_rows($check_email) > 0){
            echo"<script>";
            echo"window.location.href='user-department?email=same';";
            echo"</script>";
        }else if(mysqli_num_rows($check_userSupply) > 0){
            echo"<script>";
            echo"window.location.href='user-department?user_id=same';";
            echo"</script>";
        }else{ 

            //ກວດສອບວ່າຜູ້ໃຊ້ນີ້ຖືກກັບ supply ແລ້ວບໍ່?
            // $check_user_stt = mysqli_query($conn, "select * from user where user_id='$user_id'");
            // $rowmp = mysqli_fetch_array($check_user_stt, MYSQLI_ASSOC);
            // if ($rowmp['stt_id'] != 3) {
            //     echo"<script>";
            //     echo"window.location.href='user-department?stt=not';";
            //     echo"</script>";
            // }else{
                $result_sup = mysqli_query($conn, "call insert_userDepartment('$user_name','$surname','$gender','$tel','$email','$pass','$user_id','$dept_id')");
                if(!$result_sup){
                    echo"<script>";
                    echo"window.location.href='user-department?save=fail';";
                    echo"</script>";
                }
                else{
                    echo"<script>";
                    echo"window.location.href='user-department?save2=success';";
                    echo"</script>";
                }
            // }
        }
    }
    public static function update_Supply($sup_id,$sup_name,$surname,$gender,$tel,$email,$pass,$uni_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;

        $flag = preg_match('/^[a-f0-9]{32}$/', $pass);
        if($flag){ // flag true means string is a valid md5 encrypation
            echo"";
        }else{
            $pass = md5($pass);
        }

        // echo"<script>";
        //         echo"alert('$pass')";
        //         echo"</script>";

        $resultmp = mysqli_query($conn, "select * from supply_user where sup_id='$sup_id'");
        $rowmp = mysqli_fetch_array($resultmp, MYSQLI_ASSOC);

        //ກວດສອບອີເມວ ແລະ ລະຫັດຜ່ານຖ້າຄືກັນແມ່ນໃຫ້ທຳງານໃນສ່ວນນີ້
        if ($email == $rowmp['email']) {
            $result_update = mysqli_query($conn, "call update_userSupply('$sup_id','$sup_name','$surname','$gender','$tel','$email','$pass','$uni_id')");
            if(!$result_update){
                echo"<script>";
                echo"window.location.href='user-supply?update=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='user-supply?update2=success';";
                echo"</script>";
            }
        }else{
            //ກວດສອບຖ້າອີເມວບໍ່ເທົ່າກັນ
            if ($email != $rowmp['email']) {
                $check_email = mysqli_query($conn, "SELECT * FROM supply_user WHERE email = '$email'");
                if (mysqli_num_rows($check_email) > 0) {
                    echo"<script>";
                    echo"window.location.href='user-supply?email=same';";
                    echo"</script>";
                }else{
                    $result_update = mysqli_query($conn, "call update_userDepartment('$sup_id','$sup_name','$surname','$gender','$tel','$email','$pass','$uni_id')");
                    if(!$result_update){
                        echo"<script>";
                        echo"window.location.href='user-supply?update=fail';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"window.location.href='user-supply?update2=success';";
                        echo"</script>";
                    }
                }
            }
        }
            
    }

    public static function update_userDepartment($usr_dept_id,$sup_name,$surname,$gender,$tel,$email,$pass,$dept_id,$user_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;

        $flag = preg_match('/^[a-f0-9]{32}$/', $pass);
        if($flag){ // flag true means string is a valid md5 encrypation
            echo"";
        }else{
            $pass = md5($pass);
        }

        // echo"<script>";
        //         echo"alert('$pass')";
        //         echo"</script>";

        $resultmp = mysqli_query($conn, "select * from department_user where usr_dept_id='$usr_dept_id'");
        $rowmp = mysqli_fetch_array($resultmp, MYSQLI_ASSOC);

        //ກວດສອບອີເມວ ແລະ ລະຫັດຜ່ານຖ້າຄືກັນແມ່ນໃຫ້ທຳງານໃນສ່ວນນີ້
        if ($email == $rowmp['email']) {
            $result_update = mysqli_query($conn, "call update_userDepartment('$usr_dept_id','$sup_name','$surname','$gender','$tel','$email','$pass','$dept_id','$user_id')");
            if(!$result_update){
                echo"<script>";
                echo"window.location.href='user-department?update=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='user-department?update2=success';";
                echo"</script>";
            }
        }else{
            //ກວດສອບຖ້າອີເມວບໍ່ເທົ່າກັນ
            if ($email != $rowmp['email']) {
                $check_email = mysqli_query($conn, "SELECT * FROM department_user WHERE email = '$email'");
                if (mysqli_num_rows($check_email) > 0) {
                    echo"<script>";
                    echo"window.location.href='user-supply?email=same';";
                    echo"</script>";
                }else{
                    $result_update = mysqli_query($conn, "call update_userDepartment('$usr_dept_id','$sup_name','$surname','$gender','$tel','$email','$pass','$dept_id','$user_id')");
                    if(!$result_update){
                        echo"<script>";
                        echo"window.location.href='user-department?update=fail';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"window.location.href='user-department?update2=success';";
                        echo"</script>";
                    }
                }
            }
        }
            
    }

    public static function delete_userSupply($user_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;

        $check_user = mysqli_query($conn, "SELECT * FROM adjustdetail WHERE user_id = '$user_id'");
        if (mysqli_num_rows($check_user) > 0) {
            echo"<script>";
                echo"window.location.href='user-supply?delete=warning';";
                echo"</script>";
        }else{
            $result_del_sup = mysqli_query($conn, "call delete_userSupply('$user_id')");
            if(!$result_del_sup){
                echo"<script>";
                echo"window.location.href='user-supply?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='user-supply?del2=success';";
                echo"</script>";
            }
        }
        
    }
  

    public static function select_userHRD(){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        global $result_hrd;
        $result_hrd = mysqli_query($conn,"call userHRD()");      
    }

    public static function insert_HRD($hrd_name,$surname,$gender,$tel,$email,$pass,$user_id,$uni_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        $pass = md5($pass);

        // echo"<script>";
        //     echo"alert('call insert_hrd($hrd_name, $surname, $gender, $tel, $email, $pass, $user_id, $uni_id)');";
        //     echo"</script>";

        $check_email = mysqli_query($conn,"select * from hrd_user where email='$email'");//ກວດສອບອີເມວວ່າມີແລ້ວ ຫຼື ຍັງ
        $check_userHRD = mysqli_query($conn,"select * from hrd_user where user_id='$user_id'");//ກວດສອບວ່າລະຫັດນີ້ມີແລ້ວ ຫຼື ຍັງ
        if(mysqli_num_rows($check_email) > 0){
            echo"<script>";
            echo"window.location.href='user-hrd?email=same';";
            echo"</script>";
        }else if(mysqli_num_rows($check_userHRD) > 0){
            echo"<script>";
            echo"window.location.href='user-hrd?user_id=same';";
            echo"</script>";
        }else{ 

            //ກວດສອບວ່າຜູ້ໃຊ້ນີ້ຖືກກັບ hrd ແລ້ວບໍ່?
            $check_user_stt = mysqli_query($conn, "select * from user where user_id='$user_id'");
            $rowmp = mysqli_fetch_array($check_user_stt, MYSQLI_ASSOC);
            $stt = $rowmp['stt_id'];
            if ($stt == 1 || $stt == 4) {
                $result_hrd = mysqli_query($conn, "call insert_hrd('$hrd_name','$surname','$gender','$tel','$email','$pass','$user_id','$uni_id')");
                if(!$result_hrd){
                    echo"<script>";
                    echo"window.location.href='user-hrd?save=fail';";
                    echo"</script>";
                }
                else{
                    echo"<script>";
                    echo"window.location.href='user-hrd?save2=success';";
                    echo"</script>";
                }

            }else{
                echo"<script>";
                echo"window.location.href='user-hrd?stt=not';";
                echo"</script>";
            }
        }
    }

    public static function update_HRD($hrd_name,$surname,$gender,$tel,$email,$pass,$uni_id,$hrd_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;

        $flag = preg_match('/^[a-f0-9]{32}$/', $pass);
        if($flag){ // flag true means string is a valid md5 encrypation
            echo"";
        }else{
            $pass = md5($pass);
        }

        // echo"<script>";
        //         echo"alert('$pass')";
        //         echo"</script>";

        $resultmp = mysqli_query($conn, "select * from hrd_user where hrd_id='$hrd_id'");
        $rowmp = mysqli_fetch_array($resultmp, MYSQLI_ASSOC);

        //ກວດສອບອີເມວ ແລະ ລະຫັດຜ່ານຖ້າຄືກັນແມ່ນໃຫ້ທຳງານໃນສ່ວນນີ້
        if ($email == $rowmp['email']) {
            $result_update = mysqli_query($conn, "call update_hrd('$hrd_name','$surname','$gender','$tel','$email','$pass','$uni_id','$hrd_id')");
            if(!$result_update){
                echo"<script>";
                echo"window.location.href='user-hrd?update=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='user-hrd?update2=success';";
                echo"</script>";
            }
        }else{
            //ກວດສອບຖ້າອີເມວບໍ່ເທົ່າກັນ
            if ($email != $rowmp['email']) {
                $check_email = mysqli_query($conn, "SELECT * FROM hrd_user WHERE email = '$email'");
                if (mysqli_num_rows($check_email) > 0) {
                    echo"<script>";
                    echo"window.location.href='user-hrd?email=same';";
                    echo"</script>";
                }else{
                    $result_update = mysqli_query($conn, "call update_hrd('$hrd_name','$surname','$gender','$tel','$email','$pass','$uni_id','$hrd_id')");
                    if(!$result_update){
                        echo"<script>";
                        echo"window.location.href='user-hrd?update=fail';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"window.location.href='user-hrd?update2=success';";
                        echo"</script>";
                    }
                }
            }
        }
            
    }

    public static function delete_hrd($user_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;

        $check_quota = mysqli_query($conn, "SELECT * FROM quota_distribute WHERE user_id = '$user_id'");
        $check_fy = mysqli_query($conn, "SELECT * FROM fy WHERE user_id = '$user_id'");

        if (mysqli_num_rows($check_quota) > 0) {
            echo"<script>";
            echo"window.location.href='user-hrd?delete=warning';";
            echo"</script>";
        }else if(mysqli_num_rows($check_fy) > 0){
            echo"<script>";
            echo"window.location.href='user-hrd?delete2=warning';";
            echo"</script>";
        }else{
            $result_del_hrd = mysqli_query($conn, "call delete_hrd('$user_id')");
            if(!$result_del_hrd){
                echo"<script>";
                echo"window.location.href='user-hrd?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='user-hrd?del2=success';";
                echo"</script>";
            }
        }  
    }

    public static function select_department(){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        global $result_dept;
        $result_dept = mysqli_query($conn,"call select_department()");      
    }

    public static function insert_department($dept_id,$dept_name){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;

        $result_dept = mysqli_query($conn, "call insert_department('$dept_id','$dept_name')");
        if(!$result_dept){
            echo"<script>";
            echo"window.location.href='group?save=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='group?save2=success';";
            echo"</script>";
        }
    }
    public static function insert_newadjust($fy_id,$dept_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        $result = mysqli_query($conn, "call insert_newadjust('$fy_id','$dept_id')");
        if(!$result){
            echo"<script>";
            echo"window.location.href='Add-Dept?msg=fail';";
            echo"</script>";
        }
        else{
            if(mysqli_num_rows($result) > 0){
                $row_msg = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $msg = $row_msg["msg"];
                // echo $msg;
                echo"<script>";
                echo"window.location.href='Add-Dept?msg=$msg';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Add-Dept?msg=success';";
                echo"</script>";
            }
        }
    }
    public static function delete_newadjust($adj_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        $result = mysqli_query($conn, "call delete_newadjust('$adj_id')");
        if(!$result){
            echo"<script>";
            echo"window.location.href='Add-Dept?msg=fail';";
            echo"</script>";
        }
        else{
            if(mysqli_num_rows($result) > 0){
                $row_msg = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $msg = $row_msg["msg"];
                // echo $msg;
                echo"<script>";
                echo"window.location.href='Add-Dept?msg=$msg';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='Add-Dept?msg=success';";
                echo"</script>";
            }
        }
    }
    public static function update_department($dept_id,$dept_name){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;

        $result_dept = mysqli_query($conn, "call update_department('$dept_id','$dept_name')");
        if(!$result_dept){
            echo"<script>";
            echo"window.location.href='group?update=fail';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='group?update2=success';";
            echo"</script>";
        }
    }

    public static function delete_department($dept_id){//ລົບຂໍ້ມູນກົມ
        global $conn;

        $check_university = mysqli_query($conn, "SELECT * FROM university WHERE dept_id = '$dept_id'"); //ກວດສອບລະຫັດໃນຕາຕະລາງ university
        $check_adjust = mysqli_query($conn, "SELECT * FROM adjust WHERE dept_id = '$dept_id'"); //ກວດສອບລະຫັດໃນຕາຕະລາງ adjust

        if (mysqli_num_rows($check_university) > 0) {
            echo"<script>";
            echo"window.location.href='group?delete=warning';";
            echo"</script>";
        }else if(mysqli_num_rows($check_adjust) > 0){
            echo"<script>";
            echo"window.location.href='group?delete2=warning';";
            echo"</script>";
        }else if($dept_id = 'HRD001'){
            echo"<script>";
            echo"window.location.href='group?delete3=warning';";
            echo"</script>";
        }else{
            $result_dept = mysqli_query($conn, "call delete_department('$dept_id')");
            if(!$result_dept){
                echo"<script>";
                echo"window.location.href='group?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='group?del2=success';";
                echo"</script>";
            }
        }
    }

    public static function select_level(){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        global $result;
        $result = mysqli_query($conn,"call select_level()");      
    }

    public static function insert_level($level_id,$level_name){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        
        $result_level = mysqli_query($conn, "call insert_level('$level_id','$level_name')");
        if(!$result_level){
            echo"<script>";
            echo"window.location.href='level?msg=fail';";
            echo"</script>";
        }
        else{
            if(mysqli_num_rows($result_level) > 0){
                $msg_row = mysqli_fetch_array($result_level,MYSQLI_ASSOC);
                $msg = $msg_row["msg"];
                echo"<script>";
                echo"window.location.href='level?msg=$msg';";
                echo"</script>";
            }
        }
    }

    public static function update_level($level_id,$level_name){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;
        
        $result_level = mysqli_query($conn, "call update_level('$level_id','$level_name')");
        if(!$result_level){
            echo"<script>";
            echo"window.location.href='level?msg=fail';";
            echo"</script>";
        }
        else{
            if(mysqli_num_rows($result_level) > 0){
                $msg_row = mysqli_fetch_array($result_level,MYSQLI_ASSOC);
                $msg = $msg_row["msg"];
                echo"<script>";
                echo"window.location.href='level?msg=$msg';";
                echo"</script>";
            }
        }
    }

    public static function select_university(){//method ດຶງຂໍ້ມູນວິທະຍາໄລມາສະແດງ
        global $conn;
        global $result_uni;
        $result_uni = mysqli_query($conn,"call select_university()");      
    }

    public static function insert_university($uni_id,$uni_name,$dept_id){//method ເພີ່ມຂໍ້ມູນວິທະຍາໄລ
        global $conn;

        $check_hrd_id = mysqli_query($conn, "SELECT * FROM university WHERE uni_id = '$uni_id'");
        $check_hrd_name = mysqli_query($conn, "SELECT * FROM university WHERE uni_name = '$uni_name'");
        if(mysqli_num_rows($check_hrd_id) > 0){
            echo"<script>";
            echo"window.location.href='university?same=same';";
            echo"</script>";
        }else if(mysqli_num_rows($check_hrd_name) > 0){
            echo"<script>";
            echo"window.location.href='university?same2=same';";
            echo"</script>";
        }else if($dept_id == 'HRD001'){
            echo"<script>";
            echo"window.location.href='university?expect=expect';";
            echo"</script>";
        }else{
            $result_uni = mysqli_query($conn, "call insert_university('$uni_id','$uni_name','$dept_id')");
            if(!$result_uni){
                echo"<script>";
                echo"window.location.href='university?save=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='university?save2=success';";
                echo"</script>";
            }
        }
    }

    public static function update_university($uni_id,$uni_name,$dept_id){//method ເພີ່ມຂໍ້ມູນວິທະຍາໄລ
        global $conn;

        if ($uni_id == 'HRD1') {
            $dept_id = 'HRD001';
        }

            $result_uni = mysqli_query($conn, "call update_university('$uni_id','$uni_name','$dept_id')");
            if(!$result_uni){
                echo"<script>";
                echo"window.location.href='university?save=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='university?save2=success';";
                echo"</script>";
            }
        
    }

    public static function delete_university($uni_id){//method ດຶງຂໍ້ມູນພະນັກງານມາສະແດງ
        global $conn;

        $check_supply = mysqli_query($conn, "SELECT * FROM supply_user WHERE uni_id = '$uni_id'"); //ກວດສອບລະຫັດໃນຕາຕະລາງ supply_user
        $check_faculty = mysqli_query($conn, "SELECT * FROM faculty WHERE uni_id = '$uni_id'"); //ກວດສອບລະຫັດໃນຕາຕະລາງ faculty
        $check_hrd = mysqli_query($conn, "SELECT * FROM hrd_user WHERE uni_id = '$uni_id'"); //ກວດສອບລະຫັດໃນຕາຕະລາງ hrd_user
        

        if (mysqli_num_rows($check_supply) > 0) {
            echo"<script>";
            echo"window.location.href='university?delete=warning';";
            echo"</script>";
        }else if(mysqli_num_rows($check_faculty) > 0){
            echo"<script>";
            echo"window.location.href='university?delete=warning';";
            echo"</script>";
        }else if(mysqli_num_rows($check_hrd) > 0){
            echo"<script>";
            echo"window.location.href='university?delete=warning';";
            echo"</script>";
        }else if($uni_id == 'HRD1'){
            echo"<script>";
            echo"window.location.href='university?delete2=warning';";
            echo"</script>";
        }else{
            $result_uni = mysqli_query($conn, "call delete_university('$uni_id')");
            if(!$result_uni){
                echo"<script>";
                echo"window.location.href='university?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='university?del2=success';";
                echo"</script>";
            }
        }
    }

    public static function select_faculty($uni_id){//method ດຶງຂໍ້ມູນຄະນະມາສະແດງ
        global $conn;
        global $result_fac;
        
        $result_fac = mysqli_query($conn,"call select_faculty('$uni_id')");      
    }

    public static function insert_faculty($fac_id,$fac_name,$uni_id){//method ເພີ່ມຂໍ້ມູນວິທະຍາໄລ
        global $conn;

        $check_id = mysqli_query($conn, "SELECT * FROM faculty WHERE fac_id='$fac_id' AND uni_id='$uni_id'");
        $check_name = mysqli_query($conn, "SELECT * FROM faculty WHERE fac_name='$fac_name' AND uni_id='$uni_id'");

        if (mysqli_num_rows($check_id) > 0) {
            echo"<script>";
            echo"window.location.href='faculty?fac_id=same';";
            echo"</script>";
        }else if(mysqli_num_rows($check_name) > 0){
            echo"<script>";
            echo"window.location.href='faculty?name=same';";
            echo"</script>";
        }else{
            $result_fac = mysqli_query($conn, "call insert_faculty('$fac_id','$fac_name','$uni_id')");
            if(!$result_fac){
                echo"<script>";
                echo"window.location.href='faculty?save=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='faculty?save2=success';";
                echo"</script>";
            }
        }
    }

    public static function update_faculty($fac_id,$fac_name,$uni_id){//method ແກ້ໄຂຂໍ້ມູນວິທະຍາໄລ
        global $conn;

        $check_name = mysqli_query($conn, "SELECT * FROM faculty WHERE fac_name='$fac_name' AND fac_id != '$fac_id' AND uni_id='$uni_id'");

        if (mysqli_num_rows($check_name) > 0) {
            echo"<script>";
            echo"window.location.href='faculty?name_update=same';";
            echo"</script>";
        }else{
            $result_fac = mysqli_query($conn, "call update_faculty('$fac_id','$fac_name','$uni_id')");
            if(!$result_fac){
                echo"<script>";
                echo"window.location.href='faculty?update=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='faculty?update2=success';";
                echo"</script>";
            }
        }
    }

    public static function delete_faculty($fac_id){//method ລົບຂໍ້ມູນຄະນະ
        global $conn;

        $check_course = mysqli_query($conn, "SELECT * FROM course WHERE fac_id='$fac_id'"); //ກວດສອບຂໍ້ມູນໃນ course

        if (mysqli_num_rows($check_course) > 0) {
            echo"<script>";
            echo"window.location.href='faculty?delete=warning';";
            echo"</script>";
        }else{
            $result_fac = mysqli_query($conn, "call delete_faculty('$fac_id')");
            if(!$result_fac){
                echo"<script>";
                echo"window.location.href='faculty?del=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='faculty?del2=success';";
                echo"</script>";
            }
        }
    }

    public static function select_course($uni_id){//method ດຶງຂໍ້ມູນຄະນະມາສະແດງ
        global $conn;
        global $result_course;
        $result_course = mysqli_query($conn,"call select_course('$uni_id')");      
    }

    public static function insert_course($course_id,$course_name,$fac_id,$level_id){//method ເພີ່ມຂໍ້ມູນວິທະຍາໄລ
        global $conn;

        $check_id = mysqli_query($conn, "SELECT * FROM course WHERE course_id='$course_id'"); //ກວດສອບລະຫັດວ່າຖືກໃຊ້ງານແລ້ວບໍ່
        // $check_name = mysqli_query($conn, "SELECT * FROM course WHERE course_name='$course_name' AND course_id!='$course_id'"); //ກວດສອບຊື່ວ່າມີແລ້ວຫຼືບໍ່

        if (mysqli_num_rows($check_id) > 0) {
            echo"<script>";
            echo"window.location.href='course?course_id=same';";
            echo"</script>";
        // }else if(mysqli_num_rows($check_name) > 0){
        //     echo"<script>";
        //     echo"window.location.href='course?name=same';";
        //     echo"</script>";
        }else{
            $result_course = mysqli_query($conn, "call insert_course('$course_id','$course_name','$fac_id','$level_id')");
            if(!$result_course){
                echo"<script>";
                echo"window.location.href='course?save=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='course?save2=success';";
                echo"</script>";
            }
        }
    }

    public static function update_course($course_id,$course_name,$fac_id,$level_id){//method ແກ້ໄຂຂໍ້ມູນວິທະຍາໄລ
        global $conn;

        // $check_name = mysqli_query($conn, "SELECT * FROM course WHERE course_name='$course_name' AND course_id != '$course_id'"); //ກວດສອບຊື່ເວລາອັບເດດ

        // if (mysqli_num_rows($check_name) > 0) {
        //     echo"<script>";
        //     echo"window.location.href='course?name_update=same';";
        //     echo"</script>";
        // }else{
            $result_course = mysqli_query($conn, "call update_course('$course_id','$course_name','$fac_id','$level_id')");
            if(!$result_course){
                echo"<script>";
                echo"window.location.href='course?update=fail';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"window.location.href='course?update2=success';";
                echo"</script>";
            }
        // }
    }

    public static function delete_course($course_id){//method ລົບຂໍ້ມູນຄະນະ
        global $conn;

        $check_plan = mysqli_query($conn, "SELECT * FROM create_plan WHERE course_id='$course_id'"); //ກວດສອບຂໍ້ມູນໃນ create plan
        $check_adjust = mysqli_query($conn, "SELECT * FROM adjustdetail WHERE course_id='$course_id'"); //ກວດສອບຂໍ້ມູນໃນ adjustdetail

        if (mysqli_num_rows($check_plan) > 0) {
            echo"<script>";
            echo"window.location.href='course?delete=warning';";
            echo"</script>";
        }elseif(mysqli_num_rows($check_adjust) > 0){
            echo"<script>";
            echo"window.location.href='course?delete=warning';";
            echo"</script>";
        }else{
            $result_course = mysqli_query($conn, "call delete_course('$course_id')");
            if(!$result_course){
                echo"<script>";
                echo"window.location.href='course?del=fail';";
                echo"</script>";
            }else{
                echo"<script>";
                echo"window.location.href='course?del2=success';";
                echo"</script>";
            }
        }
    }

    public static function select_type(){//method ດຶງຂໍ້ມູນຄະນະມາສະແດງ
        global $conn;
        global $result_type;
        $result_type = mysqli_query($conn,"CALL select_documentType()");      
    }

    public static function insert_type($name){
        global $conn;

        $check = mysqli_query($conn, "SELECT * FROM document_Type WHERE doc_name = '$name'");

        if(mysqli_num_rows($check) > 0){
            echo"<script>";
            echo"window.location.href='type?name=same';";
            echo"</script>";
        }else{
            $result = mysqli_query($conn, "call insert_documentType('$name')");
            if (!$result) {
                echo"<script>";
                echo"window.location.href='type?save=fail';";
                echo"</script>";
            }else{
                echo"<script>";
                echo"window.location.href='type?save2=success';";
                echo"</script>";
            }
        }
    }

    public static function update_type($id,$name){
        global $conn;

        $check = mysqli_query($conn, "SELECT * FROM document_type WHERE doc_name = '$name' and doc_id != '$id'");

        if(mysqli_num_rows($check) > 0){
            echo"<script>";
            echo"window.location.href='type?name=same';";
            echo"</script>";
        }else{
            $result = mysqli_query($conn, "call update_documentType('$name','$id')");
            if (!$result) {
                echo"<script>";
                echo"window.location.href='type?update=fail';";
                echo"</script>";
            }else{
                echo"<script>";
                echo"window.location.href='type?update2=success';";
                echo"</script>";
            }
        }
    }

    public static function select_upload(){//method ດຶງຂໍ້ມູນຄະນະມາສະແດງ
        global $conn;
        global $result_upload;
        $result_upload = mysqli_query($conn,"CALL select_document_Upload()");      
    }

    public static function insert_upload($doc_id,$fy_id,$desc,$profile_path,$pdf_file){
        global $conn;
        global $path;

        if($profile_path == ""){
            $Pro_image = "";
        }
        else{
            $ext = pathinfo(basename($_FILES["Cover"]["name"]), PATHINFO_EXTENSION);
            $new_image_name = "Cover_".uniqid().".".$ext;
            $image_path = $path."image/";
            $upload_path = $image_path.$new_image_name;
            move_uploaded_file($_FILES["Cover"]["tmp_name"], $upload_path);
            $Pro_image = $new_image_name;
        }

        if($pdf_file == ""){
            $pdf = "";
        }
        else{
            $ext2 = pathinfo(basename($_FILES["pdf_file"]["name"]), PATHINFO_EXTENSION);
            $new_pdf_name = "pdf_".uniqid().".".$ext2;
            $pdf_file2 = $path."image/pdf/";
            $upload_pdf = $pdf_file2.$new_pdf_name;
            move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $upload_pdf);
            $pdf = $new_pdf_name;
        }

            $result = mysqli_query($conn, "call insert_documentUpload('$doc_id','$fy_id','$desc','$Pro_image',curdate(),'$pdf')");
            if (!$result) {
                echo"<script>";
                echo"window.location.href='upload?save=fail';";
                echo"</script>";
            }else{
                echo"<script>";
                echo"window.location.href='upload?save2=success';";
                echo"</script>";
            }
    }

    public static function update_upload($up_id,$doc_id,$fy_id,$desc,$profile_path,$pdf_file){
        global $conn;
        global $path;

        $query = mysqli_query($conn, "SELECT cover,file_upload FROM document_upload WHERE up_id='$up_id'"); //ກວດສອບຮູບຖ້າຫາກມີການປ່ຽນແປງ
        $data = mysqli_fetch_array($query,MYSQLI_ASSOC);

        // check image file
        if($profile_path == ""){
            $Pro_image = $data['cover'];
        }
        else{
            $ext = pathinfo(basename($_FILES["Cover_update"]["name"]), PATHINFO_EXTENSION);
            $new_image_name = "Cover_".uniqid().".".$ext;
            $image_path = $path."image/";
            $upload_path = $image_path.$new_image_name;
            move_uploaded_file($_FILES["Cover_update"]["tmp_name"], $upload_path);
            $Pro_image = $new_image_name;

            $path2 = $image_path.$data['cover'];
            if(file_exists($path2) && !empty($data['cover'])){
                unlink($path2);
            }
        }
        // check pdf file
        if($pdf_file == ""){
            $pdf = $data['file_upload'];
        }
        else{
            $ext2 = pathinfo(basename($_FILES["pdf_file_update"]["name"]), PATHINFO_EXTENSION);
            $new_pdf_name = "pdf_".uniqid().".".$ext2;
            $pdf_path = $path."image/pdf/";
            $upload_path = $pdf_path.$new_pdf_name;
            move_uploaded_file($_FILES["pdf_file_update"]["tmp_name"], $upload_path);
            $pdf = $new_pdf_name;

            $pdf2 = $pdf_path.$data['file_upload'];
            if(file_exists($pdf2) && !empty($data['file_upload'])){
                unlink($pdf2);
            }
        }

            $result = mysqli_query($conn, "call update_documentUpload('$doc_id','$fy_id','$desc','$Pro_image',curdate(),'$pdf','$up_id')");
            if (!$result) {
                echo"<script>";
                echo"window.location.href='upload?update=fail';";
                echo"</script>";
            }else{
                echo"<script>";
                echo"window.location.href='upload?update2=success';";
                echo"</script>";
            }
    }

    public static function select_fy(){
        global $conn;
        global $result;

        $result = mysqli_query($conn, "call select_fy();");
    }

    public static function insert_fy($fy_id,$year,$qty_s,$qty_c,$qty_i,$qty_q,$status,$pdf_file){
        global $conn;
        global $path;

        $check_id = mysqli_query($conn, "SELECT * FROM fy WHERE fy_id = '$fy_id'");

        if(mysqli_num_rows($check_id)){
            echo"<script>";
            echo"window.location.href='year?name=same';";
            echo"</script>";
        }else{
            if($pdf_file == ""){
                $pdf = "";
            }
            else{
                $ext2 = pathinfo(basename($_FILES["pdf"]["name"]), PATHINFO_EXTENSION);
                $new_pdf_name = "fy_".uniqid().".".$ext2;
                $pdf_file = $path."image/pdf/";
                $upload_pdf = $pdf_file.$new_pdf_name;
                move_uploaded_file($_FILES["pdf"]["tmp_name"], $upload_pdf);
                $pdf = $new_pdf_name;
            }
            $result = mysqli_query($conn, "call insert_fy('$pdf','$year','$status','$fy_id','$qty_s','$qty_c','$qty_i','$qty_q');");
            if (!$result) {
                echo"<script>";
                echo"window.location.href='year?save=fail';";
                echo"</script>";
            }else{
                echo"<script>";
                echo"window.location.href='year?save2=success';";
                echo"</script>";
            }
        }
    }

    public static function update_fy($fy_id,$year,$qty_s,$qty_c,$qty_i,$qty_q,$status,$pdf_file){
        global $conn;
        global $path;

        $query = mysqli_query($conn, "SELECT file_path FROM fy WHERE fy_id='$fy_id'");
        $data = mysqli_fetch_array($query, MYSQLI_ASSOC);

        if($pdf_file == ""){
            $pdf = $data['file_path'];
        }
        else{
            $pdf_path2 = $path."image/pdf/";
            $pdf2 = $pdf_path2.$data['file_path'];
            if(file_exists($pdf2) && !empty($data['file_path'])){
                unlink($pdf2);
            }
            $ext2 = pathinfo(basename($_FILES["file_update"]["name"]), PATHINFO_EXTENSION);
            $new_pdf_name = "fy_".uniqid().".".$ext2;
            $pdf_path = $path."image/pdf/";
            $upload_path = $pdf_path.$new_pdf_name;
            move_uploaded_file($_FILES["file_update"]["tmp_name"], $upload_path);
            $pdf = $new_pdf_name;

        
        }
            $result = mysqli_query($conn, "call update_fy('$pdf','$year','$status','$qty_s','$qty_c','$qty_i','$qty_q','$fy_id');");
            if (!$result) {
                echo"<script>";
                echo"window.location.href='year?update=fail';";
                echo"</script>";
            }else{
                echo"<script>";
                echo"window.location.href='year?update2=success';";
                echo"</script>";
            }
    }

    public static function insert_createPlan($item){
        global $conn;
        global $path;

        $result = mysqli_query($conn, "call insert_createPlan('$item')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='new-demand?save=fail';";
            echo"</script>";
        }else{
            echo"<script>";
            echo"window.location.href='new-demand?save2=success';";
            echo"</script>";
        }
    }

    public static function update_createPlan($item){
        global $conn;
        global $path;

        $result = mysqli_query($conn, "call update_createPlan('$item')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='edit-demand?save=fail';";
            echo"</script>";
        }else{
            echo"<script>";
            echo"window.location.href='edit-demand?save2=success';";
            echo"</script>";
        }
    }

    public static function insert_get_plan($item){
        global $conn;
        global $path;

        $result = mysqli_query($conn, "call insert_getplan('$item')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='new-supply?save=fail';";
            echo"</script>";
        }else{
            echo"<script>";
            echo"window.location.href='new-supply?save2=success';";
            echo"</script>";
        }
    }
    public static function update_get_plan($item){
        global $conn;
        global $path;

        $result = mysqli_query($conn, "call update_getplan('$item')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='edit-supply?save=fail';";
            echo"</script>";
        }else{
            echo"<script>";
            echo"window.location.href='edit-supply?save2=success';";
            echo"</script>";
        }
    }
    public static function dept_approve($item,$adj_id){
        global $conn;
        global $path;

        $result = mysqli_query($conn, "call dept_approve('$item','$adj_id')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='edit-supply?save=fail';";
            echo"</script>";
        }else{
            echo"<script>";
            echo"window.location.href='edit-supply?save2=success';";
            echo"</script>";
        }
    }

    public static function insert_adjust_detail($item){
        global $conn;
        global $path;

        $result = mysqli_query($conn, "call adjust_detail('$item')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='share?save=fail';";
            echo"</script>";
        }else{
            echo"<script>";
            echo"window.location.href='share?save2=success';";
            echo"</script>";
        }
    }

    public static function insert_quota_distribute($item){
        global $conn;
        global $path;

        $result = mysqli_query($conn, "call insert_quota_distribute('$item')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='distribute?save=fail';";
            echo"</script>";
        }else{
            echo"<script>";
            echo"window.location.href='distribute?save2=success';";
            echo"</script>";
        }
    }

    public static function update_quota_distribute($item){
        global $conn;
        global $path;

        $result = mysqli_query($conn, "call update_quota_distribute('$item')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='edit-distribute?save=fail';";
            echo"</script>";
        }else{
            echo"<script>";
            echo"window.location.href='edit-distribute?save2=success';";
            echo"</script>";
        }
    }

    public static function select_province(){
        global $conn;
        global $result;

        $result = mysqli_query($conn, "call select_province()");
    }
    public static function select_adjust(){
        global $conn;
        global $result;

        $result = mysqli_query($conn, "call select_adjust()");
    }

    public static function insert_province($p_m_name,$p_stt){
        global $conn;

        $result = mysqli_query($conn, "call insert_province('$p_m_name','$p_stt')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='province?msg=fail';";
            echo"</script>";
        }else{
            if(mysqli_num_rows($result) > 0){
                $msg_row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $msg = $msg_row['msg'];
                echo"<script>";
                echo"window.location.href='province?msg=$msg';";
                echo"</script>";
            }
        }
    }

    public static function update_province($p_m_id,$p_m_name,$p_stt){
        global $conn;

        $result = mysqli_query($conn, "call update_province('$p_m_id','$p_m_name','$p_stt')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='province?msg=fail';";
            echo"</script>";
        }else{
            if(mysqli_num_rows($result) > 0){
                $msg_row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $msg = $msg_row['msg'];
                echo"<script>";
                echo"window.location.href='province?msg=$msg';";
                echo"</script>";
            }
        }
    }

    public static function insert_statistic_detail($adj_id,$st_ID,$std_high_school,$univer,$univer_val,$prov,$intv,$ad_test,$std_pub,$emp,$std_handi,$std_lan,$ssk,$std,$emp_gov,$test,$std_con,$std_2lan,$std_inter,$emp_private,$user_id){
        global $conn;

        $result = mysqli_query($conn, "call insert_statistic_detail('$adj_id','$st_ID','$std_high_school','$univer','$univer_val','$prov','$intv','$ad_test','$std_pub','$emp','$std_handi','$std_lan','$ssk','$std','$emp_gov','$test','$std_con','$std_2lan','$std_inter','$emp_private','$user_id')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='statistic?msg=fail';";
            echo"</script>";
        }else{
            echo"<script>";
            echo"window.location.href='statistic?msg=success';";
            echo"</script>";
        }
    }

    public static function update_statistic_detail($as_id,$std_high_school,$univer,$univer_val,$prov,$intv,$ad_test,$std_pub,$emp,$std_handi,$std_lan,$ssk,$std,$emp_gov,$test,$std_con,$std_2lan,$std_inter,$emp_private,$user_id){
        global $conn;

        $result = mysqli_query($conn, "call update_statistic_detail('$as_id','$std_high_school','$univer','$univer_val','$prov','$intv','$ad_test','$std_pub','$emp','$std_handi','$std_lan','$ssk','$std','$emp_gov','$test','$std_con','$std_2lan','$std_inter','$emp_private','$user_id')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='statistic?msg=fail';";
            echo"</script>";
        }else{
            echo"<script>";
            echo"window.location.href='statistic?msg=success';";
            echo"</script>";
        }
    }

    public static function insert_statistic_distribute($item){
        global $conn;

        $result = mysqli_query($conn, "call insert_statistic_distribute('$item')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='statistic?msg=fail';";
            echo"</script>";
        }else{
            echo"<script>";
            echo"window.location.href='statistic?msg=success';";
            echo"</script>";
        }
    }

    public static function update_statistic_distribute($item){
        global $conn;

        $result = mysqli_query($conn, "call update_statistic_distribute('$item')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='statistic?msg=fail';";
            echo"</script>";
        }else{
            echo"<script>";
            echo"window.location.href='statistic?msg=success';";
            echo"</script>";
        }
    }

    public static function select_statistic_group(){
        global $conn;
        global $result;

        $result = mysqli_query($conn, "call select_statistic_group()");
    }

    public static function insert_statistic_group($group_name,$dept){
        global $conn;

        $result = mysqli_query($conn, "call insert_statistic_group('$group_name','$dept')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='group-st?msg=fail';";
            echo"</script>";
        }else{
            if(mysqli_num_rows($result) > 0){
                $msg_row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $msg = $msg_row['msg'];
                echo"<script>";
                echo"window.location.href='group-st?msg=$msg';";
                echo"</script>";
            }
        }
    }

    public static function update_statistic_group($group_id,$group_name,$dept){
        global $conn;

        $result = mysqli_query($conn, "call update_statistic_group('$group_id','$group_name','$dept')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='group-st?msg=fail';";
            echo"</script>";
        }else{
            if(mysqli_num_rows($result) > 0){
                $msg_row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $msg = $msg_row['msg'];
                echo"<script>";
                echo"window.location.href='group-st?msg=$msg';";
                echo"</script>";
            }
        }
    }

    public static function select_statistic(){
        global $conn;
        global $result;

        $result = mysqli_query($conn, "call select_statistic()");
    }

    public static function insert_statistic($st_name,$group,$level_id){
        global $conn;

        $result = mysqli_query($conn, "call insert_statistic('$st_name','$group','$level_id')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='statistic?msg=fail';";
            echo"</script>";
        }else{
            if(mysqli_num_rows($result) > 0){
                $msg_row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $msg = $msg_row['msg'];
                echo"<script>";
                echo"window.location.href='statistic?msg=$msg';";
                echo"</script>";
            }
        }
    }

    public static function update_statistic($st_id,$st_name,$dept,$level_id){
        global $conn;

        $result = mysqli_query($conn, "call update_statistic('$st_id','$st_name','$dept','$level_id')");
        if (!$result) {
            echo"<script>";
            echo"window.location.href='statistic?msg=fail';";
            echo"</script>";
        }else{
            if(mysqli_num_rows($result) > 0){
                $msg_row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $msg = $msg_row['msg'];
                echo"<script>";
                echo"window.location.href='statistic?msg=$msg';";
                echo"</script>";
            }
        }
    }
}
$obj = new obj();

?>