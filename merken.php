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



$query = "SELECT * FROM Merken ORDER BY Merknaam";
$stmt = $conn->query( $query );  

$products_arr=array();
$products_arr["records"]=array();
// simple query  


while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){  
    extract($row);
   $product_item=array(
 "id"			 =>html_entity_decode($id)			,
 "Merknaam"				 =>html_entity_decode($Merknaam)			  ,
 "SerienummerVerplicht"				 =>html_entity_decode($SerienummerVerplicht)			  
	
);
   array_push($products_arr["records"], $product_item);
}  



echo json_encode($products_arr);


?> 
