<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><!DOCTYPE html>
<html dir="rtl">
<head>
	<title>Experiment Instructions</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Language" content="he">
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
		body{font-family:'Ezra SIL SR', 'Taamey Frank CLM', 'Taamey David CLM', 'Keter YG', 'Keter Aram Sova', 'Ezra SIL', 'Cardo', serif;}
	</style>
</head>
<body>
<div class="section" id="page1">
	<h3>ברוך הבא ותודה על השתתפותך בניסוי כלכלי זה בנושא קבלת החלטות!</h3>
	<p>
	במהלך הניסוי תוכל להשתתף במשימות הכוללות החלטות אשר מהוות הזדמנות להרוויח כסף. כל הרווחים בניסוי זה ישולמו במטבע שאתה משתמש בו, במקרה זה- שקל.
	</p><p>
	ניסוי זה יכלול מספר חלקים. בחלק זה, תתבקש לקבל החלטה המערבת משתתפים אחרים מכל רחבי העולם שהצטרפו ומשתתפים גם כן בניסוי. ההחלטה שלך יכולה להשפיע על התשלום שמקבלים אחרים, בדיוק כמו שההחלטות של האנשים שאתה משובץ עמם משפיעות על תוצאת התשלום (הרווח) שלך. 
	</p><p>
	הרווחים שלך בניסוי זה סודיים לחלוטין והודעה על גובה הרווח (התשלום) שלך תתקבל בדוא"ל. עם סיום הניסוי נעביר לך את הכסף תוך 24 שעות באופן אישי (דרך צוות המעבדה לכלכלה ניסויית באוניברסיטת בן-גוריון).
	</p>
	<button class="next">Next</button>
	<br/>
	<a class="image-link" href="<?php echo site_url('site/instructions_chinese'); ?>"><img src="<?php echo base_url(); ?>img/chinese.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions'); ?>"><img src="<?php echo base_url(); ?>img/english.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_filipino'); ?>"><img src="<?php echo base_url(); ?>img/filipino.png"/></a>
	<a class="image-link selected" href="<?php echo site_url('site/instructions_hebrew'); ?>"><img src="<?php echo base_url(); ?>img/hebrew.png"/></a>
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
	<h1>סקירה כללית של הניסוי</h1>
	<ul>
		<li><strong>את/ה תצטוות לשני משתתפים אחרים מרחבי העולם.</strong></li>
		<li><strong>כל אחד יקבל משקל מסוים.</strong></li>
		<li><strong>בכל שלב אנשים יצביעו על מנת לקבוע צוות.<br/>
המטרה שלך לקבוע צוות עם המשקל הכולל הגדול ביותר</strong></li>
		<li><strong>הקבוצה המנצחת תתחלק  ב-100 יחידות מטבע של הניסוי.</strong></li>
	</ul>
	במסכים הבאים נדון בפרטי המשחק/ניסוי 
	<button class="prev">הקודם</button><button class="next">הבא</button>
</div>

<div class="section" id="page3">
	<h1>סקירה כללית של הניסוי (הרחבה)</h1>
	<p>את/ה תצטוות עם שני משתתפים מרחבי העולם.זהותם של המשתתפים לא תיחשף לך ושלך לא תתגלה להם. כל אחד מכם יקבל משקל (מספר זה,המשקל,מוצג בסוגריים של כל שחקן).              סך כל המשקולות יחד הוא 100.</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen">
	<p>מטרת המשחק היא ליצור קבוצה עם משקל כולל גדול ביותר. הקבוצה עם המשקל הכולל הגדול ביותר, המנצחת, תתחלק ב-100 יחידות מטבע של הניסוי (C) באמצעות אחד מהכללים להלן (בנוסף לדמי ההשתתפות בניסוי). המשתתפים שאינם חלק מהקבוצה עם המשקל הכולל הגדול ביותר (המנצחת)  לא ירוויחו דבר (למעט דמי ההשתתפות בניסוי).</p>
	<p>הניסוי מחולק לשלושה סיבובים. בכל סיבוב, לכל שחקן תהיה אפשרות אחת להציע הצעה לקבוצה. המשתתפים בקבוצה המוצעת יצביעו "כן" או "לא" על מנת להחליט האם הקבוצה תתהווה או לא. קבוצות יתהוו אך ורק אם כל חברי הקבוצה בחרו "כן".</p>
	<p>כאשר 3 סיבובים יחלפו או שמשתתף יחזור על ההצעה, הניסוי יסתיים וחברי הקבוצה עם המשקל הכולל הגדול ביותר יתוגמלו בהתאם.  </p>
	<button class="prev">הקודם</button><button class="next">הבא</button>
