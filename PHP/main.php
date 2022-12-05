<?php
	//세션 확인 및 로그아웃
	@session_start();
	include './val.php';
	include "../INC/info.inc";
	if(!$_SESSION['id'] || @$_GET['logout'] == "ok"){
		session_destroy();
		echo "<script>location.href=\"./login.php\"</script>";
	}
?>
<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
        <link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poor+Story&display=swap" rel="stylesheet">
        <script src="../JS/jquery/jq.js"></script>		
		<link rel="stylesheet" href="../CSS/dist/mypage.css">
		<title><?=$site_title?></title>
		<link rel="shortcut icon" type="image" href="../IMG/logo.png"> 
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">		
	<style>
	</style>
	</head>
	<body>
		<header class="top_box">
			<p class="in_t">안녕하세요. (<?=$_SESSION['id']?>)님</p>
			<p id="new_bt" class="out_bt pw_bt">비밀번호 변경</p>
			<p class="out_bt"><a class="a_bt" href="./main.php?logout=ok">Logout</a></p>
		<section id="pop_up" class="pop_up"><p id="x_box" class="x_box">X</p><p id="re_box" class="re_box">추가되었습니다.</p></section>
		<section id="del_pop" class="del_pop"><p id="x_box" class="x_box">X</p><p id="re_box" class="re_box">정말 삭제하시겠습니까?</p><input class="del_bt" id="del_ok" type="button" name="del_ok" value="확인"><input class="del_bt" id="del_no" type="button" name="del_no" value="취소"></section>		
		<section id="new_pop" class="del_pop"><p id="x_box" class="x_box">X</p><p id="re_box" class="re_box">정말 변경하시겠습니까?</p><form class="real_box" method="POST" action="./main.php"><input id="no1_pw" type="hidden" name="no1_pw"><input id="no2_pw" type="hidden" name="no2_pw"><input class="del_bt" id="new_ok" type="submit" name="submit" value="확인"><button class="del_bt" id="new_no" type="button" name="new_no">취소</button></form></section>				
		</header>		
		<form class="add_box" method="POST" action="./main.php">
			<h1 class="title_mid">WRITE</h1>
			<select class="add_in_kt" name="category">
				<option value="선택">선택</option>				
				<option value="검색">검색</option>
				<option value="학습">학습</option>
				<option value="취미">취미</option>
				<option value="금융">금융</option>
				<option value="쇼핑">쇼핑</option>
				<option value="기타">기타</option>
			</select>
			<input class="add_in_tt" maxlength="30" type="text" name="title" placeholder=" 제목 입력" required>
			<input class="add_in_url" type="url" name="url" placeholder=" URL 입력" required>
			<input class="add_in_date" type="date" name="date" required>
			<input class="add_in_info" type="text" name="info" maxlength="30" placeholder=" 간단한 소개" required>
			<input class="add_in_bt" type="submit" name="submit" value="추가">
		</form>
		<form action="./main.php" class="search_box" method="GET">
			<h1 class="title_ss">SEARCH</h1>			
			<input class="sc_input" type="text" maxlength="30" name="sc_input" placeholder=" 검색 단어 입력">
			<input class="sc_bt" type="submit" name="submit" value="검색">
			<button id="return_bt" class="sc_bt">전체조회</button>
		</form>
		<div class="mid_title"><p>LIST</p></div>
		<div class="in_re_pw">
			<input id ="in_pw1" class="in_pw" type="password" name="in_pw" placeholder=" 현재 비밀번호 입력">
			<input id="in_pw2" class="in_pw" type="password" name="new_pw" placeholder=" 새로운 비밀번호 입력">
			<input id="in_pw3" class="in_pw" type="password" name="last_pw" placeholder=" 새로운 비밀번호 재입력">
			<button class="new_pw_in" id="new_pw_in">변경</button>
			<button id="no_bt" class="no_bt">닫기</button>
		</div>	
	</body>
	<script>
		$(this).on("click", function(e){
			switch(e.target.id){
				case 'new_bt' :
				$(".in_re_pw").css("display", "block");
				break;

				case 'new_pw_in' :
				if( $("#in_pw2").val() == $("#in_pw3").val() ){
					$("#no1_pw").val($("#in_pw1").val());
					$("#no2_pw").val($("#in_pw2").val());
					$("#new_pop").css("display", "block");
					if( $("#in_pw1").val() == $("#in_pw3").val() || $("#in_pw1").val() == $("#in_pw2").val() ){
						$("#re_box").html("이전 비밀번호와 일치합니다. 다시 입력해주세요.").css("font-size", "15px");
						$("#pop_up").css("display", "block");
					}
				} else {
					$("#re_box").html("새로운 비밀번호가 일치하지 않습니다.").css("font-size", "15px");
					$("#pop_up").css("display", "block");
				}
				break;

				case 'no_bt':
				$(".in_re_pw").css("display", "none");
				break;
				
				case 'x_box':
				$("#pop_up").css("display", "none");
				$("#del_pop").css("display", "none");
				$("#new_pop").css("display", "none");
				$("#in_pw1").val("");
				$("#in_pw2").val("");
				$("#in_pw3").val("");
				break;

				case 'return_bt' :
				location.href="./main.php";
				break;
			}
		});
	</script>
