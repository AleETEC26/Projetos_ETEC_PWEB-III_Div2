<?php
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');//{"nome":"ENZO APARECIDO"}
$data = json_decode($json,true);
$nome = '%'.$data['nome'].'%';
$sql = "
select 
    usuid as id,
	usunome as nome,
	usulogin as usuario,
	usulogado as logado
from 
    usuarios
where 
    usunome like ?;
";
$prp = $pdo->prepare($sql);
$prp->execute([$nome]);
$data = $prp->fetchall(PDO::FETCH_ASSOC);
echo json_encode($data);

//{"nome":"ENZO APARECIDO"}
/*
[
    {"nome":"ENZO APARECIDO","login":"ENZO","senha":"pythonando"},
    {"nome":"ENZO APARECIDO1","login":"ENZO1","senha":"pythonando1"},
    {"nome":"ENZO APARECIDO2","login":"ENZO2","senha":"pythonando2"}
]
*/
