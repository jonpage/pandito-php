<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><!DOCTYPE html>
<html>
<head>
	<title>Experiment Instructions</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Language" content="hi">
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
	<style type="text/css">
		body {font-family :mangal,raghu8;font-size: 11px;}
	</style>
</head>
<body>
<div class="section" id="page1">
	<h3>स्वागत और धन्यवाद आपका इसअर्थशास्त्र निर्णय लेने के प्रयोग में भाग लेने के लिए!</h3>
	<p>
	इस प्रयोग के दौरान आप निर्णय कार्यों में भाग लेंगे जो आप को पैसा कमाने का अवसर देगा। इस प्रयोग के दौरान आप की जो कमाई होगी वोह आप के देशी मुद्रा में होगी |
	</p><p>
	इस प्रयोग के अनेक भाग होंगे । प्रत्येक भाग में, आप को निर्णय लेने को कहा जायेगा और इस प्रयोग में दुनियां के विभिन्न राज्यों के लोग भी शामिल होंगे। आप का निर्णय किसी और की कमाई पे असर कर सकता है वैसे ही जैसे किसी और का निर्णय आप की कमाई पर।
	</p><p>
	आप की कमाई गोपनीय राखी जाएगी और आप को आप की कमाई हुई रकम ईमेल द्वारा सूचित की जाएगी। इस प्रयोग के पूरा होने पर, आप को आप का भुगतान २४ घंटों के भीतर  paypal या व्यक्तिगत रूप में भेजे जायेगा ।
	</p>
	<button class="next">Next</button>
	<br/>
	<a class="image-link" href="<?php echo site_url('site/instructions_chinese'); ?>"><img src="<?php echo base_url(); ?>img/chinese.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions'); ?>"><img src="<?php echo base_url(); ?>img/english.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_filipino'); ?>"><img src="<?php echo base_url(); ?>img/filipino.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_hebrew'); ?>"><img src="<?php echo base_url(); ?>img/hebrew.png"/></a>
	<a class="image-link selected" href="<?php echo site_url('site/instructions_hindi'); ?>"><img src="<?php echo base_url(); ?>img/hindi.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_japanese'); ?>"><img src="<?php echo base_url(); ?>img/japanese.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_persian'); ?>"><img src="<?php echo base_url(); ?>img/persian.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_spanish'); ?>"><img src="<?php echo base_url(); ?>img/spanish.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_thai'); ?>"><img src="<?php echo base_url(); ?>img/thai.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_turkish'); ?>"><img src="<?php echo base_url(); ?>img/turkish.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_urdu'); ?>"><img src="<?php echo base_url(); ?>img/urdu.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_vietnamese'); ?>"><img src="<?php echo base_url(); ?>img/vietnamese.png"/></a>
</div>

<div class="section" id="page2">
	<h1>प्रयोग का अवलोकन</h1>
	<ul>
		<li><strong>आप दुनिया भर से दो अन्य प्रतिभागियों के साथ रखा जाएगा.</strong></li>
		<li><strong>हर कोई एक वजन दिया जाएगा.</strong></li>
		<li><strong>हर स्तर पर लोगों को मतदान के लिए एक टीम के रूप में.<br/>
