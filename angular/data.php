<?php

$con = mysqli_connect("localhost","root","","Elbatal");

if (mysqli_connect_error()) {
	echo "Connection Failed : " . mysqli_connect_error();
	die();
}

$page   = 1;
$offset = 0;
$amount = 10;


if (isset($_GET['page']) && is_numeric($_GET['page'])) {
	$page = round($_GET['page']);
}

if (isset($_GET['amount']) && is_numeric($_GET['amount'])) {
	$amount = round($_GET['amount']);
}

$offset = ($page - 1) * $amount;

$q = '';

if (isset($_GET['q']) && !empty($_GET['q'])) {
	$q = $_GET['q'];
}
$x = "SELECT * FROM visits ";

if (!empty($q)) {
	$x .= "WHERE path like '%{$q}%' OR full_url like '%{$q}%' ";
}
$all = mysqli_query($con, $x);

$sql = "SELECT * FROM visits ";

if (!empty($q)) {
	$sql .= "WHERE path like '%{$q}%' OR full_url like '%{$q}%' ";
}
$sql .= "LIMIT {$amount} OFFSET {$offset} ";


$result = mysqli_query($con, $sql);


$total = mysqli_num_rows($all);
$pages = ceil($total / $amount);

if (mysqli_error($con)) {
	echo "SQL error : " . mysqli_error($con);
	die();
}

$num = mysqli_num_rows($result);

$data = [];

for ($i=0; $i < $num; $i++) { 
	$data[] = mysqli_fetch_assoc($result);
}



$response = [
	'total' => $total,
	'data'  => $data,
];

echo json_encode($response);