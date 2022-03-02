<?php
	include("config.php");
	$itemCount = count($_POST["chemical_name"]);
	$itemValues=0;
	$date = getdate(date("U"));
	$mydate = "$date[year]/$date[mon]/$date[mday]";
	
	$query = "INSERT INTO update_stock (chem_id, supplier_id, quantity, price, date) VALUES ";
	$chemStock = "INSERT INTO chem_stock (chem_id, total_qty, rem_qty) VALUES ";
	$queryValue = "";
	for($i=0;$i<$itemCount;$i++) {
		if(!empty($_POST["quantity"][$i]) || !empty($_POST["price"][$i])) {
			$countQuery = "select count(*) from chem_stock where chem_id = '" . $_POST["chemical_id"][$i] . "'";
            $countResult = mysqli_query($conn, $countQuery);
            $countRow=mysqli_fetch_row($countResult);
            $count = $countRow[0];

			if($count == 0){
				$insert="INSERT into chem_stock values('" . $_POST["chemical_id"][$i] . "','" . $_POST["quantity"][$i] . "','" . $_POST["quantity"][$i] . "')";			
				mysqli_query($conn, $insert);
			}
			else{
				$updateTotal = "UPDATE chem_stock set total_qty=(Select total_qty from chem_stock where chem_id='" . $_POST["chemical_id"][$i] . "')+" . $_POST["quantity"][$i] . " where chem_id='" . $_POST["chemical_id"][$i] . "'";
				mysqli_query($conn, $updateTotal);
				$updaterem = "UPDATE chem_stock set rem_qty=(Select rem_qty from chem_stock where chem_id='" . $_POST["chemical_id"][$i] . "')+'" . $_POST["quantity"][$i] . "' where chem_id='" . $_POST["chemical_id"][$i] . "'";
				mysqli_query($conn, $updaterem);
			}

			$itemValues++;
			if($queryValue!="") {
				$queryValue .= ",";
			}
			$queryValue .= "('" . $_POST["chemical_id"][$i] . "', '" . $_POST["supplier_id"][$i] . "','" . $_POST["quantity"][$i] . "','" . $_POST["price"][$i] . "','$mydate ')";
		}   
	}
	$sql = $query.$queryValue;
	if($itemValues!=0) {
		$result = mysqli_query($conn, $sql);
		if(!empty($result)){
			echo "<script>
						alert('Stock Updated!');
						window.location = '../menu/update-stock.php';
					</script>";
		}
		else{
			echo "<script>
						alert('Error while updating stock! Please try again.');
						window.location = '../menu/update-stock.php';
					</script>";
		}
	}
?>