<?php 
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = "select ingid as id,
    ingnome as nome,
    ingvalorunitario as valor
from ingredientes";
$prp = $pdo->prepare($sql);
$prp->execute();
$data = $prp->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
Conexao::desconectar();
//http://localhost/Projetos_ETEC_PWEB-III_Div2/api/ingredientes/singrediente.php
?>