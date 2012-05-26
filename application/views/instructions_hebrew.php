<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><!DOCTYPE html>
<html>
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
	<h3>ברוך הבא ותודה לך על השתתפותך בניסוי זה הכלכלה על קבלת ההחלטות!</h3>
	<p>
	במהלך ניסוי זה תוכלו להשתתף במשימות החלטות שנותנים לך את ההזדמנות להרוויח כסף. כל הרווחים בניסוי הזה יהיה במטבע הבית שלך.
	</p><p>
	ניסוי זה יכלול מספר חלקים. בחלק זה, תתבקש לקבל החלטה מעורבים משתתפים אחרים מכל רחבי העולם שהצטרפו גם את הניסוי. ההחלטה עשויה להשפיע על שוחד של אחרים, בדיוק כמו ההחלטות של האנשים שאתה בהתאמה עם עלול להשפיע על שוחד שלך.
	</p><p>
	הרווחים שלך הם סודיים תקבל הודעה בדוא"ל מהסכום הרווחת. עם סיום הניסוי, ואנו נשלח את התשלום בתוך 24 שעות באמצעות באי באל  או באופן אישי.
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
		<li><strong>אתה תהיה יחד עם שני משתתפים אחרים מכל רחבי העולם.</strong></li>
		<li><strong>כולם יקבלו משקל.</strong></li>
		<li><strong>בכל שלב אנשים להצביע להקים צוות. <br/>
