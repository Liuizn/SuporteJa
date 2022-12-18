<?php 

    session_start();
    // variável Token
    $token_usuario = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');

    $senha_encode = md5($_POST['senha']);

    // Usuarios do Sistema

    // Perfil_id com valor == '1' é administrador, valor == '2' usuário comum
    $usuarios_app = [
        ['id' => 1, 'email' => 'admin@admin.com', 'senha' => '21232f297a57a5a743894a0e4a801fc3', 'perfil_id' => 1],
        ['id' => 2, 'email' => 'usuario@usuario.com', 'senha' => 'f8032d5cae3de20fcec887f395ec9a6a', 'perfil_id' => 2]
    ];
    // Laço para percorrer sobre os arrays e validar as informações  pelo $token_usuario
    foreach ($usuarios_app as $cadastros)
    {
        if ($cadastros['email'] == $_POST['email'] && $cadastros['senha'] == $senha_encode)
        {
            $token_usuario = true;
            $usuario_id = $cadastros['id'];
            $usuario_perfil_id = $cadastros['perfil_id'];
            break;
        }
    }

    if ($token_usuario === true)
    { 
        echo 'Passou';

        $_SESSION['Autenticado'] = 'SIM';
        $_SESSION['id']          = $usuario_id;
        $_SESSION['perfil_id']   = $usuario_perfil_id;

        header('Location: ../views/home.php');
    }
    else
    {
        $_SESSION['Autenticado'] = 'NAO';

        header('Location: index.php?login=erro');
    }
