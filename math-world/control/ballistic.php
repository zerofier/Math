<?php

$dispatcher->route('/math-world/'.basename(__FILE__, '.php'), function() {
	common_head();
?>	<div id="deduce">
		<p>`f`を時間による速度の函数とする `f(t) = V`</p>
		<p>`f(x)` の微分 `f'(x) = lim_(h->0) (f(x + h) - f(x)) / h`</p>
		<p>「抗力公式」と「ニュートンの運動方程式」</p>
		<p>`f'(x) = lim_(h->0) (f(x) - f^2(x) K/ M * h - f(x)) / h`</p>
		<p>`f'(x) = lim_(h->0) (cancel(f(x)) - f^2(x)  K/M * h - cancel(f(x))) / h`</p>
		<p>`f'(x) = lim_(h->0) (- f^2(x) K/M * cancel(h)) / cancel(h)`</p>
		<p>`f'(x) = - f^2(x) K/M`</p>
		<p>`dy/dx = - f^2(x) K/M`</p>
		<p>`int 1/f^2(x) dy/dx dx = int -K/M dx`</p>
		<p>`int 1/f^2(x) dy = -K/M x + C_1`</p>
		<p>`- 1/f(x) + C_2 = -K/M x + C_1`</p>
		<p>`f(x) = 1 / (K/M x + C_2 - C_1)`</p>
		<p>`f(x) = 1 / (K/M x + C)`</p>
		<p>`x = 0`</p>
		<p>`v_0 = 1 / (0 + C)`</p>
		<p>`C = 1 / v_0`</p>
		<p>`f(x) = 1 / (K / M x + 1 / v_0)`</p>
		<div style="display: none">
    		<p>`d / (dx) 1 / (K / M x + 1 / v_0)` を求める。</p>
    		<p>`u(x) = K / M x + 1 / v_0`</p>
    		<p>`d/(du) 1 / u = -1 / (u^2)`</p>
    		<p>`d/(dx) 1 / (K / M x + 1 / v_0) ＝ d/(du) 1/u (du)/(dx)`</p>
    		<p>`-1 / (u^2) d/(dx) (K / M x + 1 / v_0)`</p>
    		<p>`-1 / ((K / M x + 1 / v_0)^2) d/(dx) (K / M x + 1 / v_0)`</p>
    		<p>`-1 / ((K / M x + 1 / v_0)^2) K / M`</p>
		</div>
	</div>
	<hr />
	<div>
	<table><tr><td>
	<div id="graph">
		<div id="initial-velocity">&nbsp;</div>
		<canvas id="graph_canvas" width="810" height="270"></canvas>
		<br />
		<div id="last-time" style="display: inline-block; float: right;">&nbsp;</div>
	</div>
	</td><td>
	<div><dl>
		<dt>流体密度(&rho;)</dt>
		<dd><input id="rho" pattern="^\d*(.\d*)?$" value="1.2250">&nbsp;kg/m<sup>3</sup></dd>
		<dt>体表面積(S)</dt>
		<dd><input id="s" pattern="^\d*(.\d*)?$" value="0.00006361725" list="bullets">&nbsp;m<sup>2</sup>
		<datalist id="bullets">
			<option value="0.00002393139"> 5.52 mm (.223 in)</option>
			<option value="0.00004560367"> 7.76 mm (.3 in)</option>
			<option value="0.00006361725"> 9 mm</option>
			<option value="0.00010386890">11.5 mm (.45 in)</option>
			<option value="0.00012667686">12.7 mm(.5 in)</option>
		</datalist>
		</dd>
		<dt>抗力係数(C<sub>D</sub>)</dt>
		<dd><input id="c_d" pattern="^\d*(.\d*)?$" value="0.34"></dd>
		<dt>質量(M)</dt>
		<dd><input id="m" pattern="^\d*(.\d*)?$" value="0.0168">&nbsp;kg</dd>
		<dt>初速(V<sub>0</sub>)</dt>
		<dd><input id="v0" pattern="^\d*(.\d*)?$" value="290">&nbsp;m/s</dd>
		
	</dl>
	<button type="button" id="calc_btn">Calc</button>
	</div>
	</td></tr></table>
	
	<script type="text/javascript">
		var cv, ctx;
		var mx, my;
		var k, v0, m;
		
		init = function() {
			cv = document.getElementById("graph_canvas");
			ctx = cv.getContext("2d");
			mx = cv.clientWidth;
			my = cv.clientHeight;

			draw();

			document.getElementById("calc_btn").addEventListener('click', function () {
				k = 0.5;
				k *= parseFloat(document.getElementById("rho").value);
				k *= parseFloat(document.getElementById("s").value);
				k *= parseFloat(document.getElementById("c_d").value);

				m = parseFloat(document.getElementById("m").value);
				v0 = parseFloat(document.getElementById("v0").value);
				document.getElementById("initial-velocity").innerHTML = "" + v0 + " m/s";
				draw();	
			});
		};
		init();

		function draw() {
			if (! ctx) return;
			
			ctx.clearRect(0, 0, mx, my);

			ctx.beginPath();
			ctx.moveTo(0, 0);
			ctx.lineTo(0, my);
			ctx.lineTo(mx, my);
			ctx.stroke();

			if (! k) return;
			else console.log("K = " + k);

			let scale = my / v0;

			let v = v0;
			let t = 0;
			ctx.beginPath();
			ctx.moveTo(t * scale * 10, (v0 - v) * scale);
			dt = 0.01;
			for (; t < (mx / scale) / 10; t += dt) {
				v = v - (v * v * k * dt) / (m * 2);
				ctx.lineTo(t * scale * 10, (v0 - v) * scale);
			}
			ctx.strokeStyle = 'black';
			ctx.stroke();
/*
			v = v0;
			t = 0;
			ctx.beginPath();
			ctx.moveTo(t * scale * 10, (v0 - v) * scale);
			dt = 1;
			for (; t < (mx / scale) / 10; t += dt) {
				v = v - (v * v * k * dt) / (m * 2);
				ctx.lineTo(t * scale * 10, (v0 - v) * scale);
			}
			ctx.strokeStyle = 'blue';
			ctx.stroke();
*/
			v = v0;
			t = 0;
			ctx.beginPath();
			ctx.moveTo(t * scale * 10, (v0 - v) * scale);
			dt = 0.02;
			for (; t < (mx / scale) / 10; t += dt) {
				v = 1 / (t * k / m + 1 / v0);
				ctx.lineTo(t * scale * 10, (v0 - v) * scale); 
			}
			ctx.strokeStyle = 'red';
			ctx.stroke();

			document.getElementById("last-time").innerHTML = "" + (t/10) + " sec";
		}
		</script>
	</div>
<?php
	common_foot();
});