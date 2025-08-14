{{-- resources/views/pricing.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pricing - AquaLogix</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <style>
        body { font-family: 'Lora', sans-serif; }
        .product-card { border: none; padding: 15px; text-align: center; background-color: transparent; transition: transform 0.3s ease; }
        .product-card img {
          width: 100%;
          height: 320px; /* Increase height */
          object-fit: cover;
          border-radius: 10px;
          margin-bottom: 12px;
          transition: transform 0.3s ease;
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Optional glow */
        }

        .product-card:hover img { transform: scale(1.05); }
        .product-card h5 { font-family: 'Playfair Display', serif; font-weight: 700; }
        .stock-status { font-weight: bold; }
        
        #header { background-color: #000; }
        .navmenu ul li a { font-size: 1rem; font-family: 'Playfair Display', Arial, sans-serif; font-weight: 500; color: white; transition: color 0.3s ease; }
        .navmenu ul li a:hover, .navmenu ul li a.active { color: #FFD700; }
    </style>
</head>
<body>

@if(session('success'))
    <div class="alert alert-success text-center" style="position:fixed; top:70px; left:50%; transform:translateX(-50%); width:80%; z-index:2000;">
        {{ session('success') }}
    </div>
@endif

<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container d-flex align-items-center justify-content-between">
    <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
      <h1 class="sitename">AquaLogix</h1>
    </a>
    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ route('pricing') }}" class="active">Pricing</a></li>
        @auth
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link" style="color:white;">Logout</button>
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endauth
      </ul>
    </nav>
  </div>
</header>

<div class="container mt-5 pt-5">
  <div class="row">

    {{-- LEFT PANEL --}}
    <div class="col-md-3 left-panel">
      <h4>Delivery Options</h4>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="homeDelivery" checked>
        <label class="form-check-label" for="homeDelivery">🏠 Home Delivery</label>
      </div>
      <div class="form-check mb-4">
        <input class="form-check-input" type="checkbox" id="eventSupplies" checked>
        <label class="form-check-label" for="eventSupplies">🎉 Event Supplies</label>
      </div>

      <h5>Filter by Stock Status</h5>
      <div class="form-check">
        <input class="form-check-input stock-filter" type="checkbox" id="filterInStock" value="in-stock" checked>
        <label class="form-check-label" for="filterInStock">In Stock</label>
      </div>
      <div class="form-check">
        <input class="form-check-input stock-filter" type="checkbox" id="filterOutStock" value="out-stock" checked>
        <label class="form-check-label" for="filterOutStock">Out of Stock</label>
      </div>

      <h5 class="mt-4">🛒 Your Cart</h5>
      @php
        $pendingOrder = auth()->check() ? \App\Models\Order::where('user_id', auth()->id())->where('status','pending')->first() : null;
      @endphp

      @if($pendingOrder)
          <div class="alert alert-info">🚚 Delivery in Progress</div>
          <form method="POST" action="{{ route('order.complete',$pendingOrder->id) }}">
            @csrf
            <button type="submit" class="btn btn-success w-100">Complete Delivery</button>
          </form>
          <a href="{{ route('order.download.pdf', $pendingOrder->id) }}" class="btn btn-outline-primary mt-2 w-100" target="_blank">
            📄 Download Invoice PDF
          </a>
      @else
          <ul id="cart-list" class="list-group mb-3"></ul>
          <p><strong>Total: Rs. <span id="cart-total">0.00</span></strong></p>
          @auth
              <button class="btn btn-success mt-2 w-100" data-bs-toggle="modal" data-bs-target="#orderModal" id="orderNowBtn" disabled>Order Now</button>
          @endauth
      @endif

      {{-- Order History --}}
      @if(auth()->check() && isset($orders) && $orders->count())
        <div class="mt-5">
          <h4>Your Order History 🧾</h4>
          <table class="table table-bordered mt-3">
                    <thead class="table-dark">
          <tr>
              <th>#</th>
              <th>Date</th>
              <th>Total (Rs.)</th>
              <th>PDF</th>
          </tr>
      </thead>
      <tbody>
          @foreach($orders as $order)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $order->created_at->format('Y-m-d') }}</td>
                  <td>{{ number_format($order->total_amount, 2) }}</td>
                  <td>
                      <a href="{{ route('order.download', $order->id) }}" class="btn btn-sm btn-primary">PDF</a>
                  </td>
              </tr>
          @endforeach
      </tbody>

          </table>
        </div>
      @endif
    </div>

    {{-- RIGHT PANEL --}}
    <div class="col-md-9">
      <h3 class="mb-4">Available Bottled Water</h3>
      <div class="row g-4" id="product-list">
        @foreach($products as $product)
        <div class="col-md-6 col-lg-4 product-item" data-stock="{{ $product->stock_status }}">
            <div class="product-card">
                <img src="{{ asset('img/'.$product->image) }}" alt="{{ $product->name }}">
                <h5 class="mt-2">{{ $product->name }}</h5>
                <p>Rs. {{ number_format($product->price, 2) }}</p>
                <span class="stock-status {{ $product->stock_status=='in-stock'?'text-success':'text-danger' }}">
                    {{ $product->stock_status=='in-stock'?'In Stock':'Out of Stock' }}
                </span>
                <br>
                <button class="btn btn-primary btn-sm mt-2 add-to-cart"
                        data-name="{{ $product->name }}"
                        data-price="{{ $product->price }}"
                        {{ $product->stock_status=='out-stock'?'disabled':'' }}>
                    Add to Cart
                </button>
            </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="orderModal" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="{{ route('order.store') }}">
      @csrf
      <div class="modal-header"><h5 class="modal-title">Complete Your Order</h5></div>
      <div class="modal-body">
        <input type="hidden" name="cart_items" id="cartItemsInput">
        <div class="mb-3"><label>Card Holder Name</label><input type="text" name="card_name" class="form-control" required></div>
        <div class="mb-3"><label>Card Number</label><input type="text" name="card_number" class="form-control" maxlength="16" required></div>
        <div class="mb-3"><label>Delivery Address</label><textarea name="delivery_address" class="form-control" required></textarea></div>
        <div class="mb-3"><label>First Name</label><input type="text" name="first_name" class="form-control" required></div>
        <div class="mb-3"><label>Last Name</label><input type="text" name="last_name" class="form-control" required></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
        <div class="mb-3"><label>Contact Number</label><input type="text" name="contact_number" class="form-control" required></div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Place Order</button>
      </div>
    </form>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
