<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Invoice</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 14px;
            color: #333;
            padding: 30px;
            background: #f9f9f9;
        }

        h2 {
            text-align: center;
            color: #0a4b78;
            margin-bottom: 20px;
            border-bottom: 2px solid #0a4b78;
            padding-bottom: 10px;
        }

        p {
            margin: 5px 0;
        }

        .details {
            background: #e6f0fa;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 25px;
        }

        .total {
            font-weight: bold;
            text-align: right;
            font-size: 16px;
            margin-top: 15px;
            color: #0a4b78;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        th {
            background-color: #0a4b78;
            color: #fff;
            padding: 10px;
            text-align: left;
        }

        td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f8fc;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>
    <h2>🧾 AquaLogix Invoice</h2>

    <div class="details">
        <p><strong>Customer:</strong> {{ $order->customer->first_name }} {{ $order->customer->last_name }}</p>
        <p><strong>Email:</strong> {{ $order->customer->email }}</p>
        <p><strong>Delivery Address:</strong> {{ $order->delivery_address }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Price (Rs.)</th>
                <th>Total (Rs.)</th>
            </tr>
        </thead>
        <tbody>
            @foreach(json_decode($order->cart_items) as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td>{{ number_format($item->qty * $item->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="total">Grand Total: Rs. {{ number_format($order->total_amount, 2) }}</p>

    <div class="footer">
        Thank you for choosing AquaLogix! 💧<br>
        This invoice was auto-generated and is valid without signature.
    </div>
</body>
</html>
