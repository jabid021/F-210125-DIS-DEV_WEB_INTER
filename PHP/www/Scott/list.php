<?php
include("bdd.php");

$boite=doSQL("SELECT * from emp order by ename",array());
$departements=doSQL("SELECT * from dept",array());
?>
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
    <nav class="navbar navbar-expand-md navbar-dark sticky-top">
        <div class="collapse navbar-collapse justify-content-center" id="myNavbar">
            <ul class="nav nav-pills navbar-nav">
                <li class="nav-item"><a class="nav-link" href="connect.html">Identification</a></li>
                <li class="nav-item"><a class="nav-link" href="list.html">Liste</a></li>
            </ul>
        </div>
    </nav>
    <div class="content">
        <div class="container">
            <h1>Liste des employés</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Nom</th>
                        <th>Emploi</th>
                        <th>Manager</th>
                        <th>Date d’embauche</th>
                        <th>Salaire</th>
                        <th>Commission</th>
                        <th>Numéro departement</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
					<?php
					foreach($boite as $row){
						echo"
						<tr>
							<td>".$row["empno"]."</td>
							<td>".$row["ename"]."</td>
							<td>".$row["job"]."</td>
							<td>".$row["mgr"]."</td>
							<td>".$row["hiredate"]."</td>
							<td>".$row["sal"]."</td>
							<td>".$row["comm"]."</td>
							<td>".$row["deptno"]."</td>
              <td>
                <form action='post/sendPost.php' method='post'>
                  <input type='hidden' name='tache' value='deleteEmp'>
                  <input type='hidden' name='empno' value=".$row["empno"].">
                  <input type='submit' class='btn btn-danger' value='Supprimer'
                </form>

              </td>
					</tr>";}
					?>
                </tbody>
            </table>
            <form class="contact-form" action="post/sendPost.php" method="post">
                <div class="row">

                  <input type="hidden" name="tache" value="addEmp">
                    <div class="col-lg-6">
                        <label for="number" id="number">Numéro</label>
                        <input id="number" type="text" name="number" class="form-control" placeholder="Votre numéro">
                    </div>
                    <div class="col-lg-6">
                        <label for="name" id="name">Nom</label>
                        <input id="name" type="text" name="name" class="form-control" placeholder="Votre nom">
                    </div>
                    <div class="col-lg-6">
                        <label for="job" id="job">Emploi</label>
                        <input id="job" type="text" name="job" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label for="manager" id="manager">Manager</label>
                        <select id="manager" class="form-control" name="manager">
                            <option value="NULL">Pas de manager</option>
                            <?php

                              foreach ($boite as $emp) {
                                echo "<option value='".$emp['empno']."'>".$emp['empno']."-".$emp['ename']."</option>";
                              }

                            ?>


                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="date" id="date">Date d'embauche</label>
                        <input id="date" type="date" name="date" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label for="salaire" id="salaire">Salaire</label>
                        <input id="salaire" type="number" name="salaire" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label for="comm" id="comm">Commission</label>
                        <input id="comm" type="text" name="comm" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label for="numberDep" id="numberDep">Numéro de département</label>
                        <select id="numberDep" class="form-control" name="numberDep">
                            <option value="NULL">Choisir votre département</option>
                            <?php

                              foreach ($departements as $dept) {
                                echo "<option value='".$dept['deptno']."'>".$dept['deptno']."-".$dept['dname']." (".$dept['loc'].")</option>";
                              }

                            ?>
                        </select>
                    </div>
                    <div class="col-lg-12" style="text-align: center;">
                        <input type="submit" class="btn btn-primary btn-md btn-block" value="Ajouter">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
