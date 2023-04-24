<?php

Flight::route('GET /connection-check', function(){
    require_once 'MidtermDao.php';

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $database = "mydatabase";
    $port = 3306;
    
    $dao = new MidtermDao($servername, $username, $password, $database, $port);
    
    echo $dao->getConnectionMessage();
    
});

Flight::route('GET /cap-table', function(){
    require_once 'MyDAO.php';

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $database = "mydatabase";
    $port = 3306;
    
    $dao = new MyDao($servername, $username, $password, $database, $port);
    
    $stmt = $dao->getConnection()->prepare("SELECT class, category, investor_first_name, investor_last_name, diluted_shares FROM cap_table ORDER BY class, category, investor_last_name, investor_first_name");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $shareClasses = array();
    $currentClass = null;
    $currentCategory = null;
    
    foreach ($results as $result) {
        $class = $result['class'];
        $category = $result['category'];
        $firstName = $result['investor_first_name'];
        $lastName = $result['investor_last_name'];
        $shares = $result['diluted_shares'];
    
        if ($class != $currentClass) {
            $currentClass = $class;
            $currentCategory = null;
            $shareClasses[] = array('class' => $class, 'categories' => array());
        }
    
        $categories = end($shareClasses)['categories'];
    
        if ($category != $currentCategory) {
            $currentCategory = $category;
            $categories[] = array('category' => $category, 'investors' => array());
        }
    
        $investors = end($categories)['investors'];
        $investors[] = array('investor' => $firstName . ' ' . $lastName, 'diluted_shares' => $shares);
    }
    
    echo json_encode($shareClasses);
    
});

Flight::route('GET /summary', function(){
    require_once 'MyDao.php';

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $database = "mydatabase";
    $port = 3306;
    
    $dao = new MyDao($servername, $username, $password, $database, $port);
    
    $stmt = $dao->getConnection()->prepare("SELECT COUNT(DISTINCT investor_id) AS num_investors, SUM(diluted_shares) AS total_shares FROM cap_table");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $summary = array(
        'num_investors' => $results[0]['num_investors'],
        'total_shares' => $results[0]['total_shares']
    );
    
    echo json_encode($summary);
    
});

Flight::route('GET /investors', function(){
    require_once 'MyDao.php';

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $database = "mydatabase";
    $port = 3306;
    
    $dao = new MyDao($servername, $username, $password, $database, $port);
    
    $stmt = $dao->getConnection()->prepare("SELECT COUNT(DISTINCT investor_id) AS num_investors, SUM(diluted_shares) AS total_shares FROM cap_table");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $summary = array(
        'num_investors' => $results[0]['num_investors'],
        'total_shares' => $results[0]['total_shares']
    );
    
    echo json_encode($summary);
    
});

?>
