    <?php 
      $filepath = realpath(dirname(__FILE__));
      include_once ($filepath.'/../config/config.php');
    ?>
    <?php
    Class Database{
     public $host   = DB_HOST;
     public $user   = DB_USER;
     public $pass   = DB_PASS;
     public $dbname = DB_NAME;
     
     
     public $link;
     public $error;
     
     public function __construct(){
      $this->connectDB();
     }
     
     private function connectDB(){
      // Pass the port number (3307 in this case) as the fifth argument
      $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname, 3307);
      
      // Check if the connection failed
      if($this->link->connect_error){
          $this->error = "Connection failed: " . $this->link->connect_error;
          return false;
      }
  }
       
      // Select or Read data
      public function select($query){
        $result = $this->link->query($query) or 
           die($this->link->error.__LINE__);
          if($result->num_rows > 0){
            return $result;
          } else {
            return false;
          }
       }
       
      // Insert data
      public function insert($query){
        $insert_row = $this->link->query($query) or 
           die($this->link->error.__LINE__);
         if($insert_row){
           return $insert_row;
         } else {
           return false;
          }
       }
        
      // Update data
       public function update($query){
         $update_row = $this->link->query($query) or 
           die($this->link->error.__LINE__);
         if($update_row){
          return $update_row;
         } else {
          return false;
          }
       }
        
      // Delete data
       public function delete($query){
         $delete_row = $this->link->query($query) or 
           die($this->link->error.__LINE__);
         if($delete_row){
           return $delete_row;
         } else {
           return false;
          }
       }
     
    }