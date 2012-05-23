<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><!DOCTYPE html>
<html>
<head>
	<title>Experiment Instructions - Vietnamese</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Language" content="vi">
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
	<h3>Chào mừng và cảm ơn bạn cho sự tham gia của bạn trong thí nghiệm này kinh tế ra quyết định!</h3>
	<p>
	Trong suốt quá trình thí nghiệm này, bạn sẽ tham gia vào nhiệm vụ quyết định cung cấp cho bạn cơ hội để kiếm tiền. Tất cả các khoản thu nhập trong thí nghiệm này sẽ là bằng tiền nhà của bạn.
	</p><p>
	Thử nghiệm này sẽ bao gồm một số bộ phận. Trong mỗi phần, bạn sẽ được yêu cầu để thực hiện một quyết định liên quan đến người tham gia khác từ khắp nơi trên thế giới cũng đã tham gia thí nghiệm. Quyết định của bạn có thể ảnh hưởng đến sự thưởng phạt của người khác, cũng giống như các quyết định của những người bạn phù hợp với có thể ảnh hưởng đến thưởng phạt của bạn.
	</p><p>
	Thu nhập của bạn đều được giữ kín và bạn sẽ được thông báo bằng email của số tiền bạn kiếm được. Sau khi hoàn thành thí nghiệm, chúng tôi sẽ gửi thanh toán của bạn trong vòng 24 giờ qua Paypal hoặc trong người.
	</p>
	<button class="next">Next</button>
	<br/>
	<a class="image-link" href="<?php echo site_url('site/instructions_chinese'); ?>"><img src="<?php echo base_url(); ?>img/chinese.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions'); ?>"><img src="<?php echo base_url(); ?>img/english.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_hebrew'); ?>"><img src="<?php echo base_url(); ?>img/hebrew.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_hindi'); ?>"><img src="<?php echo base_url(); ?>img/hindi.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_japanese'); ?>"><img src="<?php echo base_url(); ?>img/japanese.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_persian'); ?>"><img src="<?php echo base_url(); ?>img/persian.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_spanish'); ?>"><img src="<?php echo base_url(); ?>img/spanish.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_thai'); ?>"><img src="<?php echo base_url(); ?>img/thai.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_turkish'); ?>"><img src="<?php echo base_url(); ?>img/turkish.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_urdu'); ?>"><img src="<?php echo base_url(); ?>img/urdu.png"/></a>
	<a class="image-link selected" href="<?php echo site_url('site/instructions_vietnamese'); ?>"><img src="<?php echo base_url(); ?>img/vietnamese.png"/></a>
</div>