</div>

<div class="section" id="page4">
	<h1>שלב ההצעה</h1>
	<p>
	כאשר יגיע תורך, תוכל להציע קבוצות או על ידי בחירת התגים המתאימים למשתתפים האחרים (תחת "בחר חברי קבוצה"), או על ידי לחיצה על אחד מהערכים ברשימה " קבוצות מוצעות".          כל אחת מההצעות כולל התשלום שלך, מלווה ברישום מלא של הצעות חברי הקבוצה המקבילות. הצעות אלו מסודרות לפי התשלום שלך בסדר יורד.
	</p><p>
	ברגע שאתה מרוצה מההצעה שלך, לחץ  על לחצן " אשר הצעה".
	</p><p>
	ב"ציר הזמן", התג שלך  [2] יהיה גבוה יותר כדי לציין שמדובר בתורך, והמעגל הראשון יתמלא (בצבע לבן אטום) כדי לציין כי אתה בסיבוב הראשון. התשלומים מוצגים על ידי סמל "C" – המטבע של הניסוי.
	</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<button class="prev">הקודם</button><button class="next">הבא</button>
</div>

<div class="section" id="page5">
	<h1>שלב ההצבעה</h1>
	<p>כאשר משתתף הציע לך להצטרף לקבוצה שלו, אתה תתבקש להצביע על מנת לאשר את הקבוצה. רשימת ה"קבוצות החלופיות" מאפשרת לך לראות את ההצעות הנוכחיות יחד עם כל הקבוצות האחרות אשר אתה יכול להיות חבר בהן במקביל לתשלומים לשם השוואה.</p>
	<p>הצבע על ידי לחיצה על "כן" או "לא". אם כל המשתתפים בקבוצה המוצעת יצביעו "כן", אזי הקבוצה הזו תתהווה/תוקם, אחרת הקבוצה לא תתהווה/תוקם.</p>
	<img src="<?php echo base_url();?>img/vote.png" alt="Vote Screen"><br/>
	<button class="prev">הקודם</button><button class="next">הבא</button>
</div>

<div class="section" id="page6">
	<h1>שלב התוצאות</h1>
	<p>אחרי שהמשתתף הציע קבוצה וכל המשתתפים הפוטנציאליים הצביעו, את/ה  תוכל/י לראות את סקירת התוצאות. כל שעליך לעשות הוא ללחוץ על "המשך" כדי להמשיך את הניסוי, או  לחץ "בדיקת התשלום" כאשר הניסוי הסתיים.</p>
	<img src="<?php echo base_url();?>img/results.png" alt="Results Screen"><br/>
	<button class="prev">הקודם</button><button class="next">הבא</button>
</div>

<div class="section" id="page7">
	<h1>הסבר על התשלומים</h1>
	<p>ישנם שני סוגים של ניסויים שבהם אתה משתתף, פרופורציונלי או שווה:</p>
	<ul>
		<li>אם אתה בקבוצה עם המשקל הכולל הגדול ביותר תקבל את דמי ההשתתפות יחד עם:      
			<ul>
				<li>הסכום ביחס לתרומה של המספר שלך למשקל הכולל של הקבוצה [פרופורציונלי].<br/>
					 או, </li>
				<li>הסכום יחולק באופן שווה בין הקבוצה [שווה].</li></ul></li>
		<li>אם אתה לא בקבוצה עם המשקל הכולל הגדול ביותר, אתה תקבל רק את דמי ההשתתפות.</li>
	</ul>
	<h3>[פרופרציונלי/יחסי]</h3>
	<p>בתחילת הניסוי יאמרו לך אם סוג התשלום יהיה בשיטת הפרופורציוני (יחסי). </p>
	<p>לדוגמה: התשלום היחסי בתוצאה הבאה מחושב על פי חלוקת המשקל שלך (35) בסך כל המשקל בקבוצה שלך (35+25), ואז מוכפל ב-100. אם כך, התשלום שלך יהיה [35/(35+25)]*100 = 58.</p>
	<h3>[שווה]</h3>
	<p>בתחילת הניסוי יאמרו לך האם התשלום יהיה בשיטת השווה.</p>
	<p>לדוגמה: התשלום השווה יחושב על ידי חלוקת 100 במספרי חברי הקבוצה.לתוצאה לעיל שעל המסך, התשלום שלך יהיה 100/2 = 50.</p>
	<button class="prev">הקודם</button><button class="next">הבא</button>
</div>

