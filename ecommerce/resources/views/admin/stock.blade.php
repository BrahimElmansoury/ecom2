<!DOCTYPE html>
<html lang="en">

 	<head>
 		<!-- Meta Tags -->
		<meta charset="UTF-8">
		<meta name="author" content="Kamran Mubarik">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Title -->
 		<title>Create an E-Commerce Website using HTML, CSS and JS</title>
 		<!-- Style Sheet -->
         <link rel="stylesheet" href="../css/adminstyle.css">
        </head>
<body>

	<header>
		<div class="container">
			<div class="brand">
				<div class="logo">
					<a href="index.html">
						<img src="../img/icons/online_shopping.png">
						<div class="logo-text">
							<p class="big-logo">Ecommerce</p>
							<p class="small-logo">online shop</p>
						</div>
					</a>
				</div> <!-- logo -->
				<div class="shop-icon">
					<div class="dropdown">
						<img src="../img/icons/account.png">
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
	<main>
        <div class="main-content">
            <div class="sidebar">
                <h3>Menu</h3>
                <ul>
                   
                        <li><a class="active" href="{{ route('admin.indexAdmin') }}">Accueil</a></li>
                        <li><a href="{{ route('admin.order') }}">Commande</a></li>
                        <li><a href="{{ route('admin.product') }}">Produit</a></li>
                        <li><a href="{{ route('admin.category') }}">Catégorie</a></li>
                        <li><a href="{{ route('admin.stock') }}">Stock</a></li>
                        <li><a href="">Utilisateurs</a></li>
                    </ul>

                
            </div>

        <div class="main-content">
            <div class="sidebar">
                <!-- Sidebar content here -->
            </div>
            <div class="content">
                <h3>Stock</h3>
                <div class="content-data">
                    <div class="content-form">
                        <form action="{{ route('admin.addStock') }}" method="POST">
                            @csrf
                            <h4>Ajouter du Stock</h4>
                            <div class="form-inline">
                                <div class="form-group">
                                    <label>Nom du Produit</label>
                                    <select name="pname">
                                        <option>---Sélectionnez un Produit---</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->name}}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Quantité</label>
                                    <input type="text" name="quantity">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="addStock" value="Add Stock">
                            </div>
                        </form>

                    </div>

                    <div class="content-detail">
                        <h4>All Stock Detail</h4>
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Stock in</th>
                                    <th>Stock out</th>
                                    <th>Available</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($stocks as $stock)
                                <tr>
                                    <td>{{ $stock->product_name }}</td>
                                    <td>{{ $stock->Category }}</td>
                                    <td>{{ $stock->Stock_in }}</td>
                                    <td>{{ $stock->Stock_out }}</td>
                                    <td>{{ $stock->Available }}</td>
                                </tr>
                                @endforeach  --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main> 

	<footer>
		<div class="container">
			<div class="footer-bar">
				<div class="copyright-text">
					<p>Copryright 2020 - All Rights Reserved</p>
				</div>
			</div> <!-- Footer Bar -->
		</div>
	</footer> <!-- Footer Area -->

</body>

</html>