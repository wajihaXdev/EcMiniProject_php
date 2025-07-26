<?php
session_start();
if(isset($_REQUEST["index"]))
{
	if(isset($_SESSION["cart"]))
	{
		unset($_SESSION["cart"][$_REQUEST["index"]]);
	
		sort($_SESSION["cart"]);
		echo "<script>window.location.href='cart.php'</script>";
	}
	
}


?>