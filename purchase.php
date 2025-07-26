<?php
include("admin/config.php");
session_start();
?>
<?php
if(isset($_POST["btn_placeorder"]))
{
	$query1= "insert into order_manager (fullname,email,phone_no,address,pay_mode) values 
		('".$_POST["fullname"]."','".$_POST["email"]."','".$_POST["phon_no"]."','".$_POST["address"]."','".$_POST["payment_cod"]."')";
	
	if(mysqli_query($connect,$query1))
	{
		$Order_id = mysqli_insert_id($connect);
		$query2= "insert into  user_order (Order_id ,item_name,item_price,item_qty) values (?,?,?,?)";
		$stmt=mysqli_prepare($connect,$query2);
		if($stmt)
		{
			mysqli_stmt_bind_param($stmt,"isii",$Order_id,$item_name,$item_price,$item_quantity);
			foreach($_SESSION["cart"] as $keys => $values)
			{
				$item_name =  $values["Name"];
				$item_price = $values["Price"];
				$item_quantity = $values["Quantity"];
				mysqli_stmt_execute($stmt);		
			}
			unset($_SESSION["cart"]);
			echo "<script>alert('Order Placed');window.location='index.php'</script>";
		}
		else
		{
			echo "<script>alert('".mysqli_error($connect)."')</script>";
		}
	}
	else
	{		
		echo "<script>alert('".mysqli_error($connect)."')</script>";
	}
}
?>