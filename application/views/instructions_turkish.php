<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
ini_set('default_charset', 'iso-8859-9'); ?><!DOCTYPE html>
<html>
<head>
	<title>Experiment Instructions - Turkish</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9"/>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1254"/>
	<meta http-equiv="Content-Language" content="TR"/>
	<meta http-equiv="Content-Language" content="tr, turkish, türkçe"/>
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
	<h3>Hoş geldiniz! Karar verme ile ilgili olarak hazırlanan bu ekonomi deneyine katıldığınız için teşekkür ederiz!</h3>
	<p>
	Bu deney süresince, size para kazanma şansı sunan, karar verme görevlerine katılım göstereceksiniz. Bu deneyden kazandığınız tüm kazançlar size kendi para biriminizde ödenecektir. 
	</p><p>
	Bu deney birkaç bölümden oluşmaktadır. Her bölümde, dünyanın farklı yerlerinden deneye katılan diğer kişileri ilgilendiren kararlar vermeniz istenecektir. Sizin vereceğiniz kararların, diğerlerinin alacağı ödeme miktarını etkileyebileceği gibi, sizinle eşleşen diğer insanların kararları da sizin alacağınızı ödemeyi etkileyebilecektir. 
	</p><p>
	Kazançlarınız gizlidir ve kazandığınız miktarla ilgili olarak e-posta aracılığıyla bilgilendirileceksiniz. Deneyin tamamlanmasını takip eden 24 saat içerisinde, ödemenizi Paypal aracılığıyla ya da direk olarak size ulaştıracağız.
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
	<a class="image-link" href="<?php echo site_url('site/instructions_thai'); ?>"><img src="<?php echo base_url(); ?>img/thai.png"/></a>
	<a class="image-link selected" href="<?php echo site_url('site/instructions_turkish'); ?>"><img src="<?php echo base_url(); ?>img/turkish.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_urdu'); ?>"><img src="<?php echo base_url(); ?>img/urdu.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_vietnamese'); ?>"><img src="<?php echo base_url(); ?>img/vietnamese.png"/></a>
</div>

