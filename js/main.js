$(document).ready(function() {
  // Signup Submission Handling
  $("#signup-submit").on("click", function(e) {
    e.preventDefault();
    var name = $("#signup-name").val();
    var email = $("#signup-email").val();
    var password = $("#signup-password").val();
    $.ajax({
      url: "php/controllers/signupController.php",
      type: "POST",
      dataType: "json",
      data: { name: name, email: email, password: password },
      success: function(data) {
        if (data.code.name == 0) {
          $("#nameErr").remove();
        } else if (data.code.name == 1) {
          $("#nameErr").html("Name is required");
        }
        if (data.code.email == 0) {
          $("#emailErr").remove();
        } else if (data.code.email == 1) {
          $("#emailErr").html("Email is required");
        } else if (data.code.email == 2) {
          $("#emailErr").html("Invalid Email");
        } else if (data.code.email == 3) {
          $("#emailErr").html("Email already exists");
        }
        if (data.code.password == 0) {
          $("#passwordHelp").remove();
          $("#passwordErr").remove();
        } else if (data.code.password == 1) {
          $("#passwordHelp").remove();
          $("#passwordErr").html("Password is required");
        } else if (data.code.password == 2) {
          $("#passwordHelp").remove();
          $("#passwordErr").html("Password should atleast be 6 characters");
        }
        if (data.result == "success") {
          $("form").remove();
          $("#success")
            .delay(200)
            .addClass("pop_success");
        }
      }
    });
    return false;
  });
  //Login Submission Handling
  $("#login-submit").on("click", function(e) {
    e.preventDefault();
    var email = $("#login-email").val();
    var password = $("#login-password").val();
    $.ajax({
      url: "php/controllers/loginController.php",
      type: "POST",
      dataType: "json",
      data: { email: email, password: password },
      success: function(data) {
        if (data.code.email == 0) {
          $("#emailErr").remove();
        } else if (data.code.email == 1) {
          $("#emailErr").html("Email is required");
        } else if (data.code.email == 2) {
          $("#emailErr").html("Invalid Email");
        }
        if (data.code.password == 0) {
          $("#passwordErr").remove();
        } else if (data.code.password == 1) {
          $("#passwordErr").html("Password is required");
        } else if (data.code.email == 3 && data.code.password == 2) {
          $("#emailErr").remove();
          $("#passwordErr").html("Email Id and/or password is/are incorrect");
        }
        if (data.result == "success") {
          window.location.href = window.location.href.substr(
            0,
            window.location.href.lastIndexOf("/")
          );
        }
      }
    });
    return false;
  });
  //Index Page Handling
  if ($("#index-form").length == 1) {
    $.ajax({
      url: "php/controllers/indexController.php",
      dataType: "json",
      type: "GET",
      success: function(data) {
        $("#profile-name").val(data.details.name);
        $("#profile-email").val(data.details.email);
        $("#profile-age").val(data.details.age);
        $("#profile-dob").val(data.details.dob);
        data.details.contact == 0
          ? $("#profile-contact").val("")
          : $("#profile-contact").val(data.details.contact);
      }
    });
    $("#profile-submit").on("click", function(e) {
      e.preventDefault();
      var name = $("#profile-name").val();
      var dob = $("#profile-dob").val();
      var contact = $("#profile-contact").val();
      $.ajax({
        url: "php/controllers/indexController.php",
        type: "POST",
        dataType: "json",
        data: { name: name, dob: dob, contact: contact },
        success: function() {
          location.reload(true);
        }
      });
      return false;
    });
  }
});
