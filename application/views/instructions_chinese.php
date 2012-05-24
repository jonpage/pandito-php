<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
ini_set('default_charset', 'GB18030');
header('Content-Type: text/html; charset=GB18030');?><!DOCTYPE html>
<html lang="zh">
<head>
	<title>Experiment Instructions</title>
	<meta http-equiv="Content-Type" content="text/html; charset=GB18030">
	<meta http-equiv="Content-Language" content="zh">
	<style type="text/css">
		@charset "GB18030";
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
		body{font-family:宋体,黑体,幼圆,微软雅黑, serif;}
	</style>
</head>
<body>
<div class="section" id="page1">
	<h3>欢迎并感谢您在这个经济学实验的参与决策！</h3>
	<p>
	在这个实验中，你会参与决策任务，给你挣钱的机会。在这个实验中的所有收入将在您的本国货币。
	</p><p>
	本实验将几部分组成。在每一部分中，您将被要求作出决定，涉及来自世界各地的其他参与者，也纷纷加入了实验。你的决定可能会影响他人的回报，正如你配合的人的决定可能会影响您的收益。
	</p><p>
	您的收入是保密的，你会被你赚的金额的电子邮件通知。实验完成后，我们将在24小时内发送您的付款通过PayPal或在人。
	</p>
	<button class="next">Next</button>
	<br/>
	<a class="image-link selected" href="<?php echo site_url('site/instructions_chinese'); ?>"><img src="<?php echo base_url(); ?>img/chinese.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions'); ?>"><img src="<?php echo base_url(); ?>img/english.png"/></a>
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
	<h1>实验概述</h1>
	<ul>
		<li><strong>你将与来自世界各地的其他参与者配对。</strong></li>
		<li><strong>每个人都将得到一个重量。</strong></li>
		<li><strong>在每一个阶段的人投票，以形成一个团队。 <br/>
