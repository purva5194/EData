<?php
//Step1
 $db = mysqli_connect('localhost','root','root','employees')
 or die('Error connecting to MySQL server.');

//Step2
//$query = "SELECT * FROM employees LIMIT 10";
$query = "select first_name, last_name, from_date, to_date from employees inner join dept_manager where employees.emp_no = dept_manager.emp_no limit 10";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);
//$row = mysqli_fetch_array($result);
$data[] = array('first_name', 'last_name', 'from_date' ,'to_date'); 
while ($row = mysqli_fetch_array($result)) {

$data[] = array($row['first_name'],$row['last_name'],$row['from_date'],$row['to_date']);

}

//Step 4
echo json_encode($data);

?>

