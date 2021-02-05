<?php include("header.php")?>
<body>
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>






                    <tr>
                        <td>7839</td>
                        <td>KING</td>
                        <td>Président</td>
                        <td>/</td>
                        <td>01-05-2016</td>
                        <td>5000</td>
                        <td>/</td>
                        <td>10</td>
                        <td>

                          <form action="post/sendPost" method="post">
                            <input type="hidden" name="tache" value="deleteEmp">
                            <input type="hidden" name="empno" value="7839">
                            <input type="submit" class="btn btn-danger" value="Supprimer">
                          </form>
                        </td>
                    </tr>







                </tbody>
            </table>






            <input id="btnAddEmp" type="button" class="btn btn-success" value="Ajouter">










            <form id="addEmp" class="contact-form" action="post/sendPost.php" method="post">

              <input type="hidden" name="tache" value="addEmp">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="number" id="number">Numéro</label>
                        <input id="number" type="number" required name="number" class="form-control" placeholder="Votre numéro">
                    </div>
                    <div class="col-lg-6">
                        <label for="name" id="name">Nom</label>
                        <input id="name" type="text" required name="name" class="form-control" placeholder="Votre nom">
                    </div>
                    <div class="col-lg-6">
                        <label for="job" id="job">Emploi</label>
                        <input id="job" required type="text" name="job" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label for="manager" id="manager">Manager</label>
                        <select id="manager" class="form-control" name="manager">
                            <option>Pas de manager</option>
                            <option  value="7839">7839-KING</option>
                            <option>7698</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="date" id="date">Date d'embauche</label>
                        <input id="date" type="date" required name="date" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label for="salaire" id="salaire">Salaire</label>
                        <input id="salaire" required type="number" name="salaire" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label for="comm" id="comm">Commission</label>
                        <input id="comm" type="text" name="comm" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label for="numberDep" id="numberDep">Numéro de département</label>
                        <select id="numberDep" class="form-control" name="numberDep">
                            <option value="NULL">Pas de département</option>
                            <option value="10">ACCOUNTING</option>
                            <option value="20">RESEARCH</option>
                            <option value="30">SALES</option>
                          <option value="40">OPERATIONS</option>
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



<script>


function showAddForm()
{
  addEmp.style.display="block";
}


btnAddEmp.onclick=showAddForm;

</script>
