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
	<h3>ยินดีต้อนรับและขอขอบคุณสำหรับการมีส่วนร่วมในการทดลองนี้เศรษฐศาสตร์เกี่ยวกับการตัดสินใจของคุณ!</h3>
	<p>
	ในระหว่างการทดลองครั้งนี้คุณจะมีส่วนร่วมในการตัดสินใจงานที่ให้คุณมีโอกาสที่จะได้รับเงิน ทั้งหมดกำไรในการทดลองนี้จะอยู่ในสกุลเงินที่บ้านของคุณ
	</p><p>
	การทดสอบนี้จะประกอบด้วยหลายส่วน ในส่วนที่แต่ละท่านจะถูกถามในการตัดสินใจที่เกี่ยวข้องกับการเข้าร่วมอื่น ๆ จากทั่วโลกที่ได้เข้าร่วมด้วยการทดลอง การตัดสินใจของคุณอาจส่งผลกระทบต่อ payoffs ของผู้อื่นเช่นเดียวกับการตัดสินใจของบุคคลที่คุณกำลังจับคู่กับอาจมีผลต่อ payoffs ของคุณ
	</p><p>
	รายได้ของคุณเป็นความลับและคุณจะได้รับแจ้งทางอีเมลของจำนวนเงินที่คุณได้รับ เมื่อเสร็จสิ้นการทดสอบเราจะส่งการชำระเงินของคุณภายใน 24 ชั่วโมงผ่านทาง Paypal หรือในคน
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
	<h1>ภาพรวมของการทดลอง</h1>
	<ul>
		<li><strong>คุณจะได้จับคู่กับสองผู้เข้าร่วมอื่น ๆ จากทั่วโลก</strong></li>
		<li><strong>ทุกคนจะได้รับน้ำหนัก</strong></li>
		<li><strong>ในขั้นตอนทุกคนลงคะแนนเพื่อฟอร์มทีม<br/>
