<?php 
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET, 'jsn');
$data = json_decode($json, true);
// $nome = strtoupper($data['nome']);
$id = $data['id'];
$sql = "delete from ingredientes where ingid=?;";
$prp = $pdo->prepare($sql);
$prp->execute([$id]);
Conexao::desconectar();
//http://localhost/Projetos_ETEC_PWEB-III_Div2/api/ingredientes/dingrediente.php?jsn={"id":}
?>