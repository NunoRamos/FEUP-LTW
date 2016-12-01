function validateForm(){
    let username = $("#username").val();

    if(username.length < 8){
        $("#invalidUsername").show();
        return false;
    }else if($('#invalidUsername').is(':visible'))
        $("#invalidUsername").hide();

    let password = $("#password").val();

    if(password.length < 8){
        $("#invalidPassword").show();
        return false;
    }else if($('#invalidPassword').is(':visible'))
        $("#invalidPassword").hide();

    let checkPassword = $("#confirmPassword").val();

    if(checkPassword != password){
        $("#checkingPasswords").show();
        return false;
    }else if($('#checkingPasswords').is(':visible'))
        $("#checkingPasswords").hide();

    return true;
}
