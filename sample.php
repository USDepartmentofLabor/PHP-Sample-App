<HTML>
<BODY>
<?php
include "GOVDataSDK.php";
 
function resultsTable($results) {
	$string = '';
	$string .= "<table border='1' cellspacing='0'><tr><th>Agency</th><th>Agency Full Name</th></tr>\n";
	foreach ($results as $object) {
		$string .= "<tr><td>{$object->Agency}</td><td>{$object->AgencyFullName}</td></tr>\n";
	}
	return $string . "</table>\n";
}
 
$context = new GOVDataContext('http://api.dol.gov', 'your-api-key', 'your-shared-secret');
$request = new GOVDataRequest($context);
 
$results = $request->callAPI('DOLAgency/Agencies', Array('top' => '10', 'orderby' => 'Agency'));
 
if (is_string($results)) {
	echo $results . "\n";
} else {
	echo resultsTable($results);
}
?>
</BODY>
</HTML>