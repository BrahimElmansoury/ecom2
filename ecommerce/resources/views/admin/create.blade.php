<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .frame-container {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 600px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="frame-container">
            <h2>Ajouter un Produit</h2>
            <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="pname">Nom du Produit:</label>
                    <input type="text" class="form-control" id="pname" name="pname">
                </div>
                <div class="form-group">
                    <label for="price">Prix:</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                    <label for="quantite">Quantité:</label>
                    <input type="number" class="form-control" id="quantite" name="quantite">
                </div>
                <div class="form-group">
                    <label for="sdesc">Description:</label>
                    <input type="text" class="form-control" id="sdesc" name="sdesc">
                </div>
                <div class="form-group">
                    <label for="category">Catégorie:</label>
                    <select name="category" class="form-control" id="category">
                        <option>---Sélectionner une Catégorie---</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Images:</label>
                    <input type="file" class="form-control-file" id="image" name="image" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter le Produit</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


