<?php

    ob_start();

    /**
      * This is the Delete class it extends dbConnection class. 
      * Used to delete the specified products.
      * @param post_data, This contains the selected ids.
      */

    class Delete extends dbConnection{
        private $data = [];
        private $all_id;

        public function __construct ($post_data){
              $this->data = $post_data;
              $this->all_id = $this->data['delete_id'];
        }

        /**
        * This is delete function, used to delete the products from the database.
        */
        private function delete(){
            if(!empty($this->all_id)){
                $extract_id = implode(',', $this->all_id);
                $query = "DELETE FROM products WHERE product_ID IN($extract_id);";
                mysqli_query($this->connect(), $query);
            }
        }

        /**
        * This is deleteProducts function, used to delete the products
        * Then return to the ProductList page.
        */
        public function deleteProducts(){  
            $this->delete();
            header("Location: ProductList.php");
            ob_end_flush();
        }
    }
