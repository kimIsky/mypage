/* 
    MYPAGE LOGIN JAVASCRIPT
*/
// CAPTCHAR
display_number =(print_number)=>{
    const canvas = document.getElementById('my_canvas');
    const can_re = canvas.getContext("2d");
    can_re.font = "100px Comic Sans MS";
    can_re.fillStyle = "#F7F7F9";
    can_re.textAlign = "center";
    can_re.clearRect(0, 0, canvas.width, canvas.height);
    can_re.fillText(print_number, canvas.width / 2, canvas.height / 1.35 );
}
random_num =()=>{
    let magic_num = Math.floor(Math.random()*(9999-1000+1))+1000;
    display_number(magic_num);
    return magic_num;
}
(main =()=> {
    let random_number = random_num();    
    // Event Area
    // Event Random
    $(document).on("click", function(e){
        switch(e.target.id){
            case 'ref_bt' :
                random_number = random_num();
            break;
        }
    });// END random
    //CAPTCHAR 비교
    $("#in_bt").on("click", function(e){
        if(random_number != $("#check_num").val()){
            $("#re_box").html("캡차불일치!!");
            $("#pop_up").css("display", "block");
            e.preventDefault();
            $("#check_num").val("").focus().css("background-color", "gold");
            $("#in_id, #in_pw").attr('readonly', 'true');
        }
    }); //END CAPCHAR 비교
    //Event ID keyup
    $(document).on("keyup", function(e){
        switch( e.target.id ){
            case 'in_id' :
                !(/^[a-zA-Z0-9]*$/).test($("#"+e.target.id).val()) &&
                $("#"+e.target.id).val($("#"+e.target.id).val().substring(0, $("#"+e.target.id).val().length-1)) &&
                $("#re_box").html("영문 대소문자, 숫자 조합 10자 이내로 입력하세요.") && $("#pop_up").css("display", "block")
                && $("#re_box").css("font-size", "15px");
                break;
            case 'in_pw' :
                !(/^[a-zA-Z0-9\@\!\#]*$/).test($("#"+e.target.id).val()) &&
                $("#"+e.target.id).val($("#"+e.target.id).val().substring(0, $("#"+e.target.id).val().length-1)) &&
                $("#re_box").html("영문 대소문자, 숫자, 특수문자(@/!/#) 조합 10자 이내로 입력하세요.") && $("#pop_up").css("display", "block")
                && $("#re_box").css("font-size", "11px");
                break;
            case 'check_num' :
                !(/^[0-9]*$/).test($("#"+e.target.id).val()) &&
                $("#"+e.target.id).val($("#"+e.target.id).val().substring(0, $("#"+e.target.id).val().length-1)) &&
                $("#re_box").html("표시된 숫자 4자리 입력하세요.") && $("#pop_up").css("display", "block")
                && $("#re_box").css("font-size", "15px");
                break;
        }
    });
    //End event
})();
// END CAPTCHAR

let num = 1; 
$(this).on("click", function(e){    
    switch(e.target.id){
        case 'admin_in' :
            $("#in_id").val("admin");
            $("#in_pw").val(1234);
        break;
        case 'member_in' :
            $("#in_id").val("pp"+num);
            $("#in_pw").val(5678);
            num++;
            num > 4 && (num = 1);
        break;
        case 'x_box' :
            $("#pop_up").css("display", "none");
        break;
    }
});

