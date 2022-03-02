<?php
        include("config.php");
		$itemCount = count($_POST["chemical_name"]);
		$itemValues=0;
		$date = getdate(date("U"));
		$mydate = "$date[year]/$date[mon]/$date[mday]";
		 
		$query = "INSERT INTO chem_used (client_id,test_id,chem_id,quantity_used, date) VALUES ";
		$queryValue = "";
		for($i=0;$i<$itemCount;$i++) {
			if(!empty($_POST["chemical_name"][$i])) {
				$itemValues++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
				$queryValue .= "('" . $_POST["client_id"][$i] . "','" . $_POST["test_id"][$i] . "','" . $_POST["chemical_id"][$i] . "','" . $_POST["quantity"][$i] . "','$mydate ')";
				$updaterem = "UPDATE chem_stock set rem_qty=(Select rem_qty from chem_stock where chem_id='" . $_POST["chemical_id"][$i] . "')-'" . $_POST["quantity"][$i] . "' where chem_id='" . $_POST["chemical_id"][$i] . "'";
				mysqli_query($conn, $updaterem);
			}   
		}
        $sql = $query.$queryValue;
		if($itemValues!=0) {
		    $result = mysqli_query($conn, $sql);
			if(!empty($result)) 
				echo "<script>
						alert('Usage Recorded!');
						window.location = '../menu/usage.php';
					</script>";
			else
				echo "<script>
						alert('Error while recording usage! Please try again.');
						window.location = '../menu/usage.php';
					</script>";
		}
		else
        echo "<script>
                    alert('Chemical already exists, or you are trying insert empty spaces!');
                    window.location = '../menu/usage.php';
                </script>";
?>