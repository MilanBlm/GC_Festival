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
    <?php include 'header.php';?>
    <?php
    $newUser = null;
    if(isset($_POST['register'])){
      $newUser = registerUser($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password']);  
    }
    ?>
    <div class="page registreren">
        <div class="container">
            <h1>Registreren</h1>
            <?php if($newUser === 1){?>
              <p>Nieuwe gebruiker succesvol toegevoegd</p>
            <?php } else { ?>
              <form action="#" method="post">
                <div class="inputRow">
                  <label for="firstName">Voornaam</label>
                  <input type="text" name="firstName">
                </div>
                <div class="inputRow">
                  <label for="lastName">Achternaam</label>
                  <input type="text" name="lastName">
                </div>
                <div class="inputRow">
                  <label for="email">E-mail</label>
                  <input type="email" name="email" required>
                </div>
                <div class="inputRow">
                  <label for="password">Wachtwoord</label>
                  <input type="password" name="password" id="Inputt" required>
                  <input type="checkbox" onclick="myFunction()">Show Password <br><br>
                </div>
                <div class="inputRow">
                  <input type="submit" name="register" value="Registreer">
                </div>
              </form>
              <?php } ?>
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

