<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Inserimento</title>
</head>
<body>

    <h1>Modulo di Inserimento Dati Mago</h1>

    <form action="index.php" method="POST">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br>

        <label for="razza">Razza:</label><br>
        <input type="text" id="razza" name="razza" required><br>

        <label for="classe">Classe:</label><br>
        <input type="text" id="classe" name="classe" required><br>

        <label for="livello">Livello:</label><br>
        <input type="number" id="livello" name="livello" min="1" required><br>

        <label for="abilita">Abilità:</label><br>
        <textarea id="abilita" name="abilita" rows="4" required></textarea><br>

        <label for="inventario">Inventario:</label><br>
        <textarea id="inventario" name="inventario" rows="4" required></textarea><br>
        
        <label for="punti_esperienza">Punti Esperienza:</label><br>
        <input type="number" id="punti_esperienza" name="punti_esperienza" min="0" required><br>

   
        <label>Vivo:</label>
        <input type="radio" id="vivo_sì" name="vivo" value="sì" required>
        <label for="vivo_sì">Sì</label>
        <input type="radio" id="vivo_no" name="vivo" value="no">
        <label for="vivo_no">No</label><br>

        
        <label for="missioni_completate">Missioni Completate:</label><br>
        <input type="number" id="missioni_completate" name="missioni_completate" min="0" required><br>

        <button type="submit" name="insert">Invia Dati</button>
        <button type="button" name="read" onclick="window.location.href='inventario.php'">Visualizza eroi vivi</button>
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


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert'])){
    $collection->InsertOne([
        'nome' => $_POST['nome'],
        'razza' => $_POST['razza'],
        'classe' => $_POST['classe'],
        'livello' => $_POST['livello'],
        'abilità' => $_POST['abilita'],
        'inventario' => $_POST['inventario'],
        'punti_esperienza' => $_POST['punti_esperienza'],
        'vivo' => $_POST['vivo'],
        'missioni_completate' => $_POST['missioni_completate']
    ]);
    
}
if(isset($_POST['read'])){
    $all = $collection->find(); 
    foreach($all as $doc){
        echo json_encode($doc); 
    }
}


?>