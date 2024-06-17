<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    require_once "../dev/src/Database/Database.php";
    include "../dev/templates/header.inc.php";
    ?>
    <main>
        <h1>Order Confirmation</h1>
        <div class="container">
            <div class="box order-summary">
                <h2>Order Summary</h2>
                <?php ?></p>
                <p>Total: &euro;<?= number_format($total, 2) ?></p>
            </div>
            <div class="box user-info">
                <h2>User Information</h2>
                <label for="username">Username:</label><!--zet hier de username php shizzle neer -->
                <label for="zipcode">Zipcode:</label>
                <label for="address">Address:</label>
            </div>
            <div class="box payment-details">
                <h2>Payment Details</h2>
                <label for="bank">Select Bank:</label>
                <select id="bank" name="bank">
                    <option value="ABN">ABN Amro</option>
                    <option value="Regio">RegioBank</option>
                    <option value="Rabo">RaboBank</option>
                    <option value="SNS">SNS Bank</option>
                    <option value="ASN">ASN Bank</option>
                    <option value="KNAB">KNAB</option>
                    <option value="ING">ING</option>
                </select>
                <button class="confirm-button">Confirm Order</button>
            </div>
        </div>
    </main>
</body>

</html>