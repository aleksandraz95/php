<?php 
include('session.php');
include "connection.php";
?>


<!DOCTYPE html>
<html>

<head>
    <title>e-Knjižara | Početna</title>
    <meta http-equiv="content-Language" content="sr"/>
	<meta http-equiv="content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
	

	<script type="text/javascript" src="jquery-1.10.2.js"></script>
	<script type="text/javascript">
	$(document).ready(function () {
	$(".obrisi_link").click(function(){
	var vrednost = ($(this).attr("id")).substring(7);
	var red_tabele = $(this);
	$.get("obrisi_ajax.php", { id: vrednost },
	   function(data){
	   if (data == 1){
	   $(red_tabele).parent().parent().remove();
	   }   
	   });
	});
	});
	</script>
	
	<script type="text/javascript">
	$(document).ready(function () {
	$("#ime").blur(function(){
	var vrednost = $("#ime").val();
	$.get("provera_ajax.php", { id: vrednost },
	   function(data){
	   if (data == 0){
	   $("#user").html("Korisnik postoji");
	   $("#ime").focus();
	   }
	   if (data == 1){
	   $("#user").html("Korisnik ne postoji u bazi");
	   }   
	   });
	});
	});
	</script>
    
</head>


<body>
	
	<div id="profile">
		<b id="welcome">Prijavljen/a: <i><?php echo $login_session; ?></i></b>
		<b id="logout"><a href="logout.php" style="color:white">Log Out</a></b>
	</div>
	<h1 style="color:white" >e-Knjižara (knjige na stanju)</h1>

	<div class="topnav">
	  <a class="active" href="index.php?strana=prikazi" style="font-size:200%; color:white">Prikaži</a>
	  <a href="index.php?strana=ubaci" style="font-size:200%; color:white">Ubaci</a>
	  <a href="index.php?strana=izmeni" style="font-size:200%; color:white">Izmeni</a>
	</div>
	

	

    <?php
        if(isset($_GET['strana'])){
            $strana = $_GET['strana'];
        }else{
            $strana = 'prikazi';
        }

        switch($strana){
            case "prikazi":
				$sql="SELECT * FROM knjizara ";
				$rezultat = $mysqli->query($sql);
    ?>
	
    <table>
        <tr>
            <td><b>Naziv</b></td>
            <td><b>Autor</b></td>
			<td><b>Žanr</b></td>
			<td><b>Cena</b></td>
			<td><b><i>Obriši rasprodatu knjigu</i></b></td>
        </tr>

        <?php while($red = $rezultat->fetch_object()){ ?>
        <tr>
            <td><?php echo $red->naziv;?></td>
            <td><?php echo $red->autor;?></td>
			<td><?php echo $red->zanr;?></td>
			<td><?php echo $red->cena;?></td>
			<td><a href="#" class="obrisi_link" id="obrisi_<?php echo $red->id;?>">Obriši</a></td>
        </tr>
		
	<?php
        }
     echo "</table>";

            break;
	
	
	
	
        case "ubaci":
        if(isset($_POST['dugmeubaci'])){
			$naziv = trim($_POST["naziv"]);
			$autor = trim($_POST["autor"]);
			$zanr = trim($_POST["zanr"]);
			$cena=trim($_POST["cena"]);

			$sql="INSERT INTO knjizara (naziv, autor, zanr, cena) VALUES ('".$naziv."', '".$autor."', '".$zanr."', ".$cena.")";
			if($mysqli->query($sql)===TRUE){
				
				echo "Knjiga je uneta";
			}else{
				echo "Greška pri unosu";
			}
			
        }else{
	?>
		<form action="index.php?strana=ubaci" method="post">
        <h2 style="color:white">Naziv</h2><br> <input type="text" name="naziv"><br>
        <h2 style="color:white">Autor</h2><br><input type="text" name="autor"><br>
		<h2 style="color:white">Žanr</h2><br> <input type="text" name="zanr"><br>
		<h2 style="color:white">Cena</h2><br><input type="text" name="cena"><br>
        <br><input type="submit" name="dugmeubaci" value="Ubaci">
		</form>

    <?php
        }
        break;
		
		
	
        case "izmeni":
        if(isset($_POST['dugmeizmeni'])){
			$id= trim($_POST["id"]);
			$naziv = trim($_POST["naziv"]);
			$autor = trim($_POST["autor"]);
			$zanr = trim($_POST["zanr"]);
			$cena=trim($_POST["cena"]);

			$sql="UPDATE knjizara SET naziv='".$naziv."', autor='".$autor."', zanr='".$zanr."', cena=".$cena." WHERE id=".$id;
			if($mysqli->query($sql)===TRUE){
				
				echo "Podaci su promenjeni";
			}else{
				echo "Greska pri izmeni";
			}
			
        }else{
    ?>
	
    <form action="index.php?strana=izmeni" method="post">
        <h2 style="color:white">ID</h2> <br><input type="text" name="id"><br>
        <h2 style="color:white">Naziv</h2><br> <input type="text" name="naziv"><br>
        <h2 style="color:white">Autor</h2><br><input type="text" name="autor"><br>
		<h2 style="color:white">Žanr</h2><br> <input type="text" name="zanr"><br>
		<h2 style="color:white">Cena</h2><br><input type="text" name="cena"><br>
        <input type="submit" name="dugmeizmeni" value="Izmeni">
    </form>
	
    <?php 
        }
        break;
		
		
	
        case "obrisi":
        if(isset($_POST['dugmeobrisi'])){
            
			$id= trim($_POST["id"]);
			$sql= "DELETE FROM knjizara WHERE id=".$id;
			if($mysqli->query($sql)===TRUE){
				
				echo "Knjiga je obrisana";
			}else{
				echo "Greska pri brisanju";
			}
			
        }else{
    ?>
	
    <!-- <form action="index.php?strana=obrisi" method="post">
        <h2 style="color:white">ID</h2><br><input type="text" name="id" id="ime"><br><div id="user">Informacija o validnosti id-ja knjige</div>
        <input type="submit" name="dugmeobrisi" value="Obrisi">
    </form> -->
	
    <?php
        }
        break;
        default:
        echo "Stranica nije pronadjena!";
        break;

    }
    ?>
	
	
</body>
</html>
