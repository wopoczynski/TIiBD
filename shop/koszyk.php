<?php
  include('php.php');
  require_once "dbconnect.php";
  session_start();
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<script src="zegar.js">	</script>
	<title>Sklep</title>
	<link rel="stylesheet" href="css.css" type="text/css" />
</head>

<body onload="odliczanie();">
  <div id="glowneokno">

		<div class="gornypanel">
			<div id="logo"><a href="index.php" class="polelinkhtml5">SKLEP</a><br></div>
			<div id="logowanie"><?php
					if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
					{
						echo<<<END
				<a href="logout.php" class="polelinkhtml5">Wyloguj</a>
END;
					}
					else{ echo<<<END
				<a href="logowanie.php" class="polelinkhtml5">Zaloguj</a>
END;
					}
				?></div>
			<div id="koszyk"><a href="koszyk.php" class="polelinkhtml5">Koszyk</a></div>
      <div id="zegar">12:00:00</div>
			<div id="wyszukiwanie">
				<form action="wyniki.php" method="post">
				<input type="text" name="fraza" size=40/>
				<input type="submit" value="Wyszukaj" name="norm" />
				<a href="wyszukiwanie.php" class="polelinkhtml5">Zaawansowane</a><br>
				</form>
			</div>
			<div style="clear: both;"></div>
		</div>

    <div class = "kafelek">
  		<div class="pole1">
  			<ol id="menu">
  				<li><form action="produkty.php" method="post">
						<button type="submit" name="kategoria1" value=1 class="btn-link">Sprzęt laboratoryjny</button>
							</form></li>
  					<ul>
  						<li><form action="produkty.php" method="post">
						<button type="submit" name="pkategoria1" value=1 class="btn-link">Szkło laboratoryjne</button>
							</form></li>
							<ul>
							<li><form action="produkty.php" method="post">
						<button type="submit" name="ppkategoria1" value=1 class="btn-link">Zlewki</button>
							</form></li>
							<li><form action="produkty.php" method="post">
						<button type="submit" name="ppkategoria2" value=2 class="btn-link">Kolby</button>
							</form></li>
							<li><form action="produkty.php" method="post">
						<button type="submit" name="ppkategoria3" value=3 class="btn-link">Cylindry miarowe</button>
							</form></li>
							</ul>
  								<li><form action="produkty.php" method="post">
						<button type="submit" name="pkategoria2" value=2 class="btn-link">Pipety</button>
							</form></li>
							<ul>
							<li><form action="produkty.php" method="post">
						<button type="submit" name="ppkategoria4" value=4 class="btn-link">Końcówki do pipet</button>
							</form></li>
							<li><form action="produkty.php" method="post">
						<button type="submit" name="ppkategoria5" value=5 class="btn-link">Pipety automatyczne</button>
							</form></li>
  									</ul>
  							</ul>
  					</ul>
  						<li><form action="produkty.php" method="post">
						<button type="submit" name="kategoria2" value=2 class="btn-link">Odczynniki</button>
							</form></li>
  					<ul>
  						<li><form action="produkty.php" method="post">
						<button type="submit" name="pkategoria5" value=5 class="btn-link">Dla szkól</button>
							</form></li>
							<li><form action="produkty.php" method="post">
						<button type="submit" name="pkategoria6" value=6 class="btn-link">Barwniki</button>
							</form></li>
  									</ul>
  									</ul>
  							</ul>
  						<li><form action="produkty.php" method="post">
						<button type="submit" name="kategoria3" value=3 class="btn-link">Mikrobiologia</button>
							</form></li>
  					<ul>
  						<li><form action="produkty.php" method="post">
						<button type="submit" name="pkategoria3" value=3 class="btn-link">Podłoża</button>
							</form></li>
							<ul>
							<li><form action="produkty.php" method="post">
						<button type="submit" name="ppkategoria6" value=6 class="btn-link">Podłoża na szalkach</button>
							</form></li>
							</ul>
							<li><form action="produkty.php" method="post">
						<button type="submit" name="pkategoria4" value=4 class="btn-link">Plastiki</button>
							</form></li>
							<ul>
							<li><form action="produkty.php" method="post">
						<button type="submit" name="ppkategoria7" value=7 class="btn-link">Szalki Petriego</button>
							</form></li>
							<li><form action="produkty.php" method="post">
						<button type="submit" name="ppkategoria8" value=8 class="btn-link">Ezy</button>
							</form></li>
  									</ul>
  									</ul>
  							</ul>
  			</ol>
      </div>


  		<div class="pole2">
        <?php
          if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
		  {
				$login=$_SESSION['login'];
				$id_user=mysqli_query($link,"SELECT id_u FROM users WHERE login = '$login'");
				$row = mysqli_fetch_assoc($id_user);
				$a1 = $row['id_u'];
				$data=date("Y-m-d");
				
				echo<<<END
				<form action="kasa.php" method="post">
				<input type='hidden' value=$a1 name='numer'>
				<input type="submit" name="pusty"  value="Opróżnij koszyk" />
				</form>
END;
				 if (isset($_POST['usun'])){
				$numer =$_POST['numer'];
				$niekup =$_POST['niekupione'];
				$produkt =$_POST['produkt'];
				$query="DELETE FROM users_buy_products WHERE id_o = $numer";
				mysqli_query($link,$query);
				
				$info=mysqli_query($link,"SELECT * FROM products WHERE id_p = $produkt");
				$rowrow = mysqli_fetch_assoc($info);
				$sztuki = $rowrow['quantity'];
				
				$suma=$sztuki+$niekup;
				$query="UPDATE products SET quantity='$suma' WHERE id_p = '$produkt'";
				mysqli_query($link,$query);
				}
				
				
				if (isset($_POST['kosz'])){
				
					$nazwa =$_POST['nazwa'];
					$ile =$_POST['ile'];
					$id_p =$_POST['idp'];
					
					if(is_numeric($ile) && $ile > 0){
						$ile=(integer)$ile;
						
						$info=mysqli_query($link,"SELECT * FROM products WHERE id_p = $id_p");
						$rowrow = mysqli_fetch_assoc($info);
						$sztuki = $rowrow['quantity'];
						
						if($sztuki >= $ile){
						
							$wsumie=$sztuki - $ile;
							$query="UPDATE products SET quantity='$wsumie' WHERE id_p = '$id_p'";
							mysqli_query($link,$query);
							
							$query="INSERT INTO users_buy_products VALUES(NULL,'$a1','$id_p','$ile','$data','0')";
							mysqli_query($link,$query);
						}
						else echo "<center>Brak odpowiedniej ilości sztuk w ofercie</center>";
					}
					else echo "<center>Ilość sztuk musi być liczbą!</center>";
				}
				
				$rezultat = mysqli_query($link,"SELECT * FROM users_buy_products WHERE id_u = $a1");
				$ile_prod = mysqli_num_rows($rezultat);
				$suma=0;
				for($i=1; $i <= $ile_prod; $i++){
					$rows = mysqli_fetch_assoc($rezultat);
					$a2=$rows['id_p'];
					$a3=$rows['quantity'];
					$numer=$rows['id_o'];
					$stan=$rows['state'];
					
					if($stan==0){
						$info=mysqli_query($link,"SELECT name,price FROM products WHERE id_p = $a2");
						$rowrow = mysqli_fetch_assoc($info);
						$a4 = $rowrow['name'];
						$a5= $rowrow['price'];
						$cena_c=$a5*$a3;
						$suma=$suma+$cena_c;
						
						echo<<<END
						<p align='left'>$i. $a4	&#8	Ilosć: $a3 szt. &#8	Cena: $cena_c zł 		
						<form action="koszyk.php" method="post" >
						<input type='hidden' value=$numer name='numer'>
						<input type='hidden' value=$a3 name='niekupione'>
						<input type='hidden' value=$a2 name='produkt'>
						<input type="submit" value="Usuń" name="usun" /></form></p>
END;
					}
				}
			
			echo<<<END
			</br></br>
			<p align='left'>Całkowita suma: $suma zł 
			<form action="kasa.php" method="post" >
			<input type='hidden' value=$a1 name='numer'>
			<input type='hidden' value=$ile_prod name='ile_prod'>
			<input type="submit" value="Do kasy" name="kasa" /></form></p>
END;
			}
			else{
			 echo "<center>Musisz się zalogować.</center>";
			}
		?>
  		<div style="clear:both;"></div>
    </div>

    <div style="clear:both;"></div>
    <br />
    <div class="stopka"> Copyright © Wszelkie prawa zastrzeżone Bartłomiej Furgała, Wojciech Opoczyński, Łukasz Witek </div>
	</div>


</body>
</html>
