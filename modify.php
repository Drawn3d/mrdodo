<?php

$db = new PDO('mysql:host=localhost;dbname=litterie3000', "root", "");

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $query = $db->prepare("SELECT * from lit WHERE id LIKE :id");
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $litselected = $query->fetch();
}
if(!empty($_POST)) {

    $name = trim(strip_tags($_POST["name"]));
    $mark = trim(strip_tags($_POST["mark"]));
    $price = trim(strip_tags($_POST["price"]));
    $picture = trim(strip_tags($_POST["picture"]));
    $promo = trim(strip_tags($_POST["promo"]));

    $db = new PDO('mysql:host=localhost;dbname=litterie3000', "root", "");
    $query = $db->prepare("UPDATE lit SET name = :name, marque = :mark, prix = :price, image = :picture, promo = :promo WHERE id = :id");
    $query->bindParam(":name", $name);
    $query->bindParam(":mark", $mark);
    $query->bindParam(":price", $price, PDO::PARAM_INT);
    $query->bindParam(":picture", $picture);
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->bindParam(":promo", $promo, PDO::PARAM_INT);

    if($query->execute()){
        header("Location: index.php");
    }

}
include("tpl/header.php")
?>

    <div class="container">
    <h1 class="fillFormTitle">Modifiez les données du matelas</h1>
    <form action="" method="post">
        <div class="container-form">
            <div class="form-group">
                <label for="nameMattress">Nom du Matelas</label>
                <input type="text" id="nameMattress" name="name" value="<?= $litselected["name"]?>">
            </div>
            <div class="form-group">
                <label for="markMattress">Marque du matelas</label>
                <input type="text" id="markMattress" name="mark" value="<?= $litselected["marque"]?>">
            </div>
            <div class="form-group">
                <label for="priceMattress">Prix du matelas</label>
                <input type="text" id="priceMattress" name="price" value="<?= $litselected["prix"]?>">
            </div>
            <div class="form-group">
                <label for="pictureMattress">Image du matelas (url)</label>
                <input type="text" id="pictureMattress" name="picture" value="<?= $litselected["image"]?>">
            </div>
            <div class="form-group">
                <label for="promoMattress">Promotion (en %)</label>
                <input type="text" id="promoMattress" name="promo" value="<?= $litselected["promo"]?>">
            </div>
        </div>
        <input type="submit" value="Valider" class="formsubmit">
    </form>

    </div>
    <?php
include("tpl/footer.php")
?>