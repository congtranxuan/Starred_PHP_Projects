<?php

    $conn = mysqli_connect('localhost','php','1234','GITHUB_PHP');

    $where = "";

    if (isset($_POST['repository_id'])) {
        $where .= " where repository_id ='".$_POST['repository_id']."'";
    }

    $query = "SELECT * FROM php_projects $where";
    $result = mysqli_query($conn, $query);

?>
<html>
<head>
  <script>

  </script>
</head>
<body>
  <div>
    <h1>List of the most stars PHP projects on GITHUB</h1>
    <table>
    <?php
    echo "<thead>
            <tr>
              <th>ID</th>
              <th>Repository ID</th>
              <th>Name</th>
              <th>URL</th>
              <th>Created Date</th>
              <th>Last Pushed Date</th>
              <th>Description</th>
              <th>Number of Stars</th>
            </tr>
          </thead>
          <tbody>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['repository_id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['url']."</td>";
        echo "<td>".$row['created_date']."</td>";
        echo "<td>".$row['last_pushed_date']."</td>";
        echo "<td>".$row['description']."</td>";
        echo "<td>".$row['number_stars']."</td>";
        echo "</tr>";

      }
      echo "</tbody>";
  ?>
</table>
  </div>
</body>
</html>
