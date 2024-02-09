$(function () {

    $("#password").blur(() => {
        if (!$("#password").val()) {
            $("#password-label").css("margin-top", 0);
            $("#password").css("border-bottom", "1px solid gray");
        }
    });
    $("#username").blur(() => {
        if (!$("#username").val()) {
            $("#username-label").css("margin-top", 0);
            $("#username").css("border-bottom", "1px solid gray");
        }
    });

    $("#password").focus(() => {
        $("#password-label").css("margin-top", "-20px");
        $("#password").css("border-bottom", "1.5px solid #ff7373");
    });
    $("#username").focus(() => {
        $("#username-label").css("margin-top", "-20px");
        $("#username").css("border-bottom", "1.5px solid #ff7373");
    });
});
