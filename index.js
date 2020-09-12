$(document).ready(function () {

  $("#display").click(function (e) {

    $.ajax({
      type: "GET",
      url: "result.php",
      dataType: "html",
      success: function (response) {
        $("#container").html(response);
      }
    });
  });
});