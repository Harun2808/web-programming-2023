<?php

class MidtermDao {

    private $conn;

    class MyDao {

      private $conn;
  
      public function __construct($servername, $username, $password, $database, $port = 3306) {
          $this->conn = new mysqli($servername, $username, $password, $database, $port);
  
          if ($this->conn->connect_error) {
              die("Connection failed: " . $this->conn->connect_error);
          }
      }

  
      public function close() {
          $this->conn->close();
      }
  }
  
    public function __construct(){
        try {

          class MyDao {

            private $conn;
        
            public function __construct($servername, $username, $password, $database, $port = 3306) {
                $dsn = "mysql:host=$servername;dbname=$database;port=$port;charset=utf8mb4";
        
                try {
                    $this->conn = new PDO($dsn, $username, $password);
                } catch(PDOException $e) {
                    die("Connection failed: " . $e->getMessage());
                }
            }
        
            public function close() {
                $this->conn = null;
            }
        }
        


        /*options array neccessary to enable ssl mode - do not change*/
        $options = array(
        	PDO::MYSQL_ATTR_SSL_CA => 'https://drive.google.com/file/d/1g3sZDXiWK8HcPuRhS0nNeoUlOVSWdMAg/view?usp=share_link',
        	PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,

        );
        class MyDao {

          private $conn;
      
          public function __construct($servername, $username, $password, $database, $port = 3306) {
              $dsn = "mysql:host=$servername;dbname=$database;port=$port;charset=utf8mb4";
      
              try {
                  $this->conn = new PDO($dsn, $username, $password);
              } catch(PDOException $e) {
                  die("Connection failed: " . $e->getMessage());
              }
          }
      
          
      
          public function close() {
              $this->conn = null;
          }
      }
      

        // set the PDO error mode to exception
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }

    
    class MyDao {

    private $conn;

    public function __construct($servername, $username, $password, $database, $port = 3306) {
        $dsn = "mysql:host=$servername;dbname=$database;port=$port;charset=utf8mb4";

        try {
            $this->conn = new PDO($dsn, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getCapTable() {
        $stmt = $this->conn->prepare("SELECT * FROM cap_table");
        $stmt->execute();
        $capTable = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $capTable;
    }
}

    public function cap_table(){

    }

    
    class MyDao {

    private $conn;

    public function __construct($servername, $username, $password, $database, $port = 3306) {
        $dsn = "mysql:host=$servername;dbname=$database;port=$port;charset=utf8mb4";

        try {
            $this->conn = new PDO($dsn, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getSummary() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS total_records, SUM(amount) AS total_amount FROM transactions");
        $stmt->execute();
        $summary = $stmt->fetch(PDO::FETCH_ASSOC);
        return $summary;
    }
}

    public function summary(){

    }

    class MyDao {

      private $conn;
  
      public function __construct($servername, $username, $password, $database, $port = 3306) {
          $dsn = "mysql:host=$servername;dbname=$database;port=$port;charset=utf8mb4";
  
          try {
              $this->conn = new PDO($dsn, $username, $password);
              $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
              die("Connection failed: " . $e->getMessage());
          }
      }
  
      public function getInvestorsWithTotalSharesAmount() {
          $stmt = $this->conn->prepare("SELECT investors, SUM(share_classes) AS total_share_classes FROM cap_table GROUP BY investors");
          $stmt->execute();
          $investors = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $investors;
      }
  }
  
    public function investors(){

    }
}
?>
