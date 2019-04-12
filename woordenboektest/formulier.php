<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Woord toevoegen </title>
</head>
<body>
Homewoordenboek php 

<form action="http://localhost/woordenboek.php" method="post">
    <b> Nieuw woord </b>
    <p> Woord: <input type="text" name="Woord" size="100" value="" />
    <p> Betekenis: <input type="text" name="Betekenis" size="100" value="" />
    <p> Stad: <inpust type="text" name="Stad" size="30" value="" />
    <p> Provincie: <input type="text" name="Provincie" size="30" value="" />
    <p> Naam: <input type="text" name="naam" size="50" value="" />
<p> <input type="submit" name="submit" value="Send" /> </p>

<?php 
if (isse($_POST['submit'])) {
    $data_missing = array();
    if (empty($_POST['Woord'])){
        $data_missing[]='Woord';
    } else { 
        $_Woord= trim($_POST['Woord']);
    }
}

<?php 
if (isse($_POST['submit'])) {
    $data_missing = array();
    if (empty($_POST['Betekenis'])){
        $data_missing[]='Betekenis';
    } else { 
        $_Betekenis= trim($_POST['Betekenis']);
    }
}

<?php 
if (isse($_POST['submit'])) {
    $data_missing = array();
    if (empty($_POST['Stad'])){
        $data_missing[]='Stad';
    } else { 
        $_Stad= trim($_POST['Stad']);
    }
}

<?php 
if (isse($_POST['submit'])) {
    $data_missing = array();
    if (empty($_POST['Provincie'])){
        $data_missing[]='Provincie';
    } else { 
        $_Provincie= trim($_POST['Provincie']);
    }
}

<?php 
if (isse($_POST['submit'])) {
    $data_missing = array();
    if (empty($_POST['naam'])){
        $data_missing[]='naam';
    } else { 
        $_naam= trim($_POST['naam']);
    }

    if(empty($data_missing)) {
        require_once('../mysqli_connect.php');
        $query = " INSERT INTO woordenboek1 (Woord, Betekenis, Stad, Provincie, naam) 
        VALUES(?, ?, ?, ?, ? )";
        $stmt = mysqli_prepare ($dbc, $query); 
    
        mysqli_stmt_bind_param($stmt,"sssss", $_Woord, $_Betekenis, $_Stad, $_Provincie, $_naam);
    mysqli_stmt_execute($stmt);

    $affected_rows = mysqli_stmt_affected_rows($stmt);

    if($affected_rows == 1){
        echo 'Woord Entered';
        mysqli_stmt_close($stmt);
        mysqli_close($dbc);
    } 
    
    else { echo 'Error';
                echo mysqli_error();
            
            }

    else{
        echo 'you need to enter data';
        foreach($data_missing as $missing){
            echo "$missing";
        }
    }
 }
}

</form>
</body>
</html>