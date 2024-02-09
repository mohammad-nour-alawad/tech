$(function () {
    $("#new-subject-title").blur(() => {
        if (!$("#new-subject-title").val()) {
            $("#new-subject-label").css("margin-top", "13px");
            $("#new-subject-title").css("border-bottom", "2px solid #ff73734b");
        }
    });
    $("#new-subject-title").focus(() => {
        $("#new-subject-label").css("margin-top", "-7px");
        $("#new-subject-title").css("border-bottom", "1.5px solid #ff7373");
    });
});
