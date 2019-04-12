<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Woordenboektest</title>
</head>
<body>
<h1> Homewoordenboek php </h1>

<button class="button" style="vertical-align:middle"><a href="http://localhost/woordenboektest/">home</button>
<br / > 
<button class="button" style="vertical-align:middle"><a href="http://localhost/woordenboektest/Oostende.php">Oostende</button>
<button class="button" style="vertical-align:middle"><a href="http://localhost/woordenboektest/Brugge.php">Brugge</button>
<button class="button" style="vertical-align:middle"><a href="http://localhost/woordenboektest/Antwerpen.php">Antwerpen</button>
<button class="button" style="vertical-align:middle"><a href="http://localhost/woordenboektest/Gent.php">Gent</button>
<button class="button" style="vertical-align:middle"><a href="http://localhost/woordenboektest/Ninove.php">Ninove</button>
<button class="button" style="vertical-align:middle"><a href="http://localhost/woordenboektest/Genk.php">Genk</button>
<hr / >

<?php
    $servername ="localhost";
    $port ="3306";
    $username ="root";
    $password ="root";
    $database ="woordenboek";

// Create connection
try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    //SQL uitvoeren 
    $stmt = $conn->prepare("SELECT * FROM `alles` WHERE `Stad` = 'Gent'");
    $stmt->execute();
    //Restultaten ophalen van de sql
    $result=$stmt -> setFetchMode(PDO:: FETCH_ASSOC);
    $rows= $stmt ->fetchAll();
    //var_dump($rows);
    // TODO: Loop door de rijen via FOREACH 
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>

<?php 
foreach ($rows as $row) { 
            ?>
        <div class="row">
        <table  aline="left" width="500" cellpadding= "10" cellspacing="5">
            <tr>
            <th aline="left">Dialect: </th>
            <th aline="left">Betekenis: </th>
            <th aline="left">Stad: </th>
            <th aline="left">Provincie: </th>
            </tr>
            <tr>
            <td aline="left"> <?php echo $row['Woord']  ?></td>
            <td aline="left"> <?php echo $row['Betekenis']; ?></td>
            <td aline="left"> <?php echo $row['Stad']; ?></td>
            <td aline="left"> <?php echo $row['Provincie']; ?></td>
            </tr>
        </table>    
        </div> 
        
         <?php 
}

?>


</body>
</html>