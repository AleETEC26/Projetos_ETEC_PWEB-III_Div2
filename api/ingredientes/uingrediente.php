<?php
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET, 'jsn');
$data = json_decode($json, true);
$id = $data['id'];
$nome = strtoupper($data['nome']);
$valor = $data['valor'];
$sql = "update ingredientes set 
    ingnome = ?,
    ingvalorunitario = ?
where ingid=?;";
$prp = $pdo->prepare($sql);
$prp->execute([$nome, $valor, $id]);
Conexao::desconectar();
//http://localhost/Projetos_ETEC_PWEB-III_Div2/api/ingredientes/uingrediente.php?jsn={"id":,"nome":"","valor":}
?>