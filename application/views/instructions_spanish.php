<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><!DOCTYPE html>
<html>
<head>
	<title>Experiment Instructions</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Language" content="es"/>
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
	<h3>Bienvenido y gracias por su participación en este experimento la economía en la toma de decisiones!</h3>
	<p>
	Durante este experimento, participar en tareas de decisión que le dan la oportunidad de ganar dinero. Todas las ganancias de este experimento será en su moneda de origen.

	</p><p>
	Este experimento se compondrá de varias partes. En cada parte, se le pedirá que tome una decisión que implica a otros participantes de todo el mundo que se han unido al experimento. Su decisión puede afectar las ganancias de los demás, así como las decisiones de las personas a las que se corresponden con las puede afectar sus beneficios.

	</p><p>
	Sus ganancias son confidenciales y se le notificará por correo electrónico de la cantidad que usted ganó. Una vez finalizado el experimento, le enviaremos a su pago dentro de 24 horas a través de Paypal o en persona.
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
	<a class="image-link selected" href="<?php echo site_url('site/instructions_spanish'); ?>"><img src="<?php echo base_url(); ?>img/spanish.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_thai'); ?>"><img src="<?php echo base_url(); ?>img/thai.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_turkish'); ?>"><img src="<?php echo base_url(); ?>img/turkish.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_urdu'); ?>"><img src="<?php echo base_url(); ?>img/urdu.png"/></a>
	<a class="image-link" href="<?php echo site_url('site/instructions_vietnamese'); ?>"><img src="<?php echo base_url(); ?>img/vietnamese.png"/></a>
</div>

<div class="section" id="page2">
	<h1>Descripción del experimento</h1>
	<ul>
		<li><strong>Usted puede combinar con otros dos participantes de todo el mundo.</strong></li>
		<li><strong>Todo el mundo se le dará un peso.</strong></li>
		<li><strong>En cada etapa la gente vota para formar un equipo. <br/>
Su objetivo es formar un equipo con el mayor peso total.</strong></li>
		<li><strong>El equipo ganador se repartirán 100 unidades monetarias experimentales.</strong></li>
	</ul>
	En la pantalla siguiente se discuten los detalles del juego.
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page3">
	<h1>Descripción del experimento</h1>
	<p>Usted puede combinar con otros dos participantes de todo el mundo. Su identidad no será revelada a usted y los suyos no será revelada a ellos. Cada uno de ustedes se les dará un peso (este número se encuentra en paréntesis en la tarjeta de identificación de cada jugador). La suma de estos pesos es de 100.</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen">
	<p>El objetivo del juego es para formar el grupo más pesado. El mayor grupo se repartirán 100 unidades monetarias experimentales (C) entre sus miembros con una de las normas de reparto se analizan a continuación (además de la cuota de participación). Los participantes que no son parte del grupo con el mayor peso se gana nada (a excepción de su cuota de participación).</p>
	<p>El experimento se divide en tres rondas. En cada ronda, cada jugador tendrá un turno para hacer una propuesta para formar un grupo de participantes. Los participantes en el grupo propuesto a votar "Sí" o "No" para decidir si o no el grupo, será. Propuestas de los grupos sólo se forman si todos los miembros vote "Sí".</p>
	<p>Cuando tres rondas han pasado, o un participante repite una propuesta, el experimento va a terminar y los participantes en el mayor grupo serán recompensados ​​en consecuencia.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page4">
	<h1>Propuesta de la etapa</h1>
	<p>
	Cuando es su turno, usted será capaz de proponer los grupos ya sea seleccionando las insignias correspondientes a los demás participantes (en "Miembros del Grupo Select"), o haciendo clic en una de las entradas en la lista de "grupos sugeridos". Cada propuesta incluye su pago seguido por una lista completa de los miembros de la propuesta del grupo correspondiente. Estas sugerencias se ordenan por su pago en orden descendente.
	</p><p>
	Una vez que esté satisfecho con su propuesta, haga clic en "Confirmar la Propuesta". 
	</p><p>
	(En la "línea de tiempo", su tarjeta de identificación [2] es más alto para indicar que es tu turno y el primer círculo está lleno (sólido blanco) para indicar que es actualmente la primera ronda. Los pagos se muestran con "C" como el símbolo para unidades monetarias experimentales.)
	</p>
	<img src="<?php echo base_url();?>img/propose.png" alt="Proposal Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page5">
	<h1>Votación Etapa</h1>
	<p>Cuando un participante se ha propuesto para que usted pueda unirse a ellos en un grupo, se le pedirá a votar para aprobar el grupo. El "grupos alternativos" lista permite usted a ver la propuesta junto con todos los demás grupos de los cuales se le indica que un miembro con los pagos correspondientes para la comparación.</p>
	<p>Vota haciendo clic en "Sí" o "No". Si todos los participantes en el grupo propuesto votar "Sí", entonces ese grupo se formó, de lo contrario el grupo no se formará.</p>
	<img src="<?php echo base_url();?>img/vote.png" alt="Vote Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page6">
	<h1>Resultados de la Etapa</h1>
	<p>Después de un participante propone un grupo y todos los miembros potenciales han votado, se le mostrará un resumen de los resultados. Simplemente pulse en "Continuar" para proseguir con el experimento, o pulse el botón "Pago de revisión" cuando el experimento se ha terminado.</p>
	<img src="<?php echo base_url();?>img/results.png" alt="Results Screen"><br/>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page7">
	<h1>Explicación de los pagos</h1>
	<p>Hay dos tipos de experimentos en los que usted participa, proporcional o de EQUAL.</p>
	<ul>
		<li>Si usted está en el grupo con la mayor suma se le dará la cuota de participación y
			<ul>
				<li>un importe proporcional a la contribución de su número a la suma del grupo. [PROPORCIONAL] <br/>
					-- o --</li>
				<li>una cantidad igual de divididos entre el grupo. [Igual]</li></ul></li>
		<li>Si no están en el grupo con la mayor suma, sólo recibirá la cuota de participación.</li>
	</ul>
	<h3>[PROPORCIONAL] [PROPORTIONAL]</h3>
	<p>Al comienzo del experimento se le dijo que si el tipo de pago es proporcional.</p>
	<p>Ejemplo: el pago proporcional en la pantalla de resultado anterior se calcula dividiendo el número (35) por la suma de los números en su grupo (35 + 25). Es decir, su pago sería [35 / (35 +25)]*100 = 58.</p>
	<h3>[Igual] [EQUAL]</h3>
	<p>Al comienzo del experimento se le dijo que si el tipo de pago es igual.</p>
	<p>Ejemplo: El pago EQUAL se calcula dividiendo 100 por el número de miembros del grupo. Para la pantalla de resultados anterior, su pago sería de 100/2 = 50.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page8">
	<h1>El pago y la conversión de moneda


