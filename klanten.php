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


if(isset($_GET['relatieid'])) {
	$klachtennummer = $_GET['id'];
    $query = "SELECT * FROM Relaties WHERE fldRelatieID =  ?";
	$stmt = $conn->prepare($query);  
	$stmt->bindParam(1, $klachtennummer); 
	$stmt->execute();  
}


else
{
	$query = "SELECT * FROM Relaties";
	$stmt = $conn->query( $query );  
}
$products_arr=array();
$products_arr["records"]=array();
// simple query  


while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){  
    extract($row);
   $product_item=array(

"fldRelatieID"						=> html_entity_decode($fldRelatieID					 ),
"fldRelatieSoort"					=> html_entity_decode($fldRelatieSoort					 ),
"fldRelatiecode"					=> html_entity_decode($fldRelatiecode					 ),
"fldNaam"							=> html_entity_decode($fldNaam							 ),
"fldContactpersoon"					=> html_entity_decode($fldContactpersoon				 ),
"fldAdres"							=> html_entity_decode($fldAdres						 ),
"fldPostcode"						=> html_entity_decode($fldPostcode						 ),
"fldPlaats"							=> html_entity_decode($fldPlaats						 ),
"fldLandID"							=> html_entity_decode($fldLandID						 ),
"fldCorrespondentieAdresContactpersoon"	=> html_entity_decode($fldCorrespondentieAdresContactpersoon ),
"fldCorrespondentieAdres"			=> html_entity_decode($fldCorrespondentieAdres			 ),
"fldCorrespondentieAdresPostcode"	=> html_entity_decode($fldCorrespondentieAdresPostcode	 ),
"fldCorrespondentieAdresPlaats"		=> html_entity_decode($fldCorrespondentieAdresPlaats	 ),
"fldCorrespondentieAdresLandID"		=> html_entity_decode($fldCorrespondentieAdresLandID	 ),
"fldFactuurRelatieID"				=> html_entity_decode($fldFactuurRelatieID				 ),
"fldTelefoon"						=> html_entity_decode($fldTelefoon						 ),
"fldMobieleTelefoon"				=> html_entity_decode($fldMobieleTelefoon				 ),
"fldFax"							=> html_entity_decode($fldFax							 ),
"fldEmail"							=> html_entity_decode($fldEmail						 ),
"fldBtwNummer"						=> html_entity_decode($fldBtwNummer					 ),
"fldDebiteurennummer"				=> html_entity_decode($fldDebiteurennummer				 ),
"fldFactuurkorting"					=> html_entity_decode($fldFactuurkorting				 ),
"fldKrediettermijn"					=> html_entity_decode($fldKrediettermijn				 ),
"fldBankrekeningnummer"				=> html_entity_decode($fldBankrekeningnummer			 ),
"fldNaamRekeninghouder"				=> html_entity_decode($fldNaamRekeninghouder			 ),
"fldPlaatsRekeninghouder"			=> html_entity_decode($fldPlaatsRekeninghouder			 ),
"fldBankieren"						=> html_entity_decode($fldBankieren					 ),
"fldNonactief"						=> html_entity_decode($fldNonactief					 ),
"fldKlantKortinggroepID"			=> html_entity_decode($fldKlantKortinggroepID			 ),
"fldKredietLimiet"					=> html_entity_decode($fldKredietLimiet				 ),
"fldBestelBedragMinimum"			=> html_entity_decode($fldBestelBedragMinimum			 ),
"fldMemo"							=> html_entity_decode($fldMemo							 ),
"fldKvkNummer"						=> html_entity_decode($fldKvkNummer					 ),
"fldCreditcardNummer"				=> html_entity_decode($fldCreditcardNummer				 ),
"fldWebsiteUrl"						=> html_entity_decode($fldWebsiteUrl					 ),
"fldAanmanen"						=> html_entity_decode($fldAanmanen						 ),
"fldElektronischFactureren"			=> html_entity_decode($fldElektronischFactureren		 ),
"fldOfferteEmailen"					=> html_entity_decode($fldOfferteEmailen				 ),
"fldOfferteEmailAdres"				=> html_entity_decode($fldOfferteEmailAdres			 ),
"fldOfferteCcEmailAdres"			=> html_entity_decode($fldOfferteCcEmailAdres			 ),
"fldBevestigingEmailen"				=> html_entity_decode($fldBevestigingEmailen			 ),
"fldBevestigingEmailAdres"			=> html_entity_decode($fldBevestigingEmailAdres		 ),
"fldBevestigingCcEmailAdres"		=> html_entity_decode($fldBevestigingCcEmailAdres		 ),
"fldFactuurEmailAdres"				=> html_entity_decode($fldFactuurEmailAdres			 ),
"fldFactuurCcEmailAdres"			=> html_entity_decode($fldFactuurCcEmailAdres			 ),
"fldAanmaningEmailen"				=> html_entity_decode($fldAanmaningEmailen				 ),
"fldAanmaningEmailAdres"			=> html_entity_decode($fldAanmaningEmailAdres			 ),
"fldAanmaningCcEmailAdres"			=> html_entity_decode($fldAanmaningCcEmailAdres		 ),
"fldOfferteAanvraagEmailen"			=> html_entity_decode($fldOfferteAanvraagEmailen		 ),
"fldOfferteAanvraagEmailAdres"		=> html_entity_decode($fldOfferteAanvraagEmailAdres	 ),
"fldOfferteAanvraagCcEmailAdres"	=> html_entity_decode($fldOfferteAanvraagCcEmailAdres	 ),
"fldBestellingEmailen"				=> html_entity_decode($fldBestellingEmailen			 ),
"fldBestellingEmailAdres"			=> html_entity_decode($fldBestellingEmailAdres			 ),
"fldBestellingCcEmailAdres"			=> html_entity_decode($fldBestellingCcEmailAdres		 ),
"fldUblBestandAlsBijlage"			=> html_entity_decode($fldUblBestandAlsBijlage			 ),
"fldUblLeverancierNaamHide"			=> html_entity_decode($fldUblLeverancierNaamHide		 ),
"fldIban"							=> html_entity_decode($fldIban							 ),
"fldBic"							=> html_entity_decode($fldBic							 ),
"fldIncasseren"						=> html_entity_decode($fldIncasseren					 )
,
	
);
   array_push($products_arr["records"], $product_item);
}  



echo json_encode($products_arr);


?> 
