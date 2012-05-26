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
	<h3>Mabuhay at salamat sa iyong paglahok sa eksperimentong ito ng Ekonomiks na patungkol sa paggawa ng desisyon!</h3>
	<p>
	Sa eksperimentong ito, ikaw ay makikilahok sa paggawa ng desisyon na kung saan ay maaring kumita ng salapi. Ang lahat ng iyong kikitain ay sa halaga ng salapi ng iyong bansa.
	</p><p>
	Ang eksperimento ay binubuo ng ilang mga bahagi. Sa bawat bahagi, ikaw ay tatanungin na gumawa ng isang desisyon na kinabibilangan ng mga iba pang kalahok sa iba’t-ibang bansa. Ang iyong magiging desisyon ay maaaring maka-apekto sa kikitain ng iba pang kalahok, tulad din ng magiging desisyon nila na maaring ding maka-apekto sa iyong kikitain.
	</p><p>
	Sarili mo lamang ang makakaalam ng halaga ng iyong mga kikitain at ikaw ay aabisuhan tungkol sa halagang ito sa pamamagitan ng email. Pagkatapos makumpleto ang eksperimento, ipadadala namin ang iyong kinitang salapi sa loob ng 24 oras sa pamamagitan ng PayPal o personal na pag-abot.
	</p>
	<button class="next">Next</button>
	<br/>
	<a class="image-link" href="<?php echo site_url('site/instructions_chinese'); ?>"><img src="<?php echo base_url(); ?>img/chinese.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions'); ?>"><img src="<?php echo base_url(); ?>img/english.png"/></a>
	<a class="image-link selected" href="<?php echo site_url('site/instructions_filipino'); ?>"><img src="<?php echo base_url(); ?>img/filipino.png"/></a>
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
	<h1>Pangkalahatang Ideya ng Eksperiment</h1>
	<ul>
		<li><strong>Ikaw ay na ipares may dalawang iba pang mga kalahok mula sa buong mundo.</strong></li>
		<li><strong>Lahat ay ibinigay timbang.</strong></li>
		<li><strong>Sa bawat yugto ang mga tao bumoto upang bumuo ng isang koponan. <br/>
