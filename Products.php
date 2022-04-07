<?php
 ob_start();
    include 'Create_conn.php';
    /**
      * This is the abstract Products class extends the dbconnection class. 
      * It used as parent class to the products type.
      */
 
    abstract class Products extends dbConnection{
        private $data = [];

        public function __construct (){
            
        }

        /**
        * This is checkSku function, used to search the database, if a SKU exists or not.
        * @param skuValue, This contains the sku value submited by the user.
        */
        public function checkSku($skuValue){
            $sql = "SELECT * FROM products WHERE sku ='$skuValue'";
            $query_run =  mysqli_query($this->connect(), $sql);
            if (mysqli_num_rows($query_run) > 0) {
                $this->addErr('sku', 'Please, This sku exists');
            }
        }

        /**
        * This is insert function, used to insert the data into the database.
        * @param array of values, contains the data values.
        */
        public function insert(array $val){
          
            $sql = "INSERT INTO products (sku, name, price, $val[0]) VALUES ('$val[1]', '$val[2]', '$val[3]', '$val[4]');";
            mysqli_query($this->connect(), $sql);
            header("location: ProductList.php");
            ob_end_flush();
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
        * This is getAll function, used to return all the data from the database
        * ordered by ID in descending order.
        * @return data, contains the all the data from the database.
        */
        protected function getAll(){
            $query = "SELECT * FROM products ORDER BY product_ID DESC";
            $query_run= mysqli_query($this->connect(), $query);

            if (mysqli_num_rows($query_run) > 0) {

                foreach ($query_run as $row) {
                    $data[] = $row;
                }
                return $data;
            }
        }

        /**
        * This is the abstract submit data, it will be overridden by the children classes.
        */
        abstract function submit();

    }
?>