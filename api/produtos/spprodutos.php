<?php
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET, 'jsn');
$data = json_decode($json, true);
$nome = '%'.$data['nome'].'%';
$sql = "
select 
    proid as id,
    pronome as produto,
    provalor as preco,
    catnome as categoria
from produtos, categorias
where pronome like ?
and catid = procatid;";
$prp = $pdo->prepare($sql);
$prp->execute([$nome]);
$data = $prp->fetchall(PDO::FETCH_ASSOC);
echo json_encode($data);
Conexao::desconectar();
//http://localhost/Projetos_ETEC_PWEB-III_Div2/api/produtos/spprodutos.php?jsn={%22nome%22:%22Carne%22}
?>