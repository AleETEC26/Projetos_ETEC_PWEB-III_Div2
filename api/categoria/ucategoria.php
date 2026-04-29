<?php 
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET, 'jsn');
$data = json_decode($json, true);
$id = $data['id'];
$nome = $data['categoria'];
$ativo = $data['status'];
$sql = "update categorias set catnome=?, catativo=? where catid=?;";
$prp = $pdo->prepare($sql);
$prp->execute([$nome, $ativo, $id]);
Conexao::desconectar();
//http://localhost/Projetos_ETEC_PWEB-III_Div2/api/ucategoria.php?jsn={%22categoria%22:%22Eletr%C3%B4nicos%22,%20%22status%22:1,%20%22id%22:5}
?>