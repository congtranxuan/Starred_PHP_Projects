<?php
include_once("./api_data_extract.php");

//Database connection authorization information
$servername ="localhost";
$username ="php";
$password ="1234";
$database ="GITHUB_PHP";

// Create connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>";
    //Delete the table if exist
    $sql = "DROP TABLE IF EXISTS PHP_Projects";
    $conn->exec($sql);

  // sql to create table
    $sql = "CREATE TABLE PHP_Projects (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    repository_id VARCHAR(30),
    name VARCHAR(30),
    url VARCHAR(500),
    created_date DATETIME,
    last_pushed_date DATETIME,
    description VARCHAR(1000),
    number_stars VARCHAR(10),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table PHP_Projects created successfully<br>";

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO PHP_Projects (
      repository_id, name, url, created_date, last_pushed_date, description, number_stars)
    VALUES (:repository_id, :name, :url, :created_date, :last_pushed_date, :description, :number_stars)");
    $stmt->bindParam(':repository_id', $repository_id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':url', $url);
    $stmt->bindParam(':created_date', $created_date);
    $stmt->bindParam(':last_pushed_date', $last_pushed_date);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':number_stars', $number_stars);

    // insert a row
    foreach($result_decode['items'] as $item){
       $repository_id = $item['id'];
       $name = $item['name'];
       $url = $item['html_url'];
       $created_date = $item['created_at'];
       $last_pushed_date = $item['pushed_at'];
       $description = $item['description'];
       $number_stars = $item['stargazers_count'];
       $stmt->execute();
     }

    echo "New records created successfully<br>";

}catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
}

    /* Close the Connection, The connection will be closed automatically when the script ends. */
    $conn = null;


?>
