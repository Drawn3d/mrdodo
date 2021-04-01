<?php 

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $db = new PDO('mysql:host=localhost;dbname=litterie3000', "root", "");

    $query = $db->prepare("DELETE FROM lit WHERE id LIKE :id");
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->execute();

    $queryTwo = $db->prepare("DELETE FROM lit_size WHERE lit_id like :id");
    $queryTwo->bindParam(":id", $id, PDO::PARAM_INT);

        if($queryTwo->execute()){
            header("Location: index.php");
        }
}
?>