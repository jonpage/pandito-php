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
<p>This experiment uses [EQUAL] payouts.</p>
<p>Click the following link to continue</p>
<a id='continue' href="#">Continue</a>
<br /><br />
<span id='message'></span>

<script>
var t;
$(document).ready(function(){
	//alert("ready");
	$.ajaxSetup({
	  cache: true
	});
	
	$("#continue").click(function(){
		t = setTimeout('check_wait()',1000);
		//alert("clicked");
		$.getScript(<?php echo '"' . site_url('seqsimchareq/instructions_wait/'.$treatment_id) . '"';?>);
		//.fail(function(){	alert("did not work");});
		//$('#message').load(<?php echo '"' . site_url('seqsim/instructions_wait/'.$treatment_id) . '"';?>);
		$("#message").html('Waiting on other players');
		$("#message").after("<br/><br/><img src='" + <?php echo '"' . base_url() . '"'; ?> + "img/loading.gif'></img>");
		$("#continue").remove();

	});
});

function check_wait(){
	//alert("this should work");
	$.getScript(<?php echo '"' . site_url('seqsimchareq/waitjs/instructions/' . $treatment_id) . '"';?>);
}
</script>
</body>
</html>