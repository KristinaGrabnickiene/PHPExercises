<!DOCTYPE html>
<?php include 'country.php';?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Šalys ir miestai</title>
    <link rel="stylesheet" type="text/css" href="boostrap.css">
  </head>
  <body>
<style>

table {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
}
th,td {
  border: 1px solid #000;
  vertical-align: middle !important;
}

button {
  border: 1px solid #000;
  outline: 1px dotted;
  outline: 5px auto -webkit-focus-ring-color;
  padding-top: 0.5rem;
}

</style>
    <table>
  <tr>
    <th>Pavadinimas</th>
    <th>Kodas</th>
    <th>Plotas</th>
  </tr>
<!-- LIETUVA -->
  <tr>
      <td>
        <?php $lt = new Country("LT"); ?>
<button value="<?php echo $lt->getCode();?>" onclick="showUser(this.value)"><?php echo $lt->getName(); ?></button>
      </td>
      <td>
        <?php echo $lt->getCode(); ?>
      </td>
      <td>
        <?php echo $lt->getSurfaceArea(); ?>
      </td>
  </tr>
  <!-- ESTIJA -->
  <tr>
    <td>
       <?php $ee = new Country("EE"); ?>
       <button value="<?php echo $ee->getCode();?>" onclick="showUser(this.value)"><?php echo $ee->getName(); ?></button>
    </td>
      <td>
        <?php echo $ee->getCode(); ?>
      </td>
      <td>
        <?php echo $ee->getSurfaceArea(); ?>
      </td>
  </tr>
  <!-- LATVIJA -->
  <tr>
    <td>
      <?php $lv = new Country("LV"); ?>
<button value="<?php echo $lv->getCode();?>" onclick="showUser(this.value)"><?php echo $lv->getName(); ?></button>
    </td>
      <td>
        <?php echo $lv->getCode(); ?>
      </td>
      <td>
        <?php echo $lv->getSurfaceArea(); ?>
      </td>
  </tr>
  <!-- JAV -->
  <tr>
    <td>
      <?php $jav = new Country("JAV"); ?>
<button value="<?php echo $jav->getCode();?>" onclick="showUser(this.value)"><?php echo $jav->getName(); ?></button>
    </td>
      <td>
        <?php echo $jav->getCode(); ?>
      </td>
      <td>
        <?php echo $jav->getSurfaceArea(); ?>
      </td>
  </tr>
    <!-- VOKIETIJA -->
    <tr>
    <td>
      <?php $ge = new Country("GE"); ?>
<button value="<?php echo $ge->getCode();?>" onclick="showUser(this.value)"><?php echo $ge->getName(); ?></button>
    </td>
      <td>
        <?php echo $ge->getCode(); ?>
      </td>
      <td>
        <?php echo $ge->getSurfaceArea(); ?>
      </td>
  </tr>
</table>

      
<div id="txtHint"><b>All info about cities</b></div>
  </body>
  <script>
  function showUser(str) {
    if (str=="") {
      document.getElementById("txtHint").innerHTML="";
      return;
    }
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("txtHint").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","City.php?code="+str,true);
    xmlhttp.send();
  }
 
</script>
</html>