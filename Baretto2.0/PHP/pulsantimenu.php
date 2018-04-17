<DOCTYPE! html>
<html>

<head>
  <title></title>
</head>

<style>
  /*Estetica pulsanti*/
  .tablinks{
    /*Code*/
  }

  /*Estetica tab*/
  .tabcontent {
    display: none;
    /*Code*/
  }
</style>

<script>
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
</script>

<body>
  <!--Links tab-->
  <div class="menutab">
    <button class="tablinks" onclick="openMenu(event, 'Cibo')">Cibo</button>
    <button class="tablinks" onclick="openMenu(event, 'Bevande')">Bevande</button>
    <button class="tablinks" onclick="openMenu(event, 'Caffetteria')">Caffetteria</button>
    <button class="tablinks" onclick="openMenu(event, 'Altro')">Altro</button>
  </div>

  <!--Connessione al DB-->

  <?php
	$conn = mysqli_connect("localhost","root","","BarettoDB");
	if(mysqli_connect_errno()){
		die("Connection failed:".mysqli_connect_error());
	}
	echo"Connected successfully";  	
  ?>

  <!--Contenuto tab-->
  <div id="Cibo" class="tabcontent">
    <?php
    	$qcibo = "SELECT Prodotti.Nome,Prodotti.Prezzo FROM Prodotti,CategorieProdotti WHERE Prodotti.Categorie = CategorieProdotti.id AND CategorieProdotti.Descrizione = 'panini';";
    	$result = mysqli_query($conn, $qcibo);
    	if(mysqli_num_rows($result) !=0){

    		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    			echo $row["Nome"].$row["Prezzo"]."<br>";
    		}
    	}

    ?>
  </div>

  <div id="Bevande" class="tabcontent">
    <?php
    	$qbevande = "SELECT Prodotti.Nome,Prodotti.Prezzo FROM Prodotti,CategorieProdotti WHERE Prodotti.Categorie = CategorieProdotti.id AND CategorieProdotti.Descrizione = 'bevande';";
    	$result = mysqli_query($conn, $qbevande);
    	if(mysqli_num_rows($result) !=0){

    		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    			echo $row["Nome"].$row["Prezzo"]."<br>";
    		}
    	}

    ?>
  </div>

  <div id="Caffetteria" class="tabcontent">
    <!--Code-->
  </div>

  <div id="Altro" class="tabcontent">
    <!--Code-->
  </div>



</body>
</html>
