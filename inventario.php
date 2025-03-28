<?php
require "vendor/autoload.php"; 
$uri = "mongodb://localhost:27017"; 

// Crea una nuova istanza del client MongoDB
$client = new MongoDB\Client($uri);

// Seleziona il database
$database = $client->gilda_avventurieri;  

// Seleziona una raccolta (collection)
$collection = $database->personaggi; 

    $all = $collection->find(); 
    foreach($all as $doc){
       $data = $doc->getArrayCopy(); 
       echo 'id_eroe: '. $data['_id'] .'<br>'; 
       echo 'nome: ' . $data['nome'] .'<br>' ; 
       echo 'razza: '. $data['razza'] .'<br>';
       echo 'classe: '. $data['classe'].'<br>';
       echo 'livello: '. $data['livello'].'<br>';
       echo 'abilità: '. $data['abilità'].'<br>';
       echo 'inventario: '. $data['inventario'].'<br>';
       echo 'punti esperienza: '. $data['punti_esperienza'].'<br>';
       echo 'E in vita? '. $data['vivo'].'<br>';
       echo 'missioni completate:'. $data['missioni_completate'].'<br><br><br>';
        
    }

  

?>