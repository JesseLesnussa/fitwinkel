	<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
$serverName = "DESKTOP-KDN51JF";  

/* Connect using Windows Authentication. */  
try  
{  
$conn = new PDO( "sqlsrv:server=$serverName ; Database=mock_Fitwinkel", "", "");  
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
}  
catch(Exception $e)  
{   
die( print_r( $e->getMessage() ) );   
}  
$query;

if(isset($_POST)){
	$rest_json = file_get_contents("php://input");
	$_POST = json_decode($rest_json, true);
	
		
		//attributen		
	$Klachtennummer					   =  trim(json_encode($_POST['Klachtennummer']), '"') ;			
	$Klantnaam					   =  trim(json_encode($_POST['Klantnaam']), '"') ;						
	$Merk						   =  trim(json_encode($_POST['Merk']), '"') ;			
	$Actie						   =  trim(json_encode($_POST['Actie']), '"') ;				
	$Datum					   		=  trim(json_encode($_POST['Datum']), '"') ;		
				
	$query = "
	insert into
	acties
	VALUES
	(?, ?, ?, ?, ?)
	 ";
		$stmt = $conn->prepare($query);  		 
	$stmt->bindParam(1,		$Klachtennummer);			
	$stmt->bindParam(2,		$Klantnaam);				
	$stmt->bindParam(3,		$Merk);					
	$stmt->bindParam(4,	$Actie);					
	$stmt->bindParam(5,	$Datum);							
	
	$stmt->execute();  
	echo json_encode($_POST);
	}

?> 
