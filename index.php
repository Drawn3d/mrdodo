<?php

$db = new PDO('mysql:host=localhost;dbname=litterie3000', "root", "");
$query = $db->query("SELECT lit.*, size.taille FROM lit_size INNER JOIN lit ON lit.id = lit_size.lit_id INNER JOIN size ON size.id = lit_size.size_id");
$lits = $query->fetchAll();

include("tpl/header.php")
?>

<div class="container">
    <div class="container-flex">
        <?php
        foreach ($lits as $lit) {
        ?>
            <div class="lit">
                <figure>
                    <a class="clickonme" href="modify.php?id=<?= $lit["id"] ?>">
                        <img src="<?= $lit["image"] ?>" alt="raté">
                    </a>
                </figure>
                <div class="nomMatelas">
                    <h2> Matelas <?= $lit["name"] ?></h2>
                    <h3><?= $lit["taille"] ?></h3>
                </div>
                <h2 class="marque"><?= $lit["marque"] ?></h2>
                <div class="prixMatelas">
                    <h2 class="prix <?php
                                        if ($lit["promo"] != 0) {
                                            echo "barre";
                                        }
                                        ?>"><?= $lit["prix"] ?> €</h2>
                    <h2 class="promoPrix"><?php if ($lit["promo"] != 0) {
                                                $promoPrix = $lit["prix"] - ($lit["prix"] * ($lit["promo"] / 100));
                                                echo $promoPrix . "€";
                                            }
                                            ?>
                    </h2>
                </div>
                <?php
                if (isset($_GET["modify"])) {
                ?>
                    <a class="supprimer" href="supress.php?id=<?= $lit["id"] ?>">x</a>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php
include("tpl/footer.php")
?>