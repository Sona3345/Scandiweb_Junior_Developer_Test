<?php

    ob_start();

    /**
      * This is the Delete class it extends QueryBuilder class. 
      * Used to delete the specified products.
      * @param post_data, This contains the selected ids.
      */

    class Delete extends QueryBuilder{
        private $data = [];
        private $all_id;

        public function __construct ($post_data){
              $this->data = $post_data;
              $this->all_id = $this->data['delete_id'];
        }

        /**
        * This is deleteProducts function, used to delete the products
        * Then return to the ProductList page.
        */
        public function deleteProducts(){  
            if(!empty($this->all_id)){
                $extract_id = implode(',', $this->all_id);
                $this->delete($extract_id);
            }
            header("Location: ProductList.php");
            ob_end_flush();
        }
    }
