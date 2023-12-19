<!DOCTYPE html>
<html lang="en">

<head>
    <title>Super heroes por auditora</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h5 class="text-primary fw-bold text-center m-3">Super heroes por auditora</h5>

        <select name="publishers" id="publishers" required class="form-select mb-3">
            <option value="" disabled selected>Seleccione Publisher:</option>
        </select>

        <table class="table table-hover" id="tabla-superheroes">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Nombre Completo</th>
                    <th>Género</th>
                    <th>Raza</th>
                </tr>
            </thead>
            <tbody id="contenido-tabla-superheroes"></tbody>
        </table>
    </div>

 

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const publishersSelect = document.getElementById('publishers');
            const tablaSuperheroes = document.getElementById('tabla-superheroes');
            const contenidoTablaSuperheroes = document.getElementById('contenido-tabla-superheroes');

            
            fetch('../controllers/Publisher.controller.php?operacion=listarPublishers')
                .then(response => response.json())
                .then(publishers => {
                    publishers.forEach(publisher => {
                        const option = document.createElement('option');
                        option.value = publisher.id;
                        option.textContent = publisher.publisher_name;
                        publishersSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });

            publishersSelect.addEventListener('change', function () {
                const idPublisher = this.value;
                if (idPublisher) {
                    fetch(`../controllers/Publisher.controller.php?operacion=superheroesPorPublisher&id=${idPublisher}`)
                        .then(response => response.json())
                        .then(superheroes => {
                            contenidoTablaSuperheroes.innerHTML = '';

                            superheroes.forEach(superhero => {
                                const row = document.createElement('tr');
                                row.innerHTML = `
                                    <td>${superhero.id}</td>
                                    <td>${superhero.name}</td>
                                    <td>${superhero.full_name}</td>
                                    <td>${superhero.gender}</td>
                                    <td>${superhero.race}</td>
                                `;
                                contenidoTablaSuperheroes.appendChild(row);
                            });
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
