<!DOCTYPE html>
<html>

<head>
  <title></title>
</head>

<style>
  /*Estetica pulsanti*/
  .tablink{
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

  <!--Contenuto tab-->
  <div id="Cibo" class="tabcontent">
    <!--Code-->
  </div>

  <div id="Bevande" class="tabcontent">
    <!--Code-->
  </div>

  <div id="Caffetteria" class="tabcontent">
    <!--Code-->
  </div>

  <div id="Altro" class="tabcontent">
    <!--Code-->
  </div>

</body>
</html>
