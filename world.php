<?php

  header('Access-Control-Allow-Origin: *');

?>

<?php

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");


$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$countryq = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $countryq->fetchAll(PDO::FETCH_ASSOC);

?>

<?php

  echo("<table>");
    echo("<thead>");
      echo("<tr>");
        echo("<th>Country Name</th>");
        echo("<th>Continent</th>");
        echo("<th>Independence Year</th>");
        echo("<th>Head of State</th>");
      echo("</tr>");
    echo("</thead>");
    echo("<tbody>");
    foreach ($results as $row){
      echo("<tr>");
        echo("<td>".$row["name"]."</td>");
        echo("<td>".$row["continent"]."</td>");
        echo("<td>".$row["independence_year"]."</td>");
        echo("<td>".$row["head_of_state"]."</td>");
      echo("</tr>");
    }
    echo("</tbody>");
  echo("</table>");

?>