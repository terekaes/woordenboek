<!DOCTYPE html><html lang="en">
<head>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge">  <link rel="stylesheet" href="main.css"> <title>Woordenboektest</title>
</head>
<body>
<?php $servername ="localhost"; $port ="3306";  $username ="root"; $password ="root";$database ="woordenboek";
try {$conn = new PDO("mysql:host=$servername;port=$port;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $stmt = $conn->prepare("SELECT * FROM alles"); $stmt->execute();
    $result=$stmt -> setFetchMode(PDO:: FETCH_ASSOC); $rows= $stmt ->fetchAll(); }
catch(PDOException $e)
    {echo "Connection failed: " . $e->getMessage();} ?>
<?php foreach ($rows as $row) { ?> <div class="row">
    <h6>Dialect: <?php echo $row['Woord']  ?></h6>
  <h6>Betekenis: <?php echo $row['Betekenis']; ?></h6> 
  <h6>Stad: <?php echo $row['Stad']; ?></h6>
  <h6>Provincie: <?php echo $row['Provincie']; ?></h6> <hr / > </div> <?php  } ?>
</body>
</html>