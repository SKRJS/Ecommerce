<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        /* Reset default browser styles */
        body,
        table,
        td,
        th {
            margin: 0;
            padding: 0;
            border: none;
        }

        /* Body and container styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table,
        th,
        td {
            border: 1px solid #dddddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        thead {
            background-color: #333;
            color: #ffffff;
        }

        /* Caption styles */
        caption {
            font-size: 1.5em;
            font-weight: bold;
            text-align: left;
            padding: 12px;
            background-color: #333333;
            color: #ffffff;
            border-radius: 10px 10px 0 0;
        }

        /* Image styles */
        img {
            display: block;
            margin: 0 auto;
            max-width: 100px;
            height: auto;
            border-radius: 50%;
            border: 2px solid #ffffff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        /* Total section styles */
        .total {
            margin-top: 20px;
        }

        .total td {
            font-weight: bold;
        }

        /* Status styles */
        .status {
            color: green;
        }

        /* Payment type styles */
        .payment-type {
            text-transform: uppercase;
        }

        /* Responsive styles */
        @media screen and (max-width: 600px) {
            .container {
                width: 100%;
                border-radius: 0;
                box-shadow: none;
            }

            img {
                max-width: 80px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <caption>Invoice Number: {{ $mailData['order']->invoice_no }}</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mailData['order']->items as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->product->product_name }}</td>
                        <td>
                            <img src="https://craftimation.com/{{ $item->product->product_img }}"
                                alt="{{ $item->product->product_name }}" width="70" height="70">
                        </td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->price * $item->qty }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payment Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $mailData['order']->amount }}</td>
                    <td>{{ $mailData['order']->status }}</td>
                    <td>{{ $mailData['order']->payment_type }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
