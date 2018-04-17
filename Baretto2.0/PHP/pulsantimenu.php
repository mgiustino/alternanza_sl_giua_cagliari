<DOCTYPE! html>
<html>

<head>

  <title>Bar Giua</title>
  <link rel="stylesheet" href="stilinav.css" type="text/css">
  <link rel="stylesheet" href="stili.css" type="text/css">
</head>

<script>
  function ordinePiu(){
    var numOrd = document.getElementById('numeroOrdine').value;
    numOrd = parseInt(numOrd);
    numeroOrdine.value = numOrd + 1;
  }

  function ordineMeno(){
    var numOrd = document.getElementById('numeroOrdine').value;
    numOrd = parseInt(numOrd);
    if(numOrd > 0){
      numeroOrdine.value = numOrd - 1;
    }
  }

  function openMenu(evt, menu){
   
    var i, tabcontent, tablinks;
    
    //Carica il contenuto delle tab
    
    tabcontent = document.getElementsByClassName("tabcontent");
    
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    
    //Carica il contenuto dei links
    
    tablinks = document.getElementsByClassName("tablinks");   

    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    
    document.getElementById(menu).style.display = "block";

    evt.currentTarget.className += " active";

  }

  function openOrdine(evt0, menu0, id){
    var i0, tabcontent0, tablinks0;

  document.getElementById('paninoSelezionato').innerHTML = id;

  numeroOrdine.value = document.getElementById('numeroOrdine').innerHTML = 1;

  infarinato.checked = false;

    tabcontent0 = document.getElementsByClassName("tabcontent");
    
    tablinks0 = document.getElementsByClassName("tablinks");   

    for (i0 = 0; i0 < tablinks0.length; i0++) {
        tablinks0[i0].className = tablinks0[i0].className.replace(" active", "");
    }
    
    document.getElementById(menu0).style.display = "block";

    evt0.currentTarget.className += " active";
  }

  function addOrdine() {
	document.getElementById("hide").innerHTML += "x";
  }

</script>

<body>

  <div> 

  <ul class="ul">

     <li class="active" ><a href=""><img class="tenda" src="tenda.png" alt=""></a></li>

    <div style="float: center;"> <a href="#home"><center><img class="logoimg" src="logo.png" alt=""></center></a></div>

  </ul>

  </div>

  <!--Links tab-->
  <div>
    <button class="tablinks" onclick="openMenu(event, 'Cibo')">Cibo</button>
    <button class="tablinks" onclick="openMenu(event, 'Bevande')">Bevande</button>
    <button class="tablinks" onclick="openMenu(event, 'Caffetteria')">Caffetteria</button>
    <button class="tablinks" onclick="openMenu(event, 'Altro')">Altro</button>
  </div>

  <!--Connessione al DB-->

  <!--<?php/*
	$conn = mysqli_connect("localhost","root","","BarettoDB");
	if(mysqli_connect_errno()){
		die("Connection failed:".mysqli_connect_error());
	}
	echo"Connected successfully";*/
  ?>-->

  <center>

  <!--Contenuto tab-->
  <div align="left" id="Cibo" class="tabcontent">
    <?php
      $qcibo = "SELECT Prodotti.Nome,Prodotti.Prezzo FROM Prodotti,CategorieProdotti WHERE Prodotti.Categorie = CategorieProdotti.id AND CategorieProdotti.Descrizione = 'panini';";
      $result = mysqli_query($conn, $qcibo);
      if(mysqli_num_rows($result) !=0){

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          echo $row["Nome"].$row["Prezzo"]."<br>";
        }
      }

    ?>
      <input type="button" title="PaninoFormaggio" id="PaninoScelto" class="icone" onclick="openOrdine(event, 'Ordine', this.id)">
      <input type="button" title="PaninoSalame" id="PaninoScelto" class="icone" onclick="openOrdine(event, 'Ordine', this.id)">
      <input type="button" title="PaninoProsciutto" id="PaninoScelto" class="icone" onclick="openOrdine(event, 'Ordine', this.id)">
      <br>
  </div>

  <div align="left" id="Bevande" class="tabcontent">
    <?php
      $qbevande = "SELECT Prodotti.Nome,Prodotti.Prezzo FROM Prodotti,CategorieProdotti WHERE Prodotti.Categorie = CategorieProdotti.id AND CategorieProdotti.Descrizione = 'bevande';";
      $result = mysqli_query($conn, $qbevande);
      if(mysqli_num_rows($result) !=0){

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          echo $row["Nome"].$row["Prezzo"]."<br>";
        }
      }

    ?>
  <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">
      <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">
      <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">
      <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">
      <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">

  </div>

  <div align="left" id="Caffetteria" class="tabcontent">
    <?php
      $qcafeteria = "SELECT Prodotti.Nome,Prodotti.Prezzo FROM Prodotti,CategorieProdotti WHERE Prodotti.Categorie = CategorieProdotti.id AND CategorieProdotti.Descrizione = 'cafeteria';";
      $result = mysqli_query($conn, $qcafeteria);
      if(mysqli_num_rows($result) !=0){

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          echo $row["Nome"].$row["Prezzo"]."<br>";
        }
      }

    ?>
  <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">
      <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">
      <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">
      <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">
      <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">
  </div>

  <div align="left" id="Altro" class="tabcontent">
    <?php
      $qaltro = "SELECT Prodotti.Nome,Prodotti.Prezzo FROM Prodotti,CategorieProdotti WHERE Prodotti.Categorie = CategorieProdotti.id AND CategorieProdotti.Descrizione = 'altro';";
      $result = mysqli_query($conn, $qaltro);
      if(mysqli_num_rows($result) !=0){

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          echo $row["Nome"].$row["Prezzo"]."<br>";
        }
      }

    ?>
  <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">
      <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">
      <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">
      <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">
      <input type="button" class="icone" onclick="openOrdine(event, 'Ordine')">
  </div>


  <div align="left" id="Ordine" class="tabcontent">
    <p id="paninoSelezionato"></p>
    <input type="button" value="-" onclick="ordineMeno()">
    <input type="text" value="1" id="numeroOrdine">
    <input type="button" value="+" onclick="ordinePiu()">
    <input type="button" value="Submit" onclick="addOrdine()">
    <br>
    <input type="checkbox" id="infarinato">
    Infarinato
  </div>
</center>
<form method="post" action="/carrello.php">
  <textarea  id="hide"></textarea>
  <button type="submit">
</form>
</body>
</html>
