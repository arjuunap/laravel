<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/addproduct.css') }}">
</head>
<body>
<div class="container">

    <a href="{{ url()->previous() }}" class="back-link">&#8592; Back to products</a>

    <div class="page-header">
        <h2>Add Product</h2>
        <p class="page-subtitle">Create a new record</p>
    </div>

    <div class="card">
        <form action="/" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">

                <div class="field-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" id="name" placeholder="e.g. Wireless Headphones">
                </div>

                <div class="field-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" placeholder="e.g. 49.99">
                </div>

                <div class="field-group">
                    <label for="des">Description</label>
                    <textarea name="description" id="des" placeholder="Write a short product description..."></textarea>
                </div>

                <div class="field-group">
                    <label>Product Image</label>
                    <div class="file-upload-wrap">
                        <div class="file-upload-label">
                            <div class="upload-icon">&#128247;</div>
                            <div class="upload-text">
                                <span class="upload-title">Click to upload image</span>
                                <span class="upload-hint">PNG, JPG, WEBP supported</span>
                            </div>
                        </div>
                        <input type="file" name="image" accept="image/*">
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <a href="{{ route("home") }}" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-save">
                    <span>&#10003;</span>
                    <span>Save Product</span>
                </button>
            </div>

        </form>
    </div>

</div>
</body>
</html>