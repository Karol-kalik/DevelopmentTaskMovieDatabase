<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>

<script type="text/javascript">
  $(document).ready(function() {

    $("#display").click(function(e) {
      $.ajax({
        type: "GET",
        url: "result.php",
        dataType: "html",
        success: function(response) {
          $("#responsecontainer").html(response);
        }
      });
    });
  });
</script>









<body>

  <h3>Manage Student Details</h3>
  <form action="result.php" method="get">
    <label>Search<input type="text" name="search"></label>
    <select name="taskOption">
      <option disabled selected> Select search option:</option>
      <option value="actors">Onlu actors </option>
      <option value="movie">Only movie </option>
    </select>
    <input type="submit" id="display" value="Search" /> </td>
  </form>

  <div id="container">
  </div>
</body>

</html>