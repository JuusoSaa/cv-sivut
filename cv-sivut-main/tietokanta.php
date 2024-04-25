<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cv";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn ->connect_error){
        die("Yhteys epäonnistui" . $conn->connect_error);
    }else{
        echo "Yhteys otettu tietokantaan";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $name = $_POST["name"];
    $sahkoposti = $_POST["email"];
    $aihe = $_POST["subject"];
    $viesti = $_POST["message"];
      
    $sql = "INSERT INTO `cv_sivut`(`nimi`, `sahkoposti`, `aihe`, `viesti`) VALUES ('$name','$sahkoposti','$aihe','$viesti')";

    if($conn->query($sql) === TRUE){
        echo "Tiedot tallennettu onnistuneesti.";
    }else{
        echo "Virhe: " . $sql . "<br>" . $conn->error;
    }
    }
    $conn->close();

    header("Location: index.html");
    exit;
    ?>
</body>
</html>