<div class="section" id="page2">
	<h1>Tổng quan của thí nghiệm</h1>
	<p>Bạn sẽ được ghép nối với hai người tham gia khác từ khắp nơi trên thế giới. Danh tính của họ sẽ không được tiết lộ cho bạn và bạn sẽ không được tiết lộ cho họ. Mỗi bạn sẽ được một trọng lượng (con số này là trong ngoặc đơn trong huy hiệu của mỗi cầu thủ). Tổng của các trọng lượng là 100.</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen">
	<p>Mục tiêu của trò chơi là để tạo thành nhóm nặng nhất. Các nhóm nặng nhất sẽ chia 100 đơn vị tiền tệ thực nghiệm (C) giữa các thành viên của nó bằng cách sử dụng một trong các quy tắc chia sẻ thảo luận dưới đây (ngoài lệ phí tham gia). Những người tham gia không phải là một phần của nhóm với trọng lượng lớn nhất sẽ kiếm được không có gì (trừ lệ phí tham gia).</p>
	<p>Thí nghiệm được chia thành ba vòng. Tại mỗi vòng, mỗi người chơi sẽ có một lượt để làm cho một đề nghị để tạo thành một nhóm người tham gia. Những người tham gia trong nhóm đề xuất sau đó sẽ bỏ phiếu "Có" hoặc "Không" để quyết định có hoặc không phải là nhóm sẽ hình thành. Nhóm dự kiến ​​sẽ chỉ hình thành nếu tất cả các thành viên bỏ phiếu "Có".</p>
	<p>Khi vòng ba đã được thông qua, hoặc tham gia lặp đi lặp lại một đề xuất, thử nghiệm sẽ kết thúc và những người tham gia trong nhóm nặng nhất sẽ được khen thưởng phù hợp.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page3">
	<h1>Đề nghị Stage</h1>
	<p>Khi đến lượt của bạn, bạn sẽ có thể đề xuất các nhóm bằng cách chọn phù hiệu tương ứng với những người tham gia khác ("Các thành viên Nhóm Chọn"), hoặc bằng cách nhấn vào một trong các mục trong danh sách của "Nhóm đề nghị". Mỗi đề nghị thanh toán của bạn theo sau bởi một danh sách đầy đủ của các thành viên của nhóm đề nghị tương ứng. Những đề nghị này được sắp xếp theo thanh toán của bạn theo thứ tự giảm dần.</p>
	<p>Một khi bạn đã hài lòng với đề xuất của bạn, bấm vào nút "Xác nhận đề xuất".</p>
	<p>(Trong "Timeline", phù hiệu của bạn [2] là cao hơn để cho biết nó là lần lượt của bạn và vòng tròn đầu tiên được làm đầy (màu trắng) để cho biết nó hiện là vòng đầu tiên. Trả tiền được hiển thị bằng cách sử dụng "C" là biểu tượng cho các đơn vị tiền tệ thử nghiệm.)</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page4">
	<h1>Bỏ phiếu giai đoạn</h1>
	<p>Khi một người tham gia đã đề xuất để bạn có thể tham gia cùng họ trong một nhóm, bạn sẽ được yêu cầu bỏ phiếu chấp thuận việc nhóm. Nhóm "thay thế" danh sách cho phép bạn xem các đề xuất hiện tại cùng với tất cả các nhóm khác trong đó bạn sẽ là một thành viên có trả tiền tương ứng của họ để so sánh.</p>
	<p>Vote bằng cách nhấp vào "Có" hoặc "Không". Nếu tất cả các thành viên tham gia trong nhóm đề xuất bỏ phiếu "Có", sau đó nhóm sẽ được hình thành, nếu không thì nhóm sẽ không được hình thành.</p>
	<img src="<?php echo base_url();?>img/vote.png" alt="Vote Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page5">
	<h1>Kết quả giai đoạn</h1>
	<p>Sau khi tham gia đề xuất một nhóm và tất cả các thành viên tiềm năng đã bình chọn, bạn sẽ được hiển thị một cái nhìn tổng quan của kết quả. Đơn giản chỉ cần nhấn "Tiếp tục" để tiến hành thí nghiệm, hoặc bấm "Thanh toán Review" khi thí nghiệm kết thúc.</p>
	<img src="<?php echo base_url();?>img/results.png" alt="Results Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page6">
	<h1>Giải thích của Payouts</h1>
	<p>Có hai loại thí nghiệm mà bạn tham gia, tỷ lệ hoặc EQUAL.</p>
	<ul>
		<li>Nếu bạn đang ở trong nhóm với số tiền lớn nhất bạn sẽ được đưa ra lệ phí tham gia và 
			<ul>
				<li>một số tiền tương ứng với tỷ lệ đóng góp của số tổng hợp của nhóm. [Tỷ lệ] [PROPORTIONAL] <br>
					- hoặc -</li>
				<li>một số tiền chia đều giữa các nhóm. [EQUAL]</li></ul></li>
		<li>Nếu bạn không trong nhóm với số tiền lớn nhất, bạn sẽ chỉ nhận được lệ phí tham gia.</li>
	</ul>
	<h3>[Tỷ lệ] [PROPORTIONAL]</h3>
	<p>Khi bắt đầu thử nghiệm, bạn sẽ được cho biết nếu các loại hình thanh toán là tỷ lệ thuận.</p>
	<p>Ví dụ: thanh toán theo tỷ lệ màn hình kết quả trên được tính bằng cách chia số của bạn (35) bằng tổng của các số trong nhóm của bạn (35 + 25). Đó là, thanh toán của bạn sẽ là 35 / (35 +25) = 58.</p>
	<h3>[EQUAL]</h3>
	<p>Khi bắt đầu thử nghiệm, bạn sẽ được cho biết nếu các loại hình thanh toán là EQUAL.</p>
	<p>Ví dụ: thanh toán EQUAL được tính bằng cách chia 100 bởi số lượng các thành viên trong nhóm. Đối với màn hình kết quả ở trên, thanh toán của bạn sẽ là 100/2 = 50.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>Thanh toán và chuyển đổi tiền tệ</h1>
	<p>Thanh toán cuối cùng của bạn phụ thuộc vào quốc gia mà bạn đang tham gia. Số tiền được hiển thị trong màn hình là tiền thử nghiệm (C). Trong mỗi trò chơi, C100 đơn vị tiền tệ thử nghiệm được phân chia giữa những người chiến thắng. Thanh toán của bạn là phụ thuộc vào nước bạn đến từ các chi tiết làm thế nào để chuyển đổi đô la thử nghiệm thành tiền thực tế ở nước bạn được đưa ra trong bảng trong phần tiếp theo.</p>

	<table>
		<tbody><tr><th>Quốc gia</th><th>Tiền tệ</th><th>Particiption phí (tiền tệ địa phương)</th><th>C100 trong giá trị của tiền tệ địa phương</th></tr>
		<tr><td>Argentina</td><td>Argentina Peso</td><td>14,00</td><td>24,00</td></tr>
		<tr><td>Úc</td><td>Dollar Úc</td><td>3,50</td><td>6,00</td></tr>
		<tr><td>Brazil</td><td>Brazil thực</td><td>7,00</td><td>12,00</td></tr>
		<tr><td>Canada</td><td>Đô la Canada</td><td>3,00</td><td>5,00</td></tr>
		<tr><td>Trung Quốc</td><td>Trung Quốc Yuan</td><td>11,00</td><td>18,00</td></tr>
		<tr><td>Ấn Độ</td><td>Rupi Ấn Độ</td><td>60,00</td><td>100,00</td></tr>
		<tr><td>Iran</td><td>Iran Rial</td><td>14.000,00</td><td>24.600,00</td></tr>
		<tr><td>Iraq</td><td>Iraq Dinar</td><td>2400,00</td><td>4000,00</td></tr>
		<tr><td>Israel</td><td>Israel mới Sêken</td><td>11,00</td><td>19,00</td></tr>
		<tr><td>Nhật Bản</td><td>Yên Nhật</td><td>230,00</td><td>380,00</td></tr>
		<tr><td>Mexico</td><td>Mexico Peso</td><td>25,00</td><td>40,00</td></tr>
		<tr><td>Pakistan</td><td>Pakistan Rupee</td><td>180,00</td><td>310,00</td></tr>
		<tr><td>Việt Nam</td><td>Philippine Peso</td><td>85,00</td><td>140,00</td></tr>
		<tr><td>Nam Phi</td><td>Ran</td><td>14,00</td><td>24,00</td></tr>
		<tr><td>Tây Ban Nha</td><td>Euro</td><td>4,00</td><td>7,00</td></tr>
		<tr><td>Thái Lan</td><td>Bạt Thái Lan</td><td>55,00</td><td>90,00</td></tr>
		<tr><td>Thổ Nhĩ Kỳ</td><td>Lia Thổ Nhĩ Kỳ</td><td>4,50</td><td>8,00</td></tr>
		<tr><td>Hoa Kỳ</td><td>Đô la Mỹ</td><td>3,00</td><td>5,00</td></tr>
		<tr><td>Việt Nam</td><td>Đồng Việt Nam</td><td>23.000,00</td><td>40.000,00</td></tr>
	</tbody></table>

	<p>Như một ví dụ, nếu một cầu thủ từ Mexico thắng C25 + C50 + C100 + C25 trong bốn trận đấu, mang về nhà giải thưởng thực tế của mình sẽ là 25 peso Mexico cho thấy cộng với C200 đô la thử nghiệm, bằng 80 peso Mexico. Tổng thanh toán của 105 peso Mexico.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page8">
	<h1>Lưu ý quan trọng</h1>
	<p>Tốc độ của bạn trong suốt thí nghiệm được theo dõi. Nếu bạn mất nhiều thời gian hơn so với thời gian quy định, lần lượt của bạn sẽ được tự động bằng cách thực hiện một quyết định ngẫu nhiên và bạn thanh toán sẽ được giảm phù hợp. Bạn sẽ được 45 giây để đề xuất, 30 giây để bỏ phiếu, và 30 giây để xem xét kết quả.</p>
	<p>Nếu màn hình không xuất hiện để cập nhật, hoặc bạn tin rằng bạn đang trải qua một lỗi, xin vui lòng làm mới trình duyệt. Điều này có thể được thực hiện bằng cách nhấn phím F5.</p>
	<h3>CHÚNG TÔI SẼ KHÔNG THU THẬP THÔNG TIN CÁ NHÂN NHẬN DẠNG. TẤT CẢ CÁC THÔNG TIN THU, kể cả thu nhập của bạn sẽ được giữ kín.</h3>
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