<?php
require_once '../Classe/DB.php';
$db = DB::getInstance();

if(isset($_POST['name'], $_POST['difficulty'], $_POST['distance'], $_POST['time'], $_POST['height_difference'])){
    $name = $_POST['name'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $time = $_POST['time'];
    $height = $_POST['height_difference'];

    try {
        $request = $db->prepare("UPDATE reunion_island.hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :heightDifference WHERE id = :id");
        $request->bindValue(':name', $name);
        $request->bindValue(':difficulty', $difficulty);
        $request->bindValue(':distance', $distance);
        $request->bindValue(':duration', $time);
        $request->bindValue(':heightDifference', $height);
        $request->bindValue(':id', intval($_GET['id']), PDO::PARAM_INT);

        $result = $request->execute();
        var_dump($result);
        //header('Location: ../update.php?message=OK');
    }catch (PDOException $exception){
        //header('Location: ../update.php?message=error&error='. $exception->getMessage());
    }
}