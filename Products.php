<?php
 
    include 'QueryBuilder.php';
    /**
      * This is the abstract Products class extends the QueryBuilder class. 
      * It used as parent class to the products type.
      */
 
    abstract class Products extends QueryBuilder{
        private $errors = [];

        /**
        * This is the abstract validateProductType function, it will be overridden by the children classes
        * to handle the product type.
        */
        abstract public function validateProductType();

        /**
        * This is checkSku function, used to check the status if a SKU exists or not.
        * @param val, This contains the sku value submited by the user.
        */
        public function checkSku($skuValue){
            $status = $this->find($skuValue);
            if($status){
                $this->addErr('sku', 'Please, This sku exists');
            }
        }

        /**
        * This is save function, used to save the data to the database.
        * @param array of values, contains the data values.
        */
        public function save(array $val){
            $this->insert($val);
        }

    
        /**
        * This is validateLetters function, used to validate the words inserted by the user.
        * @param array of keys, contains the key values.
        * @param array of values, contains the data values.
        */

        public function validateLetters(array $keys, array $values){
            $i = 0;
            foreach ($values as $value){
               
                $val = trim($value);

                if(empty($val)){
                    $this->addErr($keys[$i++], 'Please, submit required data');
                }else {
                    if(!preg_match('/^[A-Za-z0-9]*$/', $val)){
                        $this->addErr($keys[$i++], 'Please, provide the data of indicated type');
                    }else{
                        $i++;
                    }
                }
            } 
        }
        /**
        * This is validateNumbers function, used to validate the numbers inserted by the user.
        * @param array of keys, contains the key values.
        * @param array of values, contains the data values.
        */
        public function validateNumbers(array $keys, array $values){
            $i = 0;
            foreach ($values as $value){
                $val = trim($value);
                if(empty($val)){
                    $this->addErr($keys[$i++], 'Please, submit required data');
                    
                }else {
                    if(!preg_match('/^[0-9]*$/', $val) || $val <= 0){
                        $this->addErr($keys[$i++], 'Please, provide the data of indicated type');
                    }else{
                        $i++;
                    }
                }
            }   
        }

        /**
        * This is addErr function, used to collect the errors, 
        * and add the errors to its keys.
        * @param key, contains the key value.
        * @param val, contains the error.
        */
        private function addErr($key, $val){
            $this->errors[$key] = $val;
        }

        /**
        * This is getErrors function, used to return the errors collected after the validation.
        * @param array number, contains the number values input.
        * @param array letters, contains the words values input.
        * @param array nkeys, contains the keys for the numbers.
        * @param array lkeys, contains the keys for the words.
        * @return array errors, contains the errors with their keys.
        */
        public function getErrors(array $number, array $letters, array $nkeys, array $lkeys){

            $this->checkSku($letters[0]);
            $this->validateLetters($lkeys, $letters);
            $this->validateNumbers($nkeys, $number);
            return $this->errors;
        }

        /**
        * This is getAll function, used to request for the full data from the database. 
        * @return data, contains all data from the database 
        */
        public function getAll(){
            $data = $this->select();
            return $data;
        }

        
        /**
        * This is the abstract submit data, it will be overridden by the children classes.
        */
        abstract public function submit();

    }
?>