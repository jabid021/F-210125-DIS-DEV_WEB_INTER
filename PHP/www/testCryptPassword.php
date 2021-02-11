<?php

/*echo "0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c<br>";
echo "md5 : ".md5("toto");
echo "<br>";

echo"sha1 : ". sha1("toto")."<br>";
echo"sha1 : ". sha1("toto")."<hr>";*/


$crypt1=password_hash("a",PASSWORD_BCRYPT);
//$crypt2=password_hash("a",PASSWORD_DEFAULT);


echo $crypt1;



/*SELECT * from compte where login=? and password=?


=> SELECT * from compte where login=?
if(password_verify($_POST["passwordForm"],$row[0]["password"]))
{*/



if(password_verify("a",$crypt1))
{
  echo "Password OK";
}

else
{
  echo "password NOT OK";
}

//doSQL("update set password=?", array(md5($_POST["password"])));
//md5(toto)                 0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c
//if(md5($_POST["password"])== $row)



 ?>
