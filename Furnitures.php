<?php
 
 ob_start();
      /**
      * This is the Furnitures class it extends the parent class Products. 
      * @param post_data This contains the input data recived from Validator class.
      * @return error, This returns array of errors.
      */
     class Furnitures extends Products implements Validate{

      private $data = [];
      private $sku, $name, $price, $type, $dimensions;


         public function __construct ($post_data){
          $this->data = $post_data;
          $this->sku = $this->data['sku'];
          $this->name = $this->data['name'];
          $this->price = $this->data['price'];
          $this->height = $this->data['height'];
          $this->width = $this->data['width'];
          $this->length = $this->data['length']; 
          $this->dimensions = $this->height."x".$this->width."x".$this->length;
          $this->type = $this->data['productType'];

          
        }
        
      /**
      * This is override validateProductType function, used to call submit function.
      * @return error, This returns array of errors.
      */
        public function validateProductType(){

           $errors = $this->submit();
           return $errors;
        }

      /**
      * This is override submit function, used to validate the errors and insert the data.
      * @return error, This returns array of errors.
      */
        public function submit(){
          $letters = array("$this->sku","$this->name", "$this->type");
          $numbers = array("$this->price","$this->height", "$this->length", "$this->width");
          $nkeys = array('price', 'height', 'length', 'width');
          $lkeys = array('sku', 'name', 'productType');

          $error = $this->getErrors($numbers, $letters, $nkeys, $lkeys );
          
          if(!empty($error)){
             return $error;
          }else{
            $this->save(array("dimensions","$this->sku","$this->name","$this->price","$this->dimensions"));
          }
      }


    }
?>