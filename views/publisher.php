<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <div class="container mt-5">
      <h5 class="text-primary">Listado de publishes</h5>


      <div class="mb-3">
        <label for="publishes">Publishes</label>
        <select name="publishes" id="publishes" required class="form-select">
          <option value="">Seleccione:</option>
        </select>


        <table class="table table-hover" id="tabla-superheroes">
          <thead>
            <tr id="cabezera_tabla">
              <th scope="col" id="idsuperheroe">ID</th>
              <th scope="col" id="nombre">Nombre</th>
              <th scope="col" id="ncompleto"> Nombre completo</th>
              <th scope="col" id="genero"> Genero</th>
              <th scope="col" id="raza">Raza</th>
              </tr>
          </thead>
          <tbody id="contenido-tabla-superheroes">

          </tbody>

        </table>

      </div>





    </div>



    <script>

      document.addEventListener('DOMContentLoaded',()=>{
        function $(id){
          return document.querySelector(id);
        }

        (function(){

          fetch(`../controllers/Publisher.controller.php?operacion=listar`)
          .then(respuesta =>respuesta.json())
          .then(datos =>{
            console.log(datos);
            datos.forEach(element => {

              const tagOption = document.createElement("option");
              tagOption.value = element.id;
              tagOption.innerText = element.publisher_name;
              $("#publishes").appendChild(tagOption);

              
            });

          })
          .catch(e =>{
            console.error(e);
          })

          





        })();






















      })



    </script>





    
  </body>



</html>
