<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><html>
<head>
	<title>Session Aborted</title>
</head>
<body>
	Your session was aborted. One of the participants in your group is not responding. Return to the main menu to try again.<br/>
	<?php echo anchor(site_url('site/main'),"Return to Main Menu"); ?>
</body>
</html>