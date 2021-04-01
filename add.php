<?php

if(!empty($_POST)) {

    $name = trim(strip_tags($_POST["name"]));
    $mark = trim(strip_tags($_POST["mark"]));
    $price = trim(strip_tags($_POST["price"]));
    $picture = trim(strip_tags($_POST["picture"]));
    $length = trim(strip_tags($_POST["length"]));


$db = new PDO('mysql:host=localhost;dbname=litterie3000', "root", "");
$query = $db->prepare("INSERT INTO lit(name, marque, prix, image) VALUES (:name,:mark,:price,:picture)");
$query->bindParam(":name", $name);
$query->bindParam(":mark", $mark);
$query->bindParam(":price", $price, PDO::PARAM_INT);
$query->bindParam(":picture", $picture);

if ($query->execute()) {
    $query2 = $db->query("SELECT max(id) FROM lit");
    $valeurId = $query2->fetch();
    if($valeurId != 0){
        $query3 = $db->prepare("INSERT INTO lit_size (lit_id, size_id) VALUES (:valeurId, :size)");
        $query3->bindParam(":valeurId", $valeurId[0]);
        $query3->bindParam(":size", $length);
        $query3->execute();
    }
} else {
    echo "marche po";
}



}
include("tpl/header.php")
?>

<div class="container">
    <h1 class="fillFormTitle">Remplir le formulaire du nouveau matelas</h1>
    <form action="" method="post">
        <div class="container-form">
            <div class="form-group">
                <label for="nameMattress">Nom du Matelas</label>
                <input type="text" id="nameMattress" name="name">
            </div>
            <div class="form-group">
                <label for="markMattress">Marque du matelas</label>
                <input type="text" id="markMattress" name="mark">
            </div>
            <div class="form-group">
                <label for="priceMattress">Prix du matelas</label>
                <input type="text" id="priceMattress" name="price">
            </div>
            <div class="form-group">
                <label for="pictureMattress">Image du matelas (url)</label>
                <input type="text" id="pictureMattress" name="picture">
            </div>
            <div class="form-group">
                <label for="lengthMattress">Taille du matelas</label>
                <select name="length" id="lengthMattress" class="selectLength">
                    <option value="1">90x190</option>
                    <option value="2">140x190</option>
                    <option value="3">160x200</option>
                    <option value="4">180x200</option>
                    <option value="5">200x200</option>
                </select>
            </div>
        </div>
        <input type="submit" value="Valider" class="formsubmit">
    </form>
</div>
<?php
include("tpl/footer.php")
?>