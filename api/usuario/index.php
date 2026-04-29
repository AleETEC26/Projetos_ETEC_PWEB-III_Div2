<?php 
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET, 'jsn');
$data = json_decode($json, true);
$ope = $data['ope']; //operador
$id = $data['id'];
$nome = $data['nome'];
$login = $data['login'];
$senha = $data['senha'];
$logado = $data['logado'];
//http://localhost/Projetos_ETEC_PWEB-III_Div2/api/usuario/index.php?jsn={%22ope%22:%22i%22,%22id%22:1,%22nome%22:%22Alexandre%22,%22login%22:%22Alex%22,%22senha%22:1234,%22logado%22:1}
switch($ope) {
    case 'i':
        $sql = "insert into usuarios(usunome, usulogin, ususenha) values (?, ?, MD5(?));";
        $prp = $pdo->prepare($sql);
        $prp->execute([$nome, $login, $senha]);
        break; 
    case 'u':
        if (empty($data['senha'])) {
            $sql = "update usuarios set usunome=?, usulogin=?, usulogado=? where usuid=?;";
            $prp = $pdo->prepare($sql);
            $prp->execute([$nome, $login, $logado, $id]); 
        }
        else {
            $sql = "update usuarios set usunome=?, usulogin=?, ususenha=MD5(?), usulogado=? where usuid=?;";
            $prp = $pdo->prepare($sql);
            $prp->execute([$nome, $login, $senha, $logado, $id]);  
        }
        break;
    case 'd':
            $sql = "delete from usuarios where usuid=?;";
            $prp = $pdo->prepare($sql);
            $prp->execute([$id]);
            break;
    case 'l':
        $sql = "select 
        usuid as id,
        usunome as nome,
        usulogin as usuario,
        usulogado as logado
        from usuarios 
        where usulogin=? and ususenha=MD5(?);";
        $prp = $pdo->prepare($sql);
        $prp->execute([$logado, $senha]);
        $data = $prp->fetchall(PDO::FETCH_ASSOC);
        echo json_encode($data);
        break;
    case 'sp':
        $nome = '%'.$nome.'%';
         $sql = "select 
        usuid as id,
        usunome as nome,
        usulogin as usuario,
        usulogado as logado
        from usuarios 
        where usunome like ?;";
        $prp = $pdo->prepare($sql);
        $prp->execute([$nome]);
        $data = $prp->fetchall(PDO::FETCH_ASSOC);
        echo json_encode($data);
        break;
    default:
        echo 'Coloca o parâmetro certo, seu ameba';
        break;
}
Conexao::desconectar();
?>