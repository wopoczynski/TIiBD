<?php
require_once "dbconnect.php";
  
  function poczatek_sesji()
  {
    session_start();
  }

  function pusty_koszyk()
  {
    if (!isset($_POST['pusty_koszyk'])) {
		$numer =$_POST['numer'];
		$query="DELETE FROM users_buy_products WHERE id_u = $numer";
		mysqli_query($link,$query);
		echo '<br />Koszyk został opróżniony';
		}
	}
	function pokaz_koszyk()
  {
	echo '<br />Koszyk jest pusty';
  }
?>