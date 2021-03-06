<?php
    session_start();
    //verifica se há algum usuário logando antes de mostrar a loginPage
    if(isset($_SESSION['clientid'])){
      if($_SESSION['clientid']!=0){
        header("location:../Home/home.php");
      }
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="uft-8" />
    <title>Expresso API</title>
    <link rel="shortcut icon" href="../../assets/images/image-logo.png" />

    <!-- Importação de CSS -->
    <link rel="stylesheet" href="./stylesLogin.css" />
    <link rel="stylesheet" href="../styles/mainStyles.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
    />
    
    <script src="https://use.fontawesome.com/b9bdbd120a.js"></script>
  </head>
  <body>
    <!-- Divisão da tela -->
    <div class="container-fluid">
      <div class="row">
        <!-- Lado esquerdo -->
        <div id="left-side" class="col">
          <div class="images">
            <img src="../../assets/images/logo.svg" alt="Logo" />
            <img
              class="entregador-responsivo"
              src="../../assets/images/image-login.svg"
              alt="Entregador"
            />
          </div>
        </div>

        <!-- Lado direito -->
        <div id="right-side" class="col">
          <form method="POST" action="../../Controller/Login/login.php">
            <span>Conecte-se</span>

            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input
                type="email"
                class="form-control"
                id="inputEmail"
                name="email"
                placeholder="Email"
                required
              />
            </div>

            <div class="form-group">
              <label>Senha</label>

              <div class="input-group" id="show_hide_password">
                <input
                  class="form-control"
                  type="password"
                  id="inputPassword"
                  name="password"
                  placeholder="senha"
                  required
                />
                <div class="input-group-addon">
                  <a href=""
                    ><i class="fa fa-eye-slash" aria-hidden="true"></i
                  ></a>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Entrar</button>

            <a
              class="forgot-password"
              href="../ForgotPassword/forgotPassword.html"
              >Esqueceu sua senha?</a
            >
          </form>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para esconder e visualizar senha -->
    <script>
      $(document).ready(function () {
        $("#show_hide_password a").on("click", function (event) {
          event.preventDefault();
          if ($("#show_hide_password input").attr("type") == "text") {
            $("#show_hide_password input").attr("type", "password");
            $("#show_hide_password i").addClass("fa-eye-slash");
            $("#show_hide_password i").removeClass("fa-eye");
          } else if (
            $("#show_hide_password input").attr("type") == "password"
          ) {
            $("#show_hide_password input").attr("type", "text");
            $("#show_hide_password i").removeClass("fa-eye-slash");
            $("#show_hide_password i").addClass("fa-eye");
          }
        });
      });
    </script>
  </body>
</html>
