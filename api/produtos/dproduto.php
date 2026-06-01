<?php
//iusuario.php - serve para cadastrar um novo usuário
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$id = $data['id'];
$sql = "delete from produtos where proid = ?;";
$prp = $pdo->prepare($sql);
$prp->execute([$id]);
Conexao::desconectar();
//{"id":5}
//http://localhost/Projetos_ETEC_PWEB-III_Div1/api/produtos/dproduto.php?jsn={"id":2}