Ang iyong layunin ay upang bumuo ng isang team na may pinakamalaking kabuuang timbang.</strong></li>
		<li><strong>Ang nanalong koponan ay split ng 100-eksperimento Yunit ng Pera.</strong></li>
	</ul>
	Sa susunod na screen namin-usapan ang mga detalye ng laro.
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page2">
	<h1>Pangkalahatang Ideya ng Eksperiment</h1>
	<p>Ikaw ay ipa-pares sa dalawa pang kalahok sa iba’t-ibang bansa. Ang mga impormasyon tungkol sa kanila ay hindi ipahahayag sa iyo at gayundin ang mga impormasyon tungkol sa iyo ay hindi ipahahayag sa kanila. Ang bawat isa sa inyo ay bibigyan ng isang timbang (ang bilang na ito ay nasa sa loob ng parenthesis ng bawat badge ng manlalaro). Ang kabuuan ng mga timbang ay 100..</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen">
	<p>Ang layunin ng laro ay bumuo ng grupo na may pinakamabigat na timbang. Ang mga miyembro ng pinakamabigat na grupo ay maghahati-hati sa100-experimental currency units (C) alinsunod sa paraan ng paghati na itinalakay sa ibaba (ito ay dagdag pa sa bayad sa pakikilahok). Ang mga kalahok na hindi bahagi ng grupo na may pinakamabigat na timbang ay walang kikitain (maliban na lamang sa bayad nila sa pakikilahok).</p>
	<p>Ang eksperimento ay nahahati sa tatlong rounds. Sa bawat round, ang bawat isang manlalaro ay mabibigyan ng pagkakataon na imungkahi kung sino ang gusto nilang makasama sa grupo. Ang mga kalahok sa iminungkahing grupo ay boboto ng "Yes" o "No" kung gusto nilang mabuo ang grupo. Ang iminungkahing grupo ay mabubuo lamang kapag ang lahat ng miyembro ay boboto ng "Yes".</p>
	<p>Makalipas ang tatlong rounds, o kung ang kalahok ay umulit ng panukala, ang eksperimento ay matatapos na at ang grupo na may pinakamabigat na timbang ang mananalo ng salapi.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page3">
	<h1>Yugto ng Panukala</h1>
	<p>
	Kapag ikaw na ang taya, pwede mong imungkahi kung sino ang gusto mong makasama sa grupo sa pamamagitan ng pagpili sa alinmang mga badges ng iba pang mga kalahok (ito ay sa ilalim ng "Select Group Members"), o sa pamamagitan ng pag-click ng isa sa mga entry sa listahan ng "Suggested Groups". Kabilang sa bawat suhestyon ang iyong payout kasunod ng kumpletong listahan ng mga miyembro ng mga grupo na maaring piliin. Ang mga nasabing suhestyon ay nakaayos ayon sa iyong payout  mula sa pinakamalaki hanggang pinakamababa.
	</p><p>
	Kapag ikaw ay nasiyahan na sa iyong iminungkahing grupo, i-click ang "Confirm Proposal". 
	</p><p>
	 (Sa "Timeline", ang iyong badge [2] ay mas mahaba upang ipahiwatig na ikaw na ang titira at ang unang bilog ay kulay puti (solid white) upang ipahiwatig na iyon ay kasalukuyang first round. Ang mga payouts ay ipinapakita gamit ang "C" bilang simbolo para sa experimental currency units.)
	</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page4">
	<h1>Yugto ng Pagboto</h1>
	<p>Kapag ang isang kalahok ay nagmungkahi na ikaw ay makasali sa isang grupo, ikaw ay aanyayahan bumoto upang maaprubahan ang grupo. Ipinapakita ng "Alternate Groups" list  ang kasalukuyang panukala kasabay ng mga iba pang grupo na kung saan pwede ka ding maging miyebro, ayon sa kanilang kaukulang payouts na maari mong ihambing sa iba. </p>
	<p>Bumoto sa pamamagitan ng pag-click sa "Yes" o "No". Kung ang lahat ng mga kalahok sa iminungkahing grupo ay boboto ng "Yes", yun ang grupong mabubuo, kung hindi naman, ang naturang grupo ay hindi mabubuo.</p>
	<img src="<?php echo base_url();?>img/vote.png" alt="Vote Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page5">
	<h1>Yugto ng mga Resulta</h1>
	<p>Matapos na ang isang kalahok ay magmungkahi ng isang grupo at ang lahat ng mga miyembro ng kanyang imunungkahing grupo ay nakaboto, ipapakita sa iyo ang resulta nito. Pindutin lamang ang "Continue" upang ipagpatuloy ang eksperimento, o "Review Payout", kung ang eksperimento ay tapos na.</p>
	<img src="<?php echo base_url();?>img/results.png" alt="Results Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page6">
	<h1>Ang Pagpapaliwanag ng Payouts</h1>
	<p>Mayroong dalawang uri ng eksperimento kung saan ikaw ay makikilahok, PROPORTIONAL o EQUAL.</p>
	<ul>
		<li>Kung ikaw ay nasa grupo na may pinakamabigat na timbang, ikaw ay mabibigyan ng kabayaran sa pakikilahok at
			<ul>
				<li>o	Isang halaga na proporsyon sa kontribusyon ng iyong numero sa kabuuang timbang ng grupo. [PROPORTIONAL] <br/>
					- o -</li>
				<li>o	Isang halaga na pantay-pantay na pinaghatian sa buong grupo [EQUAL]</li></ul></li>
		<li>Kung ikaw naman ay HINDI kasali sa grupo na may pinakamabigat na timbang, ang kabayaran sa paglahok LAMANG ang iyong matatanggap.</li>
	</ul>
	<h3>[PROPORTIONAL]</h3>
	<p>Sa pagsisimula ng eksperimento, sasabihin sa iyo kung ang uri ng payout ay PROPORTIONAL</p>
	<p>Halimbawa: Ang PROPORTIONAL payout sa result screen na nasa itaas ay kinakalkula sa pamamagitan ng paghati ng iyong numero (35) sa kabuuan ng mga numero sa iyong grupo (35 + 25). Samakatuwid, ang iyong payout ay 35 / (35 +25) = 58.</p>
	<h3>[EQUAL]</h3>
	<p>Sa pagsisimula ng eksperimento, sasabihin sa iyo kung ang uri ng payout ay EQUAL </p>
	<p>Halimbawa: Ang EQUAL payout ay kinakalkula sa pamamagitan ng paghati ng 100 sa bilang ng mga miyembro ng grupo. Para sa result screen sa itaas, ang iyong payout ay magiging 100/2 = 50</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>Pagbayad at Palitan ng Salapi</h1>
	<p>Ang iyong kabuuang bayad ay depende sa bansa kung saan ikaw ay kalahok. Ang halaga na ipinapakita sa screen ay nasa experimental currency (C). Sa bawat laro, ang C100 units ng experimental currency ay hinahati sa pagitan ng mga nanalong kalahok. Ang iyong payout ay nakasalalay sa bansa kung saan ka nagmula, at ang mga detalye nito kung papaano i-convert ang mga experimental dollars sa aktwal na pera ay ipinapakita sa talaan sa ibaba.</p>
	<table>
		<tr>Bansa</th><th>Salapi</th><th>Kabayaran sa Paglahok (ayon sa sariling salapi)</th><th>Halaga ng C100 sa sariling salapi</th></tr>
		<tr><td>Argentina</td><td>Argentine Peso</td><td>24.00</td><td>24.00</td></tr>
		<tr><td>Australia</td><td>Australian Dollar</td><td>6.00</td><td>6.00</td></tr>
		<tr><td>Brazil</td><td>Brazilian Real</td><td>12.00</td><td>12.00</td></tr>
		<tr><td>Canada</td><td>Canadian Dollar</td><td>5.00</td><td>5.00</td></tr>
		<tr><td>China</td><td>Chinese Yuan</td><td>18.00</td><td>18.00</td></tr>
		<tr><td>India</td><td>Indian Rupee</td><td>100.00</td><td>100.00</td></tr>
		<tr><td>Iran</td><td>Iranian Rial</td><td>80000.00</td><td>80000.00</td></tr>
		<tr><td>Iraq</td><td>Iraqi Dinar</td><td>4000.00</td><td>4000.00</td></tr>
		<tr><td>Israel</td><td>Israeli New Shekel</td><td>20.00</td><td>20.00</td></tr>
		<tr><td>Japan</td><td>Japanese Yen</td><td>380.00</td><td>380.00</td></tr>
		<tr><td>Mexico</td><td>Mexican Peso</td><td>40.00</td><td>40.00</td></tr>
		<tr><td>Pakistan</td><td>Pakistani Rupee</td><td>310.00</td><td>310.00</td></tr>
		<tr><td>Philippines</td><td>Philippine Peso</td><td>140.00</td><td>140.00</td></tr>
		<tr><td>South Africa</td><td>South African Rand</td><td>24.00</td><td>24.00</td></tr>
		<tr><td>Spain</td><td>Euro</td><td>7.00</td><td>7.00</td></tr>
		<tr><td>Thailand</td><td>Thai Baht</td><td>90.00</td><td>90.00</td></tr>
		<tr><td>Turkey</td><td>Turkish Lira</td><td>10.00</td><td>10.00</td></tr>
		<tr><td>United States</td><td>United States Dollar</td><td>5.00</td><td>5.00</td></tr>
		<tr><td>Vietnam</td><td>Vietnamese Dong</td><td>40000.00</td><td>40000.00</td></tr>
	</table>
	<p>Halimbawa, kung ang isang manlalaro na taga Mexico ay nanalo C25 + C50 + C100 + C25 sa apat na laro, ang kanyang aktwal na premyo ay 25 Mexican pesos, para kabayaran sa pakikilahok at C200 experimental dollars, na katumbas ng  80 Mexican pesos. Ang kabuuang payout ay 105 Mexican pesos.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>Iba pang Mahalagang Bagay na Dapat Malaman</h1>
	<p>Ang iyong bilis sa buong eksperimento ay susubaybayan. Kung ikaw ay lumagpas sa oras na inilaan, ang iyong tira ay awtomatikong mapag-dedesisyunan ng kompyuter at ang iyong payout  ay mababawasan sa naayon. Bibigyan ka ng 45 segundo para magmungkahi, 30 segundo para bumoto, at 30 segundo para suriin ang mga resulta.</p>
	<p>Kung ang screen ay hindi nagu-update, o kung sa paniniwala mo ay nakararanas ng, maari lamang na paki-refresh ang browser. Ito ay maaaring magawa sa pamamagitan ng pagpindot sa F5 key.</p>
	<h3>KAMI AY HINDI MANGONGOLEKTA NG MGA PERSONAL NA IMPORMASYON. LAHAT NG MGA IMPORMASYONG MAKOKOLEKTA, KASAMA NG INYONG MGA KINITA AY HINDI IPAHAHAYAG SA IBA.</h3>
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