<?php
//iusuario.php - serve para cadastrar um novo usuário
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$id = $data['id'];
$nome = strtoupper($data['nome']);
$ativo = $data['ativo'];
$sql = "update categorias set catnome = ?, catativo = ? where catid = ?;";
$prp = $pdo->prepare($sql);
$prp->execute([$nome,$ativo,$id]);
Conexao::desconectar();
//{"nome":"valor"}
//http://localhost/Projetos_ETEC_PWEB-III_Div1/api/categorias/ucategoria.php?jsn={"nome":"LANCHE","ativo":1,"id":6}