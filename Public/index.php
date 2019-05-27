<?php require_once("resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Side Nav here-->
        <?php include(TEMPLATE_FRONT. DS . "side_nav.php"); ?>

        <div class="col-md-9">

            <!--  Carousel-->
            <?php include(TEMPLATE_FRONT. DS . "slider.php"); ?>


            <div class="row">
                <!--get product function from function file-->
                <?php get_products();   ?>



            </div>

        </div>

    </div>

</div>
<!-- /.container -->

<?php include(TEMPLATE_FRONT. DS . "footer.php"); ?>
