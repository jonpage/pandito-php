<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
ini_set('default_charset', 'euc-jp');?><!DOCTYPE html>
<html>
<head>
	<title>Experiment Instructions</title>
	<meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
	<meta http-equiv="Content-Language" content="jp">
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
	<h3>歓迎し、意思決定には、この経済学の実験に参加いただきありがとうございました！</h3>
	<p>
	この実験中にあなたがお金を稼ぐ機会を与える意思決定の作業に参加します。この実験ではすべての利益はあなたの自国通貨になります。
	</p><p>
	この実験は、いくつかの部分で構成されています。それぞれの部分では、あなたも実験に参加している世界中の他の参加者を決定するように求められます。あなたの決定はあなたがと一致している者の決定はあなたの利得に影響を与える可能性があり同じように、他人の利得に影響を与える可能性があります。
	</p><p>
	あなたの利益は機密であり、あなたはあなたが稼いだ金額の電子メールで通知されます。実験が完了すると、我々はPaypalを介して、または人で24時間以内にお支払いをお送りいたします。
	</p>
	<button class="next">Next</button>
	<br/>
	<a class="image-link" href="<?php echo site_url('site/instructions_chinese'); ?>"><img src="<?php echo base_url(); ?>img/chinese.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions'); ?>"><img src="<?php echo base_url(); ?>img/english.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_filipino'); ?>"><img src="<?php echo base_url(); ?>img/filipino.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_hebrew'); ?>"><img src="<?php echo base_url(); ?>img/hebrew.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_hindi'); ?>"><img src="<?php echo base_url(); ?>img/hindi.png"/></a>
	<a class="image-link selected" href="<?php echo site_url('site/instructions_japanese'); ?>"><img src="<?php echo base_url(); ?>img/japanese.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_persian'); ?>"><img src="<?php echo base_url(); ?>img/persian.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_spanish'); ?>"><img src="<?php echo base_url(); ?>img/spanish.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_thai'); ?>"><img src="<?php echo base_url(); ?>img/thai.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_turkish'); ?>"><img src="<?php echo base_url(); ?>img/turkish.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_urdu'); ?>"><img src="<?php echo base_url(); ?>img/urdu.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_vietnamese'); ?>"><img src="<?php echo base_url(); ?>img/vietnamese.png"/></a>
</div>

<div class="section" id="page2">
	<h1>実験の概要</h1>
	<p>あなたは、世界中から2他の参加者とペアにされます。彼らのアイデンティティがあなたに明らかにされず、あなたはそれらに明らかにされることはありません。あなたの各々は（この数は、各プレイヤーのバッジで括弧内にある）の重量を与えられます。これらの重みの合計は100です。</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen">
	<p>ゲームの目的は、最も重いグループを形成することである。重いグループには、以下に説明する共有ルールのいずれかを使用して、そのメンバーの間に100の実験の通貨単位（C）（参加費に加えて）分割されます。最大の重みを持つグループの一部ではありません参加者（参加料を除く）は何を得るん。</p>
	<p>実験は3ラウンドに分かれています。すべてのラウンドで、各プレイヤーは参加者のグループを形成するための提案を作るために1ターン必要があります。提案されたグループの参加者は、そのグループが形成されるかどうかを決定するために "Yes"または "いいえ"に投票します。すべてのメンバーが "はい"を投票の場合提案されたグループにのみ形成されます。</p>
	<p>3ラウンドが経過した、または参加者が提案を繰り返したときに、実験が終了し、最も重いグループの参加者はそれに応じて報われる。</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page3">
	<h1>提案段階</h1>
	<p>
	それはあなたのターンのときは、どちらかの他の参加者（ "選択グループメンバー"の下）に対応するバッジを選択するか、 "推奨されるグループ"のリスト内のエントリのいずれかをクリックして、グループを提案することができるようになります。各提案は、対応するグループの提案のメンバーの完全なリストは、続いてあなたの支払いが含まれています。これらの提案は降順で、ペイアウトでソートされています。 
	</p><p>
	あなたがあなたの提案に満足していたら、 "提案内容を確認"をクリックしてください。 
	</p><p>
	（ "タイムライン"には、バッジ[2]それはあなたのターンの最初のサークルは、それが現在、最初のラウンドであることを示すために（白）充填されているであることを示すために背が高い。ペイアウトは、シンボルとして "C"を使用して表示されます。実験的な通貨単位の）。 
	</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page4">
	<h1>投票ステージ</h1>
	<p>あなたがグループにそれらを結合するために参加者が提案したときには、グループを承認する投票するように求められます。"代替グループ"リストは、あなたが比較のためにそれらに対応するペイアウトを持つメンバーとなり、そのうち、他のすべてのグループと一緒に現在の提案を見ることができます。</p>
	<p>"Yes"または "いいえ"をクリックして投票。提案されたグループ内のすべての参加者が "はい"に投票した場合、そのグループが、それ以外のグループが形成されず、形成される。</p>
	<img src="<?php echo base_url();?>img/vote.png" alt="Vote Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page5">
	<h1>結果ステージ</h1>
	<p>参加者がグループを提案し、すべての潜在的なメンバーが投票した後は、結果の概要を表示されます。単に実験を続行するには "Continue"を押すか、実験が終わったときに "レビューペイアウト"を押します。</p>
	<img src="<?php echo base_url();?>img/results.png" alt="Results Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page6">
	<h1>ペイアウトの説明</h1>
	<p>比例またはEQUALあなたが参加する実験の2つのタイプがあります。</p>
	<ul>
		<li>あなたが最大の合計とグループにある場合には、参加費が与えられると 
			<ul>
				<li>グループの合計にあなたの番号の貢献に比例して金額。[比例] [PROPORTIONAL]<br/>
					-- または --</li>
				<li>量が均等にグループ間で分かれています。[EQUAL]</li></ul></li>
		<li>あなたが最大の合計のグループ内に存在しない場合は、ONLY参加費を受け取ることになります。</li>
	</ul>
	<h3>[比例]</h3>
	<p>支払いタイプが比例している場合、実験の開始時にあなたが言われる。</p>
	<p>例：上記の結果画面で比例支払いは、グループ内の数字の和（35 + 25）電話番号（35）で割って算出されています。つまり、あなたのペイアウトは[35 /（35 +25）]*100= 58となります。</p>
	<h3>[EQUAL]</h3>
	<p>支払いタイプが等しい場合、実験の開始時にあなたが言われる。</p>
	<p>例：EQUAL支払いは、グループメンバーの数が100を割ることによって計算されます。上記の結果画面については、ペイアウトは100/2 = 50となります。</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>お支払い方法と通貨変換</h1>
