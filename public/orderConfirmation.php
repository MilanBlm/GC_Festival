<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php 
include 'header.php';

if(isset($_POST['bestellen'])){
    $userId = $_POST['userID'];
    $ticketId = $_POST['ticketSelect'];
    $amount = $_POST['amount'];

    $order = db_insertData("INSERT INTO orders (userID, ticketID, amount) VALUES ('$userId', '$ticketId', '$amount')");
    $newOrder = db_getData("SELECT * FROM orders INNER JOIN tickets ON orders.ticketID = tickets.id WHERE orders.id = ". $order);
} 
?>
    <div class="page orderConfirmation">
        <div class="container">
            <h1>Bedankt voor de bestelling!</h1>
            <table class="orderOverview" border="1">
                <tr>
                    <th>Ticket</th>
                    <th>Aantal</th>
                    <th>Prijs</th>
                </tr>
                <tr>
                <?php
                    while($orderData = $newOrder->fetch_assoc())
                    {
                    ?>
                        <td><?php echo $orderData['name'];?></td>
                        <td><?php echo $orderData['amount'];?></td>
                        <td>€ <?php echo $orderData['amount'] * $orderData['price'];?></td>
                        <?php
                    }
                    ?>
                </tr>
            </table>
        </div>
    </div>
<?php include 'footer.php';?>
</body>
</html>
