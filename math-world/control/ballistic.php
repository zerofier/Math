<?php

$dispatcher->route('/math-world/'.basename(__FILE__, '.php'), function() {
	common_head();
?>	<div id="deduce">
		<p>`f`を時間による速度の函数とする `f(t) = V`</p>
		<p>`f(x)` の微分 `f'(x) = lim_(h->0) (f(x + h) - f(x)) / h`</p>
		<p>「抗力公式」と「ニュートンの運動方程式」</p>
		<p>`f'(x) = lim_(h->0) (f(x) - ((f(x))^2 K)/(2 M) * h - f(x)) / h`</p>
		<p>`f'(x) = lim_(h->0) (cancel(f(x)) - ((f(x))^2 K)/(2 M) * h - cancel(f(x))) / h`</p>
		<p>`f'(x) = lim_(h->0) (- ((f(x))^2 K)/(2 M) * cancel(h)) / cancel(h)`</p>
		<p>`f'(x) = - ((f(x))^2 K)/(2 M)`</p>
		<p>`(dy)/(dx) = - ((f(x))^2 K)/(2 M)`</p>
		
		<hr />
		<div>
			`f(t_0) = v_0`<br />
			`f(t_1) = v_0 - v_0^2 * K/(2M) * (t_1 - t_0)`<br />
		</div>
		
	</div>
	<hr />
	<div>
	<table><tr><td>
	<div id="graph">
		<canvas id="graph_canvas" width="810" height="270"></canvas>
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
				draw();	
			});
		};
		init();

		function draw() {
			if (! ctx) return;
			const dt = 0.1;
			
			ctx.clearRect(0, 0, mx, my);

			ctx.beginPath();
			ctx.moveTo(0, 0);
			ctx.lineTo(0, my);
			ctx.lineTo(mx, my);
			ctx.stroke();

			if (! k) return;
			else console.log("K = " + k);

			let scale = my / v0;
			
			ctx.beginPath();
			ctx.moveTo(0, 0);
			let v = v0;
			let t = 0;
			for (; t < mx / scale; t += dt) {
				v = v - (v * v * k * dt) / (m * 2);
				ctx.lineTo(t * scale, (v0 - v) * scale);
			}
			ctx.stroke();

			console.log("t = " + t + " sec");
		}
		</script>
	</div>
<?php
	common_foot();
});