ของคุณคือการฟอร์มทีมที่มีน้ำหนักรวมที่ใหญ่ที่สุด</strong></li>
		<li><strong>ทีมที่ชนะจะแยก 100 หน่วยเงินตราทดลอง</strong></li>
	</ul>
	ในหน้าจอถัดไปที่เราจะหารือรายละเอียดของเกม
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page3">
	<h1>ภาพรวมของการทดลอง</h1>
	<p>คุณจะได้จับคู่กับสองผู้เข้าร่วมอื่น ๆ จากทั่วโลก ตัวตนของพวกเขาจะไม่ถูกเปิดเผยแก่คุณและคุณจะไม่ถูกเปิดเผยแก่พวกเขา แต่ละท่านจะได้รับน้ำหนัก (จำนวนนี้อยู่ในวงเล็บคือในป้ายของผู้เล่นแต่ละคน) ผลรวมของน้ำหนักเหล่านี้คือ 100</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen">
	<p>วัตถุประสงค์ของเกมคือการสร้างกลุ่มที่หนักที่สุด กลุ่มที่หนักที่สุดจะแยก 100 หน่วยสกุลเงินทดลอง (C) ระหว่างสมาชิกของตนโดยใช้หนึ่งในกฎระเบียบร่วมกันหารือด้านล่าง (นอกเหนือจากค่าธรรมเนียมการมีส่วนร่วม) ผู้เข้าร่วมที่ไม่ได้เป็นส่วนหนึ่งของกลุ่มที่มีน้ำหนักมากที่สุดจะได้รับอะไรเลย (ยกเว้นการเรียกเก็บค่าธรรมเนียมการมีส่วนร่วมของพวกเขา)</p>
	<p>การทดลองแบ่งออกเป็นสามรอบ ที่ทุกรอบผู้เล่นแต่ละคนจะมีหนึ่งหันไปทำข้อเสนอโครงการในรูปแบบกลุ่มของผู้เข้าร่วม ผู้เข้าร่วมในกลุ่มที่นำเสนอนั้นจะออกเสียงลงคะแนน "ใช่" หรือ "No" เพื่อตัดสินใจหรือไม่ที่กลุ่มจะฟอร์ม กลุ่มที่เสนอเท่านั้นจะฟอร์มถ้าสมาชิกทุกคนลงมติว่า "ใช่"</p>
	<p>เมื่อรอบที่สามได้ผ่านการหรือผู้เข้าร่วมทำซ้ำข้อเสนอการทดสอบจะสิ้นสุดและผู้เข้าร่วมในกลุ่มที่หนักที่สุดจะได้รับรางวัลตามลำดับ</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page4">
	<h1>ขั้นตอนการเสนอ</h1>
	<p>เมื่อมีการเปิดของคุณคุณจะสามารถนำเสนอกลุ่มโดยทั้งการเลือกป้ายที่สอดคล้องกับผู้เข้าร่วมอื่น ๆ (ภายใต้ "สมาชิกกลุ่มเลือก") หรือโดยการคลิกที่รายการใดรายการหนึ่งในรายการ "กลุ่มที่แนะนำ" ข้อเสนอแนะของแต่ละจ่ายเงินของคุณตามรายชื่อที่สมบูรณ์ของสมาชิกของข้อเสนอของกลุ่มที่สอดคล้องกัน ข้อเสนอแนะเหล่านี้จะถูกเรียงลำดับตามการจ่ายเงินของคุณในลำดับถัดลงมา</p>
	<p>เมื่อคุณพอใจกับข้อเสนอของคุณให้คลิก "ยืนยันการเสนอ"</p>
	<p>(ใน "Timeline" ป้ายของคุณ [2] คือสูงเพื่อระบุมีการเปิดและวงกลมแรกจะถูกเติมเต็ม (ของแข็งสีขาว) เพื่อบ่งชี้ว่ามันเป็นรอบแรกของคุณ. จ่ายเงินรางวัลจะถูกแสดงโดยใช้ "C" เป็นสัญลักษณ์ สำหรับหน่วยสกุลเงินทดลอง.)</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page5">
	<h1>ขั้นตอนการลงคะแนนเสียง</h1>
	<p>เมื่อผู้เข้าร่วมได้เสนอให้คุณเข้าร่วมพวกเขาในกลุ่มคุณจะถูกขอให้ลงมติอนุมัติให้กลุ่ม รายการ "กลุ่มอื่น" ช่วยให้คุณมองเห็นข้อเสนอในปัจจุบันควบคู่ไปกับกลุ่มอื่น ๆ ทั้งหมดที่คุณจะเป็นสมาชิกที่มีการจ่ายเงินรางวัลที่สอดคล้องกันของพวกเขาสำหรับการเปรียบเทียบ</p>
	<p>โหวตโดยการคลิกที่ "ใช่" หรือ "No" หากผู้เข้าร่วมทั้งหมดในกลุ่มที่เสนอออกเสียงลงคะแนน "ใช่" แล้วกลุ่มที่จะเกิดขึ้นมิฉะนั้นกลุ่มจะไม่ได้เกิดขึ้น</p>
	<img src="<?php echo base_url();?>img/vote.png" alt="Vote Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page6">
	<h1>ขั้นที่ผลลัพธ์</h1>
	<p>หลังจากที่ผู้เข้าร่วมนำเสนอกลุ่มและสมาชิกทุกคนที่มีศักยภาพได้รับการโหวตคุณจะแสดงภาพรวมของผลการ เพียงแค่กด "Continue" เพื่อดำเนินการทดสอบหรือกด "จ่ายรีวิว" เมื่อการทดลองเป็นมากกว่า</p>
	<img src="<?php echo base_url();?>img/results.png" alt="Results Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>คำอธิบายของการจ่าย</h1>
	<p>มีสองประเภทของการทดลองในที่ที่คุณเข้าร่วมตามสัดส่วนหรือเท่ากับ</p>
	<ul>
		<li>ถ้าคุณอยู่ในกลุ่มที่มีผลรวมที่ใหญ่ที่สุดที่คุณจะได้รับค่าธรรมเนียมการมีส่วนร่วมและ
			<ul>
				<li>จำนวนเงินตามสัดส่วนของผลงานจำนวนของผลรวมของกลุ่ม [สัดส่วน] [PROPORTIONAL]<br/>
					- หรือ -</li>
				<li>จำนวนเงินที่แบ่งเท่ากันในหมู่กลุ่ม [เท่ากับ] [EQUAL]</li></ul></li>
		<li>หากคุณไม่ได้อยู่ในกลุ่มที่มีผลรวมที่ใหญ่ที่สุดคุณจะได้รับค่าการมีส่วนร่วม</li>
	</ul>
	<h3>[สัดส่วน] [PROPORTIONAL]</h3>
	<p>ที่จุดเริ่มต้นของการทดสอบคุณจะบอกว่าประเภทของการจ่ายเงินเป็นสัดส่วน</p>
	<p>ตัวอย่าง: การจ่ายเงินตามสัดส่วนผลในหน้าจอด้านบนจะถูกคำนวณโดยการหารจำนวนของคุณ (35) ด้วยผลรวมของตัวเลขในกลุ่มของคุณ (35 + 25) นั่นคือการจ่ายเงินของคุณจะเป็น [35 / (35 +25)]*100 = 58</p>
	<h3>[เท่ากับ] [EQUAL]</h3>
	<p>ที่จุดเริ่มต้นของการทดสอบคุณจะบอกว่าประเภทของการจ่ายเงินเท่ากับ</p>
	<p>ตัวอย่าง: การจ่ายเงินเท่ากันจะถูกคำนวณโดยการหาร 100 ด้วยจำนวนของสมาชิกในกลุ่ม สำหรับหน้าจอผลลัพธ์ข้างต้นจ่ายเงินของคุณจะเป็น 100/2 = 50</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page8">
	<h1>แปลงการชำระเงินและสกุลเงิน</h1>
	<p>ชำระเงินงวดสุดท้ายของคุณขึ้นอยู่กับประเทศที่คุณมีส่วนร่วมจาก จำนวนเงินที่แสดงในหน้าจอเป็นสกุลเงินที่ทดลองใช้ (C) ในทุกเกม, C100 หน่วยของสกุลเงินทดลองจะแยกระหว่างผู้ชนะ การจ่ายเงินของคุณขึ้นอยู่กับประเทศที่คุณอยู่จากและรายละเอียดของวิธีการแปลงทดลองดอลลาร์เป็นเงินที่เกิดขึ้นจริงในประเทศบ้านเกิดของคุณจะปรากฎในตารางในส่วนถัดไป</p>
	<table>
		<tr><th>ประเทศ</th><th>เงินตรา</th><th>ค่าธรรมเนียม Particiption (ในสกุลเงินท้องถิ่น)</th><th>คุ้มค่าจาก C100 ในสกุลเงินท้องถิ่น</th></tr>
		<tr><td>อาร์เจนตินา</td><td>เงินเปโซของอาร์เจนตินา</td><td>14.00</td><td>24.00</td></tr>
		<tr><td>ออสเตรเลีย</td><td>ดอลลาร์ออสเตรเลีย</td><td>3.50</td><td>6.00</td></tr>
		<tr><td>ประเทศบราซิล</td><td>เรียลของบราซิล</td><td>7.00</td><td>12.00</td></tr>
		<tr><td>แคนาดา</td><td>ดอลลาร์แคนาดา</td><td>3.00</td><td>5.00</td></tr>
		<tr><td>ประเทศจีน</td><td>หยวนจีน</td><td>11.00</td><td>18.00</td></tr>
		<tr><td>อินเดีย</td><td>เงินรูปีของอินเดีย</td><td>60.00</td><td>100.00</td></tr>
		<tr><td>อิหร่าน</td><td>อิหร่าน Rial</td><td>14000.00</td><td>24600.00</td></tr>
		<tr><td>ประเทศอิรัก</td><td>ดีนาร์อิรัก</td><td>2400.00</td><td>4000.00</td></tr>
		<tr><td>ประเทศอิสราเอล</td><td>เงิน Shekel ใหม่ของอิสราเอล</td><td>11.00</td><td>19.00</td></tr>
		<tr><td>ประเทศญี่ปุ่น</td><td>เงินเยนของญี่ปุ่น</td><td>230.00</td><td>380.00</td></tr>
		<tr><td>เม็กซิโก</td><td>เงินเปโซเม็กซิกัน</td><td>25.00</td><td>40.00</td></tr>
		<tr><td>ปากีสถาน</td><td>เงินรูปีของปากีสถาน</td><td>180.00</td><td>310.00</td></tr>
		<tr><td>ฟิลิปปินส์</td><td>เงินเปโซของฟิลิปปินส์</td><td>85.00</td><td>140.00</td></tr>
		<tr><td>แอฟริกาใต้</td><td>แรนด์ของแอฟริกาใต้</td><td>14.00</td><td>24.00</td></tr>
		<tr><td>สเปน</td><td>ยูโร</td><td>4.00</td><td>7.00</td></tr>
		<tr><td>ประเทศไทย</td><td>บาทไทย</td><td>55.00</td><td>90.00</td></tr>
		<tr><td>ตุรกี</td><td>ลีราตุรกี</td><td>4.50</td><td>8.00</td></tr>
		<tr><td>ประเทศสหรัฐอเมริกา</td><td>สหดอลลาร์สหรัฐอเมริกา</td><td>3.00</td><td>5.00</td></tr>
		<tr><td>เวียดนาม</td><td>ดองของเวียดนาม</td><td>23000.00</td><td>40000.00</td></tr>
	</table>
	<p>ตัวอย่างเช่นหากผู้เล่นจากเม็กซิโกชนะ C25 + C50 + C100 + C25 ในสี่เกมที่เกิดขึ้นจริงใช้เวลาที่บ้านของเขาได้รับรางวัลจะเปโซเม็กซิกัน 25 สำหรับแสดงขึ้นบวก C200 ดอลลาร์ทดลองซึ่งเท่ากับ 80 เปโซเม็กซิกัน การจ่ายเงินโดยรวมจาก 105 เปโซเม็กซิกัน</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page9">
	<h1>หมายเหตุที่สำคัญ</h1>
	<p>ก้าวของคุณตลอดการทดลองคือการตรวจสอบ หากคุณใช้เวลานานกว่าเวลาที่กำหนด, เทิร์นของคุณจะถูกอัตโนมัติโดยการตัดสินใจที่สุ่มและการจ่ายเงินที่คุณจะลดลงตามไปด้วย ท่านจะได้รับ 45 วินาทีเพื่อนำเสนอ, 30 วินาทีในการออกเสียงลงคะแนนและ 30 วินาทีในการทบทวนผล</p>
	<p>ถ้าหน้าจอไม่ปรากฏขึ้นเพื่อปรับปรุงหรือคุณเชื่อว่าคุณกำลังประสบข้อผิดพลาดโปรดรีเฟรชเบราว์เซอร์ นี้สามารถทำได้โดยการกดปุ่ม F5</p>
	<h3>เราจะไม่เก็บข้อมูลส่วนบุคคล ข้อมูลทั้งหมดที่เก็บรวมถึงรายได้ของคุณจะยังคงเป็นความลับ</h3>
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