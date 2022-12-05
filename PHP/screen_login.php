<?php
include "./val.php";
//로그인 바디
echo <<<END
<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poor+Story&display=swap" rel="stylesheet">
        <script src="../JS/jquery/jq.js"></script>
		<link rel="stylesheet" href="../CSS/dist/mypage.css">
        <title>$login_page</title>
        <link rel="shortcut icon" type="image" href="../IMG/logo.png">                
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">		
	<style>
	</style>
	</head>
	<body>
        <section id="pop_up" class="pop_up pop_mar"></div><p id="x_box" class="x_box">X</p><p id="re_box" class="re_box login_color">캡차불일치</p></section>        
        <img class="main_logo" src="../IMG/logo.png" alt="logo_img">
        <img class="admin_logo" id="admin_in" src="../IMG/icons1.png" alt="icons1_img">
        <img class="member_logo" id="member_in" src="../IMG/icons2.png" alt="icons2_img">
        <div class="log_box">
            <header class="tl_box">My page</header>
            <form class="sb_box" action="./login.php" method="POST">
                <input class="idp_box" id="in_id" name="id" type="text" maxlength=10 placeholder="  아이디" required>
                <input class="idp_box" id="in_pw" name="pw" type="password" maxlength=20 placeholder="  비밀번호" required>
                <canvas id="my_canvas" class="cap_box"></canvas>
                <input class="check_num" type="text" id="check_num" maxlength=4 name="cp" required>
                <div class="ref_bt" id="ref_bt">&#8635;</div>
                <input id="in_bt" class="in_bt" type="submit" name="submit" value="로그인">                
            </form>
        </div>
        <script src="../JS/mypage.js"></script>
	</body>
</html>          
END
?>
