<?php
    include 'Products.php';
    ob_start();
      /**
      * This is the DVD class it extends the parent class Products. 
      * @param post_data This contains the input data recived from Validator class.
      * @return error, This returns array of errors.
      */
     class DVD extends Products implements Validate{
        private $data = [];
        private $sku, $name, $price, $type, $size;

        public function __construct ($post_data){
            $this->data = $post_data;
            $this->sku = $this->data['sku'];
            $this->name = $this->data['name'];
            $this->price = $this->data['price'];
            $this->size = $this->data['size'];
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

        public function submit(){
            $letters = array("$this->sku","$this->name", "$this->type");
            $numbers = array("$this->price","$this->size");
            $nkeys = array('price', 'size');
            $lkeys = array('sku', 'name', 'productType');

            $error = $this->getErrors($numbers, $letters, $nkeys, $lkeys );
            
           
            if(!empty($error)){
               return $error;
            }else{
                $this->save(array("size","$this->sku","$this->name","$this->price","$this->size"));
            }
        }
    }
?>