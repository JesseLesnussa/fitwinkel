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
$snelstartnr					   =  trim(json_encode($_POST['snelstartnr']), '"') ;			
$Klantnaam					   =  trim(json_encode($_POST['Klantnaam']), '"') ;					
$Klantadres					   =  trim(json_encode($_POST['Klantadres']), '"') ;					
$Klantpostcode				   =  trim(json_encode($_POST['Klantpostcode']), '"') ;			
$Woonplaats					   =  trim(json_encode($_POST['Woonplaats']), '"') ;				
$Telefoonnummer 				   =  trim(json_encode($_POST['Telefoonnummer']), '"') ;			
$mobiel						   =  trim(json_encode($_POST['mobiel']), '"') ;			
$Telefoon 					   =  trim(json_encode($_POST['Telefoon']), '"') ;				
$vast						   =  trim(json_encode($_POST['vast']), '"') ;						
$Email						   =  trim(json_encode($_POST['Email']), '"') ;				
$Klachtenomschrijving		   = trim( json_encode($_POST['Klachtenomschrijving']), '"') ;	
$Merk						   =  trim(json_encode($_POST['Merk']), '"') ;			
$Type						   =  trim(json_encode($_POST['Type']), '"') ;				
$Serienummer					   =  trim(json_encode($_POST['Serienummer']), '"') ;		
$Modelnummer					   =  trim(json_encode($_POST['Modelnummer']), '"') ;			
$Aankoopdatum				   =  trim(json_encode($_POST['Aankoopdatum']), '"') ;		
$DatumBegin					   =  trim(json_encode($_POST['DatumBegin']), '"') ;				
$DatumOpgelost				   =  trim(json_encode($_POST['DatumOpgelost']), '"') ;	
$DagenOpen					   = json_encode($_POST['DagenOpen']);				
$AantalActies				   = json_encode($_POST['AantalActies']);			
$WeeknummerBegin				   = json_encode($_POST['WeeknummerBegin']);		
$WeeknummerEind				   = json_encode($_POST['WeeknummerEind']);			
$jaarBegin					   = json_encode($_POST['jaarBegin']);				
$jaarEind					   = json_encode($_POST['jaarEind']);				
$Urgent						   =  trim(json_encode($_POST['Urgent']), '"') ;						
$S							   =  trim(json_encode($_POST['S']), '"') ;	
$medewerkerId							   =  trim(json_encode($_POST['medewerkerId']), '"') ;	
		
	
	
	$query = "insert into
Klachten
VALUES
(
 ?, ?,?,?,?,?,?, ?, ?, ?,?,?,	?, ?,?,?,?,?,?,	?,	?,?,?,?,?, ?,?)
 ";
	$stmt = $conn->prepare($query);  		 
$stmt->bindParam(1,		$snelstartnr);			
$stmt->bindParam(2,		$Klantnaam);				
$stmt->bindParam(3,		$Klantadres);				
$stmt->bindParam(4,		$Klantpostcode);			
$stmt->bindParam(5,		$Woonplaats);				
$stmt->bindParam(6,		$Telefoonnummer); 		
$stmt->bindParam(7,		$mobiel);					
$stmt->bindParam(8,		$Telefoon); 				
$stmt->bindParam(9,	$vast);					
$stmt->bindParam(10,	$Email);					
$stmt->bindParam(11,	$Klachtenomschrijving);	
$stmt->bindParam(12,	$Merk);					
$stmt->bindParam(13,	$Type);					
$stmt->bindParam(14,	$Serienummer);			
$stmt->bindParam(15,	$Modelnummer);			
$stmt->bindParam(16,	$Aankoopdatum);			
$stmt->bindParam(17,	$DatumBegin);				
$stmt->bindParam(18,	$DatumOpgelost);			
$stmt->bindParam(19,	$DagenOpen);				
$stmt->bindParam(20,	$AantalActies);			
$stmt->bindParam(21,	$WeeknummerBegin);		
$stmt->bindParam(22,	$WeeknummerEind);			
$stmt->bindParam(23,	$jaarBegin);				
$stmt->bindParam(24,	$jaarEind);				
$stmt->bindParam(25,	$Urgent);					
$stmt->bindParam(26,	$S);				
$stmt->bindParam(27,	$medewerkerId);					

	
	$stmt->execute();  
	echo json_encode($_POST);
}

?> 
