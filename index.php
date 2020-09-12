<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
Działa
<?php
if (! $dbh = pg_pconnect("host='localhost' port='5432' user='postgres' password='karolek123' dbname='movie_database'"))echo "Nie mogę się połączyć z bazą danych";

    $query="select * from actors";
    if($wynik=pg_query($query))
       {
        $licznik=pg_num_rows($wynik);
        echo "<H2> Dane z tabeli actors: </H2>";
       $li=-1;
       while($li++<$licznik)
     {
      $linia=pg_fetch_row($wynik, $li);
      echo "$linia[0] $linia[1] <br>";
     }
      }
    else
      echo "Brak danych...";
?>
</body>
</html>