<!DOCTYPE html>
<html>
<head>
    <title>Your Order Details</title>
</head>
<body>
    <h1>Thank you for your purchase</h1>

    <p>Here are the details of your order:</p>

    <table class='table'>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart_data as $item)
                <tr>
                    <td>{{ $item['product_title'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ number_format($item['price'], 2) }}</td>
                    <td>${{ number_format($item['total'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Your order number is: <strong>{{$orderDetails['order_no']}}</strong></p>

    <p>We will notify you when your order is ready for shipping.</p>

    <p>If you have any questions, feel free to contact us at support@example.com.</p>

    <p>Thank you for shopping with us!</p>
</body>
</html>
