<?php
 ob_start();
      /**
      * This is the Books class it extends the parent class Products. 
      * @param post_data This contains the input data recived from Validator class.
      * @return error, This returns array of errors.
      */
     class Books extends Products implements Validate{
        private $data = [];
        private $sku, $name, $price, $type, $weight;

        public function __construct ($post_data){
            $this->data = $post_data;
            $this->sku = $this->data['sku'];
            $this->name = $this->data['name'];
            $this->price = $this->data['price'];
            $this->weight = $this->data['weight'];
            $this->type = $this->data['productType'];

        }

      /**
      * This is override submit function, used to validate the errors and insert the data.
      * @return error, This returns array of errors.
      */
        public function submit(){
            $letters = array("$this->sku","$this->name", "$this->type");
            $numbers = array("$this->price","$this->weight");
            $nkeys = array('price', 'weight');
            $lkeys = array('sku', 'name', 'productType');

            $error = $this->getErrors($numbers, $letters, $nkeys, $lkeys );
        
            if(!empty($error)){
               
               return $error;
            }else{
                $this->insert(array("weight","$this->sku","$this->name","$this->price","$this->weight"));
            }
        }
    }
?>