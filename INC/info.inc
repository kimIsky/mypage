<?php
// DB 정보
    $dbhost = "localhost";
    $dbid = "c12st13";
    $dbpw = "LKIKsNZqInF8NqaO";
    $dbname = "c12st13";

// SQL 쿼리 정보
    @$check_query = "SELECT `id`, `pw` FROM `mypage` WHERE `id` = '{$_POST['id']}'";
    @$admin_query = "SELECT * FROM `mypage`";
    @$member_query = "SELECT * FROM `mypage` WHERE `id`='{$_SESSION['id']}'";
    @$del_query = "DELETE FROM `mypage` WHERE `number`= '{$_GET['no']}'";
    @$add_query = "INSERT `mypage` SET `id` = '{$_SESSION['id']}', `pw` = '{$_SESSION['pw']}', `kt` = '{$_POST['category']}', `title` = '{$_POST['title']}', `url` = '{$_POST['url']}', `date` = '{$_POST['date']}', `info` = '{$_POST['info']}',`checknum` = '1'";
    @$update_query = "UPDATE `mypage` SET kt='{$_POST['category']}', title='{$_POST['title']}', url='{$_POST['url']}', date='{$_POST['date']}', info='{$_POST['info']}' WHERE number='{$_GET['no']}'";
    @$search_all_query = "SELECT * FROM `mypage` WHERE id='{$_SESSION['id']}' AND (title LIKE '%{$_GET['sc_input']}' OR  title LIKE '%{$_GET['sc_input']}%' OR title LIKE '{$_GET['sc_input']}%')";
    @$search_admin_query = "SELECT * FROM `mypage` WHERE title LIKE '{$_GET['sc_input']}%' OR title LIKE '%{$_GET['sc_input']}' OR title LIKE '%{$_GET['sc_input']}%'";	
 ?>