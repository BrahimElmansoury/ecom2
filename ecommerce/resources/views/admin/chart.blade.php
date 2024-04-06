<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Sold by Category</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/adminstyle.css"> <!-- Custom CSS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <style>
        #charts-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .chart-container {
            width: 80%;
            margin-bottom: 20px;
        }

        .chart-description {
            margin-top: 10px;
            text-align: center;
        }

        #sidebar {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
        }

        #sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        #sidebar ul li {
            margin-bottom: 10px;
        }

        #sidebar ul li a {
            text-decoration: none;
            color: #333;
        }

        #sidebar ul li a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="brand">
                <div class="logo">
                    <a href="index.html">
                        <img src="../img/icons/online_shopping.png" class="img-fluid">
                        <div class="logo-text">
                            <p class="big-logo">Ecommerce</p>
                            <p class="small-logo">online shop</p>
                        </div>
                    </a>
                </div> <!-- logo -->
                <div class="shop-icon">
                    <div class="dropdown">
                        <img src="../img/icons/account.png" class="img-fluid">
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Settings</a></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- shop icons -->
            </div> <!-- brand -->
        </div> <!-- container -->
    </header> <!-- header -->

    <main class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="sidebar">
                        <h3>Menu</h3>
                        <ul>
                            <li><a href="{{ route('admin.indexAdmin') }}">Accueil</a></li>
                            <li><a href="{{ route('admin.order') }}">Commande</a></li>
                            <li><a href="{{ route('admin.product') }}">Produit</a></li>
                            <li><a class="active" href="{{ route('admin.category') }}">Catégorie</a></li>
                            <li><a href="{{ route('admin.stock') }}">Stock</a></li>
                            <li><a href="">Utilisateurs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <h1>Products Sold by Category</h1>
                    <div id="charts-container">
                        <div class="chart-container">
                            <canvas id="salesByCategoryChart" width="800" height="400"></canvas>
                            <p class="chart-description">Evolution des ventes par catégorie au fil du temps.</p>
                        </div>
                        <div class="chart-container">
                            <canvas id="clientSalesChart" width="800" height="400"></canvas>
                            <p class="chart-description">Répartition des ventes par client.</p>
                        </div>
                        <div class="chart-container">
                            <canvas id="productChart" width="800" height="400"></canvas>
                            <p class="chart-description">Nombre total de produits vendus par catégorie.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
          console.log('Fetching data...');
        // Utilisation d'Axios pour effectuer une requête GET à la route '/sales/data'
        axios.get('/sales/category')
            .then(function (response) {
                // Les données sont récupérées avec succès
                var data = response.data;
                console.log(data);
                // Organiser les données par catégorie
                var categories = {};
                data.forEach(function(item) {
                    if (!categories[item.category]) {
                        categories[item.category] = [];
                    }
                    categories[item.category].push({ date: item.created_at, sales: parseInt(item.total_sales) });
                });
                console.log(categories);

                // Créer un tableau pour les labels de dates
                var dates = Object.values(categories).reduce((acc, curr) => {
                    curr.forEach(dataPoint => {
                        if (!acc.includes(dataPoint.date)) {
                            acc.push(dataPoint.date);
                        }
                    });
                    return acc;
                }, []);
                dates.sort();

                // Créer un ensemble de données pour chaque catégorie
                var datasets = [];
                for (var category in categories) {
                    var categorySales = new Array(dates.length).fill(0);
                    categories[category].forEach(function(dataPoint) {
                        var index = dates.indexOf(dataPoint.date);
                        categorySales[index] += dataPoint.sales;
                    });
                    datasets.push({
                        label: category,
                        data: categorySales,
                        backgroundColor: getRandomColor(),
                        borderWidth: 1
                    });
                }

                // Créer un graphique avec Chart.js
                var ctx = document.getElementById('salesByCategoryChart').getContext('2d');
                var salesByCategoryChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: dates,
                        datasets: datasets
                    },
                    options: {
                        scales: {
                            x: {
                                stacked: true
                            },
                            y: {
                                stacked: true
                            }
                        }
                    }
                });
            })
            .catch(function (error) {
                // Une erreur s'est produite lors de la récupération des données
                console.error('Request failed:', error);
            });

        // Fonction pour générer une couleur aléatoire
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
            console.log('Fetching data...');
        // Utilisation d'Axios pour effectuer une requête GET à la route '/sales/clients'
        axios.get('/sales/data')
            .then(function (response) {
                // Les données sont récupérées avec succès
                var data = response.data;
                console.log(data);
                // Extraire les noms des clients et leurs ventes totales
                var clientNames = [];
                var totalSales = [];
                data.forEach(function(item) {
                    clientNames.push(item.nom);
                    totalSales.push(item.total_sales);
                });

                // Créer un graphique avec Chart.js
                var ctx = document.getElementById('clientSalesChart').getContext('2d');
                var clientSalesChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: clientNames,
                        datasets: [{
                            label: 'Sales by Client',
                            data: totalSales,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(153, 102, 255, 0.7)',
                                'rgba(255, 159, 64, 0.7)'
                            ]
                        }]
                    }
                });
            })
            .catch(function (error) {
                // Une erreur s'est produite lors de la récupération des données
                console.error('Request failed:', error);
            });
     console.log('Fetching data...');
// Utilisation d'Axios pour effectuer une requête GET à la route '/admin/data'
axios.get('/admin/data')
.then(function (response) {
    // Les données sont récupérées avec succès
    var data = response.data;

    // Extraire les catégories et les totaux des données récupérées
    var categories = [];
    var totals = [];
    data.forEach(function(item) {
        categories.push(item.category);
        totals.push(item.total);
    });

    // Créer un graphique avec Chart.js
    var ctx = document.getElementById('productChart').getContext('2d');
    var productChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: categories,
            datasets: [{
                label: 'Products Sold',
                data: totals,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
})
.catch(function (error) {
    // Une erreur s'est produite lors de la récupération des données
    console.error('Request failed:', error);
});

    </script>
</body>
</html>
