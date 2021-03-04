<?php
require_once './Classe/DB.php';
$db = DB::getInstance();
$request = $db->prepare("SELECT * FROM reunion_island.hiking WHERE id = :id");
$request->bindValue('id', $_GET['id']);
$request->execute();

$data = $request->fetch();

if(isset($_GET['message']) && $_GET['message'] === 'OK'){ ?>
    <div id="message">
        <p>Modification de la randonnée réalisé avec succès</p>
        <a id="croix" href="update.php">X</a>
    </div>
<?php }elseif(isset($_GET['message'], $_GET['error']) && $_GET['message'] === 'error'){ ?>
    <div id="error">
        <div id="text">
            <p>Échec de la modification de la randonnée</p>
            <p><?= $_GET['error'] ?></p>
        </div>
        <a id="croix" href="update.php">X</a>
    </div>
<?php } ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/basics.css">
    <title>Randonnées, update</title>
</head>
<body>
<form id="formInsert" action="./verifs/verifUpdate.php" method="POST">
    <label for="name">Nom de la randonnée</label>
    <input type="text" id="name" name="name" value="<?= $data['name'] ?>">
    <label for="difficulty">Difficulté</label>
    <select name="difficulty" id="difficulty">
        <option value="<?= $data['difficulty'] ?>"><?= $data['difficulty'] ?></option>
        <option value="très facile">Très facile</option>
        <option value="facile">Facile</option>
        <option value="moyen">Moyen</option>
        <option value="difficile">Difficile</option>
        <option value="très difficile">Très difficile</option>
    </select>
    <label for="distance">Distance</label>
    <input type="number" id="distance" name="distance" value="<?= $data['distance'] ?>">
    <!-- Ajoutez un / des champs pour gérer la donnée de type time à insérer via PHP -->
    <label for="time">Durée de la randonnée</label>
    <input type="time" id="time" name="time" value="<?= $data['duration'] ?>">
    <label for="difference">Dénivelé</label>
    <input type="number" id="difference" name="height_difference" value="<?= $data['height_difference'] ?>">
    <input type="submit" name="submit">
</form>
</body>
</html>