<?php
require_once 'imports.php';
$db = DB::getInstance();

$request = $db->prepare("SELECT * FROM reunion_island.hiking");
$request->execute();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/basics.css">
    <title>Read</title>
</head>
<body>
    <h1>Voici la liste des randonnées :</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Difficulté</th>
                <th>Distance</th>
                <th>Durée</th>
                <th>Dénivelé</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($request->fetchAll() as $data) {?>
            <tr>
                <td><a class="updateBtn" href="./update.php?id=<?= $data['id'] ?>"><?= $data['name'] ?></a></td>
                <td><?= $data['difficulty'] ?></td>
                <td><?= $data['distance'] ?></td>
                <td><?= $data['duration'] ?></td>
                <td><?= $data['height_difference'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a id="insertion" href="create.php">Insérer une données</a>
    <a id="insertion" href="./verifs/verifUpdate.php">Mettre à jour</a>
</body>
</html>


