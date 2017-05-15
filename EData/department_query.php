<?php
//Step1
 $db = mysqli_connect('localhost','root','root','employees')
 or die('Error connecting to MySQL server.');

//Step2
//$query = "SELECT * FROM employees LIMIT 10";
$query = "select d.dept_name, count(*) total_employees  from dept_emp de, departments d  where d.dept_no=de.dept_no group by d.dept_no";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);
//$row = mysqli_fetch_array($result);
$data[] = array('department', 'employee'); 
while ($row = mysqli_fetch_array($result)) {

$data[] = array($row['dept_name'],(int)$row['total_employees']);

}

//Step 4
echo json_encode($data);

?>

