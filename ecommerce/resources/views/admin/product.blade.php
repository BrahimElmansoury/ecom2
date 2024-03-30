<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits</title>
    <!-- Style Sheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/adminstyle.css"> <!-- Custom CSS -->
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
        <div class="main-content">
            <div class="sidebar">
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

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content">
                            <h3 class="mb-4">Gestion des Produits</h3>
                            <!-- Bouton pour ajouter un produit -->
                            <div class="mb-3">
                                <a href="{{ route('product.create')}}" class="btn btn-primary">Ajouter un Produit</a>
                            </div>
                            <!-- Tableau des produits -->
                            <div class="content-detail">
                                <h4 class="mb-3">Tous les Produits</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nom Produit</th>
                                            <th>Prix</th>
                                            <th>Catégorie</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                           <!-- Modifier le formulaire -->
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Utilisez la méthode PUT pour mettre à jour les données -->

    <!-- Champs éditables pour le nom, le prix, la catégorie, la description, et l'image -->
    <td><input type="text" class="form-control product-name" name="pname" value="{{ $product->name }}" disabled></td>
    <td><input type="text" class="form-control product-price" name="price" value="{{ $product->price }}" disabled></td>
    <td>
        <select class="form-control product-category" name="category" disabled>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </td>
    <td><input type="text" class="form-control product-description" name="sdesc" value="{{ $product->description }}" disabled></td>
    <td>
        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid product-image" alt="Product Image">
        <input type="file" class="form-control-file mt-2 product-image-file" style="display: none;" name="image">
    </td>

    <!-- Boutons Modifier, Enregistrer et Annuler -->
    <td>
        <button class="btn btn-primary btn-sm edit-btn" type="button">Modifier</button>
        <button class="btn btn-success btn-sm save-btn" style="display: none;" type="submit">Enregistrer</button>
        <button class="btn btn-secondary btn-sm cancel-btn" style="display: none;" type="button">Annuler</button>
    </td>
</form>
         </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> <!-- Main Area -->


    <footer class="mt-4">
        <div class="container">
            <div class="footer-bar">
                <div class="copyright-text">
                    <p>Copryright 2024 - Tous droits réservés</p>
                </div>
            </div> <!-- Footer Bar -->
        </div>
    </footer> <!-- Footer Area -->

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Sélectionne tous les boutons "Modifier" et ajoute un écouteur d'événement pour chaque bouton
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', () => {
                const row = button.parentElement.parentElement;
                const nameInput = row.querySelector('.product-name');
                const priceInput = row.querySelector('.product-price');
                const categoryInput = row.querySelector('.product-category');
                const descriptionInput = row.querySelector('.product-description');
                const imageInput = row.querySelector('.product-image-file');
                const imageDisplay = row.querySelector('.product-image');
                const saveBtn = row.querySelector('.save-btn');
                const cancelBtn = row.querySelector('.cancel-btn');

                // Activer les champs pour la modification
                nameInput.disabled = false;
                priceInput.disabled = false;
                categoryInput.disabled = false;
                descriptionInput.disabled = false;
                imageInput.style.display = 'block'; // Afficher le champ de fichier
                imageDisplay.style.display = 'none'; // Masquer l'image affichée

                // Aff
            // Afficher les boutons Enregistrer et Annuler
            saveBtn.style.display = 'inline-block';
            cancelBtn.style.display = 'inline-block';

            // Masquer le bouton Modifier
            button.style.display = 'none';

            // Ajouter un écouteur d'événement pour le bouton "Annuler"
            cancelBtn.addEventListener('click', () => {
                // Désactiver les champs après la modification
                nameInput.disabled = true;
                priceInput.disabled = true;
                categoryInput.disabled = true;
                descriptionInput.disabled = true;
                imageInput.style.display = 'none'; // Masquer le champ de fichier
                imageDisplay.style.display = 'block'; // Afficher l'image affichée

                // Masquer les boutons Enregistrer et Annuler
                saveBtn.style.display = 'none';
                cancelBtn.style.display = 'none';

                // Afficher le bouton Modifier
                button.style.display = 'inline-block';
            });
        });
    });
</script>
<script>
    // Sélectionne tous les boutons "Enregistrer" et ajoute un écouteur d'événement pour chaque bouton
    document.querySelectorAll('.save-btn').forEach(button => {
        button.addEventListener('click', () => {
            // Sélectionner le formulaire parent du bouton
            const form = button.closest('form');
            // Soumettre le formulaire
            form.submit();
        });
    });
</script>

    
</body>

</html>
