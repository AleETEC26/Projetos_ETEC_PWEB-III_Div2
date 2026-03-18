<?php
require '../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//$json = $_GET['jsn'];//{"nome":"valor"}
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$nome = $data['nome'];
$sql = "select * from usuarios where usunome like '%$nome%';";
$prp = $pdo->prepare($sql);
$prp->execute();
$data = $prp->fetchall(PDO::FETCH_ASSOC);
echo json_encode($data);