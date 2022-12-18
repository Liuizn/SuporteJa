<?php 
    session_start();

    // aqui trata as informações

    $titulo    = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

    $arquivo = fopen('../Bank/chamados.txt', 'a');

    fwrite($arquivo, $texto);

    fclose($arquivo);

    header('Location: ../views/abrir_chamado.php');