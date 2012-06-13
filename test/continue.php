<?php
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
session_start(); 
$_SESSION['stage'] = 'propose';
echo "<script>window.location = 'experiment.php';</script>";
?>