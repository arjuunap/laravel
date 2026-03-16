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

  {{-- ── Header ── --}}
  <div class="header">
    <div class="title-wrap">
      <h1>Product List</h1>
    </div>
    <a href="{{ route('create') }}" class="add-btn">
      <span style="font-size:1.1rem;position:relative;z-index:1">+</span>
      <span>Add Product</span>
    </a>
  </div>

  {{-- ── Stats / Search / Download row ── --}}
  <div class="stats">

    {{-- Col 1: Total Products --}}
    <div class="stat-card">
      <div class="stat-label">Total Products</div>
      <div class="stat-value">{{ $products->count() }}</div>
    </div>

    {{-- Col 2: Search --}}
    <form action="{{ route('search') }}" method="GET" class="search-form">
      <span class="search-icon">
        <svg width="15" height="15" viewBox="0 0 16 16" fill="none">
          <circle cx="6.5" cy="6.5" r="4.5" stroke="currentColor" stroke-width="1.3"/>
          <path d="M10 10L14 14" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/>
        </svg>
      </span>
      <input
        type="text"
        name="search"
        id="search"
        class="search-input"
        placeholder="Search product..."
        value="{{ request('search') }}"
      >
      <button type="submit" class="search-btn">
        <span>Search</span>
      </button>
    </form>

    {{-- Col 3: Download PDF --}}
    <a href="{{ route('pdf') }}" style="background-color: rgb(39, 145, 74) ;color: black ;text-align: center ; border-radius: 5px;text-decoration: none ;padding: 6px ; ">
      <span>&#8659;</span>
      <span>Download PDF</span>
    </a>

  </div>

  {{-- ── Table ── --}}
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
      <tbody id="productTable">
        @forelse ($products as $product)
        <tr>
          <td><span class="id-pill">#{{ $product->id }}</span></td>
          <td><span class="product-name">{{ $product->name }}</span></td>
          <td><span class="price">₹{{ $product->price }}</span></td>
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

    {{-- ── Pagination ── --}}
    @if ($products->hasPages())
    <div class="pagination-wrap">
      {{ $products->links() }}
    </div>
    @endif

  </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

  // Prevent default form submit (AJAX handles search)
  document.querySelector('.search-form').addEventListener('submit', function(e) {
    e.preventDefault();
  });

  // Live search via AJAX
  $('#search').on('keyup', function () {
    var value = $(this).val();

    $.ajax({
      url: "{{ route('search') }}",
      type: "GET",
      data: { search: value },
      success: function (data) {
        $('#productTable').html('');
        data.forEach(function (product) {
          $('#productTable').append(
            `<tr>
              <td><span class="id-pill">#${product.id}</span></td>
              <td><span class="product-name">${product.name}</span></td>
              <td><span class="price">₹${product.price}</span></td>
              <td>
                <div class="actions">
                  <a href="/details/${product.id}" class="action-btn btn-view">&#128065; View</a>
                  <a href="/edit/${product.id}" class="action-btn btn-edit">&#9998; Edit</a>
                  <a href="/delete/${product.id}" class="action-btn btn-delete">&#128465; Delete</a>
                </div>
              </td>
            </tr>`
          );
        });
      }
    });
  });

</script>
</body>
</html>