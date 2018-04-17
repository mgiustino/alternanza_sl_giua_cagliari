<?php 
  session_start();
  include_once 'navbar+Dropbox-v2.html';
?>

<form action="includes/login.inc.php" method="post">
  <div id="form">

  	<link rel="stylesheet" href="cssprima.css" type="text/css" />

    <h1>Log In</h1>

   <center> <label for="email" >Email</label>
    <input type="text" name="email" id="nome" /> 
    <br/></center>

    <center><label for="password">Password</label>
    <input type="text" name="password" id="email" /><br/></center>
 
    <center><input type="submit" id="submit" name="submit" value="Invia" /></center>

<br/>
<label>Non sei registrato?
  	<a href="accedi.html" style="color:#FF8800">REGISTRATI</a>
</label>


  </div>
</form>