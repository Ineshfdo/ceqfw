<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TechStore - @yield('title')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      color: #333;
    }
    
    .navbar {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      padding: 1rem 2rem;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    
    .navbar-content {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .logo {
      font-size: 1.5rem;
      font-weight: 800;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      text-decoration: none;
    }
    
    .nav-links {
      display: flex;
      gap: 2rem;
      align-items: center;
      list-style: none;
    }
    
    .nav-links a {
      text-decoration: none;
      color: #333;
      font-weight: 500;
      transition: all 0.3s ease;
      position: relative;
    }
    
    .nav-links a:hover {
      color: #667eea;
    }
    
    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 0;
      height: 2px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      transition: width 0.3s ease;
    }
    
    .nav-links a:hover::after {
      width: 100%;
    }
    
    .cart-icon {
      position: relative;
      display: inline-block;
    }
    
    .cart-count {
      position: absolute;
      top: -8px;
      right: -8px;
      background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      color: white;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.75rem;
      font-weight: 700;
    }
    
    .content {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 0 2rem;
    }
    
    .alert {
      padding: 1rem 1.5rem;
      border-radius: 12px;
      margin-bottom: 1.5rem;
      font-weight: 500;
      animation: slideDown 0.3s ease;
    }
    
    .alert-success {
      background: rgba(72, 187, 120, 0.1);
      border: 2px solid #48bb78;
      color: #22543d;
    }
    
    .alert-error {
      background: rgba(245, 101, 101, 0.1);
      border: 2px solid #f56565;
      color: #742a2a;
    }
    
    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    footer {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      padding: 2rem;
      text-align: center;
      margin-top: 4rem;
      box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
    }
    
    @yield('styles')
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="navbar-content">
      <a href="/" class="logo">🛒 TechStore</a>
      <ul class="nav-links">
        <li><a href="/">Home</a></li>
        <li><a href="{{ route('products.index') }}">Products</a></li>
        <li>
          <a href="{{ route('cart.index') }}" class="cart-icon">
            🛒 Cart
            @if(session('cart') && count(session('cart')) > 0)
              <span class="cart-count">{{ count(session('cart')) }}</span>
            @endif
          </a>
        </li>
      </ul>
    </div>
  </nav>
  
  <div class="content">
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    
    @if(session('error'))
      <div class="alert alert-error">
        {{ session('error') }}
      </div>
    @endif
    
    @yield('content')
  </div>
  
  <footer>
    <p>&copy; 2025 TechStore. All rights reserved. Built with ❤️ using Laravel</p>
  </footer>
</body>
</html>