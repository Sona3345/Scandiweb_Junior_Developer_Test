<?php

    include 'ViewProducts.php'; 
    include 'DeleteProducts.php';

    // If the mess_delete button is clicked then check 
    if(isset($_POST['delete'])){
        // It creates an object for Delete class then send the selected ids to it.
        $deletion = new Delete($_POST);
        // It calls the deleteProducts function to delete the selected ids.
        $deletion->deleteProducts();
    }

?>

<!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product List</title>
        <link href="css/ProductList_StyleSheet.css" rel="stylesheet">
        <!--Bootstrap library -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="scripts/script.js"></script>
    </head>

    <body>
        <!-- Navigation-bar start -->
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Product List</a>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="AddProduct.php"> <button id="ADD" class="btn btn-light" type="button">ADD</button></a>
                    <input id="delete-product-btn" class="btn btn-light" type="submit" name="mass_delete" value="MASS DELETE" onclick=javascript:onClickDelete()>
                </div>
            </div>
        </nav>
        <!-- Form start -->
        <form id="delete_product_form" method="POST">
            <div class="container">
                <?php
                    // It creates an object for ViewProducts class to show the data.
                    $show = new ViewProducts();
                    $show->submit();
                    
                ?>
            </div>
            <input id="delete-btn" type="submit" name="delete">
        </form>

        <!-- footer start -->
        <footer id="footer" class="navbar navbar-dark bg-dark">
            <div class="container-fluid justify-content-center">
                <a class="navbar-brand">Scandiweb Test assignment</a>
            </div>
        </footer>

    </body>

</html>