<?php
require 'vendor/autoload.php';

Flight::route('/',function(){
    echo "Hello World";

});

Flight::route("GET/test", function(){
    echo "Hello Test";   
});

Flight::start();
?>