<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories</title>
    <!-- Style Sheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/adminstyle.css"> <!-- Custom CSS -->
</head>

<body>

    <header>
        <!-- Votre en-tête ici -->
    </header>

    <main class="mt-4">
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content">
                            <h3 class="mb-4">Gestion des Catégories</h3>
                            <!-- Tableau des catégories -->
                            <div class="content-detail">
                                <h4 class="mb-3">Toutes les Catégories</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom Catégorie</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="categoryList">
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <button class="editCategoryBtn btn btn-primary btn-sm">Éditer</button>
                                                <button class="deleteCategoryBtn btn btn-danger btn-sm">Supprimer</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <!-- Ajouter une nouvelle catégorie -->
                                        <tr id="newCategoryRow" style="display: none;">
                                            <td></td>
                                            <td><input id="newCategoryInput" type="text" class="form-control" placeholder="Nom de la catégorie"></td>
                                            <td>
                                                <button id="saveNewCategoryBtn" class="btn btn-success btn-sm">Enregistrer</button>
                                                <button id="cancelNewCategoryBtn" class="btn btn-secondary btn-sm">Annuler</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Bouton pour ajouter une catégorie -->
                            <div class="mb-3">
                                <button id="addCategoryBtn" class="btn btn-primary">Ajouter une Catégorie</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> <!-- Main Area -->

    <footer class="mt-4">
        <!-- Votre pied de page ici -->
    </footer> <!-- Footer Area -->

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Sélectionne le bouton "Ajouter une Catégorie" et ajoute un écouteur d'événement pour le clic
        document.getElementById('addCategoryBtn').addEventListener('click', function() {
            document.getElementById('newCategoryRow').style.display = 'table-row'; // Afficher la ligne pour ajouter une nouvelle catégorie
            document.getElementById('newCategoryInput').focus(); // Mettre le focus sur le champ de saisie pour le nom de la catégorie
        });

        // Sélectionne le bouton "Enregistrer" pour la nouvelle catégorie et ajoute un écouteur d'événement pour le clic
        document.getElementById('saveNewCategoryBtn').addEventListener('click', function() {
            var categoryName = document.getElementById('newCategoryInput').value.trim(); // Récupérer le nom de la nouvelle catégorie
            if (categoryName !== '') { // Vérifier si le nom de la catégorie est non vide
                // Envoyer les données de la nouvelle catégorie au serveur pour enregistrement dans la base de données
                // et mettre à jour le tableau des catégories avec la nouvelle catégorie
                // Vous devez implémenter cette partie en utilisant JavaScript et les requêtes AJAX vers votre backend Laravel
                // Une fois que la nouvelle catégorie est enregistrée avec succès, vous pouvez ajouter la nouvelle catégorie dans le tableau des catégories
                var newRow = document.createElement('tr'); // Créer une nouvelle ligne pour la nouvelle catégorie
                newRow.innerHTML = '<td></td><td>' + categoryName + '</td><td><button class="editCategoryBtn btn btn-primary btn-sm">Éditer</button><button class="deleteCategoryBtn btn btn-danger btn-sm">Supprimer</button></td>'; // Ajouter la nouvelle catégorie dans la ligne avec des boutons d'édition et de suppression
                document.getElementById('categoryList').appendChild(newRow); // Ajouter la nouvelle ligne au tableau des catégories
                document.getElementById('newCategoryRow').style.display = 'none'; // Masquer la ligne pour ajouter une nouvelle catégorie
                document.getElementById('newCategoryInput').value = ''; // Effacer le champ de saisie pour le nom de la catégorie
            }
        });

        // Sélectionne le bouton "Annuler" pour la nouvelle catégorie et ajoute un écouteur d'événement pour le clic
        document.getElementById('cancelNewCategoryBtn').addEventListener('click', function() {
            document.getElementById('newCategoryRow').style.display = 'none'; // Masquer la ligne pour ajouter une nouvelle catégorie
            document.getElementById('newCategoryInput').value = ''; // Effacer le champ de saisie pour le nom de la catégorie
        });

        // Éventuellement, vous pouvez ajouter des écouteurs d'événement pour les boutons "Éditer" et "Supprimer" de la même manière que pour les produits
    </script>
</body>
