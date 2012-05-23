<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><html>
<head>
	<title>Make a Choice</title>
</head>
<body>
<?php 

/**
 * Choice section
 */
// echo out checkboxes for the coalitions
echo "<table>\n";
echo "\t<tr><td></td><td>";
//echo anchor('session/propose/payout', 'Your Payout');
echo "Your Payout";
echo "</td><td>";
//echo anchor('session/propose/power','Power');
echo "Power";
echo "</td><td>Other Members (Their Payout)</td></tr>\n";

echo form_open('session/vote/'.$sort);
// prints proposal line for each coalition
foreach ($proposals as $key => $coal) {
	echo "\t<tr>";
	echo "<td>" . form_checkbox('coal'.$key,$key,FALSE) . "</td>";
	
	// show what the user's payout is
	echo "<td><strong>" . $coal['proportions'][CURRENT_PLAYER] . "</strong></td>";

	// show the coalition's power
	echo "<td>" . $coal['power'] . "</td>";

	// show the other member's payouts
	echo "<td>";
	$others = "";
	foreach ($coal['proportions'] as $agent => $value) {
		if($agent!=CURRENT_PLAYER){
			$others = $others . $agent . " (" . $value . "), ";
		}
	}
	echo rtrim($others," ,");
	echo "</td></tr>\n";

}
echo "</table>\n";
echo form_submit('submit','Submit');
echo form_close();
?>
</body>
</html>