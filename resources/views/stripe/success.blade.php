@extends('layouts.app')

@section('title', 'Payment Successful')

@section('styles')
.success-container {
  text-align: center;
  padding: 4rem 2rem;
  background: rgba(255, 255, 255, 0.95);
  border-radius: 20px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
  max-width: 600px;
  margin: 0 auto;
}

.success-icon {
  width: 120px;
  height: 120px;
  background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 2rem;
  animation: scaleIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  box-shadow: 0 10px 40px rgba(72, 187, 120, 0.3);
}

.success-icon::before {
  content: '✓';
  font-size: 4rem;
  color: white;
  font-weight: 700;
}

@keyframes scaleIn {
  from {
    transform: scale(0);
    opacity: 0;
  }
  to {
    transform: scale(1);
    opacity: 1;
  }
}

.success-title {
  font-size: 2.5rem;
  font-weight: 800;
  color: #333;
  margin-bottom: 1rem;
  animation: fadeInUp 0.6s ease 0.2s both;
}

.success-message {
  font-size: 1.2rem;
  color: #666;
  margin-bottom: 2rem;
  line-height: 1.6;
  animation: fadeInUp 0.6s ease 0.3s both;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.action-buttons {
  display: flex;
  gap: 1rem;
  justify-content: center;
  flex-wrap: wrap;
  animation: fadeInUp 0.6s ease 0.4s both;
}

.btn {
  padding: 1rem 2rem;
  border-radius: 12px;
  font-weight: 700;
  text-decoration: none;
  transition: all 0.3s ease;
  display: inline-block;
}

.btn-primary {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
}

.btn-secondary {
  background: white;
  color: #667eea;
  border: 2px solid #667eea;
}

.btn-secondary:hover {
  background: #667eea;
  color: white;
  transform: translateY(-2px);
}
@endsection

@section('content')
<div class="success-container">
  <div class="success-icon"></div>
  <h1 class="success-title">Payment Successful!</h1>
  <p class="success-message">
    Thank you for your purchase! Your order has been confirmed and will be processed shortly.
    You will receive a confirmation email with your order details.
  </p>
  
  <div class="action-buttons">
    <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
    <a href="/" class="btn btn-secondary">Go to Home</a>
  </div>
</div>
@endsection
