$(function () {
  $("#first-name-error").css("opacity", 0);
  $("#last-name-error").css("opacity", 0);
  $('#email-error').css("opacity", 0);
  $('#pass-error').css("opacity", 0);
  $('#password-error').css("opacity", 0);

  $("#firstname").focusout(function () { checkFirstName(); });
  $("#lastname").focusout(function () { checkLastName() });
  $("#email").focusout(function () { checkEmail() });
  $("#password").focusout(function () { checkPassword() });
  $("#password2").focusout(function () { checkPasswordConfirmation() });


  function checkFirstName() {
    fname = $("#firstname").val();
    pattern = /^[a-zA-Z]*$/;
    flag = false;

    if (fname.length > 2 && pattern.test(fname)) {
      flag = true;
    }

    if (flag) {
      $("#first-name-error").css("opacity", 0);
      $("#firstname").css("border-bottom", "2px solid #34F458");
    }
    else {
      $("#firstname").css("border-bottom", "2px solid #F90A0A");
      $("#first-name-error").css("opacity", 1);
    }
    firstNameFlag = flag;
  }

  function checkLastName() {
    lname = $("#lastname").val();
    pattern = /^[a-zA-Z]*$/;
    flag = false;

    if (lname.length > 2 && pattern.test(lname)) {
      flag = true;
    }

    if (flag) {
      $("#last-name-error").css("opacity", "0");
      $("#lastname").css("border-bottom", "2px solid #34F458");
    }
    else {
      $("#lastname").css("border-bottom", "2px solid #F90A0A");
      $("#last-name-error").css("opacity", "1");
    }
    lastNameFlag = flag;
  }

  function checkEmail() {
    var email = $("#email").val();
    flag = true;

    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    if (!pattern.test(email)) {
      $("#email").css("border-bottom", "2px solid #F90A0A");
      $("#email-error").css("opacity", "1");
      flag = false;
    }
    else {
      $("#email-error").css("opacity", "0");
      $("#email").css("border-bottom", "2px solid #34F458");
    }
    EmailFlag = flag;
  }


  function checkPassword() {
    var password = $("#password").val();

    flag = true;
    if (password.length === 0) {
      $('#pass-error').text("password is required.");
      flag = false;
    }

    else if (password.length < 8) {
      $('#pass-error').text("password must be more than 7 charecter.");
      flag = false;
    }
    if (flag) {
      $('#pass-error').css("opacity", "0");
      $('#password').css("border-bottom", "2px solid #34F458");
    }
    else {
      $('#password').css("border-bottom", "2px solid #F90A0A");
      $('#pass-error').css("opacity", "1");
    }
    passFlag = flag;
  }

  function checkPasswordConfirmation() {
    var password2 = $("#password2").val();
    var password = $("#password").val();
    flag = true;
    if (!passFlag) {
      $('#password2').css("border-bottom", "2px solid #F90A0A");
    }
    else if (password != password2) {
      $('#password2').css("border-bottom", "2px solid #F90A0A");
      $('#password-error').css("opacity", "1");
      flag = false;
    }
    else {
      $('#password2').css("border-bottom", "2px solid #34F458");
      $('#password-error').css("opacity", "0");
    }
    passwordFlag = flag;
  }

  $("#form").submit(function () {
    firstNameFlag = false;
    lastNameFlag = false;
    EmailFlag = false;
    passFlag = false;
    passwordFlag = false;

    checkFirstName();
    checkLastName();
    checkEmail();
    checkPassword();
    checkPasswordConfirmation();

    if (firstNameFlag
      && lastNameFlag
      && EmailFlag
      && passFlag
      && passwordFlag) {
      alert("Successfully Registered! ");
      return true;
    } else {
      alert("Please Fill the form Correctly!");
      return false;
    }
  });

});