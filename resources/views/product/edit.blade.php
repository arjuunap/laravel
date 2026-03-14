<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/editproduct.css') }}">
</head>
<body>
<div class="container">

    <a href="{{ url()->previous() }}" class="back-link">&#8592; Back to products</a>

    <div class="page-header">
        <h2>Edit Product</h2>
        <p class="page-subtitle">Update existing record</p>
    </div>

    <div class="card">
        <form action="{{ route('update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">

                <div class="image-panel">
                    <div class="image-frame">
                        <img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                    </div>
                    <span class="image-caption">Current Image</span>

                    <div class="change-image-wrap">
                        <div class="change-image-label">
                            <span class="change-icon">&#128247;</span>
                            <span class="change-text">Change image</span>
                        </div>
                        <input type="file" name="image" accept="image/*">
                    </div>
                </div>

                <div class="fields-panel">
                    <div class="field-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}">
                    </div>
                    <div class="field-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" value="{{ $product->price }}">
                    </div>
                    <div class="field-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description">{{ $product->description }}</textarea>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <span class="edit-badge">
                    <span class="badge-dot"></span>
                    Editing
                </span>
                <div class="footer-actions">
                    <a href="{{ url()->previous() }}" class="btn-cancel">Cancel</a>
                    <button type="submit" class="btn-update">
                        <span>&#10003;</span>
                        <span>Update Product</span>
                    </button>
                </div>
            </div>

        </form>
    </div>

</div>
</body>
</html>