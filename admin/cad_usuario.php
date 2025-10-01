<?php
include_once("./layout/validacao.php");
$id = $_GET["id"] ?? ""; // Pega o id da URL se existir 
$titulo = "Novo";
$nome = $_POST["nome"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$foto = $_FILES[""] ?? "";
print_r($foto);


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
    // CRIAR PASTA 
    $caminho = __DIR__ . "/img";
    $pasta = str_pad($id, 4, "0", STR_PAD_LEFT);
    // $pasta = sprintf("%03d", 1); // mesma coisa que a linha de cima, porém de forma mais rápida 
    if (!is_dir("$caminho/$pasta")) {
      mkdir("$caminho/$pasta", 0755); // o 0755 é uma permissão para Linux.   
    } else {
      $arquivos = scandir("$caminho/$pasta");
      foreach ($arquivos as $arq) {
        if ($arq != "." && $arq != "..") {
          $imagem = "$pasta/$arq";
        }
      }
    }
  }
}
if (is_numeric($id)) {
  if (isset($_FILES["foto"])) {
    if ($_FILES["foto"]["error"] == 0) {
      $arq_temp = $_FILES["foto"]["tmp_name"];
      $arq_final = "$caminho/$pasta/" . $_FILES["foto"]["name"];
      move_uploaded_file($arq_temp, $arq_final);
    }
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
            <form method="POST" action="" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="id" class="form-label">ID</label>
                      <input id="id" name="id" type="id" value="<?= $id ?>"
                        class="form-control" required>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label for="usuario_id" class=" form-label">Nome</label>
                      <input id="usuario_id" nome="text" value="<?= $nome ?>"
                        class="form-control" readonly>

                    </div>
                    <div class="col-md-12 mb-3">
                      <label for="email" class="form-label">e-mail</label>
                      <input id="email" name="email" type="email" value="<?= $email ?>"
                        class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="senha" class=" form-label">Senha</label>
                      <input id="senha" type="password" value="<?= $senha ?>"
                        class="form-control" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <label class="form-label" for="foto">Foto</label>
                  <input class="form-control" id="foto" name="foto"
                    type="file" accept="image /png. image/jpeg">
                  <?php
                  if (isset($imagem)) {
                  ?>
                    <img class="img-fluid" src="./img/<?= $imagem ?>">
                  <?php
                  }
                  ?>
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