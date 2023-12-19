<!DOCTYPE html>
<html lang="en">

<head>
    <title>Super heroes por Bandos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h5 class="text-primary fw-bold text-center mb-3">Super heroes por bandos</h5>
                <canvas id="superheroChart" width="400" height="200"></canvas>
            </div>
            <div class="col-md-4">
                <ul id="alignmentList" class="list-group">
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetch('../controllers/Superhero.Controller.php?operacion=contarSuperheroesPorAlineacion')
                .then(respuesta => respuesta.json())
                .then(data => {
                    const ctx = document.getElementById('superheroChart').getContext('2d');
                    const backgroundColors = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'];
                    const borderColors = ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)'];

                    const alignmentData = {
                        labels: data.map(item => item.alignment),
                        datasets: [{
                            label: 'Cantidad de Superheroes',
                            data: data.map(item => item.cantidad),
                            backgroundColor: backgroundColors,
                            borderColor: borderColors,
                            borderWidth: 1
                        }]
                    };

                    const options = {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    };

                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: alignmentData,
                        options: options
                    });

                    const alignmentList = document.getElementById('alignmentList');
                    data.forEach((item, index) => {
                        const listItem = document.createElement("li");
                        listItem.className = "list-group-item";
                        listItem.style.backgroundColor = backgroundColors[index];
                        listItem.style.borderColor = borderColors[index];
                        listItem.innerText = `${item.alignment}: ${item.cantidad}`;
                        alignmentList.appendChild(listItem);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>
