<?php 
require("connect.php"); 

function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&#39;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 

// Opens a connection to a mysql server 
$connection=($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost',  $username,  $password)); 
if (!$connection) { 
  die('Not connected : ' . mysqli_error($GLOBALS["___mysqli_ston"])); 
} 

// Set the active mysql database 
$db_selected = mysqli_select_db( $connection, $database); 
if (!$db_selected) { 
  die ('Can\'t use db : ' . mysqli_error($GLOBALS["___mysqli_ston"])); 
} 

// Select all the rows in the markers table 
$query = "SELECT * FROM markers WHERE 1"; 
$result = mysqli_query($GLOBALS["___mysqli_ston"], $query); 
if (!$result) { 
  die('Invalid query: ' . mysqli_error($GLOBALS["___mysqli_ston"])); 
} 

header("Content-type: text/xml"); 

// Start XML file, echo parent node 
echo '<markers>'; 

// Iterate through the rows, printing XML nodes for each 
while ($row = @mysqli_fetch_assoc($result)){ 
  // Add to XML document node 
  echo '<marker '; 
  echo 'id="' . $ind . '" '; 
  echo 'name="' . parseToXML($row['name']) . '" '; 
  echo 'address="' . parseToXML($row['address']) . '" '; 
  echo 'lat="' . $row['lat'] . '" '; 
  echo 'lng="' . $row['lng'] . '" '; 
  echo 'type="' . $row['type'] . '" '; 
  echo '/>'; 
} 

// End XML file 
echo '</markers>'; 

?> 