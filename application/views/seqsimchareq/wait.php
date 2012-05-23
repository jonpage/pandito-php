<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><html>
<head>
	<title>Pando: Economics Experiment System</title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/style2.css">
	<script src="<?php echo base_url();?>js/jquery-1.6.4.js"></script>
</head>
<body>
	Waiting for the remaining participants to join the experiment.<br/>
<?php for ($i=1;$i<=$num_agents;$i++) {
	//var_dump($agent_nums);
if(in_array($i-1, $agent_nums)){
	echo "<span class='mini_badge mini_badge_hover style_$i'>$i</span>";
} else {
	echo "<span class='mini_badge mini_badge_hover gray'>$i</span>";
}
}?>
<p style="clear:both;">
(The instructions will load automatically when the remaining participants have joined.)
</p>
<script>
var t;
$(document).ready(function(){
	$.ajaxSetup({
	  cache: true
	});
	
	t = setTimeout('check_wait()',5000);
});

function check_wait(){
	$.getScript(<?php echo '"' . site_url('seqsimchareq/waitjs/wait/' . $treatment_id) . '"'; ?>);
}
</script>
</body>
</html>