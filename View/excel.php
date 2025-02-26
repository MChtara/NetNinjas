<?php 
// Load the database configuration file 
include '../Controller/Comptetable.php';
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\t", $str); 
    $str = preg_replace("/\r?\n/", "\n", $str); 
    if(strstr($str, '"')) $str = '"' . strreplace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "members-data" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('ID', 'First Name', 'Last Name', 'date', 'Email', 'Password', 'Role'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$db = config::getConnexion();
$query = $db->query("SELECT * FROM user ORDER BY id_user ASC"); 
if ($query->rowCount() > 0) {
    // Output each row of the data 
    while($rowCount = $query->fetch(PDO::FETCH_ASSOC)){ 

        $lineData = array($rowCount['id_user'], $rowCount['firstname'], $rowCount['lastname'], $rowCount['date_de_N'], $rowCount['email'], $rowCount['password'], $rowCount['role']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;