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
	<div>
		<canvas id="free_fall" width="600" height="600"></canvas>
	</div>
	<script type="text/javascript">
	var bullet_mst = [
		{ "name": "", "diameter": 0, "weight": 0, "coefficient": 0 },
	];

	function find(key, value) {

	}
	
	function init() {
		let can = document.getElementById('free_fall');
		let ctx = can.getContext('2d');

		g = 9.8
		p = 1.0
		sqrt_gp = Math.sqrt(g*p);

		r = (Math.sqrt(p) + Math.sqrt(g)) / (Math.sqrt(p) - Math.sqrt(g));
		console.log("r = " + r);
		t = Math.log(r) / (2 * sqrt_gp);
		console.log("time = " + t);
		
		ctx.save();
		ctx.transform(1, 0, 0, -1, 0, 600);
		ctx.beginPath();
		ctx.moveTo(0, 0);
		for(x = 0; x < 1200; x++) {
			y = Math.log(Math.cosh(sqrt_gp * x)) / p;
			ctx.lineTo(x / 10, y / 10);
			// console.log("(" + x + "," + y + ")");
		}
		ctx.stroke();
		
		ctx.restore();
	}
	
	init();

	</script>
	
	
	<style>
		#basic-math {
/* 			display: none; */
		}
		#basic-math > div{
			margin-bottom: 1em
		}
	</style>
	<div id="basic-math">
	<!-- 
		<div>`(dy)/(dx) = g - p y^2`</div>
		<div>`int ((dy)/(dx)) / (g - p y^2) dx = int 1 dx`</div>
		<div>`int (dy) / (g - p y^2) = x + C_1`</div>
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
		
		<div>`-i / (sqrt (gp)) (tan^(-1)(u) + C_2) = x + C_1` (ここで`tan^(-1)(x)`は`tan(x)`の逆関数である。`arctan(x)`と表記することもある。)</div>
		
		<div>`-i / (sqrt(gp)) tan^(-1)(u) = x + C_1 + C_2 i / (sqrt(gp))`</div>
		<div>`-i / (sqrt(gp)) tan^(-1)(u) = x + C`</div>
		<div>逆代入</div>
		<div>`-i / (sqrt(gp)) tan^(-1)((i sqrt p y) / (sqrt g)) = x + C`</div>
		<div>`itanh(1) = tan(i)`によって</div>
		<div>`-i / (sqrt(gp)) tan^(-1)((i sqrt p y) / (sqrt g)) = x + C`</div>
		<div>`-i / (sqrt(gp)) i tanh^(-1)(sqrt(p / g) y) = x + C`</div>
		<div>`1 / (sqrt(gp)) tanh^(-1)(sqrt(p / g) y)  = x + C`</div>
		<div>`tanh^(-1)(sqrt (p  / g) y) = (x + C) sqrt(gp)`</div>
		
		<div>`1/2 ln((1 + sqrt(p / g) y)/(1- sqrt(p / g) y))= sqrt(gp) (x + C) `</div>
		
		<div>`(1 + sqrt(p / g) y)/(1- sqrt (p / g) y) = exp (2 sqrt(gp) (x + C))`</div>
		<div>`(1 + sqrt(p / g) y) = exp(2 sqrt(gp) (x + C)) (1- sqrt(p / g) y)`</div>
		<div>`(1 + sqrt(p / g) y) = exp(2 sqrt(gp) (x + C)) - sqrt(p / g) y exp(2 sqrt(gp) (x + C))`</div>
		
		<div>`1 + sqrt(p / g) y + sqrt(p / g) y exp(2 sqrt(gp) (x + C)) = exp(2 sqrt(gp) (x + C))`</div>
		
		<div>`1 + sqrt(p / g) y (1 + exp(2 sqrt(gp) (x + C)))= exp(2 sqrt(gp) (x + C))`</div>
		
		<div>`sqrt(p / g) y = (exp(2 sqrt(gp) (x + C)) - 1) / (exp(2 sqrt(gp) (x + C)) + 1)`</div>
		
		<div>`sqrt (p / g) y = tanh (sqrt(gp) (x + C))`</div>
		
		<div>`y = sqrt (g / p) tanh (sqrt(gp) (x + C))`</div>
		
		<div>初期状態`x=0, y=0`</div>
		<div>`0 = C`</div>
		<div>`y = sqrt(g / p) tanh(sqrt(gp) x)`&nbsp;(`g`は重力加速度, `p=P/M`の`M`は質量, `P=1/2 rho S C_D`)</div>
		
		 -->
		<div>`g/p = sqrt(g / p) tanh (sqrt(gp) x)`</div>
		
		<div>`g/p sqrt(p) / sqrt(g) = tanh (sqrt(gp) x)`</div>
		
		<div>`sqrt(g) / sqrt(p) = (exp(2 sqrt(gp) x) - 1) / (exp(2 sqrt(gp) x) + 1)`</div>
		
		<div>`sqrt(g) / sqrt(p) (exp(2 sqrt(gp) x) + 1) = (exp(2 sqrt(gp) x) - 1) `</div>
		
		<div>`sqrt(g) / sqrt(p) exp(2 sqrt(gp) x) + sqrt(g) / sqrt(p) = (exp(2 sqrt(gp) x) - 1) `</div>
		
		<div>`sqrt(g) / sqrt(p) = exp(2 sqrt(gp) x) - 1 - sqrt(g) / sqrt(p) exp(2 sqrt(gp) x)`</div>
		
		<div>`sqrt(g) / sqrt(p) + 1 = exp(2 sqrt(gp) x) (1 - sqrt(g) / sqrt(p))`</div>
		
		<div>`(1 + sqrt(g) / sqrt(p)) / (1 - sqrt(g) / sqrt(p)) = exp(2 sqrt(gp) x) `</div>
		
		<div>`sqrt(p) / sqrt(p) (1 + sqrt(g) / sqrt(p)) / (1 - sqrt(g) / sqrt(p)) = exp(2 sqrt(gp) x) `</div>
		<div>`(sqrt(p) + sqrt(g)) / (sqrt(p) - sqrt(g)) = exp(2 sqrt(gp) x) `</div>
		
		<div>` ln((sqrt(p) + sqrt(g)) / (sqrt(p) - sqrt(g))) = 2 sqrt(gp) x`</div>
		
		<div>`1 / (2 sqrt(gp)) ln((sqrt(p) + sqrt(g)) / (sqrt(p) - sqrt(g))) = x`</div>
		
		
		
		
		
		<!-- 
		<div>`int sqrt(g/p) tanh(sqrt(g p) x) dx`</div>
		
		<div>`sqrt(g/p) int tanh(sqrt(g p) x)dx`</div>
		<div>`u = sqrt(g p) x`</div>
		<div>`du = sqrt(g p) dx`</div>
		<div>代入</div>
		<div>`sqrt(g/p) 1/sqrt(g p) int tanh(u) du`</div>
		<div>`1/p int tanh(u) du`</div>
		<div>`1/p ln(exp(u) + exp(-u)) ＋ C`</div>
		<div>逆代入</div>
		<div>`r = 1/p ln(exp(sqrt(gp) x) + exp(-sqrt(gp) x)) + C`</div>
		
		<div>初期状態`x=0, r=0`</div>
		<div>`0 = 1/p ln(exp(0) + exp(0)) + C`</div>
		<div>`0 = 1/p ln(1 + 1) + C`</div>
		<div>`C = -1/p ln(2)`</div>
		
		<div>`r = 1/p ln(exp(sqrt(g p) x) + exp(-sqrt(g p) x)) - 1/p ln(2)`</div>
		
		<div>`r = 1/p ln(1/2(exp(sqrt(g p) x) + exp(-sqrt(g p) x)))`</div>
		
		<div>`r = 1/p ln(cosh(sqrt(g p) x))`</div>
	</div>
	<!--
	<div>`sinh(x) = (e^x - e^(-x)) / 2)`</div>
	<div>`cosh(x) = (e^x + e^(-x)) / 2)`</div>
	<div>`tanh(x) = sinh(x) / cosh(x)`</div>
	-->
	
<?php
	common_foot();
});