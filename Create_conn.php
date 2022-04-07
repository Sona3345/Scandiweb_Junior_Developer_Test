<?php
    /**
      * This is the dbconnection class. 
      * It create connection with the database and check the connection status.
      */
    class dbConnection{
         
        private $servername;
        private $username;
        private $password;
        private $dbname;
       // Database config 
       /**
        * This is connect function, used to create connection with the database and check the connection status.
        * @return mysqli, This return the connection.
        */
        protected function connect(){
            $this->servername = "localhost";
            $this->username = "id18488004_scandiwebtest";
            $this->password = "P%hc*3^Wlr$}Rd!z";
            $this->dbname = "id18488004_root";
        
            // Create database connection
            $conn = new mysqli ($this->servername, $this->username, $this->password, $this->dbname);
           
            // Check connection
            if(!$conn) {
                die("Connection failed: ". mysqli_connect_error());
            }else{
                $sql = "CREATE TABLE IF NOT EXISTS products ( 
                    product_ID INT NOT NULL AUTO_INCREMENT,
                    sku VARCHAR(64) UNIQUE NOT NULL,
                    name VARCHAR(64) NOT NULL,
                    price DOUBLE NOT NULL,
                    weight DOUBLE,
                    size DOUBLE,
                    dimensions VARCHAR(64),
                    PRIMARY KEY (product_ID)
                )";
    
                $result = mysqli_query($conn, $sql);
    
                // **Debugging**
                if(!$result){
                    echo "Error creating products table: " . mysqli_error($conn);
                }
                return $conn;
            }
        }
    
    }

?>