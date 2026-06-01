<?php
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = "
select 
proid as id, 
pronome as nome, 
provalorvenda as vlvenda,
procatid as cat 
from produtos;
";
$prp = $pdo->prepare($sql);
$prp->execute();
$data = $prp->fetchall(PDO::FETCH_ASSOC);
echo json_encode($data);
Conexao::desconectar();
//http://localhost/Projetos_ETEC_PWEB-III_Div1/api/categorias/scategoria.php