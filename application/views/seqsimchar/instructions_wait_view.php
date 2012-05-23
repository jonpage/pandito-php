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
Waiting for other participants.

<script>
var t;
$(document).ready(function(){
	$.ajaxSetup({
	  cache: true
	});
	
	t = setTimeout('check_wait()',1000);
});

function check_wait(){
	$.getScript(<?php echo '"' . site_url('seqsimchar/waitjs/instructions/' . $treatment_id) . '"'; ?>);
}
</script>
</body>
</html>