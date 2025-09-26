<?php
include_once("./layout/validacao.php");
$sql = "SELECT * FROM usuarios ORDER BY nome ASC";
$stmt = $conexao->prepare($sql);
// $stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$resultado = $stmt->get_result();
// retrona o numero total de linhas da pesquisa 
$total = $resultado->num_rows;
?>

<!doctype html>
<html lang="pt-BR" data-bs-theme="auto">

<head>
  <title>Usuario - Lalá Cake</title>
  <?php include_once("./layout/head.php"); ?>
</head>

<body>
  <?php include_once("./layout/botao_tema.php"); ?>

  <?php include_once("./layout/menu_principal.php"); ?>

  <div class="container-fluid">
    <div class="row">

      <?php include_once("./layout/menu_lateral.php"); ?>

      <!-- Conteudo principal -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <!-- Titulo principal -->
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Usuários - Pesquisa</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">
                Botão 1
              </button>
              <button type="button" class="btn btn-sm btn-outline-secondary">
                Botão 2
              </button>
            </div>
          </div>
        </div>

        <!-- Conteudo principal -->
        <div class="card">
          <div class="card-body">
            <!-- Informações aqui -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" style="width: 40px;">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">email</th>
                  <th scope="col" style="width: 150px;">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                while ($linha = $resultado->fetch_object()) {
                  $i++;
                ?>
                  <tr>
                    <th scope="row"><?=$i ?></th>
                    <td><?=$linha->nome ?></td>
                    <td><?=$linha->email ?></td>
                    <td>
                      <a href="./cad_usuario.php" class="btn btn-primary me-2">
                        <i class="fa-solid fa-pen-to-square"></i> 
                      </a>
                      <button class="btn btn-danger btn-sm" type="button">
                        <i class="fa-solid fa-trash-can"></i>
                      </button>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

      </main>
    </div>
  </div>

  <?php include_once("./layout/script_js.php"); ?>

</body>

</html>