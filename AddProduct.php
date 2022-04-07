<?php

include 'Validator.php';

 // If the save button is clicked then check 
if (isset($_POST['submit_data'])) {

  // It creates an object for Validator class then send the received data.
  $validation = new Validator($_POST);
  
  // It calls the validateForm function to check for errors.
  $errors = $validation->validateForm();
  
}

?>

<!DOCTYPE html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Add</title>
    <link rel="stylesheet" href="css/AddProduct_StyleSheet.css">
    <!--Bootstrap library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="scripts/script.js"></script>
  </head>

  <body>
    <!-- Navigation-bar start -->
    <nav class="navbar sticky-top navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand">Product Add</a>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <input id="Save" class="btn btn-light" type="submit" name="save" value="Save" onclick=javascript:onClickSave()>
          <a href="ProductList.php"><button id="Cancel" class="btn btn-light" type="button">Cancel</button></a>
        </div>
      </div>
    </nav>
    <!-- Form start -->
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" id="product_form" method="POST">
      <div class="row mb-3">
        <label class="col-sm-1 col-form-label">SKU</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="sku" id="sku" value="<?php echo $_POST['sku'] ?? '' ?>"> <!--  Please change -->
          <div class="error-feedback"><?php echo $errors['sku'] ?? '' ?></div>
          <div class="error-feedback"><?php echo $dubSkuErr ?? '' ?></div>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-1 col-form-label">Name</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="name" id="name" value="<?php echo $_POST['name'] ?? '' ?>"> <!--  Please change -->
          <div class="error-feedback"><?php echo $errors['name'] ?? '' ?></div>
        </div>
      </div>
      <div class="row mb-3" class="form-group">
        <label class="col-sm-1 col-form-label">Price ($)</label>
        <div class="col-sm-3">
          <input type="number" class="form-control" name="price" id="price" value="<?php echo $_POST['price'] ?? '' ?>">
          <div class="error-feedback"><?php echo $errors['price'] ?? '' ?></div>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-1 col-form-label">Type Switcher</label>
        <div class="col-sm-3">
          <select name="productType" id="productType" class="form-select">
            <option>Please, choose type</option>
            <option <?php if (!empty($_POST['productType'])) {
                      if ($_POST['productType'] == "DVD") {
                        echo "selected";
                      }
                    } ?> name="dvd" value="DVD">DVD</option>
            <option <?php if (!empty($_POST['productType'])) {
                      if ($_POST['productType'] == "Furniture") {
                        echo "selected";
                      }
                    } ?> name="furniture" value="Furniture">Furniture</option>
            <option <?php if (!empty($_POST['productType'])) {
                      if ($_POST['productType'] == "Book") {
                        echo "selected";
                      }
                    } ?> name="book" value="Book">Book</option>
          </select>
          <div class="error-feedback"><?php echo $errors['productType'] ?? '' ?></div>
        </div>

      </div>

      <!-- _DVD_ -->
      <div id="DVD" class="data">
        <div class="row mb-3">
          <label class="col-sm-1 col-form-label">Size (MB)</label>
          <div class="col-sm-3">
            <input type="number" class="form-control" name="size" id="size" placeholder="Please, provide size" value="<?php echo $_POST['size'] ?? '' ?>"> <!--  Please change -->
            <div class="error-feedback"><?php echo $errors['size'] ?? '' ?></div>
          </div>
        </div>
        <div class="row mb-3">
          <label class="details" class="col-sm-3 col-form-label"> Please, provide size in MB.</label>
        </div>
      </div>

      <!-- _Furniture_ -->
      <div id="Furniture" class="data">
        <div class="row mb-3">
          <label class="col-sm-1 col-form-label">Height (CM)</label>
          <div class="col-sm-3">
            <input type="number" class="form-control" name="height" id="height" placeholder="Please, provide height" value="<?php echo $_POST['height'] ?? '' ?>">
            <div class="error-feedback"><?php echo $errors['height'] ?? '' ?></div>
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-1 col-form-label">Width (CM)</label>
          <div class="col-sm-3">
            <input type="number" class="form-control" name="width" id="width" placeholder="Please, provide width" value="<?php echo $_POST['width'] ?? '' ?>">
            <div class="error-feedback"><?php echo $errors['width'] ?? '' ?></div>
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-1 col-form-label">Length (CM)</label>
          <div class="col-sm-3">
            <input type="number" class="form-control" name="length" id="length" placeholder="Please, provide length" value="<?php echo $_POST['length'] ?? '' ?>">
            <div class="error-feedback"><?php echo $errors['length'] ?? '' ?></div>
          </div>
        </div>
        <div class="row mb-3">
          <label class="details" class="col-sm-3 col-form-label"> Please, provide dimensions.</label>
        </div>
      </div>
      
      <!-- _Book_-->
      <div id="Book" class="data">
        <div class="row mb-3">
          <label class="col-sm-1 col-form-label">Weight (KG)</label>
          <div class="col-sm-3">
            <input type="number" class="form-control" name="weight" id="weight" placeholder="Please, provide weight" value="<?php echo $_POST['weight'] ?? '' ?>">
            <div class="error-feedback"><?php echo $errors['weight'] ?? '' ?></div>
          </div>
        </div>
        <div class="row mb-3">
          <label class="details" class="col-sm-3 col-form-label"> Please, provide weight in KG.</label>
        </div>
      </div>
      <input id="submit_data" type="submit" name="submit_data">
    </form>

    <!-- footer start -->
    <footer id="footer" class="navbar navbar-dark bg-dark">
      <div class="container-fluid justify-content-center">
        <a class="navbar-brand">Scandiweb Test assignment</a>
      </div>
    </footer>

  </body>

</html>