अपने उद्देश्य के लिए सबसे बड़ा कुल वजन के साथ एक टीम के रूप में है.</strong></li>
		<li><strong>विजेता टीम 100 प्रायोगिक मुद्रा इकाइयों विभाजित किया जाएगा.</strong></li>
	</ul>
	अगले स्क्रीन में हम खेल के विवरण पर चर्चा.
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page3">
	<h1>प्रयोग का अवलोकन</h1>
	<p>आप की जोड़ी दुनिया के किसी दुसरे देश के दो लोगों के साथ बनायीं जाएगी । उनकी पहचान हम आप को उजागर नहीं की जायगी और न ही आप की पहचान उनको । प्रत्येक व्यक्ति को एक भार दिया जायेगा ( येः संख्या प्रत्येक खिलाडी की चाप होगी ) । इस का कुल वज़न १०० होगा।</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen">
	<p>खेल का उद्देश्य सबसे भरी ग्रुप बनाना है। सबसे भरी ग्रुप अपने आपस में १०० प्रयोग के मुद्रा बाटेंगे कुछ नियमों के अनुसार जो नीचे दिएगये है और जो लोग सबसे भरी ग्रुप के भाग नहीं है वोह अपने भाग लेने के फीस के आलावा कुछ नहीं कम पायंगे ।</p>
	<p>इस प्रयोग दौर को तीन भागों में विभाजित किया गया है । हर दौर में प्रत्येक हर एक खिलाडी को एक गुट बनाने का प्रस्ताव रखने का मौका दिया जायेगा । प्रतिभागियों प्रस्तावित दल में मतदान करेंगे "हां' या ” ना” में निर्णय करने के लिए की क्या वोह अपना गुट बनेंगे या नहीं । प्रस्तावित समूह रूप में होगा यदि सदस्यों का मतदान हाँ है ।</p>
	<p>जब तीन दौर पारित हो जाए, या सहभागी एक प्रस्ताव दौराए तो प्रयोग अंत हो जायेगा और सबसे भरी गुट को इनाम दियाजाएगा ।</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page4">
	<h1>प्रस्ताव स्तर</h1>
	<p>
	जब आप की बारी आएगी तब आप अपना गुट बनाने का प्रस्ताव या तोह दुसरे प्रत्योगियों का बिल्ला चुन्न के रख सकते है या क्लिक द्वारा एक प्रविष्टियों की सूची में' समूह ने सुझाव के अनुसार कर सकते है  ।'' हर एक सुझाव में आप की कमाने की शमता और प्रथिद्वान्धी गुट के प्रस्ताव शामिल होगा । इन सुलझाई दिए जाते हैं पैसों का विशाल भुगतान घटते क्रम में । 
	</p><p>
	जब एक बार आप अपने प्रस्ताव से संतुष्ट हैं, "प्रस्ताव बात की पुष्टि की है '' पर क्लिक कीजिये |
	</p><p>
	 (आप के बिल्ले की समयरेखा  [ 2 ] यह सन्देश देती है की आप की बारी आगई है और और प्रथम वृत्त भरा गया है (ठोस सफेद) को फिलहाल यह संकेत करते हैं कि यह पहला दौर है। लोक-कला-रूपों का इस्तेमाल कर रहे हैं कि डराकर' सी' का प्रतीक रूप में प्रायोगिक मुद्रा इकाइयों के लिए) । 
	</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page5">
	<h1>मतदान चरण </h1>
	<p>जब एक प्रत्योगी आप को अपने गुट में शामिल होने का प्रस्ताव रखता है तो आप को मतदान द्वारा अनुमोधन  करने कओ कहा जायेगा । ' वैकल्पिक समूह "सूची है जिससे यह सुनिश्चित करना होगा कि आप वर्तमान प्रस्ताव के बगल में सभी अन्य समूह देख सकते है जिसके आप भाग है और उनके समतुल्य डराकर तुलना की दृष्टि स भी कर सकते है ।</p>
	<p>क्लिक द्वारा मतदान "हां' या' नहीं'  में करे। यदि सभी भागीदारों के प्रस्तावित दल में वोट' हां' है, तो उस दल का गठनकिया जाए, अन्यथा इस ग्रुप का गठन नहीं किया जायेगा ।</p>
	<img src="<?php echo base_url();?>img/vote.png" alt="Vote Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page6">
	<h1>परिणाम चरण</h1>
	<p>एक के बाद एक दल का विचार रखती सहभागी संभावना और सभी सदस्यों ने मतदान किया तो आप को परिणाम का सिंहावलोकन दिखाया जाएगा । इरफ "जारी" दबायी प्रयोग में आघे बढ़ने के लिए, या पैसों का विशाल भुगतान की समीक्षा" दबायी जब यह प्रयोग ख़तम हो जाये ।</p>
	<img src="<?php echo base_url();?>img/results.png" alt="Results Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>भुगतान का विवरण</h1>
	<p>दो प्रकार के प्रयोग होते हैं जिसे में आप भाग लेंगे बराबर [PROPORTIONAL] या समान [EQUAL] ।</p>
	<ul>
		<li>अगर आप सबसे ज्यादा पासे वल्ले सम्मुह के सदस्य है तोह आप को भाग लेने की फीस दी जाएगी 
			<ul>
				<li>अनुपात में राशि को अपने संख्या का योगदान गुट की समाप्ति । [ समानुपाती ] [PROPORTIONAL]<br/>
					-- या --</li>
				<li>राशी सामान्य रूप में गुट में बाटी जाएगी [ समान ] [EQUAL]</li></ul></li>
		<li>यदि आप इस सबसे बड़ी रकम वाली ग्रुप में नहीं हैं, तो आपको केवल फीस की भागीदारी मिलता है </li>
	</ul>
	<h3>[ समानुपाती ] [PROPORTIONAL]</h3>
	<p>प्रयोग के प्रारंभ में आप को बताया जाएगा यदि पैसों का विशाल भुगतान प्रकार आनुपातिक है ।</p>
	<p>उदाहरण के लिए: समानुपाती पैसों का विशाल भुगतान के परिणाम में परदे द्वारा ऊपर गणना विभाजित होती है कि आपके संख्या (35) की राशि के द्वारा की संख्या में आपके ग्रुप (35 + 25) । तो आपके 35 पैसों का विशाल भुगतान किया जाएगा/( 35 + 25) *100= 58.</p>
	<h3>[ समान ] [EQUAL]</h3>
	<p>प्रयोग के प्रारंभ में आप को बताया जाएगा यदि पैसों का विशाल भुगतान प्रकार समान है ।</p>
	<p>उदाहरण के लिए: की समान पैसों का विशाल भुगतान का द्वारा गणना की संख्या विभाजक 100 दल के सदस्य हैं । परदे के लिए ऊपर परिणाम, आपके पैसों का विशाल भुगतान किया जाएगा 216 + 25 = 241 50 होगा ।</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page8">
	<h1>भुगतान और मुद्रा रूपांतरण</h1>
	<p>आप का अंतिम भुगतान इस बात पर निर्भर करता है की आप कौनसे देश से है । स्क्रीन पर दिखाई गयी राशी केवल प्रयोग मुद्रा है (C) । प्रत्येक गेम में, प्रायोगिक मुद्रा c100 इकाइयों के बीच का विभाजन विजेताओं के बीच बाटी जाएगी । पैसों का विशाल भुगतान पर निर्भर है आप का भुगतान इस बात पर निर्भर करता है की आप कौनसे देश से है और प्रयोग मुद्रा का आप के देसी मुद्रा के रूपांतरण में जो की नीचे दिया गया है ।</p>

	<table>
		<tr><th>देश</th><th>अ. भा. विदेशी</th><th>खिलाडी शुल्क (में स्थानीय मुद्रा)</th><th>मूल्य में स्थानीय c100 मुद्रा</th></tr>
		<tr><td>अर्जेंटीना</td><td>अर्जेंटीना पेसो</td><td>24.00</td><td>24.00</td></tr>
		<tr><td>ऑस्ट्रेलिया</td><td>ऑस्ट्रेलिया  डोल्लर</td><td>6.00</td><td>6.00</td></tr>
		<tr><td>ब्राज़ील</td><td>ब्राजीलियन रियल</td><td>12.00</td><td>12.00</td></tr>
		<tr><td>कनाडा </td><td>कनाडियन डोल्लर</td><td>5.00</td><td>5.00</td></tr>
		<tr><td>चाइना</td><td>चिनेसे यूँ </td><td>18.00</td><td>18.00</td></tr>
		<tr><td>इंडिया</td><td>इंडियन रूपी </td><td>100.00</td><td>100.00</td></tr>
		<tr><td>इरान</td><td>इरानियन रिअल </td><td>80000.00</td><td>80000.00</td></tr>
		<tr><td>इराक</td><td>इराकी डिनर </td><td>4000.00</td><td>4000.00</td></tr>
		<tr><td>इस्रैल</td><td>इस्रेली न्यू शेकेल </td><td>20.00</td><td>20.00</td></tr>
		<tr><td>जापान</td><td>जपनेसे एन </td><td>380.00</td><td>380.00</td></tr>
		<tr><td>मेक्सिको</td><td>मेक्सिकान पेसो </td><td>40.00</td><td>40.00</td></tr>
		<tr><td>पाकिस्तान</td><td>पाकिस्तानी रूपी</td><td>310.00</td><td>310.00</td></tr>
		<tr><td>फिलिप्पिनेस</td><td>फिलिप्पिने पेसो</td><td>140.00</td><td>140.00</td></tr>
		<tr><td>साउथ अफ्रीका</td><td>साउथ अफ़्रीकां रांड </td><td>24.00</td><td>24.00</td></tr>
		<tr><td>स्पेन</td><td>यूरो </td><td>7.00</td><td>7.00</td></tr>
		<tr><td>थाईलैंड</td><td>थाइ  बहत </td><td>90.00</td><td>90.00</td></tr>
		<tr><td>तुर्की</td><td>तुर्किश लीरा </td><td>10.00</td><td>10.00</td></tr>
		<tr><td>उनितेद स्टातेस </td><td>उनितेद स्टातेस डोल्लर</td><td>5.00</td><td>5.00</td></tr>
		<tr><td>विएतनाम </td><td>विएत्नामेसे दोंग </td><td>40000.00</td><td>40000.00</td></tr>
	</table>

	<p>जैसा कि एक उदाहरण है, यदि किसी खिलाड़ी मैक्सिको से जीते c25 + c50 + c100 + c25 चार मैचों में, उनके वास्तविक लेना-गृह पुरस्कार 25 होगा दर्शाने के लिए स्थापित अघ्याय पेसोस प्लस c200 प्रायोगिक डालर के बराबर है, जो 80 अघ्याय पेसोस । पैसों का विशाल भुगतान के कुल 105 अघ्याय पेसोस होगा ।</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page9">
	<h1>महत्वपूर्ण नोट </h1>
	<p>आप की गति  पुरे प्रयोग के द्वाराण मॉनीटर किया जाता है । यदि आप आपको दिए गए समाये से ज्यादा समाये लेते है तोह आप का निर्णय औतोमातिकाल्ली लिया जायेगा और आप का भुगतान भी कम किया जायेगा । आप को ४५ सेकंड्स निवेदन के लिए, ३० सेकंड्स मतदान के लिए और ३० सेकंड अपने परिणाम को जाचने के लिए दिए जायंगे ।</p>
	<p>अगर आप का स्क्रीन प्रतीत नहीं होता या आप को कोई कास्ट हो रहा हो तोह कृपया अपने ब्रोव्सेर को ताज़ा करे f5 बुट्तों दबा के|</p>
	<h3>हम आप से आप की कोई भी व्यक्तिगत सूचना नहीं लेंगे और आप से ली गयी हर सूचना और कमाई हुई रकम गोपनीय राखी जायगी ।</h3>
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
	});
</script>
<noscript>
<p> For full functionality of this site it is necessary to enable JavaScript.
 Here are the <a href="http://www.enable-javascript.com/" target="_blank">
 instructions on how to enable JavaScript in your web browser</a>.</p>
</noscript>
</body>
</html>