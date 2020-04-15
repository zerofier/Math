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
		<p>`int f'(x) dx = int - ((f(x))^2 K)/(2 M) dx`</p>
		<p>`-K / (2M) int (f(x))^2 dx`</p>
	</div>
<?php
	common_foot();
});