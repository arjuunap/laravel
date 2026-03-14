<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/product-details.css') }}">
</head>
<body>
<div class="container">

    <a href="/" class="back-link">&#8592; Back to products</a>

    <div class="page-header">
        <h2>Product Details</h2>
        <p class="page-subtitle">Viewing record</p>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="image-panel">
                <div class="image-frame">
                    <img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                </div>
                <span class="image-label">Product Image</span>
            </div>

            <div class="fields-panel">
                <div class="field-group">
                    <span class="field-label">Product Name</span>
                    <div class="field-value">{{ $product->name }}</div>
                </div>
                <div class="field-group">
                    <span class="field-label">Price</span>
                    <div class="field-value price">₹{{($product->price) }}</div>
                </div>
                <div class="field-group">
                    <span class="field-label">Description</span>
                    <div class="field-value description">{{ $product->description }}</div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <span class="badge">
                <span class="badge-dot"></span>
                Active Product
            </span>
            <div class="footer-actions">
                <a href="/" class="back-link">&#8592; Back to products</a>
                <a href="{{ route('edit', $product->id) }}" class="action-btn btn-edit">&#9998; Edit</a>
                <a href="{{ route('delete', $product->id) }}" class="action-btn btn-delete">&#128465; Delete</a>
            </div>
        </div>
    </div>

</div>
</body>
</html>