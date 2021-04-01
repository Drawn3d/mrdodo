<?php

$db = new PDO('mysql:host=localhost;dbname=litterie3000', "root", "");
$query = $db->query("SELECT lit.*, size.taille FROM lit_size INNER JOIN lit ON lit.id = lit_size.lit_id INNER JOIN size ON size.id = lit_size.size_id");
$lits = $query->fetchAll();

include("header.php")

?>

<div class="container">
    <div class="container-flex">
        <?php
        foreach ($lits as $lit) {
        ?>
            <div class="lit">
                <a class="clickonme" href="/modify.php?id=<?= $lit["id"]?>">
                    <figure>
                        <img src="<?= $lit["image"] ?>" alt="raté">
                    </figure>
                    <h2><?= $lit["name"] ?></h2>
                    <h2><?= $lit["marque"] ?></h2>
                    <h2><?= $lit["prix"] ?> €</h2>
                </a>
            </div>
        <?php
        }
        ?>
    </div>
</div>
</body>

</html>