<div class="section" id="page8">
	<h1>תשלומים והמרת מטבעות </h1>
	<p>התשלום הסופי תלוי במדינה אתה משתתף מ. הסכום המוצג במסך היא על המטבע ניסיוני (C). בכל משחק, C100 יחידות של מטבע ניסיוני מפוצלות בין הזוכים. התשלום שלך בהתאם למדינה אתה ממנו את הפרטים של איך להמיר דולרים ניסויים לתוך הכסף בפועל למדינה שלך ניתנות בטבלה בסעיף הבא.</p>

	<table>
		<tr><th>מדינה</th><th>מטבע</th><th>דמי השתתפות (במטבע מקומי)</th><th>הערך של<br/>
C100<br/>
במטבע מקומי</th></tr>
		<tr><td>ארגנטינה</td><td>פזו ארגנטינאי</td><td>24.00</td><td>24.00</td></tr>
		<tr><td>אוסטרליה</td><td>דולר אוסטרלי</td><td>6.00</td><td>6.00</td></tr>
		<tr><td>ברזיל</td><td>ריאל ברזילאי</td><td>12.00</td><td>12.00</td></tr>
		<tr><td>קנדה</td><td>דולר קנדי</td><td>5.00</td><td>5.00</td></tr>
		<tr><td>סין</td><td>יואן סיני</td><td>18.00</td><td>18.00</td></tr>
		<tr><td>הודו</td><td>רופי הודית</td><td>100.00</td><td>100.00</td></tr>
		<tr><td>אירן</td><td>ריאל איראני</td><td>80000.00</td><td>80000.00</td></tr>
		<tr><td>עיראק</td><td>דינר עיראקי</td><td>4000.00</td><td>4000.00</td></tr>
		<tr><td>ישראל</td><td>שקל ישראלי חדש</td><td>20.00</td><td>20.00</td></tr>
		<tr><td>יפן</td><td>ין יפני</td><td>380.00</td><td>380.00</td></tr>
		<tr><td>מקסיקו</td><td>פזו מקסיקני</td><td>40.00</td><td>40.00</td></tr>
		<tr><td>פקיסטן</td><td>פקיסטן רופי</td><td>310.00</td><td>310.00</td></tr>
		<tr><td>הפיליפינים</td><td>פזו פיליפיני</td><td>140.00</td><td>140.00</td></tr>
		<tr><td>דרום אפריקה</td><td>ראנד דרום אפריקאי</td><td>24.00</td><td>24.00</td></tr>
		<tr><td>ספרד</td><td>יורו</td><td>7.00</td><td>7.00</td></tr>
		<tr><td>תאילנד</td><td>בהט תאילנדי</td><td>90.00</td><td>90.00</td></tr>
		<tr><td>טורקיה</td><td>לירה טורקית חדשה</td><td>10.00</td><td>10.00</td></tr>
		<tr><td>ארצות הברית</td><td>דולר אמריקני</td><td>5.00</td><td>5.00</td></tr>
		<tr><td>וייטנאם</td><td>דונג וייטנאמי</td><td>40000.00</td><td>40000.00</td></tr>
	</table>

	<p>לדוגמא, אם שחקן ממקסיקו ניצח C25 + C50+ C100 + C25 בארבעה משחקים, הוא בעצם לקח הביתה פרס אמיתי בשווי של 25 פזו מקסיקני על השתתפות, פלוס C200 דולר ניסויים, שר שווים 80 פזו מקסיקני. התשלום הכולל הוא 105 פזו מקסיקני.</p>
	<button class="prev">הקודם</button><button class="next">הבא</button>
</div>

<div class="section" id="page9">
	<h1>הערות חשובות</h1>
	<p>הקצב שלך לאורך כל הניסוי מנוטר. אם לוקח לך יותר מהזמן המוקצב התור שלך יהיה אוטומטי על ידי קבלת החלטה באופן אקראי והתשלום שלך יופחת בהתאם. תינתן לך 45 שניות להציע, 30 שניות להצבעה ו-30 שניות כדי לבדוק את התוצאות.</p>
	<p>אם המסך לא מעדכן, או שאתה מאמין שנתקלת בבעיה (error), אנא רענן את הדפדפן (עשה refresh). ניתן לבצע זאת על ידי לחיצה על מקש F5. </p>
	<h3>איננו אוספים מידע המאפשר זיהוי אישי. כל המידע שנאסף, לרבות הרווחים שלך, ישמרו בסוד. </h3>
	<button class="prev">הקודם</button><?php echo anchor('site/complete_instructions','קראתי והבנתי את ההוראות.'); ?>
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