המטרה שלך היא להקים צוות עם המשקל הכולל הגדול ביותר.</strong></li>
		<li><strong>הצוות המנצח יהיה לפצל 100 יחידות מטבע ניסיוניים.</strong></li>
	</ul>
	בכל המסכים הבאים אנו דנים את פרטי המשחק.
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page3">
	<h1>סקירה כללית של הניסוי</h1>
	<p>אתה תהיה יחד עם שני משתתפים אחרים מכל רחבי העולם. זהותם לא תיחשף לך ושלך לא יתגלה להם. כל אחד מכם יקבל משקל (מספר זה הוא סוגר את התג של כל שחקן).סכום המשקולות האלה הוא 100.</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen">
	<p>מטרת המשחק היא ליצור קבוצת הכבד ביותר.קבוצת הכבד ביותר יהיה לפצל 100 יחידות מטבע הניסוי (ג) בין חבריה באמצעות אחד מכללי שיתוף הנדונים להלן (נוסף על דמי השתתפות). המשתתפים שאינם חלק מקבוצה עם המשקל הגדול ביותר להרוויח דבר (למעט דמי השתתפות).</p>
	<p>הניסוי מחולק לשלושה סיבובים. על כל סיבוב, כל שחקן יהיה אחד בתורו כדי להפוך הצעה להקים קבוצה של משתתפים. המשתתפים בקבוצת המוצע לאחר מכן להצביע "כן" או "לא" כדי להחליט אם הקבוצה יהוו. לקבוצות מוצעים רק ליצור אם כל החברים להצביע "כן".</p>
	<p>כאשר שלושה סיבובים עברו, או משתתף חוזר על ההצעה, הניסוי יסתיים ועל המשתתפים בקבוצת הכבד ביותר יתוגמלו בהתאם.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page4">
	<h1>שלב הצעת </h1>
	<p>
	כאשר מגיע התור שלך, תוכל להציע קבוצות או על ידי בחירת תגי המתאימים למשתתפים אחרים (תחת "חברי הקבוצה בחר"), או על ידי לחיצה על אחד מהערכים ברשימה של "קבוצות הצעות". ההצעה כוללת תשלום שלך ואחריו רשימה מלאה של חברי הצעת הקבוצה המתאימה. המלצות אלה מסודרים על ידי התשלום שלך בסדר יורד.
	</p><p>
	ברגע שאתה מרוצה עם ההצעה שלך, לחץ על "אישור הצעה".
	</p><p>
	(ב "ציר הזמן", את התג [2] הוא גבוה כדי לציין תורכם ואת המעגל הראשון מלא (לבן מוצק) כדי לציין את זה עכשיו בסיבוב הראשון. את תשלומי מוצגים באמצעות "C" כסמל עבור יחידות מטבע הניסוי.)
	</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page5">
	<h1>שלב ההצבעה</h1>
	<p>כאשר משתתף הציע לך להצטרף אליהם בקבוצה, תתבקש להצביע לאשר את הקבוצה."קבוצות חלופי" רשימה מאפשרת לך לראות את ההצעה הנוכחית יחד עם כל הקבוצות האחרות אשר היית להיות חבר עם תשלומי המתאימים להשוואה.</p>
	<p>להצביע על ידי לחיצה על "כן" או "לא". אם כל המשתתפים בקבוצה המוצע להצביע "כן", ולאחר מכן הקבוצה תוקם, אחרת הקבוצה לא תוקם.</p>
	<img src="<?php echo base_url();?>img/vote.png" alt="Vote Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page6">
	<h1>שלב תוצאות</h1>
	<p>לאחר משתתף מציעה הקבוצה וכל חברי מצביעים פוטנציאליים, אתה תוצג סקירה של התוצאות. כל שעליך לעשות הוא ללחוץ על "המשך" כדי להמשיך את הניסוי, או לחץ על "תעריפים סקירה", כאשר הניסוי יסתיים.</p>
	<img src="<?php echo base_url();?>img/results.png" alt="Results Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>הסבר על תשלומים</h1>
	<p>ישנם שני סוגים של ניסויים שבהם אתה משתתף, יחסי או שווה.</p>
	<ul>
		<li>אם אתה בקבוצה עם הסכום הגדול ביותר תקבל את דמי ההשתתפות 
			<ul>
				<li>הו הסכום ביחס לתרומה של מספר שלך לסכום של הקבוצה. [זמנית] [PROPORTIONAL]<br/>
					-- או --</li>
				<li>הו הסכום מחולק באופן שווה בין הקבוצה. [שווה] [EQUAL]</li></ul></li>
		<li>אם אתה לא בקבוצה בסכום הגדול ביותר, אתה רק מקבל את דמי ההשתתפות.</li>
	</ul>
	<h3>[זמנית] [PROPORTIONAL]</h3>
	<p>בתחילת הניסוי תהיה אמר אם סוג התשלום הוא יחסי.</p>
	<p>לדוגמה: תשלום יחסי במסך תוצאה מעל מחושב על ידי חלוקת המספר שלך (35) בסכום של המספרים בקבוצה שלך (35 + 25). כלומר, התשלום שלך יהיה [35 / (35 +25)]*100 = 58.</p>
	<h3>[שווה] [EQUAL]</h3>
	<p>בתחילת הניסוי תהיה אמר אם סוג התשלום שווה.</p>
	<p>לדוגמה: תשלום שווה מחושב על ידי חלוקת 100 במספר חברי הקבוצה. על המסך את התוצאה לעיל, התשלום שלך יהיה 100/2 = 50.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page8">
	<h1>התשלומים מחשבון המרת מטבעות</h1>
	<p>התשלום הסופי תלוי במדינה אתה משתתף מ. הסכום המוצג במסך היא על המטבע ניסיוני (C). בכל משחק, C100 יחידות של מטבע ניסיוני מפוצלות בין הזוכים. התשלום שלך בהתאם למדינה אתה ממנו את הפרטים של איך להמיר דולרים ניסויים לתוך הכסף בפועל למדינה שלך ניתנות בטבלה בסעיף הבא. </p>

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

	<p>לדוגמא, אם שחקן ממקסיקו ניצחונות C25 + C50 + C25 + C100 בארבעה משחקים, לקחת הביתה את הפרס האמיתי יהיה 25 פזו מקסיקני שבאת פלוס C200 דולר הניסוי, אשר שווה 80 פזו מקסיקני. התשלום הכולל של 105 פזו מקסיקני.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page9">
	<h1>הערות חשובות</h1>
	<p>הקצב שלך לאורך כל הניסוי מנוטר. אם אתה לוקח זמן רב יותר מאשר בזמן המוקצב, התור שלך יהיה אוטומטי על ידי קבלת החלטה באופן אקראי ואתה התשלום יופחת בהתאם. תינתן לך 45 שניות להציע, 30 שניות זכות הצבעה, ו -30 שניות כדי לבדוק את התוצאות.</p>
	<p>אם המסך אינו מופיע לעדכן, או שאתה מאמין נתקלת בטעות, אנא רענן את הדפדפן. ניתן להשיג זאת על ידי לחיצה על מקש F5.</p>
	<h3>איננו אוספים מידע המאפשר זיהוי אישי. כל המידע שנאסף, לרבות הרווחים שלך, ישמרו בסוד.</h3>
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