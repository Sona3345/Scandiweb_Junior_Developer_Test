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
       * This validateProductType function is used to validate the product types. 
       * @return errors, This returns array of errors.
       */
       public function validateProductType(){

        $lookupArray = [
          'Book' => 'Books',
          'DVD' => 'DVD',
          'Furniture' => 'Furnitures'
        ];

          if(!array_key_exists($this->data['productType'], $lookupArray)) {
             
              $this->validateInputs();
              return $this->errors;
          }
          $className = $lookupArray[$this->data['productType']];

          return ( new $className($this->data) )->validateProductType();
      }

      /**
      * This validateInputs function is used to validate the inputs if the product type is not decided. 
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
