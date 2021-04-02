<?php 
$db = new PDO('mysql:host=localhost;dbname=litterie3000', "root", "");

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $queryTwo = $db->prepare("DELETE FROM lit_size WHERE lit_id = :id");
    $queryTwo->bindParam(":id", $id, PDO::PARAM_INT);
    $queryTwo->execute();

    $queryOne = $db->prepare("DELETE FROM lit WHERE id = :id");
    $queryOne->bindParam(":id", $id, PDO::PARAM_INT);

        if($queryOne->execute()){
            header("Location: index.php");
        }
}
