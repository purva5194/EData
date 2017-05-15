<?php
//Step1
 $db = mysqli_connect('localhost','root','root','employees')
 or die('Error connecting to MySQL server.');

//Step2
//$query = "SELECT * FROM employees LIMIT 10";
$query = "SELECT EXTRACT(YEAR FROM hire_date) Year,count(*) Total FROM employees group by Year";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);
//$row = mysqli_fetch_array($result);
$data[] = array('year', 'total'); 
while ($row = mysqli_fetch_array($result)) {

$data[] = array($row['Year'],(int)$row['Total']);

}

//Step 4
echo json_encode($data);

?>

