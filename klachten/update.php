<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

$serverName = "DESKTOP-KDN51JF";  

/* Connect using Windows Authentsication. */  
try  
{  
$conn = new PDO( "sqlsrv:server=$serverName ; Database=mock_Fitwinkel", "", "");  
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
}  
catch(Exception $e)  
{   
die( print_r( $e->getMessage() ) );   
}  
  
//if(isset($_POST["klacht"])){
if(isset($_POST)){
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

	
	//attributen		
$Klachtennummer					   =  trim(json_encode($_POST['Klachtennummer']), '"') ;										
$S							   =  trim(json_encode($_POST['S']), '"') ;	
	
	

	$query = "UPDATE Klachten
	SET S = ?
	WHERE Klachtennummer = ?
 ";
	$stmt = $conn->prepare($query);  		 		
							
$stmt->bindParam(1,	$S);						
$stmt->bindParam(2,	$Klachtennummer);	
	
	$stmt->execute();  
	echo json_encode($_POST);
}

?> 