<p>あなたの最終的な支払はあなたから参加している国によって異なります。画面に表示される量は、実験的な通貨（C）にあります。すべてのゲームでは、実験的な通貨のC100ユニットは勝者の間で分割されます。お支払いは、あなたからは、国に依存しており、自国で実際のお金に実験的なドルを変換する方法の詳細については、次のセクションで表に記載されています。</p>
<table>
	<tr><th>国</th><th>通貨</th><th>Particiption料金（現地通貨）</th><th>現地通貨でC100の値</th></tr>
	<tr><td>アルゼンチン</td><td>アルゼンチンペソ</td><td>14.00</td><td>24.00</td></tr>
	<tr><td>オーストラリア</td><td>豪ドル</td><td>3.50</td><td>6.00</td></tr>
	<tr><td>ブラジル</td><td>ブラジルレアル</td><td>7.00</td><td>12.00</td></tr>
	<tr><td>カナダ</td><td>カナダドル</td><td>3.00</td><td>5.00</td></tr>
	<tr><td>中国</td><td>中国元</td><td>11.00</td><td>18.00</td></tr>
	<tr><td>インド</td><td>インドルピー</td><td>60.00</td><td>100.00</td></tr>
	<tr><td>イラン</td><td>イランリアル</td><td>14000.00</td><td>24600.00</td></tr>
	<tr><td>イラク</td><td>イラクディナール</td><td>2400.00</td><td>4000.00</td></tr>
	<tr><td>イスラエル</td><td>イスラエルの新しいシケル</td><td>11.00</td><td>19.00</td></tr>
	<tr><td>日本</td><td>日本円</td><td>230.00</td><td>380.00</td></tr>
	<tr><td>メキシコ</td><td>メキシコペソ</td><td>25.00</td><td>40.00</td></tr>
	<tr><td>パキスタン</td><td>パキスタンルピー</td><td>180.00</td><td>310.00</td></tr>
	<tr><td>フィリピン</td><td>フィリピンペソ</td><td>85.00</td><td>140.00</td></tr>
	<tr><td>南アフリカ</td><td>南アフリカランド</td><td>14.00</td><td>24.00</td></tr>
	<tr><td>スペイン</td><td>ユーロ</td><td>4.00</td><td>7.00</td></tr>
	<tr><td>タイ</td><td>タイバーツ</td><td>55.00</td><td>90.00</td></tr>
	<tr><td>トルコ</td><td>トルコリラ</td><td>4.50</td><td>8.00</td></tr>
	<tr><td>米国</td><td>米ドル</td><td>3.00</td><td>5.00</td></tr>
	<tr><td>ベトナム</td><td>ベトナムドン</td><td>23000.00</td><td>40000.00</td></tr>
</table>	
<p>4試合でメキシコ勝からプレーヤーC25 + C50 + C100 + C25の場合の例として、彼の実際の手取り賞は、最大表示に加え、80メキシコペソに等しいC200実験的なドルの25メキシコペソとなります。105メキシコペソの合計ペイアウト。</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>重要な注意事項</h1>
	<p>実験を通して自分のペースが監視されます。あなたが割り当てられた時間より長くかかる場合には、あなたのターンはランダムに決定することによって自動化され、あなた支払いはそれに応じて削減されます。あなたは結果を確認することを提案するために45秒、投票する30秒、30秒が与えられます。</p>
	<p>画面が更新して表示されないか、あなたはエラーが発生していると思われる場合は、ブラウザを更新してください。これは、F5キーを押すことによって達成することができます。</p>
	<h3>当社は、個人を特定できる情報を収集することはありません。、あなたの収入を含め、収集したすべての情報の機密は守られます。</h3>
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