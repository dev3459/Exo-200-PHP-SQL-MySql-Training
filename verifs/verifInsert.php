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
        $request = $db->prepare("INSERT INTO reunion_island.hiking (name, difficulty, distance, duration, height_difference) VALUES (:name, :difficulty, :distance, :duration, :heightDifference)");
        $request->bindValue(':name', $name);
        $request->bindValue(':difficulty', $difficulty);
        $request->bindValue(':distance', $distance);
        $request->bindValue(':duration', $time);
        $request->bindValue(':heightDifference', $height);

        $request->execute();
        header('Location: ../create.php?message=OK');
    }catch (PDOException $exception){
        header('Location: ../create.php?message=error&error='. $exception->getMessage());
    }
}