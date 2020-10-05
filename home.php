<?php 
@session_start();
include_once(".\controladores\Juego.php");
  $juegosActivos = listarJuegosActivos(); 


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="./css/estiloshome.css" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!-- header navbar -->
    <div class w="100">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Home bingo</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <img src="./img/img-usuario.png" class="avatar" />
                Usuario
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Cerrar sesion</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Card juego -->
      <div id="content">
        <section class="py-3">
          <div class="container">
            <div class="row">
              <div class="col-lg-9">
                <h1 class="font-weight-bold-mb-8">Bienvenido al Bingo</h1>
              </div>
              <div class="col-lg-3 d-flex">
                <button
                  type="button"
                  class="btn btn-warning w=100 align-self-center"
                  data-toggle="modal"
                  data-target="#modalNuevoJuego"
                >
                  Nuevo juego
                </button>

                <!-- Modal nuevo juego-->
                <div
                  class="modal fade"
                  id="modalNuevoJuego"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true"
                >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                          Nuevo juego de Bingo
                        </h5>
                        <button
                          type="button"
                          class="close"
                          data-dismiss="modal"
                          aria-label="Close"
                        >
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="control_inicio.php?inicioaccion=1"  method="POST">
                          <div class="form-group">
                            <label for="formGroupExampleInput"
                              >Seleccione el tipo de juego:</label
                            >
                            <select class="form-control form-control-sm" name="tipo_juego">
                              <option>Columna B</option>
                              <option>Columna I</option>
                              <option>Columna N</option>
                              <option>Columna G</option>
                              <option>Columna O</option>
                              <option>Tabla llena</option>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-primary">
                            Iniciar
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section>
          <div class="container">
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <div class="col-lg-1">
                      <img src="./img/game.png" width="50px" height="50px" class="mr-3" alt="..." />
                    </div>
                    <div class="col-lg-4">
                      <div class="media-body">
                        <h2 class="mt-0">JUEGOS</h2>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="bg-grey">
          <div class="container">
            <div class="card my-3">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Decripción</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                  </tr>
                   -->
                   <?php 

                      foreach($juegosActivos as $js){
                        echo "<tr>";
                        echo "<td>".$js->id."</td>";
                        echo "<td>".consultarUsuario($js->id)->nombre."</td>";

                        ?>

                        <td>
                        <a href="bingo.php?id=<?php echo $js->id; ?>" tittle="Unirse al juego"><i class='class="bi bi-plug'></i></a> &nbsp  

                        </td>

                        <?php

                        echo "</tr>";

                      }

                   ?>

                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/app.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
