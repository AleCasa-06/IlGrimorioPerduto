<html>
    <head>
        <title>Inventario</title>
    </head>
    <body>
        <form action="inventario.php" method="POST">
            <label for="classe">Classe:</label><br>
            <input type="text" name="classe"><br>

            <label for="livello">Livello:</label><br>
            <input type="number" name="livello"><br>

            <button type="submit" name="filtro">Cerca</button>
        </form>
    </body>
</html>



<?php
require "vendor/autoload.php"; 
$uri = "mongodb://localhost:27017"; 

// Crea una nuova istanza del client MongoDB
$client = new MongoDB\Client($uri);

// Seleziona il database
$database = $client->gilda_avventurieri;  

// Seleziona una raccolta (collection)
$collection = $database->personaggi; 

    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['filtro'])){
        if($_POST['classe'] <> ""){
            echo "Eroi della classe: " . $_POST['classe'] . '<br>'; 
            $classe = $collection->find(['classe' => $_POST['classe'] ]); 
            
            foreach($classe as $doc){
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
        }
        else if($_POST['livello'] <> ""){
            echo "Eroi di livello: " . $_POST['livello'] . '<br>'; 
            $livello = $collection->find(['livello' => $_POST['livello'] ]); 
            foreach($livello as $doc){
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
        }
        
            


    }
    



  

?>