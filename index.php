<?php
   
    echo "This is a test of the AngelList Api <br./>";

    require_once 'AngelList/Startup.php';
   
    $Startup = new Startup();
    $startups = $Startup->batch(array(
        19178, // Friendorse
        29937, // Wooboard
        67577  // Coachy
    ));
    print_r($startups);