let cart = [];

document.querySelectorAll('.add-to-cart').forEach(btn => {
  btn.addEventListener('click', () => {
    const name = btn.dataset.name;
    const price = parseFloat(btn.dataset.price);
    const existing = cart.find(i => i.name === name);
    if (existing) {
      existing.qty += 1;
    } else {
      cart.push({ name, price, qty: 1 });
    }
    updateCartUI();
  });
});

function updateCartUI() {
  const list = document.getElementById('cart-list');
  const totalEl = document.getElementById('cart-total');
  list.innerHTML = '';
  let total = 0;
  cart.forEach(item => {
    total += item.qty * item.price;
    const li = document.createElement('li');
    li.className = 'list-group-item d-flex justify-content-between align-items-center';
    li.innerHTML = `${item.name} x${item.qty} <span>Rs. ${(item.qty * item.price).toFixed(2)}</span>`;
    list.appendChild(li);
  });
  totalEl.textContent = total.toFixed(2);
  if (document.getElementById('orderNowBtn')) {
    document.getElementById('orderNowBtn').disabled = cart.length === 0;
    document.getElementById('cartItemsInput').value = JSON.stringify(cart);
  }
}

document.querySelectorAll('.stock-filter').forEach(cb => {
  cb.addEventListener('change', filterProducts);
});

function filterProducts() {
  const showInStock = document.getElementById('filterInStock').checked;
  const showOutStock = document.getElementById('filterOutStock').checked;
  document.querySelectorAll('.product-item').forEach(item => {
    const stock = item.getAttribute('data-stock');
    if ((stock === 'in-stock' && showInStock) || (stock === 'out-stock' && showOutStock)) {
      item.style.display = '';
    } else {
      item.style.display = 'none';
    }
  });
}

document.addEventListener('DOMContentLoaded', filterProducts);
</script>
@include('components.admin-toolbar')
</body>
</html>
