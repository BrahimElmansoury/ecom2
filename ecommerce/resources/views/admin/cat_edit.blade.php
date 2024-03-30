<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Edit Category</title>
    <!-- Style Sheet -->
    <link rel="stylesheet" href="../css/adminstyle.css">
</head>

<body>

    <header style="height: 100px; background-color: #F0E68C;">
        
    </header>


    <main>

        <div class="main-content">
            <div class="sidebar">
                <!-- Sidebar content here -->
            </div>
            <div class="content">
                <h3>Edit Category</h3>
                <div class="content-data">
                    <div class="content-form">
                        <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h4>Edit Category</h4>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="cat_name" value="{{ $category->category }}" style="padding: 8px; border: none; border-bottom: 1px solid transparent; width: 100%; margin-bottom: 10px;" onfocus="this.style.borderBottom='1px solid rgba(236, 240, 241, 0.3)';" onblur="this.style.borderBottom='1px solid transparent';">
                            </div>
                            <div class="form-group">
                                <label>Category Type</label>
                                <input type="text" name="cat_type" value="{{ $category->type_category }}" style="padding: 8px; border: none; border-bottom: 1px solid transparent; width: 100%; margin-bottom: 10px;" onfocus="this.style.borderBottom='1px solid rgba(236, 240, 241, 0.3)';" onblur="this.style.borderBottom='1px solid transparent';">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="updateCategory" value="Update Category" style="background-color: #F0E68C; color: #2F4F4F; text-transform: uppercase; text-decoration: none; text-align: center; padding: 5px 8px; margin-top: 20px; display: block; border: none; cursor: pointer; width: 100%;">
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

    </main>
        <footer>
        <!-- Footer content here -->
    </footer>

</body>

</html>
