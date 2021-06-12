<?php
//get input value
$type = $_POST["ftype"];
$name = $_POST["fname"];
echo "<h1>DATABASE TABLE</h1>";
// connect to server
$con = mysqli_connect("localhost","group1","group1");
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// use database
$db_selected = mysqli_select_db($con, "hiudb");
if (!$db_selected) {
	echo "Failed to select DB. <br>";
}

//create SQL query
if($type == 'course'){
	$sql = "select * from " .$type. " where title like '%" .$name. "%'";
}
else {
	$sql = "select * from " .$type. " where name like '%" .$name. "%'";
}
//execute SQL query
$db_handler = mysqli_query($con, $sql);
if (!$db_handler) {
	echo"<br>";	
	echo "Failed to get data.<br>";
  	echo "Error updating record: " . $con->error;
}

// output to table
	if($type == 'customer') {
		echo "<strong>customer:</strong>";
		echo "<table border=’1’>
			<tr>
			<th>customer_id</th>
			<th>first_name</th>
			<th>last_name</th>
			<th>number</th>
			<th>gender</th>
			<th>street</th>
			<th>city</th>
			<th>state</th>
			<th>country</th>
			<th>contact</th>
			<th>email</th>
			<th>dob</th>
			<th>point</th>
		</tr>";

		while($row = mysqli_fetch_array($db_handler1,MYSQLI_ASSOC)) {
			echo "<tr>";
			echo "<td>" . $row["customer_id"] . "</td>";
			echo "<td>" . $row["first_name"] . "</td>";
			echo "<td>" . $row["last_name"] . "</td>";
			echo "<td>" . $row["number"] . "</td>";
			echo "<td>" . $row["gender"] . "</td>";
			echo "<td>" . $row["street"] . "</td>";
			echo "<td>" . $row["city"] . "</td>";
			echo "<td>" . $row["state"] . "</td>";
			echo "<td>" . $row["country"] . "</td>";
			echo "<td>" . $row["contact"] . "</td>";
			echo "<td>" . $row["email"] . "</td>";
			echo "<td>" . $row["dob"] . "</td>";
			echo "<td>" . $row["point"] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	} elseif ($type == 'order_list') {
		echo "<strong>order_list:</strong>";
		echo "<table border=’1’>
		<tr>
			<th>order_id</th>
			<th>type</th>
			<th>payment_type</th>
			<th>payment_status</th>
			<th>order_date</th>
			<th>check_in</th>
			<th>check_out</th>
			<th>status</th>
			<th>total_cost</th>
			<th>note</th>
			<th>customer_id</th>
		</tr>";

		while($row = mysqli_fetch_array($db_handler2,MYSQLI_ASSOC)) {
			echo "<tr>";
			echo "<td>" . $row["order_id"] . "</td>";
			echo "<td>" . $row["type"] . "</td>";
			echo "<td>" . $row["payment_type"] . "</td>";
			echo "<td>" . $row["payment_status"] . "</td>";
			echo "<td>" . $row["order_date"] . "</td>";
			echo "<td>" . $row["check_in"] . "</td>";
			echo "<td>" . $row["check_out"] . "</td>";
			echo "<td>" . $row["status"] . "</td>";
			echo "<td>" . $row["total_cost"] . "</td>";
			echo "<td>" . $row["note"] . "</td>";
			echo "<td>" . $row["customer_id"] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	} elseif($type == 'product') {
		echo "<strong>product:</strong>";
		echo "<table border=’1’>
		<tr>
			<th>product_id</th>
			<th>name</th>
			<th>type</th>
			<th>time</th>
			<th>quantity</th>
			<th>price</th>
			<th>discount</th>
			<th>product_details</th>
			<th>status</th>
			<th>note</th>
		</tr>";

		while($row = mysqli_fetch_array($db_handler3,MYSQLI_ASSOC)) {
			echo "<tr>";
			echo "<td>" . $row["product_id"] . "</td>";
			echo "<td>" . $row["name"] . "</td>";
			echo "<td>" . $row["type"] . "</td>";
			echo "<td>" . $row["time"] . "</td>";
			echo "<td>" . $row["quantity"] . "</td>";
			echo "<td>" . $row["price"] . "</td>";
			echo "<td>" . $row["discount"] . "</td>";
			echo "<td>" . $row["product_details"] . "</td>";
			echo "<td>" . $row["status"] . "</td>";
			echo "<td>" . $row["note"] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	} elseif($type == 'branch'){
		echo "<strong>branch:</strong>";
		echo "<table border=’1’>
		<tr>
			<th>branch_id</th>
			<th>name</th>
			<th>contact</th>
			<th>street</th>
			<th>city</th>
			<th>state</th>
			<th>country</th>
			<th>contact</th>
			<th>manager_fname</th>
			<th>manager_lname</th>
		</tr>";

		while($row = mysqli_fetch_array($db_handler4,MYSQLI_ASSOC)) {
			echo "<tr>";
			echo "<td>" . $row["branch_id"] . "</td>";
			echo "<td>" . $row["name"] . "</td>";
			echo "<td>" . $row["contact"] . "</td>";
			echo "<td>" . $row["street"] . "</td>";
			echo "<td>" . $row["city"] . "</td>";
			echo "<td>" . $row["state"] . "</td>";
			echo "<td>" . $row["country"] . "</td>";
			echo "<td>" . $row["contact"] . "</td>";
			echo "<td>" . $row["manager_fname"] . "</td>";
			echo "<td>" . $row["manager_lname"] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
}elseif($type == 'offer'){
	echo "<strong>offer:</strong>";
	echo "<table border=’1’>
	<tr>
			<th>product_id</th>
			<th>branch_id</th>
		</tr>";

		while($row = mysqli_fetch_array($db_handler5,MYSQLI_ASSOC)) {
			echo "<tr>";
			echo "<td>" . $row["product_id"] . "</td>";
			echo "<td>" . $row["branch_id"] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
}else{
	echo "<strong>contain:<strong>";
	echo "<table border=’1’>
	<tr>
				<th>order_id</th>
			<th>product_id</th>
		</tr>";

		while($row = mysqli_fetch_array($db_handler6,MYSQLI_ASSOC)) {
			echo "<tr>";
			echo "<td>" . $row["order_id"] . "</td>";
			echo "<td>" . $row["product_id"] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
}

mysqli_free_result($db_handler);

//close connection
mysqli_close($con);
?>