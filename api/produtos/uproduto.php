<?php
//iusuario.php - serve para cadastrar um novo usuário
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$id = $data['id'];
$nome = strtoupper($data['nome']);
$vlvenda = $data['vlvenda'];
$cat = $data['cat'];
$sql = "update produtos set pronome = ?, provalorvenda = ?, procatid = ? where proid = ?;";
$prp = $pdo->prepare($sql);
$prp->execute([$nome,$vlvenda,$cat,$id]);
Conexao::desconectar();
//{"nome":"X-SALADA","vlvenda":0.00,"cat":0,"id":1}
//http://localhost/Projetos_ETEC_PWEB-III_Div1/api/produtos/uproduto.php?jsn={"nome":"X-SALADA","vlvenda":0.00,"cat":0,"id":1}