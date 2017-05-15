<?php
//Step1
 $db = mysqli_connect('localhost','root','root','employees')
 or die('Error connecting to MySQL server.');

//Step2
//$query = "SELECT * FROM employees LIMIT 10";
$query = "select count(*) total, title from titles group by title";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);
//$row = mysqli_fetch_array($result);
$data[] = array('title', 'number'); 
while ($row = mysqli_fetch_array($result)) {

//echo $row['gender'] . '     ' . $row['total']  .'<br />';
$data[] = array($row['title'],(int)$row['total']);

}

//Step 4
echo json_encode($data);

?>
