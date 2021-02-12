<?php
include("header.php");
include("footer.php");
?>
<body>
    <div class="content">
        <div class="container">
            <h1>Se connecter</h1>
            <form class="contact-form" action="post/sendPost.php" method="post">
                <input type="hidden" name="tache" value="checkConnect">
                <div class="row">
                    <div class="col-md-12">
                        <label for="pseudo" id="pseudo">Pseudo</label>
                        <input id="pseudo" type="text" name="pseudo" class="form-control" placeholder="Pseudo" required>
                    </div>
                    <div class="col-md-12">
                        <label for="MdP" id="MdP">Mot de Passe</label>
                        <input id="MdP" type="password" name="MdP" class="form-control" placeholder="Mot de Passe" required>
                    </div>

                    <div class="col-md-12">
                        <input id="btnConnect" type="submit" class="btn btn-md btn-block" value="Login">
                    </div>


                    <?php
                      if(isset($_GET["error"])==true)
                      {
                          echo '<div class="col-12 error"><h2>!!!!! Identifiants invalides !!!!!</h2></div> ';
                      }
                    ?>
					
					
                </div>
            </form>	
        </div>
    </div>
		<a href="inscription.php"><INPUT id="btn_inscription" TYPE="button" VALUE="Inscription"></a>
</body>
</html>