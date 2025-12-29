@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('styles')
.page-header {
  text-align: center;
  margin-bottom: 3rem;
}

.page-title {
  font-size: 3rem;
  font-weight: 800;
  background: linear-gradient(135deg, #ffffff 0%, #f0f0f0 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: 0.5rem;
}

.cart-container {
  display: grid;
  grid-template-columns: 1fr 400px;
  gap: 2rem;
  align-items: start;
}

@media (max-width: 968px) {
  .cart-container {
    grid-template-columns: 1fr;
  }
}

.cart-items {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  padding: 2rem;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
}

.cart-item {
  display: grid;
  grid-template-columns: 100px 1fr auto;
  gap: 1.5rem;
  padding: 1.5rem;
  border-bottom: 2px solid #f0f0f0;
  align-items: center;
  transition: all 0.3s ease;
}

.cart-item:hover {
  background: rgba(102, 126, 234, 0.05);
  border-radius: 12px;
}

.cart-item:last-child {
  border-bottom: none;
}

.item-image {
  width: 100px;
  height: 100px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 3rem;
  filter: brightness(0) invert(1);
  opacity: 0.8;
}

.item-details {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.item-name {
  font-size: 1.25rem;
  font-weight: 700;
  color: #333;
}

.item-price {
  font-size: 1.1rem;
  font-weight: 600;
  color: #667eea;
}

.item-actions {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  align-items: flex-end;
}

.quantity-control {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  background: #f7f7f7;
  border-radius: 8px;
  padding: 0.25rem;
}

.quantity-btn {
  background: white;
  border: none;
  width: 32px;
  height: 32px;
  border-radius: 6px;
  cursor: pointer;
  font-weight: 700;
  color: #667eea;
  transition: all 0.2s ease;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.quantity-btn:hover {
  background: #667eea;
  color: white;
  transform: scale(1.1);
}

.quantity-input {
  width: 50px;
  text-align: center;
  border: none;
  background: transparent;
  font-weight: 600;
  font-size: 1rem;
}

.remove-btn {
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  color: white;
  border: none;
  padding: 0.5rem 1rem;
  border-radius: 8px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(245, 87, 108, 0.3);
}

.remove-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(245, 87, 108, 0.5);
}

.cart-summary {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  padding: 2rem;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
  position: sticky;
  top: 100px;
}

.summary-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: #333;
  margin-bottom: 1.5rem;
  padding-bottom: 1rem;
  border-bottom: 2px solid #f0f0f0;
}

.summary-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 1rem;
  color: #666;
  font-size: 1rem;
}

.summary-total {
  display: flex;
  justify-content: space-between;
  margin-top: 1.5rem;
  padding-top: 1.5rem;
  border-top: 2px solid #f0f0f0;
  font-size: 1.5rem;
  font-weight: 800;
  color: #333;
}

.checkout-btn {
  width: 100%;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border: none;
  padding: 1rem 2rem;
  border-radius: 12px;
  font-weight: 700;
  font-size: 1.1rem;
  cursor: pointer;
  margin-top: 1.5rem;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.checkout-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
}

.checkout-btn:active {
  transform: translateY(0);
}

.empty-cart {
  text-align: center;
  padding: 4rem 2rem;
  background: rgba(255, 255, 255, 0.95);
  border-radius: 20px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
}

.empty-cart-icon {
  font-size: 5rem;
  margin-bottom: 1rem;
  opacity: 0.5;
}

.empty-cart-title {
  font-size: 2rem;
  font-weight: 700;
  color: #333;
  margin-bottom: 1rem;
}

.empty-cart-text {
  color: #666;
  font-size: 1.1rem;
  margin-bottom: 2rem;
}

.continue-shopping-btn {
  display: inline-block;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  text-decoration: none;
  padding: 1rem 2rem;
  border-radius: 12px;
  font-weight: 700;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.continue-shopping-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
}
@endsection

@section('content')
<div class="page-header">
  <h1 class="page-title">Shopping Cart</h1>
</div>

@if(!empty($cart) && count($cart) > 0)
  <div class="cart-container">
    <div class="cart-items">
      @foreach($cart as $id => $details)
        <div class="cart-item">
          <div class="item-image">📦</div>
          
          <div class="item-details">
            <div class="item-name">{{ $details['name'] }}</div>
            <div class="item-price">${{ number_format($details['price'], 2) }} each</div>
          </div>
          
          <div class="item-actions">
            <div class="quantity-control">
              <button class="quantity-btn" onclick="updateQuantity({{ $id }}, {{ $details['quantity'] - 1 }})">-</button>
              <input type="number" class="quantity-input" value="{{ $details['quantity'] }}" readonly>
              <button class="quantity-btn" onclick="updateQuantity({{ $id }}, {{ $details['quantity'] + 1 }})">+</button>
            </div>
            
            <button class="remove-btn" onclick="removeItem({{ $id }})">Remove</button>
          </div>
        </div>
      @endforeach
    </div>
    
    <div class="cart-summary">
      <h2 class="summary-title">Order Summary</h2>
      
      <div class="summary-row">
        <span>Items ({{ count($cart) }})</span>
        <span>${{ number_format($total, 2) }}</span>
      </div>
      
      <div class="summary-row">
        <span>Shipping</span>
        <span>FREE</span>
      </div>
      
      <div class="summary-total">
        <span>Total</span>
        <span>${{ number_format($total, 2) }}</span>
      </div>
      
      <form action="{{ route('stripe.checkout') }}" method="POST">
        @csrf
        <button type="submit" class="checkout-btn">Proceed to Checkout</button>
      </form>
    </div>
  </div>
@else
  <div class="empty-cart">
    <div class="empty-cart-icon">🛒</div>
    <h2 class="empty-cart-title">Your cart is empty</h2>
    <p class="empty-cart-text">Looks like you haven't added anything to your cart yet.</p>
    <a href="{{ route('products.index') }}" class="continue-shopping-btn">Continue Shopping</a>
  </div>
@endif

<script>
function updateQuantity(id, quantity) {
  if (quantity < 1) return;
  
  fetch('{{ route("cart.update") }}', {
    method: 'PATCH',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({
      id: id,
      quantity: quantity
    })
  }).then(() => {
    location.reload();
  });
}

function removeItem(id) {
  if (!confirm('Are you sure you want to remove this item?')) return;
  
  fetch('{{ route("cart.remove") }}', {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({
      id: id
    })
  }).then(() => {
    location.reload();
  });
}
</script>
@endsection
