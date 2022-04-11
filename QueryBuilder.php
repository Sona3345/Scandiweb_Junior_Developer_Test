<?php
include 'Create_conn.php';
ob_start();
class QueryBuilder extends dbConnection{

        /**
        * This is find function, used to search the database, if a SKU exists or not.
        * @param val, This contains the sku value submited by the user.
        * @return boolean, true if the sku extists and false otherwise.
        */
        public function find($val){
            $sql = "SELECT * FROM products WHERE sku ='$val'";
            $query_run =  mysqli_query($this->connect(), $sql);
            if (mysqli_num_rows($query_run) > 0) {
               return true;
            }else{
                return false;
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
        * This is select function, used to return all the data from the database
        * ordered by ID in descending order.
        * @return data, contains all data from the database.
        */
        protected function select(){
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
        * This is delete function, used to delete the data from the database.
        * @param array of ids, contains all the ids that are chosen to be deleted.
        */
        public function delete ($ids){
            
            $query = "DELETE FROM products WHERE product_ID IN($ids);";
            mysqli_query($this->connect(), $query);
        }



} 

?>