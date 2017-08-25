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
		  if (isset($_POST['kategoria1'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE category = 1");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['kategoria2'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE category = 2");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['kategoria3'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE category = 3");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['pkategoria1'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE subcategory = 1");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['pkategoria2'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE subcategory = 2");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['pkategoria3'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE subcategory = 3");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['pkategoria4'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE subcategory = 4");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['pkategoria5'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE subcategory = 5");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['pkategoria6'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE subcategory = 6");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['ppkategoria1'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE subsubcategory = 1");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['ppkategoria2'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE subsubcategory = 2");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['ppkategoria3'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE subsubcategory = 3");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['ppkategoria4'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE subsubcategory = 4");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['ppkategoria5'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE subsubcategory = 5");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['ppkategoria6'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE subsubcategory = 6");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['ppkategoria7'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE subsubcategory = 7");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		  if (isset($_POST['ppkategoria8'])){
			$rezultat = mysqli_query($link,"SELECT * FROM products WHERE subsubcategory = 8");
            $ile = mysqli_num_rows($rezultat);
			for($i=1; $i <= $ile; $i++)
			{
				$row = mysqli_fetch_assoc($rezultat);
				$a1 = $row['name'];
				$a2 = $row['image'];
				$a3 = $row['quantity'];
				$a4 = $row['price'];
				$a5 = $row['id_p'];
				echo<<<END
				<div id='produkt'>
					<center><img src='$a2' width='150' height='150' /></center>
					<center><b>$a1</center></b>
					<p align='left'>Cena: $a4 zł</p>
					<p align='left'>Stan: $a3 szt.</p>
					<p align='right'><form action='koszyk.php' method='post'>
					Ilość: <input type='text' name='ile' size=5/><br /><br />
					<input type='hidden' value=$a1 name='nazwa'>
					<input type='hidden' value=$a5 name='idp'>
					<input type='submit' value='Dodaj do koszyka' name=kosz /></form></p></div>
END;
			}
		  }
		?>
          </div>
      </div>
  		<div style="clear:both;"></div>
    </div>

    <div style="clear:both;"></div>
    <br />
    <div class="stopka"> Copyright © Wszelkie prawa zastrzeżone Bartłomiej Furgała, Wojciech Opoczyński, Łukasz Witek </div>
	</div>


</body>
</html>
