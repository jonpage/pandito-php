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
		body{font-family:����,����,��Բ,΢���ź�, serif;}
	</style>
</head>
<body>
<div class="section" id="page1">
	<h3>��ӭ����л�����������ѧʵ��Ĳ�����ߣ�</h3>
	<p>
	�����ʵ���У�������������񣬸�����Ǯ�Ļ��ᡣ�����ʵ���е��������뽫�����ı������ҡ�
	</p><p>
	��ʵ�齫��������ɡ���ÿһ�����У�������Ҫ�������������漰����������ص����������ߣ�Ҳ�׷׼�����ʵ�顣��ľ������ܻ�Ӱ�����˵Ļر�����������ϵ��˵ľ������ܻ�Ӱ���������档
	</p><p>
	���������Ǳ��ܵģ���ᱻ��׬�Ľ��ĵ����ʼ�֪ͨ��ʵ����ɺ����ǽ���24Сʱ�ڷ������ĸ���ͨ��PayPal�����ˡ�
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
	<h1>ʵ�����</h1>
	<ul>
		<li><strong>�㽫������������ص�������������ԡ�</strong></li>
		<li><strong>ÿ���˶����õ�һ��������</strong></li>
		<li><strong>��ÿһ���׶ε���ͶƱ�����γ�һ���Ŷӡ� <br/>
