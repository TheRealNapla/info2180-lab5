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

$city = filter_input(INPUT_GET, "city", FILTER_SANITIZE_STRING);
$cityq = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$city%'");
$cityresults = $cityq->fetchAll(PDO::FETCH_ASSOC);

?>


<?php

if (isset($country)){
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
}

?>

<?php

if (isset($city)){
  echo("<table>");
    echo("<thead>");
      echo("<tr>");
        echo("<th>Name</th>");
        echo("<th>District</th>");
        echo("<th>Population</th>");
      echo("</tr>");
    echo("</thead>");
    echo("<tbody>");
    foreach ($cityresults as $row){
      echo("<tr>");
        echo("<td>".$row["name"]."</td>");
        echo("<td>".$row["district"]."</td>");
        echo("<td>".$row["population"]."</td>");
      echo("</tr>");
    }
    echo("</tbody>");
  echo("</table>");
}

?>