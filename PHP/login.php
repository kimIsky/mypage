<?php
session_start();
include "./val.php";
include "../INC/info.inc";
if(!@$_POST['id'] && !@$_POST['pw']){
    include './screen_login.php';
} else if(@!$_SESSION['id'] && @!$_SESSION['pw']){
    function db_open( $host_db, $account_db, $password_db, $name_db){
        //DB접속
        ($db_handler = mysqli_connect("$host_db", "$account_db", "$password_db", "$name_db"))
        || print "<script>alert(\"DB 연결 실패\"); location.href=\"./screen_login.php\";</script>";
        //Use DB
        !mysqli_select_db($db_handler, $name_db)
        && print "<script>alert(\"DB 선택 실패\"); location.href=\"./screen_login.php\";</script>";
        return $db_handler;
    }
    //LOGIN
    function check_admin( $db_handler, $check_id, $check_pw, $run_query){
        ($db_content = mysqli_query($db_handler, $run_query))
        || print "<script>alert(\"쿼리 실패\"); location.href=\"./screen_login.php\";</script>";
        mysqli_num_rows($db_content) == 0 && print "<script>location.href=\"./no_login.php\";</script>";
        if(($check_record = mysqli_fetch_assoc($db_content)) 
            && ($check_record['pw'] == md5($check_pw) 
            && $check_record['id'] == $check_id)){
                $_SESSION['id'] = $check_id;
                $_SESSION['pw'] = md5($check_pw);
                print "<script>location.reload();</script>";
        } else {
            mysqli_free_result($db_content);
            mysqli_close($db_handler);
            print "<script>location.href=\"./no_login.php\";</script>";
        }
    }
    //DB접속
    $ok_handler = db_open( $dbhost, $dbid, $dbpw, $dbname);
    //LOGIN
    check_admin($ok_handler, $_POST['id'], $_POST['pw'], $check_query);
} else {
    include "./main.php";
}
?>