</html>		
<?php
	include './val.php';
	include "../INC/info.inc";
	function db_open( $host_db, $account_db, $password_db, $name_db){
        //DB접속
        ($db_handler = mysqli_connect("$host_db", "$account_db", "$password_db", "$name_db"))
        || print "<script>alert(\"DB 연결 실패\"); location.href=\"./screen_login.php\";</script>";
        //Use DB
        !mysqli_select_db($db_handler, $name_db)
        && print "<script>alert(\"DB 선택 실패\"); location.href=\"./screen_login.php\";</script>";
        return $db_handler;
    }
	//조회/검색
	function total_query( $db_handler, $run_query){
		$i = 1;
		($db_put = mysqli_query($db_handler, $run_query))
		|| print "<script>alert(\"쿼리 실패{$run_query}\"); location.href=\"./screen_login.php\";</script>";		
		mysqli_num_rows($db_put) == 0 && print "<div class=\"no_search\">검색결과가 없습니다.</div>";
		while($all_record = mysqli_fetch_assoc($db_put)){
			echo "<div class=\"back_box\">";
			echo "<form class=\"in_data\" method=\"POST\" action=\"./main.php?no={$all_record['number']}\">";
			echo "<p class=\"number_ing\">{$i}</p>";
			echo "<select class=\"data_in_kt\" name=\"category\"><option value={$all_record['kt']}>{$all_record['kt']}<option value=\"검색\">검색</option><option value=\"학습\">학습</option><option value=\"취미\">취미</option><option value=\"금융\">금융</option><option value=\"쇼핑\">쇼핑</option><option value=\"기타\">기타</option></select>";
			echo "<input class=\"data_in_tt\" type=\"text\" maxlength=\"30\" name=\"title\" value=\"{$all_record['title']}\"><input class=\"data_in_url\" type=\"url\" name=\"url\" value=\"{$all_record['url']}\"><a class=\"data_in_move\" href=\"{$all_record['url']}\" target=\"_blank\">이동</a><input class=\"data_in_date\" type=\"date\" name=\"date\" value=\"{$all_record['date']}\"><input class=\"data_in_info\" type=\"text\" maxlength=\"30\" name=\"info\" value=\"{$all_record['info']}\"><span class=\"data_in_id\">작성자 : {$all_record['id']}</span><input class=\"data_in_bt\" type=\"submit\" name=\"submit\" value=\"수정\"><input class=\"data_in_bt data_in_bt_c\" id=\"del_bt\" type=\"submit\" name=\"submit\" value=\"삭제\">";
			echo "</form></div>";
			$i++;
		}
	}
	//추가&수정
	function plus_query( $db_handler, $etc_query){
		$db_put = mysqli_query($db_handler, $etc_query);
		if($db_put === false ){
			echo mysqli_error($db_handler);
		} else {
			echo "<script>location.href=\"./search.php?a={$_POST['submit']}&num={$_GET['no']}\";</script>";
		}
	}
	//삭제	
	function delete_query( $db_handler, $del_query){
		$db_put = mysqli_query($db_handler, $del_query);
		if($db_put === false ){
			echo mysqli_error($db_handler);
		} else {
			echo "<script>location.href=\"./main.php\";</script>";
		}
	}
	//비밀번호 변경
	function new_pw_query( $db_handler, $etc_query, $start_query){
		($db_put = mysqli_query($db_handler, $etc_query))
		|| print "<script>alert(\"쿼리 실패{$etc_query}\");</script>";
		if( mysqli_num_rows($db_put) == 0 ){
			echo "<script>$(\"#re_box\").html(\"현재 비밀번호 불일치\"); $(\"#pop_up\").css(\"display\", \"block\");</script>";
		} else {		
			($new_put = mysqli_query($db_handler, $start_query))|| print "<script>alert(\"쿼리 실패{$start_query}\");</script>";
			if($new_put === false ){
				echo mysqli_error($db_handler);
			} else {
				echo "<script>location.href=\"./main.php?logout=ok\";</script>";
			}
		}
	}
	$ok_handler = db_open( $dbhost, $dbid, $dbpw, $dbname);
	//비밀번호 변경 쿼리 정보
	$id = $_SESSION['id'];
	$pw = $_SESSION['pw'];
	$no1_pw = md5(@$_POST['no1_pw']);
	$no2_pw = md5(@$_POST['no2_pw']);
	$b_query = "SELECT id, pw FROM `mypage` WHERE id='{$id}' AND pw='{$no1_pw}'";
	$n_query = "UPDATE `mypage` SET pw='{$no2_pw}' WHERE id='{$id}'";

	//관리자 및 일반회원 구분
	if($id == 'admin'){
		if(@$_GET['submit'] == '검색'){
				total_query($ok_handler, $search_admin_query);
		} else {
			total_query($ok_handler, $admin_query);
		}
	} else {
		if(@$_GET['submit'] == '검색'){
			total_query($ok_handler, $search_all_query);
		} else {
			total_query($ok_handler, $member_query);
		}
	}
	//submit의 값별 액션
	switch(@$_POST['submit']){
		case '추가' :
			plus_query($ok_handler, $add_query);
			break;
		case '삭제' :
			echo "<script>location.href=\"./search.php?a={$_POST['submit']}&num={$_GET['no']}\";</script>";
			break;
		case '수정' :
			plus_query($ok_handler, $update_query);
			break;
		case '확인' :
			new_pw_query( $ok_handler, $b_query, $n_query);
			break;				
	}
	if(@$_GET['del'] == 'ok' ){
		delete_query($ok_handler, $del_query);
	}
?>

