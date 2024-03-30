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
		<link rel="stylesheet" type="text/css" href="../css/styleAdmin.css" />
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
					<li><a class="active" href="{{route('admin_dashboard')}}">Home</a></li>
					<li><a href="{{route('admin_order')}}">Order</a></li>
					<li><a href="{{route('admin_product')}}">Product</a></li>
					<li><a href="{{route('admin_category')}}">Category</a></li>
					<li><a href="{{route('admin_stock')}}">Stock</a></li>
					<li><a href="{{route('admin_user')}}">Users</a></li>
				</ul>				
			</div>
			<div class="content">
				<h3>Product</h3>
				<div class="content-data">
					<div class="content-form">
						<h4>Add Product</h4>

						<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-inline">

							<div class="form-group">
								<label for="" class="form-label">Name</label>
								<input type="text" name="name" id="" class="form-control" value="{{old('name')}}"/>
								@error('name')
							 <div class="text-danger">
								 {{$message}}
							 </div>
							
								 
							 @enderror
							</div>
							</div>
							<div class="form-gorup">
								<label for="" class="form-label">Description</label>
								<textarea type="text" name="description" id="" class="form-control">{{old('description')}}</textarea>
								@error('description')
							 <div class="text-danger">
								 {{$message}}
							 </div>
							
								 
							 @enderror
							</div>
							<div class="form-gorup mb-3">
								<label for="" class="form-label">Quantity</label>
								<input type="number" name="quantity" id="" class="form-control" value="{{old('qunatity')}}"/>
								@error('quantity')
							 <div class="text-danger">
								 {{$message}}
							 </div>
							
								 
							 @enderror
							</div>
							<div class="form-gorup mb-3">
								<label for="" class="form-label">Image</label>
								<input type="file" name="image" id="" class="form-control"/>
								@error('image')
							 <div class="text-danger">
								 {{$message}}
							 </div>
							
								 
							 @enderror
							</div>
							<div class="form-gorup mb-3">
								<label for="" class="form-label">Price</label>
								<input type="number" name="price" id="" class="form-control" value="{{old('price')}}"/>
								@error('price')
							 <div class="text-danger">
								 {{$message}}
							 </div>
							
								 
							 @enderror
							</div>
							<div class="form-gorup mb-3">
								<label for="category_id" class="form-label">Category</label>
								<select  name="category_id" id="category_id" class="form-select" >
								<option value="">Please chose your category</option>
								@foreach ($categories as $category)
									<option value="{{$category->id}}">{{$category->name}}</option>
						 
								@endforeach
								 </select>
								@error('category')
							 <div class="text-danger">
								 {{$message}}
							 </div>
							
								 
							 @enderror
							</div>
							<div class="form-gorup mb-3">
								<input type="submit" name="" id="" class="btn btn-primary" value="Ajouter"/>
							</div>
							
						</form>
					</div>
					<div class="content-detail">
						<h4>All Products</h4>
						<table>
							<thead>
								<tr>
									<th>Product</th>
									<th>Price</th>
									<th>Category</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								@foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td><a href="#">Edit</a></td>
                                    <td>
                                        <form action="#" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>		

	</main> <!-- Main Area -->

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