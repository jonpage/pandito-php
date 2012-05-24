<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
ini_set('default_charset', 'tis-620'); ?><!DOCTYPE html>
<html>
<head>
	<title>Experiment Instructions</title>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
	<meta http-equiv="Content-Language" content="th">
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
	<h3>�Թ�յ�͹�Ѻ��Т͢ͺ�س����Ѻ�������ǹ����㹡�÷��ͧ������ɰ��ʵ������ǡѺ��õѴ�Թ㨢ͧ�س!</h3>
	<p>
	������ҧ��÷��ͧ���駹��س������ǹ����㹡�õѴ�Թ㨧ҹ������س���͡�ʷ������Ѻ�Թ ����������㹡�÷��ͧ���������ʡ���Թ����ҹ�ͧ�س
	</p><p>
	��÷��ͺ���л�Сͺ����������ǹ ���ǹ������з�ҹ�ж١���㹡�õѴ�Թ㨷������Ǣ�ͧ�Ѻ������������� � �ҡ�����š���������������¡�÷��ͧ ��õѴ�Թ㨢ͧ�س�Ҩ�觼š�з���� payoffs �ͧ�����������ǡѺ��õѴ�Թ㨢ͧ�ؤ�ŷ��س���ѧ�Ѻ���Ѻ�Ҩ�ռŵ�� payoffs �ͧ�س
	</p><p>
	�����ͧ�س�繤����Ѻ��Фس�����Ѻ�駷ҧ����Ţͧ�ӹǹ�Թ���س���Ѻ �����������鹡�÷��ͺ��Ҩ��觡�ê����Թ�ͧ�س���� 24 ���������ҹ�ҧ Paypal ����㹤�
	</p>
	<button class="next">Next</button>
	<br/>
	<a class="image-link" href="<?php echo site_url('site/instructions_chinese'); ?>"><img src="<?php echo base_url(); ?>img/chinese.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions'); ?>"><img src="<?php echo base_url(); ?>img/english.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_filipino'); ?>"><img src="<?php echo base_url(); ?>img/filipino.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_hebrew'); ?>"><img src="<?php echo base_url(); ?>img/hebrew.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_hindi'); ?>"><img src="<?php echo base_url(); ?>img/hindi.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_japanese'); ?>"><img src="<?php echo base_url(); ?>img/japanese.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_persian'); ?>"><img src="<?php echo base_url(); ?>img/persian.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_spanish'); ?>"><img src="<?php echo base_url(); ?>img/spanish.png"/></a>
	<a class="image-link selected" href="<?php echo site_url('site/instructions_thai'); ?>"><img src="<?php echo base_url(); ?>img/thai.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_turkish'); ?>"><img src="<?php echo base_url(); ?>img/turkish.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_urdu'); ?>"><img src="<?php echo base_url(); ?>img/urdu.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_vietnamese'); ?>"><img src="<?php echo base_url(); ?>img/vietnamese.png"/></a>
</div>

<div class="section" id="page2">
	<h1>�Ҿ����ͧ��÷��ͧ</h1>
	<ul>
		<li><strong>�س����Ѻ���Ѻ�ͧ������������� � �ҡ�����š</strong></li>
		<li><strong>�ء�������Ѻ���˹ѡ</strong></li>
		<li><strong>㹢�鹵͹�ء��ŧ��ṹ���Ϳ�������<br/>
