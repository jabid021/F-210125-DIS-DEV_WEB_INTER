<?php
include("header.php");

?>
<body>
    <div class="content">
        <div class="container">
            <h1>Se connecter</h1>
            <form class="contact-form" action="post/sendPost.php" method="post">
                <input type="hidden" name="tache" value="checkConnect">
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
                        <input id="btnConnect" type="submit" class="btn btn-md btn-block" value="Login">
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


<script>


function evenementsBtnConnect(evenement)
{
  if(evenement.type=="click")
  {
    console.log("click");
  }

}

btnConnect.onclick=function clickbody(){console.log("click");}
btnConnect.onmouseover=function overbody(){console.log("over");}
btnConnect.onmouseout=function outbody(){console.log("out");}



</script>
