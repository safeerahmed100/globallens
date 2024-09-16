<h1>Enter Your Details</h1>
<form action="{{ route('order.create') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    
    <label for="address">Address:</label>
    <input type="text" name="address" required>

    <!-- Hidden field to store cart details -->
    <input type="hidden" name="cart_data" value="{{ json_encode(session()->get('cart')) }}">

    <button type="submit">Proceed to Payment</button>
</form>