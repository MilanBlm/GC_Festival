<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php'CSS_FOLDER'?> style.css">
</head>
<body>
    <?php
    include 'header.php';
    $tickets = db_getData("SELECT * FROM tickets");

    //Check user login
    $user = null;
    if(isset($_POST['login']))
    {
        $user = getUser($_POST['email'], $_POST['password']);
    }
    ?>
    <div class="page tickets">
        <div class="container">
            <h1>Tickets bestellen</h1>
                <div class="ticketList">
                    <?php if($user !== "No user found" && $user !== null){ ?>

                    <form action="orderConfirmation.php" method="post">
                        <div class="inputRow">
                            <?php
                            while($userData = $user->fetch_assoc()) {
                                ?>
                                <label for="userID">Gebruiker ID</label>
                                <input type="number" name ="userID" value="<?php echo $userData['id']; ?>">
                                <?php
                            }
                            ?>
                        </div>
                        <div class="inputRow">
                            <label for="ticketSelect">Wachtwoord</label>
                            <select name="ticketSelect">
                                <?php
                                while($ticket = $tickets->fetch_assoc()) {
                                    ?>
                                    <option name="<?php echo $ticket['name']; ?>" value="<?php echo $ticket['id']; ?>"><?php echo $ticket['name']; echo " €"; echo $ticket['price']; ?></option>                      
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="inputRow">
                            <label for="amount">Hoeveelheid</label>
                            <input type="number" name ="amount" required>
                        </div>
                        <div class="inputRow">
                            <input type="submit" name ="bestellen" value="Bestellen">
                        </div>
                        </form>
                        <?php } else { ?>
                <form action="#" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    <br><br>

                    <label for="password">Wachtwoord</label>
                    <input type="password" name="password">
                    <br><br>

                    <input type="submit" value="Login" name="login">

                </form>
                <?php }?>
                </div>
        </div>
    </div>
<script>
function myFunction() {
  var x = document.getElementById("Inputt");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}  
</script>
<?php include 'footer.php';?>
</body>
</html>
