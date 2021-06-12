<?php
//get input value
$type = $_POST["utype"];
$id = $_POST["uid"];
$att2 = $_POST["att2"];
$att3 = $_POST["att3"];
$att4 = $_POST["att4"];
$att5 = $_POST["att5"];
$att6 = $_POST["att6"];
$att7 = $_POST["att7"];
$att8 = $_POST["att8"];
$att9 = $_POST["att9"];
$att10 = $_POST["att10"];
$att11 = $_POST["att11"];
$att12 = $_POST["att12"];
$att13 = $_POST["att13"];
//create SQL query
if($type == 'customer'){
	$sql = "update customer set personal_number = '" .$att4. "', first_name = '" .$att2. "', last_name = '" .$att3. "', gender ='" .$att5."', street ='" .$att6. "', city='" .$att7. "', state = '".$att8."', country= '".$att9."', contact ='".$att10."', email = '".$att11."', dob = '".$att12."', point = '".$att13."' where customer_id = '" .$id. "'";
	$sql2 = "select * from " .$type;
}
else if($type == 'order_list'){
	$sql = "update order_list set type = '" .$att2. "', payment_type = '" .$att3. "', payment_status = '" .$att4. "', order_date = '".$att5."', check_in = '".$att6."', check_out = '".$att7."', status = '".$att8."', total_cost = '".$att9."', note = '".$att10."', customer_id = '".$att11."' where order_id = " .$id;
	$sql2 = "select * from " .$type;
}
else if($type == 'product') {
	$sql = "update product set name = '" .$att2. "', type = '" .$att3. "', time = '" .$att4. "', quantity = '".$att5."', price = '".$att6."', discount = '".$att7."', product_details = '".$att8."', status ='".$att9."', note = '".$att10."' where product_id = " .$id;
	$sql2 = "select * from " .$type;
}
else if($type == 'branch') {
	$sql = "update product set name = '" .$att2. "', constact = '" .$att3. "', street = '" .$att4. "', city = '".$att5."', state = '".$att6."', country = '".$att7."', contact = '".$att8."', manager_fname ='".$att9."', manager_lname = '".$att10."' where branch_id = " .$id;
	$sql2 = "select * from " .$type;
}
else if($type == 'contain') {
	$sql = "update product set name = '" .$att2. "', constact = '" .$att3. "', street = '" .$att4. "', city = '".$att5."', state = '".$att6."', country = '".$att7."', contact = '".$att8."', manager_fname ='".$att9."', manager_lname = '".$att10."' where branch_id = " .$id;
	$sql2 = "select * from " .$type;
}
else if($type == 'offer') {
	$sql = "update product set name = '" .$att2. "', constact = '" .$att3. "', street = '" .$att4. "', city = '".$att5."', state = '".$att6."', country = '".$att7."', contact = '".$att8."', manager_fname ='".$att9."', manager_lname = '".$att10."' where branch_id = " .$id;
	$sql2 = "select * from " .$type;
}

echo "<h1>DATABASE UPDATE</h1>";
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


//execute SQL query
$db_handler = mysqli_query($con, $sql);
if (!$db_handler) {
	echo"<br>";	
	echo "Failed to get data1.<br>";
  	echo "Error updating record: " . $con->error;
}
else {
	echo "Record updated successfully! <br>" ;
}

$result = mysqli_query($con, $sql2);
if (!$result) {
	echo"<br>";	
	echo "Failed to get data2.<br>";
  	echo "Error show table: " . $con->error;
}
// output to table
if($db_handler1) {
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
mysqli_free_result($result);
//close connection
mysqli_close($con);
?>