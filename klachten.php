	<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
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


if(isset($_GET['id'])) {
	$klachtennummer = $_GET['id'];
    $query = "SELECT * FROM Klachten WHERE Klachtennummer =  ? ORDER BY Klachtennummer";
	$stmt = $conn->prepare($query);  
	$stmt->bindParam(1, $klachtennummer); 
	$stmt->execute();  
}
else if(isset($_GET['merk']) && isset($_GET['s'])){
	$merk = $_GET['merk'];
	$status = $_GET['s'];
    $query = "SELECT * FROM Klachten WHERE Merk like '%' + ?  + '%' AND S like '%' + ?  + '%' ORDER BY Klachtennummer";
	$stmt = $conn->prepare($query);  
	$stmt->bindParam(1, $merk);
	$stmt->bindParam(2, $status); 
	$stmt->execute();  
}

else if(isset($_GET['merk'])){
	$merk = $_GET['merk'];
    $query = "SELECT * FROM Klachten WHERE Merk like '%' + ?  + '%' ORDER BY Klachtennummer";
	$stmt = $conn->prepare($query);  
	$stmt->bindParam(1, $merk); 
	$stmt->execute();  
}

else if(isset($_GET['s'])){
	$status = $_GET['s'];
    $query = "SELECT * FROM Klachten WHERE S like '%' + ?  + '%' ORDER BY Klachtennummer";
	$stmt = $conn->prepare($query);  
	$stmt->bindParam(1, $status); 
	$stmt->execute();  
}

else
{
	$query = "SELECT * FROM Klachten ORDER BY Klachtennummer";
	$stmt = $conn->query( $query );  
}
$products_arr=array();
$products_arr["records"]=array();
// simple query  


while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){  
    extract($row);
   $product_item=array(
 "Klachtennummer"			 =>html_entity_decode($Klachtennummer)			,
 "snelstartnr"				 =>html_entity_decode($snelstartnr)			  ,
 "Klantnaam"				 =>html_entity_decode($Klantnaam)			  ,
 "Klantadres"				 =>html_entity_decode($Klantadres)				,
 "Klantpostcode"			 =>html_entity_decode($Klantpostcode)			,
 "Woonplaats"				 =>html_entity_decode($Woonplaats)				,
 "Telefoonnummer"			 =>html_entity_decode($Telefoonnummer) 			,
 "mobiel"					 =>html_entity_decode($mobiel)					,
 "Telefoon"					 =>html_entity_decode($Telefoon) 				,
 "vast"						 =>html_entity_decode($vast)					,
 "Email"					 =>html_entity_decode($Email)					,
 "Klachtenomschrijving"		 =>html_entity_decode($Klachtenomschrijving)  ,
 "Merk"						 =>html_entity_decode($Merk)					,
 "Type"						 =>html_entity_decode($Type)				  ,
 "Serienummer"				 =>html_entity_decode($Serienummer)				,
 "Modelnummer"				 =>html_entity_decode($Modelnummer)				,
 "Aankoopdatum"				 => $Aankoopdatum							  ,
 "DatumBegin"				 => $DatumBegin								  ,
 "DatumOpgelost"			 => $DatumOpgelost							  ,
 "DagenOpen"				 => $DagenOpen								  ,
 "AantalActies"				 => $AantalActies							  ,
 "WeeknummerBegin"			 => $WeeknummerBegin						  ,
 "WeeknummerEind"			 => $WeeknummerEind							  ,
 "jaarBegin"				 => $jaarBegin								  ,
 "jaarEind"					 => $jaarEind								  ,
 "Urgent"					 => $Urgent									  ,
 "S"									 => $S										  ,
 "medewerkerId"						 => $medewerkerId									  ,	
);
   array_push($products_arr["records"], $product_item);
}  



echo json_encode($products_arr);


?> 
