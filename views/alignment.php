<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bandos y cantidad se super heroes por editora</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="form-group">
            <label for="publishers" class="m-2 text-success fw-bold">Seleccione una editora:</label>
            <select name="publishers" id="publishers" class="form-control w-25">
                <option value="" disabled selected>Seleccione Publisher:</option>
            </select>
        </div>

        <div class="row justify-content-center m-5">
            <div class="col-md-8">
                <h6 class="text-primary fw-bold text-center">Bandos y cantidades de superheroes</h6>
                <canvas id="alignmentChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const publishersSelect = document.getElementById('publishers');
            const alignmentChart = document.getElementById('alignmentChart');
            let myChart;

            fetch('../controllers/Publisher.controller.php?operacion=listarPublishers')
                .then(response => response.json())
                .then(data => {
                    data.forEach(publisher => {
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
                    fetch(`../controllers/Alignment.controller.php?operacion=alignmentPorPublisher&id=${idPublisher}`)
                        .then(response => response.json())
                        .then(data => {
                            const ctx = alignmentChart.getContext('2d');
                            if (myChart) {
                                myChart.destroy();
                            }
                            myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: data.map(item => item.alignment),
                                    datasets: [{
                                        label: 'Cantidad de Superheroes',
                                        data: data.map(item => item.cantidad),
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.7)',
                                            'rgba(54, 162, 235, 0.7)',
                                            'rgba(255, 206, 86, 0.7)',
                                            'rgba(75, 192, 192, 0.7)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    },
                                    plugins: {
                                        legend: {
                                            display: false
                                        }
                                    }
                                }
                            });
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }
            });
        });
    </script>
</body>

</html>
