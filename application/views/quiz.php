<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><!DOCTYPE html>
<html>
<head>
	<title>Experiment Questionnaire</title>
</head>
<style type="text/css">
	h1{margin-left:30px}
	h3{margin-left:30px;width:600px}
	p {width:500px;margin-left:30px}
	ul {width:600px;margin-left:40px}
	img {margin-left:20px;border-width:1px;border-style:solid;border-color:gray}
	table{margin-left:50px}
	button{margin-left:30px}
	a{margin-left: 30px;}
	.section{display:none}
	.next{display:none}
	dl{margin-left: 20px;}
	.noborder{border:none;margin-left:0px}
	.text{margin-bottom:-10px}
	dt{width:350px;background-color: #DDDDDD; margin:5px; padding:5px; cursor:pointer; text-align:center; border: 1px solid #333;}
	.hover{background-color: #BBBBBB;}
	dd{width:350px;background-color: #FF8888; margin:5px; padding:5px;border: 1px solid #fff;}
	dd{display:none}
	.green{background-color: #88FF88;}
	.selected{background-color: #888888; color: white;}
	.mini_badge {
		width: 30px;
		height: 30px;
		color: white;
		padding: 2px;
		margin: 5px;
		border-style: solid;
		border-width: 2px;
		border-color: white;

		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		display:block;
		margin:auto;
		text-align: center;

		-webkit-box-shadow: 3px 3px 5px #888;
		-moz-box-shadow: 3px 3px 5px #888;
		box-shadow: 3px 3px 5px #888;
	}
	.style_1 {
		background-color: #CC333F;
	}
	.style_2 {
		background-color: #6A4A3C;
	}
	.style_3 {
		background-color: #C7542D;
	}
	.style_4 {
		background-color: #691469;
	}
	.style_5 {
		background-color: #E97F02;
	}
	.style_6 {
		background-color: #649500;
	}
	.current_player {
		background-color: #00A0B0;
	}
	.stats_left {
		display: block;
		display: inline-block;
		background-color: orange;
		color: #402900;
		font-size: 12pt;
		font-weight: normal;
		padding: 3px 5px 3px 3px;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
		border-color: #402900;
		margin-right: 1px;
		margin-left: auto;
		-webkit-box-shadow: 2px 2px 5px #000;
		-moz-box-shadow: 2px 2px 5px #000;
		box-shadow: 2px 2px 5px #000;
	}
	.stats_right {
		display: block;
		display: inline-block;
		background-color: orange;
		color: #402900;
		font-size: 12pt;
		font-weight: normal;
		padding: 3px 3px 3px 5px;
		border-top-right-radius: 5px;
		border-bottom-right-radius: 5px;
		border-color: #402900;
		margin-right: auto;
		-webkit-box-shadow: 2px 2px 5px #000;
		-moz-box-shadow: 2px 2px 5px #000;
		box-shadow: 2px 2px 5px #000;
	}


</style>
<body>
<div id="google_translate_element"></div><script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    includedLanguages: 'ar,zh-CN,en,tl,iw,hi,ja,fa,es,th,tr,vi',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<div class="section" id="q1">
	<h3>Experiment Questionnaire (Question 1)</h3>
	<p>What is your badge number?</p>
	<img width="600px" src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<dl>
		
		<dt><img class="noborder" src="<?php echo base_url();?>img/answer_1.png"></dt>
		<dd>Incorrect! Look in the upper-left corner.</dd>
		<dt class="correct"><img class="noborder" src="<?php echo base_url();?>img/answer_2.png"></dt>
		<dd class="green">It's Correct!</dd>
		<dt><img class="noborder" src="<?php echo base_url();?>img/answer_3.png"></dt>
		<dd>Incorrect! Look in the upper-left corner.</dd>
	</dl>
	<p>Select the correct answer to move on to the next question.</p>
	<a href="#q2" class="next">Next</a>
</div>

<div class="section" id="q2">
	<h3>Experiment Questionnaire (Question 2)</h3>
	<p>Who is the next player?</p>
	<img width="600px" src="<?php echo base_url();?>img/next.png" alt="Results Screen"><br/>
	<dl>
		<dt class="correct"><img class="noborder" src="<?php echo base_url();?>img/answer_1.png"></dt>
		<dd class="green">It's Correct!</dd>
		<dt><img class="noborder" src="<?php echo base_url();?>img/answer_2b.png"></dt>
		<dd>Incorrect! Look in the column on the right (or look at the timeline).</dd>
		<dt><img class="noborder" src="<?php echo base_url();?>img/answer_3b.png"></dt>
		<dd>Incorrect! Look in the column on the right (or look at the timeline).</dd>
	</dl>
	<p>Select the correct answer to move on to the next question.</p>
	<a href="#q1" class="prev">Previous</a><a href="#q3" class="next">Next</a>
</div>

<div class="section" id="q3">
	<h3>Experiment Questionnaire (Question 3)</h3>
	<p>If you form a group with <img class="noborder" src="<?php echo base_url();?>img/answer_1.png">, how much will your payoff be?</p>
	<img width="600px" src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<dl>
		<dt><span class="stats_left">C</span><span class="stats_right">35</span></dt>
		<dd>Incorrect! Use the "Suggested Groups" list for reference.</dd>
		<dt><span class="stats_left">C</span><span class="stats_right">58</span></dt>
		<dd>Incorrect! Use the "Suggested Groups" list for reference.</dd>
		<dt class="correct"><span class="stats_left">C</span><span class="stats_right">47</span></dt>
		<dd class="green">It's Correct!</dd>
	</dl>
	<p>Select the correct answer to move on to the next question.</p>
	<a href="#q2" class="prev">Previous</a><a href="#q4" class="next">Next</a>
</div>

<div class="section" id="q4">
	<h3>Experiment Questionnaire (Question 4)</h3>
	<p>If the proposal is accepted, how much will <img class="text noborder" src="<?php echo base_url();?>img/answer_3.png"> get?</p>
	<img width="600px" src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<dl>
		<dt><span class="stats_left">C</span><span class="stats_right">25</span></dt>
		<dd>Incorrect! 25 is <img class="text noborder" src="<?php echo base_url();?>img/answer_3b.png">'s weight.</dd>
		<dt class="correct"><span class="stats_left">C</span><span class="stats_right">42</span></dt>
		<dd class="green">It's Correct!</dd>
		<dt><span class="stats_left">C</span><span class="stats_right">58</span></dt>
		<dd>Incorrect! You would get 58. The total amount you and <img class="text noborder" src="<?php echo base_url();?>img/answer_3b.png"> split is 100.</dd>
	</dl>
	<p>Select the correct answer to move on to the next question.</p>
	<a href="#q3" class="prev">Previous</a><a href="#q5" class="next">Next</a>
</div>

<div class="section" id="q5">
	<h3>Experiment Questionnaire (Question 5)</h3>
	<p>Who rejected the proposal?</p>
	<img width="600px" src="<?php echo base_url();?>img/results.png" alt="Results Screen"><br/>
	<dl>
		<dt><img class="noborder" src="<?php echo base_url();?>img/answer_1.png"></dt>
		<dd>Incorrect! Look at the column on the left.</dd>
		<dt><img class="noborder" src="<?php echo base_url();?>img/answer_2.png"></dt>
		<dd>Incorrect! Look at the column on the left.</dd>
		<dt class="correct"><img class="noborder" src="<?php echo base_url();?>img/answer_3.png"></dt>
		<dd class="green">It's Correct!</dd>
	</dl>
	<p>Select the correct answer to move on to the next question.</p>
	<a href="#q4" class="prev">Previous</a><a href="#q6" class="next">Next</a>
</div>

<div class="section" id="q6">
	<h3>Experiment Questionnaire (Question 6)</h3>
	<p>What is your payoff for the proposed group under the <img class="text noborder" src="<?php echo base_url();?>img/proportional.png"> sharing rule?</p>
	<img width="600px" src="<?php echo base_url();?>img/propeq.png" alt="Proposal Screen"><br/>
	<dl>
		<dt class="correct"><span class="stats_left">C</span><span class="stats_right">25</span></dt>
		<dd class="green">It's Correct!</dd>
		<dt><span class="stats_left">C</span><span class="stats_right">33</span></dt>
		<dd>Incorrect! That is your proposed payoff under the <img class="text noborder" src="<?php echo base_url();?>img/equal.png"> sharing rule.</dd>
		<dt><span class="stats_left">C</span><span class="stats_right">38</span></dt>
		<dd>Incorrect! That is your current payoff under the <img class="text noborder" src="<?php echo base_url();?>img/proportional.png"> sharing rule.</dd>
	</dl>
	<p>Select the correct answer to move on to the next question.</p>
	<a href="#q5" class="prev">Previous</a><a href="#q7" class="next">Next</a>
</div>

<div class="section" id="q7">
	<h3>Experiment Questionnaire (Question 7)</h3>
	<p>What is your payoff for the proposed group under the <img class="text noborder" src="<?php echo base_url();?>img/equal.png"> sharing rule?</p>
	<img width="600px" src="<?php echo base_url();?>img/propeq.png" alt="Proposal Screen"><br/>
	<dl>
		<dt><span class="stats_left">C</span><span class="stats_right">25</span></dt>
		<dd>Incorrect! That is your proposed payoff under the <img class="text noborder" src="<?php echo base_url();?>img/proportional.png"> sharing rule.</dd>
		<dt class="correct"><span class="stats_left">C</span><span class="stats_right">33</span></dt>
		<dd class="green">It's Correct!</dd>
		<dt><span class="stats_left">C</span><span class="stats_right">50</span></dt>
		<dd>Incorrect! That is your current payoff under the <img class="text noborder" src="<?php echo base_url();?>img/equal.png"> sharing rule.</dd>
	</dl>
	<p>Select the correct answer to move on to the next question.</p>
	<a href="#q6" class="prev">Previous</a><a href="#q8" class="next">Next</a>
</div>

<div class="section" id="q8">
	<h3>Experiment Questionnaire (Question 8)</h3>
	<p>In Mexico, the participation fee equals 25 Mexican pesos and the value of 100 experimental currency units equals 40 Mexican pesos.</p>
	<p>The total earnings of a participant in three experiments was 200 experimental dollars. How much is his take home earnings in Mexican pesos?</p>
	<dl>
		<dt>25</dt>
		<dd>Incorrect! This is only the participation fee.</dd>
		<dt>80</dt>
		<dd>Incorrect! Don't forget the participation fee.</dd>
		<dt class="correct">105</dt>
		<dd class="green">It's Correct! 25 + 80</dd>
		<dt>200</dt>
		<dd>Incorrect! You need to convert from experimental currency units into Mexican pesos.</dd>
		<dt>225</dt>
		<dd>Incorrect! You need to convert from experimental currency units into Mexican pesos.</dd>
	</dl>
	<p>Select the correct answer to complete the questionnaire.</p>
	<a href="#q7" class="prev">Previous</a><?php echo anchor('site/complete_quiz','Complete Questionnaire','class="next"'); ?>
</div>

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".section").hide();
		$(".next").hide();
		//alert(window.location.hash);
		thisHash = window.location.hash.toString();
		if(thisHash===""){
			$("#q1").show();
		} else {
			$(thisHash).show();
		}
		
		$(".next").click(function(){
			$(this).parent().hide();
			$(this).parent().next().show();
		});
		$(".prev").click(function(){
			$(this).parent().hide();
			$(this).parent().prev().show();
		});
		$("dt").click(function(){
			$(".selected").removeClass("selected");
			$(this).siblings("dd").hide();
			$(this).next().toggle();
			$(this).addClass("selected")
		});
		$(".correct").click(function(){
			$(this).parent().siblings(".next").show();
		});
		$("dt").hover(function(){
			$(this).addClass("hover");
		}, function(){
			$(this).removeClass("hover");
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