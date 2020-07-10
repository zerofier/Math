<?php

$dispatcher->route('/math-world/'.basename(__FILE__, '.php'), function() {
	common_head();
?>	<div id="main">
		<div>
			<div class="input-item"><label for="temperature">Temperature: </label><input id="temperature" pattern="\d+(.\d+)+" /> <span class="unit">&#8451;</span></div>
			<div class="input-item"><label for="humidity">Humidity: </label><input id="humidity" pattern="\d+(.\d+)+"/> <span>%</span></div>
			<div class="input-item"><label></label><input /></div>
			<div class="input-item"><label></label><input /></div>
			<div class="input-item"><label></label><input /></div>
			<div class="input-item"><label></label><input /></div>
		</div>
	</div>
	<style>
		.input-item > label {
			display: inline-block;
			min-width: 7em;
		}
	</style>
	<script type="text/javascript">
	var bullet_mst = [
		{"name": "", "diameter": 0, "weight": 0, "coefficient": 0 },
	];

	function find(key, value) {

	}
	
	function init() {
		
	}
	
	init();

	</script>
	<div>`(dy)/(dx) = g - p y^2`</div>
	<div>`int ((dy)/(dx)) / (g - p y^2) dx = int 1 dx`</div>
	<div>`int (dy) / (g - p y^2) = x`</div>
	<div>`int 1 / (g - p y^2) dy = x + C_1`</div>
	<div>`int 1 / (g (1 - (p y^2) / g)) dy = x + C_1`</div>
	<div>`1 / g int 1 / (1 - (p y^2) / g) dy = x + C_1`</div>
	
	<div>`u = (i sqrt p  y) / (sqrt g)`</div>
	<div>`du = (i sqrt p) / (sqrt g) dy`</div>
	<div>`dy = du (sqrt g) / (i sqrt p)`</div>
	<div>`- (p y^2) / g = u^2`</div>
	<div>代入</div>
	
	<div>`1 / g int 1 / (1 + u^2) du (sqrt g) / (i sqrt p) = x + C_1`</div>
	<div>`(1 / g) (sqrt g) / (i sqrt p) int 1 / (1 + u^2) du = x + C_1`</div>
	<div>`-i / (sqrt (gp)) int 1 / (1 + u^2) du = x + C_1`</div>
	
	<div>`-i / (sqrt (gp)) (tan^(-1)(u) + C_2) = x + C_1`</div>
	<div>逆代入</div>
	<div>`-i / (sqrt (gp)) (tan^(-1)((i sqrt p  y) / (sqrt g)) + C_2) = x + C_1`</div>
	<div>`itanh(1) = tan(i)`によって</div>
	<div>`-i / (sqrt (gp)) (tan^(-1)((i sqrt p  y) / (sqrt g)) + C_2) = x + C_1`</div>
	<div>`-i / (sqrt (gp)) (i tanh^(-1)(sqrt (p  / g) y) + C_2) = x + C_1`</div>
	<div>`1 / (sqrt (gp)) tanh^(-1)(sqrt (p  / g) y) -i / (sqrt (gp)) C_2 = x + C_1`</div>
	<div>`tanh^(-1)(sqrt (p  / g) y) -i C_2 = (x + C_1) / (sqrt (gp))`</div>
	<div>`tanh^(-1)(sqrt (p  / g) y) = (x + C_1) / (sqrt (gp)) + i C_2`</div>
	<div>`1/2 ln ((1 + sqrt (p  / g) y)/(1- sqrt (p  / g) y))= (x + C_1) / (sqrt (gp)) + i C_2`</div>
	<div>`(1 + sqrt (p  / g) y)/(1- sqrt (p  / g) y) = exp (2 ((x + C_1) / (sqrt (gp)) + i C_2))`</div>
	<div>`(1 + sqrt (p  / g) y)= (exp (2 ((x + C_1) / (sqrt (gp)) + i C_2))) (1- sqrt (p  / g) y)`</div>
	<div>`(1 + sqrt (p  / g) y)= exp (2 ((x + C_1) / (sqrt (gp)) + i C_2))- sqrt (p  / g) y exp (2 ((x + C_1) / (sqrt (gp)) + i C_2))`</div>
	
	<div>`1 + sqrt (p  / g) y + sqrt (p  / g) y exp (2 ((x + C_1) / (sqrt (gp)) + i C_2))= exp (2 ((x + C_1) / (sqrt (gp)) + i C_2))`</div>
	
	<div>`1 + sqrt (p  / g) y (1+exp (2 ((x + C_1) / (sqrt (gp)) + i C_2)))= exp (2 ((x + C_1) / (sqrt (gp)) + i C_2))`</div>
	
	<div>`sqrt (p  / g) y = (exp (2 ((x + C_1) / (sqrt (gp)) + i C_2)) - 1) / (exp (2 ((x + C_1) / (sqrt (gp)) + i C_2 )) + 1)`</div>
	
	<div>`y = sqrt (g / p) (exp (2 ((x + C_1) / (sqrt (gp)) + i C_2)) - 1) / (exp (2 ((x + C_1) / (sqrt (gp)) + i C_2 )) + 1)`</div>
	
	<div>`y = sqrt (g / p) (exp (2 ((x + C_1) / (sqrt (gp)) + i C_2)) - 1) / (exp (2 ((x + C_1) / (sqrt (gp)) + i C_2 )) + 1)`</div>
	
	<div>`y = sqrt (g / p) tanh ((x + C_1) / (sqrt (gp)) + i C_2)`</div>
	
	<div>`y = sqrt (g / p) tanh (x / (sqrt (gp)) +  C_1 / (sqrt (gp)) + i C_2)`</div>
	
	<div>`y = sqrt (g / p) tanh (x / (sqrt (gp)) + C)`</div>
	<!--
	<div>`tanh(x) = (e^x - e^(-x)) / (e^x + e^(-x))`</div>
	-->
	
<?php
	common_foot();
});