<?php
  include 'Validate.php';
  include 'DVD.php';
  include 'Books.php';
  include 'Furnitures.php';

      /**
      * This is the Validator class used to validate the product types. 
      * Then send the input data to one of the product type class.
      * @param post_data This contains the input data recived.
      * @return errors, This returns array of errors.
      */
  
      class Validator{

        private $data = [];
        private $errors = [];
        
        public function __construct ($post_data){

          $this->data = $post_data;
         
        }

       /**
       * This method is used to validate the product types. 
       * @return errors, This returns array of errors.
       */
       public function validateForm(){
      
        if ($this->data['productType'] == "Book"){
          $book = new Books($this->data);
          $errors = $book->submit();
          return $errors;
          
        }elseif($this->data['productType'] == "DVD"){
          $dvd = new DVD($this->data);
          $errors = $dvd->submit();
          return $errors;

        }elseif($this->data['productType'] == "Furniture"){
          $furniture = new Furnitures($this->data);
          $errors = $furniture->submit();
          return $errors;
        }else{
          $this->validateInputs();
          return $this->errors;
        }
      }

      /**
      * This method is used to validate the inputs if the product type is not decided. 
      */
      public function validateInputs(){  

        $keys = array('sku', 'name', 'price', 'productType');
        foreach($keys as $key){
          $val = trim($this->data[$key]);
          if(empty($val) || $val=='Please, choose type'){
            $this->errors[$key] = 'Please, submit required data.';

          }
        
        }
      }
    }

?>
