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


 if(isset($_GET['id'])){
		$deleteId = $_GET['id'];
			
			//attributen		
		$id	   =  trim(json_encode($deleteId), '"') ;								
		$query = "
		DELETE FROM
		Merken
		WHERE id = ?
		 ";
			$stmt = $conn->prepare($query);  		 
		$stmt->bindParam(1,		$id);									
		
		$stmt->execute();  
		echo json_encode($_GET);
		}
		
?> 
