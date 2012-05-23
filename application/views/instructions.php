<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><!DOCTYPE html>
<html>
<head>
	<title>Experiment Instructions</title>
	<style type="text/css">
		h1{margin-left:30px}
		h3{margin-left:30px;width:600px}
		p {width:600px;margin-left:30px}
		ul {width:600px;margin-left:40px}
		img {margin-left:30px;border-width:1px;border-style:solid;border-color:gray}
		table{margin-left:50px}
		button{margin-left:30px}
		a{margin-left: 30px;}
		a.image-link{margin-left: 5px;}
		.image-link img{margin-left: 0px; margin-top:20px; border-color:white}
		.selected img{border-color:gray}
		.section{display:none}
		.hover-image img{border-color:blue}
	</style>
</head>
<body>
<div class="section" id="page1">
	<h3>Welcome and thank you for your participation in this economics experiment on decision making!</h3>
	<p>
	During this experiment you will participate in decision tasks that give you the opportunity to earn money. All the earnings in this experiment will be in your home currency.
	</p><p>
	This experiment will consist of several parts. In each part, you will be asked to make a decision involving other participants from around the world that have also joined the experiment. Your decision may affect the payoffs of others, just as the decisions of the persons you are matched with may affect your payoffs.
	</p><p>
	Your earnings are confidential and you will be notified by email of the amount you earned. Upon completion of the experiment, we will send your payment within 24 hours via Paypal or in person.
	</p>
	<button class="next">Next</button>
	<br/>
	<a class="image-link" href="<?php echo site_url('site/instructions_chinese'); ?>"><img src="<?php echo base_url(); ?>img/chinese.png"/></a>
	<a class="image-link selected" href="<?php echo site_url('site/instructions'); ?>"><img src="<?php echo base_url(); ?>img/english.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_filipino'); ?>"><img src="<?php echo base_url(); ?>img/filipino.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_hebrew'); ?>"><img src="<?php echo base_url(); ?>img/hebrew.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_hindi'); ?>"><img src="<?php echo base_url(); ?>img/hindi.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_japanese'); ?>"><img src="<?php echo base_url(); ?>img/japanese.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_persian'); ?>"><img src="<?php echo base_url(); ?>img/persian.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_spanish'); ?>"><img src="<?php echo base_url(); ?>img/spanish.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_thai'); ?>"><img src="<?php echo base_url(); ?>img/thai.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_turkish'); ?>"><img src="<?php echo base_url(); ?>img/turkish.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_urdu'); ?>"><img src="<?php echo base_url(); ?>img/urdu.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_vietnamese'); ?>"><img src="<?php echo base_url(); ?>img/vietnamese.png"/></a>
</div>

