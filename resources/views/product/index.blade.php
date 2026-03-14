
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product List</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

</head>
<body>

<div class="container">

  <div class="header">
    <div class="title-wrap">
      <h1>Product List</h1>
      <span class="subtitle">Inventory Management</span>
    </div>
    <a href="/create" class="add-btn">
      <span style="font-size:1.1rem;position:relative;z-index:1">+</span>
      <span>Add Product</span>
    </a>
  </div>

  <div class="stats">
    <div class="stat-card">
      <div class="stat-label">Total Products</div>
      <div class="stat-value">{{ $products->count() }}</div>
    </div>
    {{-- <div class="stat-card">
      <div class="stat-label">Avg. Price</div>
      <div class="stat-value">${{ number_format($products->avg('price'), 2) }}</div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Total Value</div>
      <div class="stat-value">${{ number_format($products->sum('price'), 2) }}</div>
    </div> --}}
  </div>

  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($products as $product)
        <tr>
          <td><span class="id-pill">#{{ $product->id }}</span></td>
          <td><span class="product-name">{{ $product->name }}</span></td>
          <td><span class="price">₹{{($product->price) }}</span></td>
          <td>
            <div class="actions">
              <a href="{{ route('details', $product->id) }}" class="action-btn btn-view">&#128065; View</a>
              <a href="{{ route('edit', $product->id) }}" class="action-btn btn-edit">&#9998; Edit</a>
              <a href="{{ route('delete', $product->id) }}" class="action-btn btn-delete">&#128465; Delete</a>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4">
            <div class="empty">
              <div class="empty-icon">&#128230;</div>
              <p>No products found. Add your first one!</p>
            </div>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

</div>

</body>
</html>
