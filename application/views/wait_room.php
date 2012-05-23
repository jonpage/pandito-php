<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?>Welcome to the waiting room.
<br/>
<span id="waiters"><?php echo count($waiters); ?></span> others waiting.

<script>
var t;
$(document).ready(function(){
	t = setTimeout('check_wait()',5000);
});

function check_time(){
	$.getScript(<?php echo site_url('session/waiterjs/') . $session_number ?>);
}
</script>

<?php

if($admin==true){
	echo "<br/>Click to start session, simulating players where needed.<br/>" . anchor('session/admin_start/' . $session_number,'Force Start');
}