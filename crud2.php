<?php
    include("conecta.php");

    $matricula = $_POST["Matricula"];
    $nome      = $_POST["Nome"];
    $idade     = $_POST["Idade"];

  if(isset($_POST["inserir"]) )
  {
    $comando = $pdo->prepare("INSERT INTO alunos VALUES($matricula, '$nome', $idade)");
    $resultado = $comando->execute();
    header ("Location: cadastroo.html");
  }

  if(isset($_POST["excluir"]) )
  {
    $comando = $pdo->prepare("DELETE FROM alunos where matricula=$matricula");
    $resultado = $comando->execute();
    header ("Location: cadastroo.html");
  }

  if(isset($_POST["alterar"]) )
  {
    $comando = $pdo->prepare("UPDATE alunos SET nome='$nome', idade=$idade WHERE matricula=$matricula");
    $resultado = $comando->execute();
    header ("Location: cadastroo.html");
  }

  if(isset($_POST["listar"]) )
  {
    $comando = $pdo->prepare("SELECT * FROM alunos");
    $resultado = $comando->execute();
    
    while ( $linhas = $comando->fetch() )
    {
        $m = $linhas["Matricula"];
        $n = $linhas["Nome"];
        $i = $linhas["Idade"];
        echo("Matricula: $m Nome: $n Idade: $i <br>");

    }
  }

?>