你的目标是形成一个团队的最大总重量。</strong></li>
		<li><strong>获胜的球队将分成100个实验的货币单位。</strong></li>
	</ul>
	在接下来的画面中，我们讨论的游戏细节。
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page3">
	<h1>实验概述</h1>
	<p>你将与​​来自世界各地的其他参与者配对。他们的身份不会被透露给你，你将不会被透露给他们。你们每个人将得到一个重量（括号中的这个数字是每个球员的徽章）。这些权重的总和为100。</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen">
	<p>游戏的目的是要形成重组。最重的一组将分成100实验其成员之间的货币单位（三）使用下面讨论（除了参与费）分摊规则之一。谁不与最大重量组的一部分的参与者将获得什么（除了他们的参与费）。</p>
	<p>实验分为三轮。在每一轮，每个球员都会有一个回合，形成一组与会者提出一项建议。与会者建议组，然后将投票“是”或“否”来决定是否该集团将形成。建议组只会形成，如果所有成员都投票“是”。</p>
	<p>当三轮过去了，或参与者重复的提案，该实验将结束，最重的一组中的参与者将相应的奖励。</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page4">
	<h1>提案阶段</h1>
	<p>当轮到你时，你将能够提出通过选择相应的其他参与者（在“选择组成员”）的徽章组，或按一下“推荐组”列表中的条目之一。每个建议，包括你的支出由相应组的建议成员的完整列表。这些建议是您的奖金降序排序。</p>
	<p>一旦你与你的建议表示满意，点击“确认的建议”。</p>
	<p>（在“时间轴”，你的徽章[2]高，表明它是轮到你了，第一个圆被填满（纯白色），以表明它是目前第一轮。显示使用“C”为标志的支出实验货币单位）。</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page5">
	<h1>投票阶段</h1>
	<p>当参与者提出你加入他们在一个组，你将被要求投票批准组。“替代组”列表，让你看到目前所有其他的组，其中，你会比较其对应的赢钱成员一起建议。</p>
	<p>通过点击投票“是”或“否”。如果拟议的组中的所有参与者投票“是”，那么该组将形成，否则，该集团将无法形成。</p>
	<img src="<?php echo base_url();?>img/vote.png" alt="Vote Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page6">
	<h1>结果第一阶段</h1>
	<p>后，与会者提出了组和所有潜在的成员已经投票，你将看到的结果的概述。只需按一下“继续”进行实验，实验结束时，按“审查赔付”。</p>
	<img src="<?php echo base_url();?>img/results.png" alt="Results Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>对取款的说明</h1>
	<p>有两种类型的实验，在其中参与，比例或平等。</p>
	<ul>
		<li>如果您在本集团是最大的一笔，你将被赋予参与费和
			<ul>
				<li>你的电话号码的贡献组的总和的比例数额。[比例]<br/> 
					-或-</li>
				<li>组之中的金额相等。[平等]</li>
			</ul></li>
		<li>如果你是在同组的最大的一笔，你只会收到参展费。</li>
	</ul>
	<h3>[比例] [PROPORTIONAL]</h3>
	<p>在实验开始时，你会被告知，如果支付类型是成正比的。</p>
	<p>例如：在上述结果屏幕比例支付的数字，在你的小组（35 +25）的总和除以你的电话号码（35）计算。也就是说，您的奖金将是 [35 /（35 +25）]* 100= 58。</p>
	<h3>[平等] [EQUAL] </h3>
	<p>在实验开始时，你会被告知，如果支付类型是平等的。</p>
	<p>例如：组成员的数量除以100等于支出计算。对于上述结果屏幕，您的奖金将是100/2 = 50。</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page8">
	<h1>付款和货币兑换</h1>
	<p>您的最终付款取决于你正在参加由该国。在屏幕上显示的金额是对实验性货币（c）。在每场比赛中，C100级实验货币单位的优胜者之间的分裂。您的奖金是取决于你是从国家和实验美元，在你的家乡如何转换到实际货币表中，将在下一节详细信息。</p>
	<table>
		<tr><th>国家</th><th>货币</th><th>particiption费（按当地货币计算）</th><th>以当地货币值期C100</th></tr>
		<tr><td>阿根廷</td><td>阿根廷比索</td><td>14.00</td><td>24.00</td></tr>
		<tr><td>澳大利亚</td><td>澳大利亚元</td><td>3.50</td><td>6.00</td></tr>
		<tr><td>巴西</td><td>巴西雷亚尔</td><td>7.00</td><td>12.00</td></tr>
		<tr><td>加拿大</td><td>加拿大元</td><td>3.00</td><td>5.00</td></tr>
		<tr><td>中国</td><td>中国元</td><td>11.00</td><td>18.00</td></tr>
		<tr><td>印度</td><td>印度卢比</td><td>60.00</td><td>100.00</td></tr>
		<tr><td>伊朗</td><td>伊朗里亚尔</td><td>14000.00</td><td>24600.00</td></tr>
		<tr><td>伊拉克</td><td>伊拉克第纳尔</td><td>2400.00</td><td>4000.00</td></tr>
		<tr><td>以色列</td><td>以色列新谢克尔</td><td>11.00</td><td>19.00</td></tr>
		<tr><td>日本</td><td>日元</td><td>230.00</td><td>380.00</td></tr>
		<tr><td>墨西哥</td><td>墨西哥比索</td><td>25.00</td><td>40.00</td></tr>
		<tr><td>巴基斯坦</td><td>巴基斯坦卢比</td><td>180.00</td><td>310.00</td></tr>
		<tr><td>菲律宾</td><td>菲律宾比索</td><td>85.00</td><td>140.00</td></tr>
		<tr><td>南非</td><td>南非兰特</td><td>14.00</td><td>24.00</td></tr>
		<tr><td>西班牙</td><td>欧元</td><td>4.00</td><td>7.00</td></tr>
		<tr><td>泰国</td><td>泰铢</td><td>55.00</td><td>90.00</td></tr>
		<tr><td>土耳其</td><td>土耳其里拉</td><td>4.50</td><td>8.00</td></tr>
		<tr><td>美国</td><td>美国美元</td><td>3.00</td><td>5.00</td></tr>
		<tr><td>越南</td><td>越南盾</td><td>23000.00</td><td>40000.00</td></tr>
	</table>
	<p>作为一个例子，如果一个球员从墨西哥胜C25 + C50 + C100 + C25在四场比赛，他的实际带回家的奖金将显示25墨西哥比索，加上C200的实验美元，相当于80墨西哥比索。总支出105墨西哥比索。</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page9">
	<h1>重要事项</h1>
	<p>监测整个实验的步伐。如果您需要更长的时间比规定的时间，轮到你将自动随机决定和你支出将相应减少。你会得到提出的45秒，30秒投票，和30秒的检讨结果。</p>
	<p>如果屏幕上没有出现更新，或者你认为你遇到错误，请刷新浏览器。这可以通过按F5键。</p>
	<h3>我们不会收集个人身份信息。所有收集到的信息，包括您的收入，将严格保密。</h3>
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
		$("image-link").hover(function(){
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