</h1>
	<p>El pago final depende del país en el que están participando en. La cantidad que aparece en la pantalla es la moneda experimental (C). En cada juego, C100 unidades de la moneda experimentales se dividen entre los ganadores. Su pago es dependiente en el país es usted y los detalles de cómo convertir dólares experimentales en el dinero real en su país de origen se dan en la tabla en la siguiente sección.</p>

	<table>
		<tr><th>País</th><th>Moneda</th><th>Cuota Particiption (en moneda local)</th><th>Valor de la C100 en moneda local</th></tr>
		<tr><td>Argentina</td><td>Peso argentino</td><td>14,00</td><td>24,00</td></tr>
		<tr><td>Australia</td><td>Dólar Australiano</td><td>3,50</td><td>6,00</td></tr>
		<tr><td>Brasil</td><td>Real brasileño</td><td>7,00</td><td>12,00</td></tr>
		<tr><td>Canadá</td><td>Dólar Canadiense</td><td>3,00</td><td>5,00</td></tr>
		<tr><td>China</td><td>Yuan chino</td><td>11,00</td><td>18,00</td></tr>
		<tr><td>India</td><td>Rupia india</td><td>60,00</td><td>100,00</td></tr>
		<tr><td>Irán</td><td>Rial iraní</td><td>14.000,00</td><td>24.600,00</td></tr>
		<tr><td>Irak</td><td>Dinar iraquí</td><td>4000.00</td><td>4000.00</td></tr>
		<tr><td>Israel</td><td>Nuevo shekel israelí</td><td>11,00</td><td>19,00</td></tr>
		<tr><td>Japón</td><td>Yen Japonés</td><td>230,00</td><td>380,00</td></tr>
		<tr><td>México</td><td>Peso mexicano</td><td>25,00</td><td>40,00</td></tr>
		<tr><td>Pakistán</td><td>Rupia pakistaní</td><td>180,00</td><td>310,00</td></tr>
		<tr><td>Filipinas</td><td>Peso filipino</td><td>85,00</td><td>140,00</td></tr>
		<tr><td>Sudáfrica</td><td>Rand sudafricano</td><td>14,00</td><td>24,00</td></tr>
		<tr><td>España</td><td>Euro</td><td>4,00</td><td>7,00</td></tr>
		<tr><td>Tailandia</td><td>Baht tailandés</td><td>55,00</td><td>90,00</td></tr>
		<tr><td>Turquía</td><td>Lira turca</td><td>4,50</td><td>8,00</td></tr>
		<tr><td>Estados Unidos</td><td>Dólar estadounidense</td><td>3,00</td><td>5,00</td></tr>
		<tr><td>Vietnam</td><td>Dong de Vietnam</td><td>23.000,00</td><td>40.000,00</td></tr>
	</table>

	<p>Por ejemplo, si un jugador de México gana el C25 + C50 + C25 + C100 en cuatro partidos, su real para llevar a casa el premio será de 25 pesos mexicanos para aparecer más C200 dólares experimentales, que equivalen a 80 pesos mexicanos. Pago total de 105 pesos mexicanos.</p>
	<button class="prev">Previous</button><button class="next">Next</button>
</div>

<div class="section" id="page9">
	<h1>Notas Importantes</h1>
	<p>Su ritmo durante todo el experimento se controla. Si usted toma más tiempo que el tiempo asignado, el turno será automatizado por tomar una decisión al azar y se pago se reducirá en consecuencia. Se le dará 45 segundos para proponer, 30 segundos para votar, y 30 segundos para revisar los resultados.</p>
	<p>Si la pantalla no aparece para actualizar, o usted cree que está experimentando un error, por favor, actualice el explorador. Esto se puede conseguir pulsando la tecla F5.</p>
	<h3>NO recopilaremos información personal identificable. Toda la información recogida, INCLUYENDO SUS GANANCIAS, se mantendrá confidencial.</h3>
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