@extends('layouts.app')

@section('title', 'Products')

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

.page-subtitle {
  color: rgba(255, 255, 255, 0.9);
  font-size: 1.2rem;
  font-weight: 300;
}

.products-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 2rem;
  margin-bottom: 3rem;
}

.product-card {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  cursor: pointer;
}

.product-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
}

.product-image-wrapper {
  position: relative;
  width: 100%;
  height: 250px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.product-image-placeholder {
  font-size: 5rem;
  filter: brightness(0) invert(1);
  opacity: 0.8;
  transition: all 0.3s ease;
}

.product-card:hover .product-image-placeholder {
  transform: scale(1.1);
  opacity: 1;
}

.product-badge {
  position: absolute;
  top: 1rem;
  right: 1rem;
  background: rgba(255, 255, 255, 0.95);
  padding: 0.5rem 1rem;
  border-radius: 20px;
  font-size: 0.75rem;
  font-weight: 700;
  color: #667eea;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.product-info {
  padding: 1.5rem;
}

.product-category {
  color: #667eea;
  font-size: 0.85rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 0.5rem;
}

.product-name {
  font-size: 1.25rem;
  font-weight: 700;
  color: #333;
  margin-bottom: 0.75rem;
  line-height: 1.4;
}

.product-description {
  color: #666;
  font-size: 0.9rem;
  line-height: 1.6;
  margin-bottom: 1rem;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.product-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 1rem;
  border-top: 2px solid #f0f0f0;
}

.product-price {
  font-size: 1.75rem;
  font-weight: 800;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.add-to-cart-btn {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border: none;
  padding: 0.75rem 1.5rem;
  border-radius: 12px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.add-to-cart-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
}

.add-to-cart-btn:active {
  transform: translateY(0);
}

.stock-info {
  font-size: 0.85rem;
  color: #48bb78;
  font-weight: 600;
}

.stock-low {
  color: #f56565;
}
@endsection

@section('content')
<div class="page-header">
  <h1 class="page-title">Our Products</h1>
  <p class="page-subtitle">Discover amazing tech products at unbeatable prices</p>
</div>

<div class="products-grid">
  @forelse($products as $product)
    <div class="product-card">
      <div class="product-image-wrapper">
        <div class="product-image-placeholder">📦</div>
        @if($product->stock > 0)
          <span class="product-badge">In Stock</span>
        @else
          <span class="product-badge" style="background: rgba(245, 101, 101, 0.95); color: white;">Out of Stock</span>
        @endif
      </div>
      
      <div class="product-info">
        <div class="product-category">{{ $product->category }}</div>
        <h3 class="product-name">{{ $product->name }}</h3>
        <p class="product-description">{{ $product->description }}</p>
        
        <div class="product-footer">
          <div>
            <div class="product-price">${{ number_format($product->price, 2) }}</div>
            <div class="stock-info {{ $product->stock < 10 ? 'stock-low' : '' }}">
              {{ $product->stock }} in stock
            </div>
          </div>
          
          @if($product->stock > 0)
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
              @csrf
              <button type="submit" class="add-to-cart-btn">Add to Cart</button>
            </form>
          @else
            <button class="add-to-cart-btn" disabled style="opacity: 0.5; cursor: not-allowed;">Out of Stock</button>
          @endif
        </div>
      </div>
    </div>
  @empty
    <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; background: rgba(255, 255, 255, 0.95); border-radius: 20px;">
      <h2 style="font-size: 2rem; color: #333; margin-bottom: 1rem;">No Products Available</h2>
      <p style="color: #666;">Check back soon for amazing deals!</p>
    </div>
  @endforelse
</div>
@endsection
