<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment</title>
</head>
<body style="font-family: Arial; text-align:center; margin-top:100px;">

    <h1>Pay with Stripe</h1>
    <p>Amount: <strong>$15.00</strong></p>

    <form action="{{ route('stripe.checkout') }}" method="POST">
        @csrf
        <button style="
            padding:12px 25px;
            background:#635bff;
            color:white;
            border:none;
            border-radius:6px;
            font-size:16px;
            cursor:pointer;">
            Pay Now
        </button>
    </form>

</body>
</html>
