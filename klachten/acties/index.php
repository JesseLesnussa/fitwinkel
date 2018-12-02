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
    $query = "SELECT * FROM Acties WHERE Klachtennummer =  ?";
	$stmt = $conn->prepare($query);  
	$stmt->bindParam(1, $klachtennummer); 
	$stmt->execute();  

$products_arr=array();
$products_arr["records"]=array();
// simple query  


while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){  
    extract($row);
   $product_item=array(
 "id"			 =>html_entity_decode($id),
 "Klachtennummer"			 =>html_entity_decode($Klachtennummer)			,
 "Klantnaam"				 =>html_entity_decode($Klantnaam)			  ,
 "Merk"						 =>html_entity_decode($Merk)					,
 "Actie"					 =>html_entity_decode($Actie)				  ,
 "Datum"					 => $Datum	
);
   array_push($products_arr["records"], $product_item);
}  



echo json_encode($products_arr);
}

?> 