�ͧ�س��͡�ÿ�����������չ��˹ѡ�������˭����ش</strong></li>
		<li><strong>�����誹Ш��¡ 100 ˹����Թ��ҷ��ͧ</strong></li>
	</ul>
	�˹�ҨͶѴ价����Ҩ��������������´�ͧ��
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page3">
	<h1>�Ҿ����ͧ��÷��ͧ</h1>
	<p>�س����Ѻ���Ѻ�ͧ������������� � �ҡ�����š ��ǵ��ͧ�ǡ�Ҩ����١�Դ����س��Фس�����١�Դ����ǡ�� ���з�ҹ�����Ѻ���˹ѡ (�ӹǹ��������ǧ��纤��㹻��¢ͧ���������Ф�) ������ͧ���˹ѡ����ҹ���� 100</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen">
	<p>�ѵ�ػ��ʧ��ͧ����͡�����ҧ��������˹ѡ����ش ��������˹ѡ����ش���¡ 100 ˹���ʡ���Թ���ͧ (C) �����ҧ��Ҫԡ�ͧ������˹��㹡�����º�����ѹ����ʹ�ҹ��ҧ (�͡�˹�ͨҡ��Ҹ��������������ǹ����) ����������������������ǹ˹�觢ͧ���������չ��˹ѡ�ҡ����ش�����Ѻ������� (¡��鹡�����¡�纤�Ҹ��������������ǹ�����ͧ�ǡ��)</p>
	<p>��÷��ͧ���͡������ͺ ���ء�ͺ���������Ф�����˹���ѹ价Ӣ���ʹ��ç�����ٻẺ������ͧ���������� ����������㹡���������ʹ͹�鹨��͡���§ŧ��ṹ "��" ���� "No" ���͵Ѵ�Թ���������������п���� ���������ʹ���ҹ�鹨п���������Ҫԡ�ء��ŧ������ "��"</p>
	<p>������ͺ���������ҹ������ͼ����������ӫ�Ӣ���ʹ͡�÷��ͺ������ش��м���������㹡�������˹ѡ����ش�����Ѻ�ҧ��ŵ���ӴѺ</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page4">
	<h1>��鹵͹����ʹ�</h1>
	<p>������ա���Դ�ͧ�س�س������ö���ʹ͡�����·�駡�����͡���·���ʹ���ͧ�Ѻ������������� � (����� "��Ҫԡ��������͡") �����¡�ä�ԡ�����¡�����¡��˹�����¡�� "���������й�" ����ʹ��Тͧ���Ш����Թ�ͧ�س�����ª��ͷ������ó�ͧ��Ҫԡ�ͧ����ʹͧ͢���������ʹ���ͧ�ѹ ����ʹ�������ҹ��ж١���§�ӴѺ�����è����Թ�ͧ�س��ӴѺ�Ѵŧ��</p>
	<p>����ͤس��㨡Ѻ����ʹͧ͢�س����ԡ "�׹�ѹ����ʹ�"</p>
	<p>(� "Timeline" ���¢ͧ�س [2] ����٧�����к��ա���Դ���ǧ����á�ж١������ (�ͧ���բ��) ���ͺ觪������ѹ���ͺ�á�ͧ�س. �����Թ�ҧ��Ũж١�ʴ����� "C" ���ѭ�ѡɳ� ����Ѻ˹���ʡ���Թ���ͧ.)</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page5">
	<h1>��鹵͹���ŧ��ṹ���§</h1>
	<p>����ͼ������������ʹ����س��������ǡ��㹡�����س�ж١�����ŧ���͹��ѵ�������� ��¡�� "��������" �������س�ͧ��繢���ʹ�㹻Ѩ�غѹ�Ǻ���仡Ѻ�������� � ���������س������Ҫԡ����ա�è����Թ�ҧ��ŷ���ʹ���ͧ�ѹ�ͧ�ǡ������Ѻ������º��º</p>
	<p>��ǵ�¡�ä�ԡ��� "��" ���� "No" �ҡ����������������㹡��������ʹ��͡���§ŧ��ṹ "��" ���ǡ���������Դ����ԩй�鹡������������Դ���</p>
	<img src="<?php echo base_url();?>img/vote.png" alt="Vote Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page6">
	<h1>��鹷����Ѿ��</h1>
	<p>��ѧ�ҡ���������������ʹ͡���������Ҫԡ�ء��������ѡ��Ҿ���Ѻ�����ǵ�س���ʴ��Ҿ����ͧ�š�� ��§�衴 "Continue" ���ʹ��Թ��÷��ͺ���͡� "���������" ����͡�÷��ͧ���ҡ����</p>
	<img src="<?php echo base_url();?>img/results.png" alt="Results Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>��͸Ժ�¢ͧ��è���</h1>
	<p>���ͧ�������ͧ��÷��ͧ㹷����س�����������Ѵ��ǹ������ҡѺ</p>
	<ul>
		<li>��Ҥس����㹡��������ռ��������˭����ش���س�����Ѻ��Ҹ��������������ǹ�������
			<ul>
				<li>�ӹǹ�Թ����Ѵ��ǹ�ͧ�ŧҹ�ӹǹ�ͧ������ͧ����� [�Ѵ��ǹ] [PROPORTIONAL]<br/>
					- ���� -</li>
				<li>�ӹǹ�Թ�������ҡѹ��������� [��ҡѺ] [EQUAL]</li></ul></li>
		<li>�ҡ�س���������㹡��������ռ��������˭����ش�س�����Ѻ��ҡ������ǹ����</li>
	</ul>
	<h3>[�Ѵ��ǹ] [PROPORTIONAL]</h3>
	<p>���ش������鹢ͧ��÷��ͺ�س�к͡��һ������ͧ��è����Թ���Ѵ��ǹ</p>
	<p>������ҧ: ��è����Թ����Ѵ��ǹ���˹�Ҩʹ�ҹ���ж١�ӹǳ�¡����èӹǹ�ͧ�س (35) ���¼�����ͧ����Ţ㹡�����ͧ�س (35 + 25) ��蹤�͡�è����Թ�ͧ�س���� [35 / (35 +25)]*100 = 58</p>
	<h3>[��ҡѺ] [EQUAL]</h3>
	<p>���ش������鹢ͧ��÷��ͺ�س�к͡��һ������ͧ��è����Թ��ҡѺ</p>
	<p>������ҧ: ��è����Թ��ҡѹ�ж١�ӹǳ�¡����� 100 ���¨ӹǹ�ͧ��Ҫԡ㹡���� ����Ѻ˹�Ҩͼ��Ѿ���ҧ�鹨����Թ�ͧ�س���� 100/2 = 50</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page8">
	<h1>�ŧ��ê����Թ���ʡ���Թ</h1>
	<p>�����Թ�Ǵ�ش���¢ͧ�س�������Ѻ����ȷ��س����ǹ�����ҡ �ӹǹ�Թ����ʴ��˹�Ҩ���ʡ���Թ��跴�ͧ�� (C) 㹷ء��, C100 ˹��¢ͧʡ���Թ���ͧ���¡�����ҧ��骹� ��è����Թ�ͧ�س�������Ѻ����ȷ��س����ҡ�����������´�ͧ�Ըա���ŧ���ͧ����������Թ����Դ��鹨�ԧ㹻���Ⱥ�ҹ�Դ�ͧ�س�л�ҡ�㹵��ҧ���ǹ�Ѵ�</p>
	<table>
		<tr><th>�����</th><th>�Թ���</th><th>��Ҹ������� Particiption (�ʡ���Թ��ͧ���)</th><th>������Ҩҡ C100 �ʡ���Թ��ͧ���</th></tr>
		<tr><td>����ਹ�Թ�</td><td>�Թ�⫢ͧ����ਹ�Թ�</td><td>14.00</td><td>24.00</td></tr>
		<tr><td>���������</td><td>����������������</td><td>3.50</td><td>6.00</td></tr>
		<tr><td>����Ⱥ�ҫ��</td><td>����Ţͧ��ҫ��</td><td>7.00</td><td>12.00</td></tr>
		<tr><td>᤹Ҵ�</td><td>�������᤹Ҵ�</td><td>3.00</td><td>5.00</td></tr>
		<tr><td>����Ȩչ</td><td>��ǹ�չ</td><td>11.00</td><td>18.00</td></tr>
		<tr><td>�Թ���</td><td>�Թ�ٻբͧ�Թ���</td><td>60.00</td><td>100.00</td></tr>
		<tr><td>�����ҹ</td><td>�����ҹ Rial</td><td>14000.00</td><td>24600.00</td></tr>
		<tr><td>��������ѡ</td><td>�չ������ѡ</td><td>2400.00</td><td>4000.00</td></tr>
		<tr><td>�������������</td><td>�Թ Shekel ����ͧ��������</td><td>11.00</td><td>19.00</td></tr>
		<tr><td>����ȭ����</td><td>�Թ�¹�ͧ�����</td><td>230.00</td><td>380.00</td></tr>
		<tr><td>��硫��</td><td>�Թ����硫ԡѹ</td><td>25.00</td><td>40.00</td></tr>
		<tr><td>�ҡ�ʶҹ</td><td>�Թ�ٻբͧ�ҡ�ʶҹ</td><td>180.00</td><td>310.00</td></tr>
		<tr><td>���Ի�Թ��</td><td>�Թ�⫢ͧ���Ի�Թ��</td><td>85.00</td><td>140.00</td></tr>
		<tr><td>�Ϳ�ԡ���</td><td>�ù��ͧ�Ϳ�ԡ���</td><td>14.00</td><td>24.00</td></tr>
		<tr><td>�໹</td><td>����</td><td>4.00</td><td>7.00</td></tr>
		<tr><td>�������</td><td>�ҷ��</td><td>55.00</td><td>90.00</td></tr>
		<tr><td>��á�</td><td>���ҵ�á�</td><td>4.50</td><td>8.00</td></tr>
		<tr><td>��������Ѱ����ԡ�</td><td>�˴���������Ѱ����ԡ�</td><td>3.00</td><td>5.00</td></tr>
		<tr><td>���´���</td><td>�ͧ�ͧ���´���</td><td>23000.00</td><td>40000.00</td></tr>
	</table>
	<p>������ҧ���ҡ�����蹨ҡ��硫�⡪�� C25 + C50 + C100 + C25 ����������Դ��鹨�ԧ�����ҷ���ҹ�ͧ�����Ѻ�ҧ��Ũ�����硫ԡѹ 25 ����Ѻ�ʴ���鹺ǡ C200 ������췴�ͧ�����ҡѺ 80 ����硫ԡѹ ��è����Թ������ҡ 105 ����硫ԡѹ</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page9">
	<h1>�����˵ط���Ӥѭ</h1>
	<p>���Ǣͧ�س��ʹ��÷��ͧ��͡�õ�Ǩ�ͺ �ҡ�س�����ҹҹ�������ҷ���˹�, ���칢ͧ�س�ж١�ѵ��ѵ��¡�õѴ�Թ㨷��������С�è����Թ���س��Ŵŧ���仴��� ��ҹ�����Ѻ 45 �Թҷ����͹��ʹ�, 30 �Թҷ�㹡���͡���§ŧ��ṹ��� 30 �Թҷ�㹡�÷��ǹ��</p>
	<p>���˹�Ҩ�����ҡ�������ͻ�Ѻ��ا���ͤس������Ҥس���ѧ���ʺ��ͼԴ��Ҵ�ô���ê��������� �������ö�����¡�á����� F5</p>
	<h3>��Ҩ�����红�������ǹ�ؤ�� �����ŷ��������������֧�����ͧ�س���ѧ���繤����Ѻ</h3>
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