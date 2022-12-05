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
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" type="image" href="../IMG/logo.png"> 		
	<style>
	</style>
	</head>
	<body>
		<header class="top_box">
			<p class="in_t">안녕하세요. (<?=$_SESSION['id']?>)님</p>
			<p class="out_bt pw_bt">비밀번호 변경</p>
			<p class="out_bt"><a class="a_bt" href="./main.php?logout=ok">Logout</a></p>
		</header>
		<section id="pop_up" class="pop_up"><p id="x_box" class="x_box">X</p><p id="re_box" class="re_box">추가되었습니다.</p></section>
		<section id="del_pop" class="del_pop"><p id="x_box" class="x_box">X</p><p id="re_box" class="re_box">정말 삭제하시겠습니까?</p><input class="del_bt" id="del_ok" type="button" name="del_ok" value="확인"><input class="del_bt" id="del_no" type="button" name="del_no" value="취소"></section>		
		<section id="new_pop" class="del_pop"><p id="x_box" class="x_box">X</p><p id="re_box" class="re_box">정말 변경하시겠습니까?</p><form class="real_box" method="POST" action="./main.php"><input id="no1_pw" type="hidden" name="no1_pw"><input id="no2_pw" type="hidden" name="no2_pw"><input class="del_bt" id="new_ok" type="submit" name="submit" value="확인"><button class="del_bt" id="new_no" type="button" name="new_no">취소</button></form></section>
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
			<input class="add_in_tt" type="text" maxlength="30" name="title" placeholder=" 제목 입력" required>
			<input class="add_in_url" type="url" name="url" placeholder=" URL 입력" required>
			<input class="add_in_date" type="date" name="date">
			<input class="add_in_info" type="text" maxlength="30" name="info" placeholder=" 간단한 소개" required>
			<input class="add_in_bt" type="submit" name="submit" value="추가">
		</form>
		<form action="./main.php" class="search_box" method="GET">
			<h1 class="title_ss">SEARCH</h1>			
			<input class="sc_input" type="text" maxlength="30" name="sc_input" placeholder=" 검색 단어 입력">
			<input class="sc_bt" type="submit" name="submit" value="검색">
			<button id="return_bt" class="sc_bt">전체조회</button>
		</form>
		<div class="mid_title"><p>LIST</p></div>
		<form class="in_re_pw" method="POST" action="./main.php">
			<input class="in_pw" type="password" name="in_pw" placeholder=" 현재 비밀번호 입력">
			<input class="in_pw" type="password" name="new_pw" placeholder=" 새로운 비밀번호 입력">
			<input class="new_pw_in" type="submit" name="new_pw" value="변경">
			<button id="no_bt" class="no_bt">닫기</button>
		</form>
        <script>
			//SUBMIT별 팝업
			let sub_name = "<?=$_GET['a']?>";
			let num_value = "<?=$_GET['num']?>";
				switch(sub_name){					
					case '수정' :
						$("#pop_up").css("display", "block");
						$("#re_box").html("수정되었습니다.");
						break;
					case '추가' :
						$("#pop_up").css("display", "block");
						$("#re_box").html("추가되었습니다.");
						break;
					case '삭제' :
						$("#del_pop").css("display", "block");
						break;																				
				}
			//클릭 이벤트	
				$(document).on('click', function(e){
					switch(e.target.id){
						case 'x_box' :
							$("#pop_up").css("display", "none");
							location.href="./main.php";
							break;
						case 'del_ok' :
							$("#del_pop").css("display", "none");
							$("#pop_up").css("display", "block");
							$("#re_box").html("삭제되었습니다.");
							location.href="./main.php?del=ok&no="+num_value;
							break;
						case 'del_no' :
							$("#del_pop").css("display", "none");
							$("#pop_up").css("display", "block");
							$("#re_box").html("취소되었습니다.");				
							break;
						case 'return_bt' :
							location.href="./main.php";
							break;									
					}
				});
		</script>
	</body>
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
			echo "<input class=\"data_in_tt\" maxlength=\"30\" type=\"text\" name=\"title\" value=\"{$all_record['title']}\"><input class=\"data_in_url\" type=\"url\" name=\"url\" value=\"{$all_record['url']}\"><a class=\"data_in_move\" href=\"{$all_record['url']}\" target=\"_blank\">이동</a><input class=\"data_in_date\" type=\"date\" name=\"date\" value=\"{$all_record['date']}\"><input class=\"data_in_info\" type=\"text\" maxlength=\"30\" name=\"info\" value=\"{$all_record['info']}\"><span class=\"data_in_id\">작성자 : {$all_record['id']}</span><input class=\"data_in_bt\" type=\"submit\" name=\"submit\" value=\"수정\"><input class=\"data_in_bt data_in_bt_c\" id=\"del_bt\" type=\"submit\" name=\"submit\" value=\"삭제\">";
			echo "</form></div>";
			$i++;
		}
	}
	//추가
	function plus_query( $db_handler, $etc_query){
		$db_put = mysqli_query($db_handler, $etc_query);
		if($db_put === false ){
			echo mysqli_error($db_handler);
		} else {
			echo "<script>location.href=\"./main.php\";</script>";
		}
	}

	//DB접속
	$ok_handler = db_open( $dbhost, $dbid, $dbpw, $dbname);
	$id = $_SESSION['id'];
	$pw = $_SESSION['pw'];

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
?>