<?php
    include 'Products.php'; 
    /**
      * This is the ViewProducts class it extends the Products class.
      * It shows the products to the user.
      */
    class ViewProducts extends Products{
        /**
        * This is override submit function, used to request all the data to show them to users.
        */
        public function submit(){
            $datas = $this->getAll();
            if(!empty($datas)){
                foreach($datas as $data){
                    echo "<label class='option_product'>
                    <input type='checkbox' class='delete-checkbox' name='delete_id[]' value=".$data['product_ID'].">
                    <div class='description_product'>
                        <div class='detail_product'>
                            <p>".$data['sku']."</p>
                            <p>".$data['name']."</p>
                            <p>".$data['price'].".00 $</p>";
                            if(!empty($data['size'])){
                                echo "<p>Size: ".$data['size']."MB</p>";
                            }elseif(!empty($data['weight'])){
                                echo "<p>Weight: ".$data['weight']."KG</p>";
                            }else{
                                echo "<p>Dimensions: ".$data['dimensions']."</p>";
                            }
                    echo "</div>
                    </div>
                </label>";
                }
            }

            
        }

        public function validateProductType (){}
    }

?>