<div class="section" id="page2">
	<h1>Overview of the Experiment</h1>
	<p>You will be paired with two other participants from around the world. Their identity will not be revealed to you and yours will not be revealed to them. Each of you will be given a weight (this number is in parenthesis in each player's badge). The sum of these weights is 100.</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen">
	<p>The objective of the game is to form the heaviest group. The heaviest group will split 100 experimental currency units (C) between its members using one of the sharing rules discussed below (in addition to the participation fee). The participants who are not part of the group with the largest weight will earn nothing (except for their participation fee).</p>
	<p>The experiment is divided into three rounds. At every round, each player will have one turn to make a proposal to form a group of participants. The participants in the proposed group will then vote "Yes" or "No" to decide whether or not the group will form. Proposed groups will only form if all members vote "Yes".</p>
	<p>When three rounds have passed, or a participant repeats a proposal, the experiment will end and the participants in the heaviest group will be rewarded accordingly.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page3">
	<h1>Proposal Stage</h1>
	<p>
	When it is your turn, you will be able to propose groups by either selecting the badges corresponding to the other participants (under "Select Group Members"), or by clicking one of the entries in the list of "Suggested Groups". Each suggestion includes your payout followed by a complete listing of the members of the corresponding group proposal. These suggestions are sorted by your payout in descending order. 
	</p><p>
	Once you are satisfied with your proposal, click "Confirm Proposal". 
	</p><p>
	(In the "Timeline", your badge [2] is taller to indicate it is your turn and the first circle is filled (solid white) to indicate it is currently the first round. The payouts are displayed using "C" as the symbol for experimental currency units.) 
	</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page4">
	<h1>Voting Stage</h1>
	<p>When a participant has proposed for you to join them in a group, you will be asked to vote to approve the group. The "Alternate Groups" list allows you to see the current proposal alongside all other groups of which you would be a member with their corresponding payouts for comparison.</p>
	<p>Vote by clicking "Yes" or "No". If all participants in the proposed group vote "Yes", then that group will be formed, otherwise the group will not be formed.</p>
	<img src="<?php echo base_url();?>img/vote.png" alt="Vote Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page5">
	<h1>Results Stage</h1>
	<p>After a participant proposes a group and all potential members have voted, you will be shown an overview of the results. Simply press "Continue" to proceed with the experiment, or press "Review Payout" when the experiment is over.</p>
	<img src="<?php echo base_url();?>img/results.png" alt="Results Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page6">
	<h1>Explanation of Payouts</h1>
	<p>There are two types of experiments in which you participate, PROPORTIONAL or EQUAL.</p>
	<ul>
		<li>If you are in the group with the greatest total weight you will be given the participation fee and 
			<ul>
				<li>an amount in proportion to your number's contribution to the group's total weight. [PROPORTIONAL]<br/>
					-- or --</li>
				<li>an amount equally divided amongst the group. [EQUAL]</li></ul></li>
		<li>If you are NOT in the group with the greatest total weight, you will ONLY receive the participation fee.</li>
	</ul>
	<h3>[PROPORTIONAL]</h3>
	<p>At the beginning of the experiment you will be told if the payout type is PROPORTIONAL.</p>
	<p>Example: The PROPORTIONAL payout in the result screen above is calculated by dividing your weight (35) by the total of the weights in your group (35 + 25) then multiplying by 100. That is, your payout would be [35/(35+25)]*100 = 58.</p>
	<h3>[EQUAL]</h3>
	<p>At the beginning of the experiment you will be told if the payout type is EQUAL.</p>
	<p>Example: The EQUAL payout is calculated by dividing 100 by the number of group members. For the result screen above, your payout would be 100/2 = 50.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>Payment and Currency Conversion</h1>
	<p>Your final payment depends on the country you are participating from. The amount shown in the screen is on experimental currency (C). In every game, C100 units of experimental currency are split among the winners. Your payout is dependent on the country you are from and the details of how to convert experimental dollars into actual money in your home country are given in the table in the next section.</p>

	<table>
		<tr><th>Country</th><th>Currency</th><th>Particiption Fee (in local currency)</th><th>Value of C100 in local currency</th></tr>
		<tr><td>Argentina</td><td>Argentine Peso</td><td>14.00</td><td>24.00</td></tr>
		<tr><td>Australia</td><td>Australian Dollar</td><td>3.50</td><td>6.00</td></tr>
		<tr><td>Brazil</td><td>Brazilian Real</td><td>7.00</td><td>12.00</td></tr>
		<tr><td>Canada</td><td>Canadian Dollar</td><td>3.00</td><td>5.00</td></tr>
		<tr><td>China</td><td>Chinese Yuan</td><td>11.00</td><td>18.00</td></tr>
		<tr><td>India</td><td>Indian Rupee</td><td>60.00</td><td>100.00</td></tr>
		<tr><td>Iran</td><td>Iranian Rial</td><td>14000.00</td><td>24600.00</td></tr>
		<tr><td>Iraq</td><td>Iraqi Dinar</td><td>2400.00</td><td>4000.00</td></tr>
		<tr><td>Israel</td><td>Israeli New Shekel</td><td>11.00</td><td>19.00</td></tr>
		<tr><td>Japan</td><td>Japanese Yen</td><td>230.00</td><td>380.00</td></tr>
		<tr><td>Mexico</td><td>Mexican Peso</td><td>25.00</td><td>40.00</td></tr>
		<tr><td>Pakistan</td><td>Pakistani Rupee</td><td>180.00</td><td>310.00</td></tr>
		<tr><td>Philippines</td><td>Philippine Peso</td><td>85.00</td><td>140.00</td></tr>
		<tr><td>South Africa</td><td>South African Rand</td><td>14.00</td><td>24.00</td></tr>
		<tr><td>Spain</td><td>Euro</td><td>4.00</td><td>7.00</td></tr>
		<tr><td>Thailand</td><td>Thai Baht</td><td>55.00</td><td>90.00</td></tr>
		<tr><td>Turkey</td><td>Turkish Lira</td><td>4.50</td><td>8.00</td></tr>
		<tr><td>United States</td><td>United States Dollar</td><td>3.00</td><td>5.00</td></tr>
		<tr><td>Vietnam</td><td>Vietnamese Dong</td><td>23000.00</td><td>40000.00</td></tr>
	</table>

	<p>As an example, if a player from Mexico wins C25 + C50+ C100 + C25 in four games, his actual take-home prize will be 25 Mexican pesos for showing up plus C200 experimental dollars, which equal 80 Mexican pesos. Total payout of 105 Mexican pesos.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>Important Notes</h1>
	<p>Your pace throughout the experiment is monitored. If you take longer than the allotted time, your turn will be automated by making a decision at random and you payout will be reduced accordingly. You will be given 45 seconds to propose, 30 seconds to vote, and 30 seconds to review the results.</p>
	<p>If the screen does not appear to update, or you believe you are experiencing an error, please refresh the browser. This can be accomplished by pressing the F5 key.</p>
	<h3>WE WILL NOT COLLECT PERSONAL IDENTIFIABLE INFORMATION. ALL THE INFORMATION COLLECTED, INCLUDING YOUR EARNINGS, WILL REMAIN CONFIDENTIAL.</h3>
	<button class="prev">Previous</button><?php echo anchor('site/complete_instructions','I have read and understand the instructions.'); ?>
</div>

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("div").hide();
		$("#page1").show();
		$(".next").click(function(){
			$(this).parent().hide();
			$(this).parent().next().show();
		});
		$(".prev").click(function(){
			$(this).parent().hide();
			$(this).parent().prev().show();
		});
		$(".image-link").hover(function(){
			$(this).addClass("hover-image");
		},function(){
			$(this).removeClass("hover-image");
		});
	});
</script>
<noscript>
<p> For full functionality of this site it is necessary to enable JavaScript.
 Here are the <a href="http://www.enable-javascript.com/" target="_blank">
 instructions on how to enable JavaScript in your web browser</a>.</p>
</noscript>
</body>
</html>