<div class="section" id="page2">
	<h1>Deneye Genel Bakış</h1>
	<p>Dünyanın farklı yerlerindeki katılımcılardan iki tanesi ile eşleştirileceksiniz. Eşleştirildiğiniz kişilerin kimlikleri size, sizin kimliğiniz de onlara açıklanmayacaktır. Her birinize belirli ağırlıklar verilecektir (Bu sayı kullanıcı rozetinizde parantez içinde belirtilecektir). Bu ağırlıkların toplamı 100 olacaktır.</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen">
	<p>Oyunun amacı, en büyük  ağırlığa sahip grubu oluşturmaktır. En büyük ağırlığa sahip grubun üyeleri, 100 birim deney parasını (C) aralarında, aşağıda belirtilen kurallar doğrultusunda paylaşacaklardır (katılım bonusuna ek olarak). En büyük ağırlığa sahip grubun üyesi olmayan katılımcılar (Katılım bonusu hariç) herhangi bir ödül kazanamayacaktır. Katılım bonusu 5 amerikan dolarıdır.</p>
	<p>Deney üç farklı raunda bölünmüştür. Her rauntta, her oyuncunun bir grup oluşturmak için katılımcılara teklifini sunacağı bir hakkı olacaktır. Teklif sunulan gruptaki katılımcılar, grubun oluşması konusundaki oylarını “Evet” ya da “Hayır” şeklinde kullanacaklardır. Teklif edilen grupların oluşması ancak tüm üyelerin “Evet” demesi ile mümkün olacaktır.</p>
	<p>Üç raunt tamamlandığında ya da bir katılımcı teklifini tekrarladığında deney sona erecek ve en büyük ağırlığa sahip gruptaki katılımcılar ödüllendirilecektir.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page3">
	<h1>Teklif Aşaması</h1>
	<p>
	Sıranız geldiğinde, diğer katılımcılara ait rozetleri seçerek (“Grup Üyelerini Seçiniz” altında) ya da “Önerilen Gruplar” listesindeki maddelere tıklayarak grup kurma teklifinizi sunabilirsiniz. Her öneride, grup teklifindeki üyelerin tam listesi ile birlikte sizin alabileceğiniz ödeme de görüntülenmektedir. Öneriler, alabileceğiniz ödemeye göre azalan sıra ile listelenmiştir. 
	</p><p>
	Teklifinizin uygunluğundan emin olduğunuzda, “Teklifi Onayla” butonuna tıklayın. 
	</p><p>
	(Sıra size geldiğinde "Zaman Çizelgesi" üzerinde, sizin rozetiniz [2] daha büyük görünecektir ve mevcut raundun ilk olduğunu göstermek için, ilk çember (beyaz ile) dolacaktır. Ödemeler, deneyin para birimi olan “C” sembolü ile gösterilecektir. Daha detaylı bilgi için lütfen http://www.wispt.com/pando/index.php?/site/instructions adresine gidin)
	</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page4">
	<h1>Oylama Aşaması</h1>
	<p>Bir katılımcı size onun grubuna katılmanız konusunda teklif sunduğunda, grubu onaylamak için oyunuz sorulacaktır. “Diğer Gruplar” listesi, sizin mevcut teklifinizi, üyesi olabileceğiniz diğer gruplardan gelen teklifler ile kıyaslamanızı sağlayacaktır.</p>
	<p>“Evet” ya da “Hayır” butonlarına tıklayarak oyunuzu kullanın. Teklif sunulan gruptaki tüm katılımcılar “Evet” derlerse grup oluşturulacaktır, aksi halde grup oluşturulmayacaktır.</p>
	<img src="<?php echo base_url();?>img/vote.png" alt="Vote Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page5">
	<h1>Sonuç Aşaması</h1>
	<p>Bir katılımcı, bir gruba teklif sunduktan sonra, tüm potansiyel üyeler oylarını kullanacak ve siz sonuçların bir özetini göreceksiniz. Deneye devam etmek için “Devam” butonuna tıklayın. Eğer deney tamamlandıysa “Ödemeye Gözat” butonuna tıklayın.</p>
	<img src="<?php echo base_url();?>img/results.png" alt="Results Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page6">
	<h1>Ödeme Açıklamaları</h1>
	<p>Katılacağınız iki çeşit deney vardır, PROPORTIONAL ya da EQUAL.</p>
	<ul>
		<li>Eğer en büyük toplam ağırlığa sahip gruptaysanız, katılım bonusu ve 
			<ul>
				<li>grup toplamının kendi numaranız oranındaki kısmı ile [PROPORTIONAL]<br/>
					-- ya da  --</li>
				<li>grup arasında eşit olarak paylaştırılan miktar ile [EQUAL] ödüllendirileceksiniz.
</li></ul></li>
		<li>Eğer en en büyük toplam ağırlığa sahip grupta DEĞİLSENİZ, SADECE katılım bonusunu alacaksınız.</li>
	</ul>
	<h3>[PROPORTIONAL]</h3>
	<p>Deneyin başında, ödeme şeklinin PROPORTIONAL olduğu konusunda bilgilendirileceksiniz.</p>
	<p>Örnek: Yukarıdaki sonuç ekranında PROPORTIONAL ödeme miktarı, sizin numaranızın (35), grubunuzdaki diğer numaraların toplamına (35+25) bölünmesi ile elde edilecektir. Bu durumda, sizin ödeme miktarınız (35/(35+25))100 = 58 olacaktır.</p>
	<h3>[EQUAL]</h3>
	<p>Deneyin başında, ödeme şeklinin EQUAL olduğu konusunda bilgilendirileceksiniz.</p>
	<p>Örnek: EQUAL ödeme miktarı, 100’ün gruptaki kullanıcı sayısına bölünmesi ile elde edilecektir. Yukarıdaki sonuç ekranında ödeme miktarınız 100/2 = 50 olacaktır.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>Ödeme ve Para Birimi Dönüştürme</h1>
	<p>Son durumda alacağınız ödeme, hangi ülkeden katıldığınıza bağlı olarak değişecektir. Ekranda görünen miktarlar deney para birimi (C) olacaktır. Her oyunda, C100 birim deney parası, kazananlar arasında paylaştırılacaktır. Ödemeniz, hangi ülkeden katıldığınıza bağlı olarak değişecektir. Sonraki bölümde, deney para birimini ülkenizin para birimine nasıl çevireceğiniz konusundaki detayları bulabilirsiniz.</p>

	<table>
		<tr><th>Ülke</th><th>Para Birimi</th><th>Katılım  Bonusu (yerel para birimi)</th><th>C100’ün karşılık gelen değeri</th></tr>
		<tr><td>Arjantin</td><td>Arjantin Pesosu</td><td>14.00</td><td>24.00</td></tr>
		<tr><td>Avusturalya</td><td>Avusturalya Doları</td><td>3.50</td><td>6.00</td></tr>
		<tr><td>Brezilya</td><td>Brezilya Reali</td><td>7.00</td><td>12.00</td></tr>
		<tr><td>Kanada</td><td>Kanada Doları</td><td>3.00</td><td>5.00</td></tr>
		<tr><td>Çin</td><td>Çin Yuanı</td><td>11.00</td><td>18.00</td></tr>
		<tr><td>Hindistan</td><td>Hindistan Rupisi</td><td>60.00</td><td>100.00</td></tr>
		<tr><td>İran</td><td>İran Riyali</td><td>14000.00</td><td>24600.00</td></tr>
		<tr><td>Irak</td><td>Irak Dinarı</td><td>2400.00</td><td>4000.00</td></tr>
		<tr><td>İsrail</td><td>İsrail Yeni Şekeli</td><td>11.00</td><td>19.00</td></tr>
		<tr><td>Japonya</td><td>Yapon Yeni</td><td>230.00</td><td>380.00</td></tr>
		<tr><td>Meksika</td><td>Meksika Pezosu</td><td>25.00</td><td>40.00</td></tr>
		<tr><td>Pakistan</td><td>Pakistan Rupisi</td><td>180.00</td><td>310.00</td></tr>
		<tr><td>Filipinler</td><td>Filipin Pezosu</td><td>85.00</td><td>140.00</td></tr>
		<tr><td>Güney Afrika</td><td>Güney Afrika Randı</td><td>14.00</td><td>24.00</td></tr>
		<tr><td>İspanya</td><td>Euro</td><td>4.00</td><td>7.00</td></tr>
		<tr><td>Tayland</td><td>Tayland Bahtı</td><td>55.00</td><td>90.00</td></tr>
		<tr><td>Türkiye</td><td>Türk Lirası</td><td>4.50</td><td>8.00</td></tr>
		<tr><td>Birleşik Devletler</td><td>Amerikan Doları</td><td>3.00</td><td>5.00</td></tr>
		<tr><td>Vietnam</td><td>Vietnam Dongu</td><td>23000.00</td><td>40000.00</td></tr>
	</table>

	<p>Örneğin, Meksika’dan bir oyuncu, dört oyun sonunda C25 + C52 + C100 + C25 kadar kazanç elde ederse, gerçek kazanç toplamı, katılım bonusu olan 25 Meksika Pezosu ve değeri 80 Meksika Pezosu olan C200 deney parası olacaktır. Toplam ödeme 105 Meksika Pezosu olacaktır.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>Önemli Notlar</h1>
	<p>Deney boyunca adımlarınız izlenecektir. Eğer size ayrılan süreden daha fazla beklerseniz, sizin adınıza otomatik olarak rastgele bir seçim yapılacak ve bunun sonucu olarak alacağınız ödeme azalacaktır. 45 saniye teklif sunma süreniz, 30 saniye oylama süreniz ve 30 saniye sonuçları görüntüleme süreniz olacaktır.</p>
	<p>Eğer ekran güncellenmezse ya da bir sorun yaşadığınızı düşünürseniz, lütfen tarayıcınız aracılığıyla sayfayı yeniden yükleyin. Bu işlemi F5 tuşuna basarak yapabilirsiniz.</p>
	<h3>KİŞİSEL BİLGİLERİNİZİ SAKLAMAYACAĞIZ. KAZANÇLARINIZ DAHİL TOPLANAN HER TÜRLÜ BİLGİ GİZLİ TUTULACAKTIR.</h3>
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