���Ŀ�����γ�һ���Ŷӵ������������</strong></li>
		<li><strong>��ʤ����ӽ��ֳ�100��ʵ��Ļ��ҵ�λ��</strong></li>
	</ul>
	�ڽ������Ļ����У��������۵���Ϸϸ�ڡ�
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page3">
	<h1>ʵ�����</h1>
	<p>�㽫��6�7�6�7����������ص�������������ԡ����ǵ���ݲ��ᱻ͸¶���㣬�㽫���ᱻ͸¶�����ǡ�����ÿ���˽��õ�һ�������������е����������ÿ����Ա�Ļ��£�����ЩȨ�ص��ܺ�Ϊ100��</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen">
	<p>��Ϸ��Ŀ����Ҫ�γ����顣���ص�һ�齫�ֳ�100ʵ�����Ա֮��Ļ��ҵ�λ������ʹ���������ۣ����˲���ѣ���̯����֮һ��˭��������������һ���ֵĲ����߽����ʲô���������ǵĲ���ѣ���</p>
	<p>ʵ���Ϊ���֡���ÿһ�֣�ÿ����Ա������һ���غϣ��γ�һ����������һ��顣����߽����飬Ȼ��ͶƱ���ǡ��򡰷��������Ƿ�ü��Ž��γɡ�������ֻ���γɣ�������г�Ա��ͶƱ���ǡ���</p>
	<p>�����ֹ�ȥ�ˣ���������ظ����᰸����ʵ�齫���������ص�һ���еĲ����߽���Ӧ�Ľ�����</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page4">
	<h1>�᰸�׶�</h1>
	<p>���ֵ���ʱ���㽫�ܹ����ͨ��ѡ����Ӧ�����������ߣ��ڡ�ѡ�����Ա�����Ļ����飬��һ�¡��Ƽ��顱�б��е���Ŀ֮һ��ÿ�����飬�������֧������Ӧ��Ľ����Ա�������б���Щ���������Ľ���������</p>
	<p>һ��������Ľ����ʾ���⣬�����ȷ�ϵĽ��顱��</p>
	<p>���ڡ�ʱ���ᡱ����Ļ���[2]�ߣ����������ֵ����ˣ���һ��Բ������������ɫ�����Ա�������Ŀǰ��һ�֡���ʾʹ�á�C��Ϊ��־��֧��ʵ����ҵ�λ����</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page5">
	<h1>ͶƱ�׶�</h1>
	<p>����������������������һ���飬�㽫��Ҫ��ͶƱ��׼�顣������顱�б����㿴��Ŀǰ�����������飬���У����Ƚ����Ӧ��ӮǮ��Աһ���顣</p>
	<p>ͨ�����ͶƱ���ǡ��򡰷񡱡������������е����в�����ͶƱ���ǡ�����ô���齫�γɣ����򣬸ü��Ž��޷��γɡ�</p>
	<img src="<?php echo base_url();?>img/vote.png" alt="Vote Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page6">
	<h1>�����һ�׶�</h1>
	<p>�������������������Ǳ�ڵĳ�Ա�Ѿ�ͶƱ���㽫�����Ľ���ĸ�����ֻ�谴һ�¡�����������ʵ�飬ʵ�����ʱ����������⸶����</p>
	<img src="<?php echo base_url();?>img/results.png" alt="Results Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>��ȡ���˵��</h1>
	<p>���������͵�ʵ�飬�����в��룬������ƽ�ȡ�</p>
	<ul>
		<li>������ڱ�����������һ�ʣ��㽫���������Ѻ�
			<ul>
				<li>��ĵ绰����Ĺ�������ܺ͵ı������[����]<br/> 
					-��-</li>
				<li>��֮�еĽ����ȡ�[ƽ��]</li>
			</ul></li>
		<li>���������ͬ�������һ�ʣ���ֻ���յ���չ�ѡ�</li>
	</ul>
	<h3>[����] [PROPORTIONAL]</h3>
	<p>��ʵ�鿪ʼʱ����ᱻ��֪�����֧�������ǳ����ȵġ�</p>
	<p>���磺�����������Ļ����֧�������֣������С�飨35 +25�����ܺͳ�����ĵ绰���루35�����㡣Ҳ����˵�����Ľ����� [35 /��35 +25��]* 100= 58��</p>
	<h3>[ƽ��] [EQUAL] </h3>
	<p>��ʵ�鿪ʼʱ����ᱻ��֪�����֧��������ƽ�ȵġ�</p>
	<p>���磺���Ա����������100����֧�����㡣�������������Ļ�����Ľ�����100/2 = 50��</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page8">
	<h1>����ͻ��Ҷһ�</h1>
	<p>�������ո���ȡ���������ڲμ��ɸù�������Ļ����ʾ�Ľ���Ƕ�ʵ���Ի��ң�c������ÿ�������У�C100��ʵ����ҵ�λ����ʤ��֮��ķ��ѡ����Ľ�����ȡ�������Ǵӹ��Һ�ʵ����Ԫ������ļ������ת����ʵ�ʻ��ұ��У�������һ����ϸ��Ϣ��</p>
	<table>
		<tr><th>����</th><th>����</th><th>particiption�ѣ������ػ��Ҽ��㣩</th><th>�Ե��ػ���ֵ��C100</th></tr>
		<tr><td>����͢</td><td>����͢����</td><td>14.00</td><td>24.00</td></tr>
		<tr><td>�Ĵ�����</td><td>�Ĵ�����Ԫ</td><td>3.50</td><td>6.00</td></tr>
		<tr><td>����</td><td>�������Ƕ�</td><td>7.00</td><td>12.00</td></tr>
		<tr><td>���ô�</td><td>���ô�Ԫ</td><td>3.00</td><td>5.00</td></tr>
		<tr><td>�й�</td><td>�й�Ԫ</td><td>11.00</td><td>18.00</td></tr>
		<tr><td>ӡ��</td><td>ӡ��¬��</td><td>60.00</td><td>100.00</td></tr>
		<tr><td>����</td><td>�������Ƕ�</td><td>14000.00</td><td>24600.00</td></tr>
		<tr><td>������</td><td>�����˵��ɶ�</td><td>2400.00</td><td>4000.00</td></tr>
		<tr><td>��ɫ��</td><td>��ɫ����л�˶�</td><td>11.00</td><td>19.00</td></tr>
		<tr><td>�ձ�</td><td>��Ԫ</td><td>230.00</td><td>380.00</td></tr>
		<tr><td>ī����</td><td>ī�������</td><td>25.00</td><td>40.00</td></tr>
		<tr><td>�ͻ�˹̹</td><td>�ͻ�˹̹¬��</td><td>180.00</td><td>310.00</td></tr>
		<tr><td>���ɱ�</td><td>���ɱ�����</td><td>85.00</td><td>140.00</td></tr>
		<tr><td>�Ϸ�</td><td>�Ϸ�����</td><td>14.00</td><td>24.00</td></tr>
		<tr><td>������</td><td>ŷԪ</td><td>4.00</td><td>7.00</td></tr>
		<tr><td>̩��</td><td>̩��</td><td>55.00</td><td>90.00</td></tr>
		<tr><td>������</td><td>����������</td><td>4.50</td><td>8.00</td></tr>
		<tr><td>����</td><td>������Ԫ</td><td>3.00</td><td>5.00</td></tr>
		<tr><td>Խ��</td><td>Խ�϶�</td><td>23000.00</td><td>40000.00</td></tr>
	</table>
	<p>��Ϊһ�����ӣ����һ����Ա��ī����ʤC25 + C50 + C100 + C25���ĳ�����������ʵ�ʴ��ؼҵĽ�����ʾ25ī�������������C200��ʵ����Ԫ���൱��80ī�����������֧��105ī���������</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page9">
	<h1>��Ҫ����</h1>
	<p>�������ʵ��Ĳ������������Ҫ������ʱ��ȹ涨��ʱ�䣬�ֵ��㽫�Զ������������֧������Ӧ���١����õ������45�룬30��ͶƱ����30��ļ��ֽ����</p>
	<p>�����Ļ��û�г��ָ��£���������Ϊ������������ˢ��������������ͨ����F5����</p>
	<h3>���ǲ����ռ����������Ϣ�������ռ�������Ϣ�������������룬���ϸ��ܡ�</h3>
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