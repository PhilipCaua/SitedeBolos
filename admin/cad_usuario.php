<?php
include_once("./layout/validacao.php");
$id = $_GET["id"] ?? ""; // Pega o id da URL se existir 
$titulo = "Novo";
$nome = $_POST["nome"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

if (is_numeric($id)) {
  $sql = "SELECT * FROM usuarios WHERE usuario_id = ?";
  $stmt = $conexao->prepare($sql);
  // i =numero inteiro 
  // s = string
  // d = numero decimal 
  $stmt->bind_param("i", $id); // unica linha que muda 
  $stmt->execute();
  $resultado = $stmt->get_result();
  $total_linhas = $resultado->num_rows;
  while ($linha = $resultado->fetch_object()) {
    $nome = $linha->nome;
    $email = $linha->email;
    $senha = $linha->senha;
    $foto = $linha->foto;
    $titulo = "Alterar ";
  }
}

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
          <h1 class="h2">Usuario - <?= $titulo ?></h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <a href="./cad_usuario.php" class="btn btn-sm btn-primary">
                Novo
              </a>
              <a href="./usuario.php" class="btn btn-sm btn-warning">
                Pesquisa
              </a>
            </div>
          </div>
        </div>

        <!-- Conteudo principal -->
        <div class="card">
          <div class="card-body">
            <form method="POST">
              <div class="row">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="id" class="form-label">ID</label>
                      <input id="id" name="id" type="id" value="<?=$id?>"
                        class="form-control" required>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label for="usuario_id" class=" form-label">Nome</label>
                      <input id="usuario_id" nome="text" value="<?=$nome?>"
                        class="form-control" readonly>

                    </div>
                    <div class="col-md-12 mb-3">
                      <label for="email" class="form-label">e-mail</label>
                      <input id="email" name="email" type="email" value="<?=$email?>"
                        class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="senha" class=" form-label">Senha</label>
                      <input id="senha" type="password" value="<?=$senha?>"
                        class="form-control" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <label class="form-label" for="foto">Foto</label>
                  <input class="form-control" id="foto" name="foto" 
                  type="file" accept="image /png. image/jpeg">
                </div>
              </div>
              <hr>
                <div class="col-6">
                  <button type="submit" class="btn-btn">
                    Salvar 
                  </button>
                </div>
            </form>

          </div>
        </div>

      </main>
    </div>
  </div>

  <?php include_once("./layout/script_js.php"); ?>

</body>

</html>