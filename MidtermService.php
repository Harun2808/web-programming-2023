<?php
require_once __DIR__."/../dao/MidtermDao.php";

class MidtermService {
    protected $dao;

    public function __construct(){
        $this->dao = new MidtermDao();
    }

    

    class CapTableService {
        private $dao;
    
        public function __construct($servername, $username, $password, $database, $port) {
            $this->dao = new MyDAO($servername, $username, $password, $database, $port);
        }
    
        public function getDetailedCapTable() {
            $stmt = $this->dao->getConnection()->prepare("SELECT class, category, CONCAT(first_name, ' ', last_name) AS investor, diluted_shares FROM cap_table ORDER BY class, category, investor");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $cap_table = array();
            $current_class = null;
            $current_category = null;
            $current_class_index = -1;
            $current_category_index = -1;
            foreach ($results as $row) {
                $class = $row['class'];
                $category = $row['category'];
                $investor = $row['investor'];
                $shares = $row['diluted_shares'];
    
                if ($class != $current_class) {
                    $current_class = $class;
                    $current_class_index++;
                    $current_category_index = -1;
                    $cap_table[$current_class_index]['class'] = $class;
                    $cap_table[$current_class_index]['categories'] = array();
                }
    
                if ($category != $current_category) {
                    $current_category = $category;
                    $current_category_index++;
                    $cap_table[$current_class_index]['categories'][$current_category_index]['category'] = $category;
                    $cap_table[$current_class_index]['categories'][$current_category_index]['investors'] = array();
                }
    
                $cap_table[$current_class_index]['categories'][$current_category_index]['investors'][] = array(
                    'investor' => $investor,
                    'diluted_shares' => $shares
                );
            }
    
            return json_encode($cap_table);
        }
    }
    
    // Example usage:
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $database = "mydatabase";
    $port = 3306;
    
    $capTableService = new CapTableService($servername, $username, $password, $database, $port);
    echo $capTableService->getDetailedCapTable();
    
    public function cap_table(){

    }

    <?php
    // include DAO class
    require_once 'MidtermDao.php';
    
    class MidtermService {
        private $dao;
    
        public function __construct() {
            $this->dao = new MidtermDao();
        }
    
        public function getCapTableSummary() {
            $totalInvestors = $this->dao->getTotalInvestors();
            $totalShares = $this->dao->getTotalShares();
    
            $output = array(
                'total_investors' => $totalInvestors,
                'total_shares' => $totalShares
            );
    
            return json_encode($output);
        }
    }
    ?>
    
    public function summary(){

    }

    <?php
    // include DAO class
    require_once 'MidtermDao.php';
    
    class MidtermService {
        private $dao;
    
        public function __construct() {
            $this->dao = new MidtermDao();
        }
    
        public function getInvestorSharesList() {
            $investorSharesList = $this->dao->getInvestorSharesList();
    
            $output = array();
            foreach ($investorSharesList as $investorShares) {
                $output[] = array(
                    'investor' => $investorShares['investor'],
                    'total_shares' => $investorShares['total_shares']
                );
            }
    
            return json_encode($output);
        }
    }
    ?>
    
    public function investors(){

    }
}
?>
