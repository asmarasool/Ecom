<?php require_once("resources/config.php"); ?>
<?php require_once("resources/cart.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>


<!-- Page Content -->
<div class="container">

    <!-- /.row -->

    <div class="row">

        <h1>Checkout</h1>
<h4 class="text-center bg-danger"><?php display_message(); ?></h4>
        <form action="">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub-total</th>

                    </tr>
                </thead>
                <tbody>
                    <?php cart();  ?>
                </tbody>
            </table>
        </form>



        <!--  ***********CART TOTALS*************-->

        <div class="col-xs-4 pull-right ">
            <h2>Cart Totals</h2>

            <table class="table table-bordered" cellspacing="0">


                <tr class="shipping">
                    <th>Shipping and Handling</th>
                    <td>Free Shipping</td>
                </tr>

                <tr class="order-total">
                    <th>Order Total</th>
                    <td><strong><span class="amount">
                        &#36;<?php 
                        echo isset($_SESSION['item_total']) ? 
                        $_SESSION['item_total'] :
                        $_SESSION['item_total'] = "0.00";
                        ?>
                    
                    </span></strong> </td>
                </tr>




            </table>

        </div><!-- CART TOTALS-->


    </div>
    <!--Main Content-->



</div>
<!-- /.container -->



<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>