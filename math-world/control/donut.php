<?php
$dispatcher->route('/math-world/'.basename(__FILE__, '.php'), function () {
	header('Content-Type: image/svg+xml');
?>
<svg viewBox="0 0 320 320" xmlns="http://www.w3.org/2000/svg" version="1.1" width="320" height="320">
	<defs>
		<radialGradient id="Gradient1" cx="0.3" cy="0.3" r="0.7">
		<stop offset="0%" stop-color="white"/>
		<stop offset="100%" stop-color="black"/>
		</radialGradient>
	</defs>
	<path d="M <?php echo (160 + round(cos(pi()/4.0) * 120)).','.(160 - round(sin(pi()/4.0) * 120))?> 
	A 120,120 0 0 0 40,160 
	A 120,120 0 0 0 280,160 
	A 60,60 0 0 1 <?php echo (160 + round(cos(pi()/4.0) * 120)).','.(160 - round(sin(pi()/4.0) * 120))?> 
	Z" fill="url(#Gradient1)" id="main-donut"/>
</svg>

<?php 
});