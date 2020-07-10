<?php
//Insert Data
$hostname = "localhost";
$username = "UserName";
$password = "qtV3aVFnnemQsmmI";
$databasename = "manual_control";

try

{
    $conn = new PDO("mysql:host=$hostname;dbname=$databasename", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST["direction"]))
    {
        $query = "INSERT INTO direction (direction) VALUES (:direction)";
        $statement = $conn->prepare($query);
        $statement->execute(array(
            'direction' => $_POST["direction"]
        ));
        $count = $statement->rowCount();
        if ($count > 0)
        {
            echo $_POST['direction'];
        }
        else
        {
            echo "Data Insertion Failed";
        }
    }
}
catch(PDOException $error)
{
    echo $error->getMessage();
}