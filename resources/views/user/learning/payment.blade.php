<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: #f1f1f1;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .payment-form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .payment-form h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .payment-form p {
            font-size: 16px;
            margin-bottom: 30px;
            text-align: center;
        }

        .payment-form label {
            display: block;
            margin-bottom: 10px;
        }

        .payment-form input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .payment-form button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .payment-form button:hover {
            background: #0056b3;
        }
    </style>
    <title>Payment Page</title>
</head>
<body>
    <div class="payment-form">
        <h1>Payment Page</h1>
        <p>Please enter your payment details:</p>

        <form action="{{ route('dashboard.payment',['course_id' => $course_id]) }}" method="POST">
            @csrf
            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number" placeholder="Card Number" required>

            <label for="expiration_date">Expiration Date:</label>
            <input type="text" id="expiration_date" name="expiration_date" placeholder="MM/YYYY" required>

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" placeholder="CVV" required>

            <button type="submit">Pay Now</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
