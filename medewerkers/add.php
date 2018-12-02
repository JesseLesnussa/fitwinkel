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
$voornaam					   =  trim(json_encode($_POST['voornaam']), '"') ;			
$achternaam					   =  trim(json_encode($_POST['achternaam']), '"') ;		
$email					   =  trim(json_encode($_POST['email']), '"') ;				
$telefoonnummer					   =  trim(json_encode($_POST['telefoonnummer']), '"') ;					

	
	$query = "insert into
Medewerker
VALUES
(?, ?,?,?)";
	$stmt = $conn->prepare($query);  		 		
$stmt->bindParam(1,		$voornaam);				
$stmt->bindParam(2,		$achternaam);				
$stmt->bindParam(1,		$email);				
$stmt->bindParam(2,		$telefoonnummer);	
	
	$stmt->execute();  
	
	echo json_encode($_POST);
}

?> 
