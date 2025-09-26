<?php
include_once("./layout/validacao.php");
?>

<!doctype html>
<html lang="pt-BR" data-bs-theme="auto">

<head>
  <title>Sistema - Lalá Cake</title>
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
          <h1 class="h2">Dashboard</h1>
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
          </div>
        </div>

      </main>
    </div>
  </div>

  <?php include_once("./layout/script_js.php"); ?>

</body>

</html>