<?php
include("model_commun.php");
include("produit/model.php");
$produits = all("produit");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>template </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style_shop.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

</head>

<body>
    <header>
        <?php include_once("_menu_front.php"); ?>
        <div id="slider">

            <div>
                <img src="images/banner41.jpg" alt="" title="Slider 1 ">
            </div>
            <div>
                <img src="images/osmosbio_banner.jpg" alt="" title="slider 2 ">
            </div>

        </div>
    </header>
    <main>

        <section class="catalogue">


            <?php
            $categories = categorie_ayant_de_produit();

            foreach ($categories as $c) {

            ?>

                <div class="container">
                    <h3 class="h3"><?= $c['nom'] ?> </h3>
                    <div class="row">
                        <?php

                        $produits = findBy("produit", "categorie_id=" . $c['id'])


                        ?>

                        <?php foreach ($produits as $p) { ?>

                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="#">
                                            <img class="pic-1" src="produit/<?= $p['chemin'] ?>">
                                            <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo9/images/img-2.jpg">
                                        </a>
                                        <ul class="social">
                                            <li><a href="" data-tip="Consulter ce produit"><i class="fa fa-search"></i></a></li>
                                            <li><a href="" data-tip="Ajouter aux preferences "><i class="fa fa-shopping-bag"></i></a></li>
                                            <li><a href="" data-tip="Ajouter au panier"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                        <span class="product-new-label">Categorie</span>
                                        <span class="product-discount-label">20%</span>
                                    </div>

                                    <div class="product-content">
                                        <h3 class="title"><a href="#"><?= $p['libelle'] ?></a></h3>
                                        <div class="price">$<?php $p['prix'] ?>
                                            <span>$20.00</span>
                                        </div>
                                        <a class="add-to-cart" href="">+ Ajouter au panier</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            <?php } ?>
        </section>
    </main>







    <footer></footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#slider').bxSlider({
                mode: 'fade',
                captions: true,

            });
        });
    </script>
</body>

</html>