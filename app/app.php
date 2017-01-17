<?php
$host = "localhost";
$user = "root";
$pass = "q1w2e3r4";
$dbname = "softbinator";

$conn = new PDO(
    'mysql:host='.$host.';dbname='.$dbname,
    $user,
    $pass
);

$sql = 'SELECT * FROM todo';
$stmt = $conn->prepare($sql);
$stmt->execute();
//$todos = $stmt->fetchAll();

$todos = [];
while($row = $stmt->fetch()) {
    $todos[] = $row;
}

if(isset($_GET['add']) && !empty($_POST['todo'])) {
    $sql = 'INSERT INTO todo(`todo`) VALUES (:todo)';
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'todo' => $_POST['todo']
    ]);
    header('Location: ./');
    exit;
}

if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case 'done':
            $sql = 'UPDATE todo 
                      SET done = 1 
                      WHERE id = :id';
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'id' => $_POST['id']
            ]);
            break;
        case 'delete':
            $sql = 'DELETE FROM todo 
                      WHERE id = :id';
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'id' => $_POST['id']
            ]);
            break;
        default:
    }
    header('Location: ./');
    exit;
}

$sql = 'SELECT COUNT(*) AS x FROM todo';
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch();
$count = $result['x'];

require 'templates/index.php';