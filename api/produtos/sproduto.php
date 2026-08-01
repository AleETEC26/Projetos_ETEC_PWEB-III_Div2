<?php
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = "
select 
proid as id, 
pronome as nome, 
provalorvenda as vlvenda,
catnome as categoria,
procatid as cat 
from produtos, categorias
where catid = procatid;
";
$prp = $pdo->prepare($sql);
$prp->execute();
$data = $prp->fetchall(PDO::FETCH_ASSOC);
echo json_encode($data);
Conexao::desconectar();
//http://localhost/Projetos_ETEC_PWEB-III_Div2/api/produtos/sproduto.php