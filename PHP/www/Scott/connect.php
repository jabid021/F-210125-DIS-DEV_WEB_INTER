<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="content">
        <div class="container">
            <h1>Se connecter</h1>
            <form class="contact-form" action="checkConnect.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <label for="number" id="number">Numéro</label>
                        <input id="number" type="text" name="number" value="7839" class="form-control" placeholder="7788">
                    </div>
                    <div class="col-md-12">
                        <label for="name" id="name">Nom</label>
                        <input id="name" type="text" name="name" value="KING" class="form-control" placeholder="SCOTT">
                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-md btn-block" value="Login">
                    </div>


                    <?php
                      if(isset($_GET["error"])==true)
                      {
                          echo '<div class="col-12 error">Identifiants invalides</div> ';
                      }
                    ?>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
