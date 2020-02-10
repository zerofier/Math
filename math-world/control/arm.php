<?php
$dispatcher->route('/math-world/'.basename(__FILE__, '.php'), function() {
?>
<!doctype html>
<html><head>
<meta charset="utf-8">
<style type="text/css">
.container {
	vertical-align: top;
}
.hint {
	font-size: 75%;
	display:inline-block;
	padding: .5rem;
	border: solid 1px;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=AM_CHTML"></script>
<script type="text/javascript">
let ctx;

function main() {
	let cvx = document.getElementsByTagName('canvas');
	if (! cvx) {
		alert('not found canvas');
		return;
	}
	cvx = cvx[0];
	ctx = cvx.getContext('2d');

	window.requestAnimationFrame(animation);
}


const l1 = 100;
const l2 = 100;
const step = 2000.0;

var target = {
	'x': 0,
	'y': 0
}

var footprint = [];

var last = {
	'a':  0,
	'b':  Math.PI / 2,
	'c1': Math.cos(0),
	'c2': Math.cos(Math.PI / 2),
	's1': Math.sin(0),
	's2': Math.sin(Math.PI / 2),
	's3': Math.sin(Math.PI / 2)
};

var current = {
	'x': last.c1 * l1 + last.c2 * l2,
	'y': last.s1 * l1 + last.s2 * l2
};
var sx = (target.x - current.x) / step;
var sy = (target.y - current.y) / step;
var start = null;
function animation(timestamp) {
	if (!start) start = timestamp;
	var progress = timestamp - start;
	start = timestamp;
	
	ctx.clearRect(0, 0, 400, 300);
	ctx.save();
	ctx.transform(1, 0, 0, -1, 100, 200);
	
	if (current.x == target.x && current.y == target.y) {
		target = {
			'x': Math.random() * 140,
			'y': Math.random() * 140,
		};

		if (footprint.length) {
			current = footprint[footprint.length - 1];
		}
		
		sx = (target.x - current.x) / step;
		sy = (target.y - current.y) / step;

		footprint = [];
	}

	ctx.moveTo(target.x, target.y);
	ctx.arc(target.x, target.y, 1, 0, 2 * Math.PI);
	ctx.stroke();

	let dx = sx * progress;
	let dy = sy * progress;
	
	current.x += dx;
	current.y += dy;
	if (sx > 0 && current.x > target.x || sx < 0 && current.x < target.x) current.x = target.x;
	if (sy > 0 && current.y > target.y || sy < 0 && current.y < target.y) current.y = target.y;

	ctx.moveTo(current.x, current.y);
	ctx.lineTo(target.x, target.y);
	ctx.strokeStyle = 'red';
	ctx.stroke();

	let d = del(dx, dy);
	let p = arm(d.a, d.b);
	
	ctx.beginPath();
	ctx.moveTo(0, 0);
	ctx.lineTo(p[0].x, p[0].y);
	ctx.lineTo(p[1].x, p[1].y);
	ctx.strokeStyle = 'green';
	ctx.stroke();

	footprint.push(p[1]);
	ctx.beginPath();
	ctx.moveTo(footprint[0].x, footprint[0].y);
	for (let i = 0; i < footprint.length; i++) {
		ctx.lineTo(footprint[i].x, footprint[i].y);
	}
	ctx.strokeStyle = 'blue';
	ctx.stroke();

	ctx.restore();

	window.requestAnimationFrame(animation);
}



function arm(a, b) {
	last.a += a;
	last.b += b;
	last.c1 = Math.cos(last.a);
	last.c2 = Math.cos(last.a + last.b);
	last.s1 = Math.sin(last.a);
	last.s2 = Math.sin(last.a + last.b);
	last.s3 = Math.sin(last.b);

	return [
		{
			'x': last.c1 * l1,
			'y': last.s1 * l1
		},
		{
			'x': last.c1 * l1 + last.c2 * l2,
			'y': last.s1 * l1 + last.s2 * l2
		},
	];
}

function del(x, y) {
	if (! last.s3) {
		return {
			'a': Math.asin(0.5 / l1),
			'b': Math.acos((l1 * l1 + l2 * l2 - 2.0) / (2.0 *l1 * l2))
		};
	}
	
	let c = l1 * l2 * last.s3;
	return {
		'a':  (l2 * last.c2 * x + l2 * last.s2 * y) / c,
		'b':  ((- l1 * last.c1 - l2 * last.c2) * x + (- l1 * last.s1 - l2 * last.s2) * y) / c
	};
}

</script>
<title></title>
</head><body onload="main()">
<div class="container">
<canvas width="400" height="300" style="border: solid 1px;">
</canvas>
</div>
<div class="container">
	<div id="circumcenter-of-tow-vectors" style="display: none;">
		<p>`x^2 + y^2 = (x-a)^2 + (y-b)^2`</p>
		<p>`x^2 + y^2 = (x^2-2xa + a^2) + (y^2-2yb+b^2)`</p>
		<p>`0 = -2xa + a^2 - 2yb + b^2`</p>
		<p>`y = (a^2 + b^2 - 2ax) / (2b)`</p>
		<p>&nbsp;</p>
		<p>`{(y = (a^2 + b^2 - 2ax) / (2b)), (y = (c^2 + d^2 - 2cx) / (2d)):}`</p>
		<p>`(a^2 + b^2 - 2ax) / (2b) = (c^2 + d^2 - 2cx) / (2d)`</p>
		<p>`(a^2 + b^2) / (2b) - (2ax) / (2b) = (c^2 + d^2) / (2d) - (2cx) / (2d)`</p>
		<p>`(2cx) / (2d)- (2ax) / (2b) = (c^2 + d^2) / (2d) - (a^2 + b^2) / (2b)`</p>
		<p>`(4x(cb - ad)) / (4db) = ((c^2 + d^2)(2b) - (a^2 + b^2)(2d)) / (4db)`</p>
		<p>`x = ((c^2 + d^2)b - (a^2 + b^2)d) / (2(cb - ad))`</p>
		
		<p>`y = (c^2 + d^2 - 2c(((c^2 + d^2)b - (a^2 + b^2)d) / (2(cb - ad)))) / (2d)`</p>
		<p>`y = (c^2 + d^2 - 2c(((c^2 + d^2)b - (a^2 + b^2)d) / (2(cb - ad)))) / (2d)`</p>
		<p>`y = (c^2 + d^2 - ((c^2 + d^2)cb - (a^2 + b^2)cd) / (cb - ad)) / (2d)`</p>
		<p>`y = (((cb - ad)c^2 + (cb - ad)d^2 - (c^2 + d^2)cb + (a^2 + b^2)cd) / (cb - ad)) / (2d)`</p>
		<p>`y = (cbc^2 - adc^2 + cbd^2 - add^2 - cbc^2 - cbd^2  + cda^2 + cdb^2) / (2d(cb - ad))`</p>
		<p>`y = (- adc^2 - add^2 + cda^2 + cdb^2) / (2d(cb - ad))`</p>
		<p>`y = (cd(a^2 + b^2) - ad(c^2 + d^2)) / (2d(cb - ad))`</p>
		<p>`y = (c(a^2 + b^2) - a(c^2 + d^2)) / (2(cb - ad))`</p>
		
		<p>`{(x = (b(c^2 + d^2) - d(a^2 + b^2)) / (2(cb - ad))), (y = (c(a^2 + b^2) - a(c^2 + d^2)) / (2(cb - ad))):}`</p>
	</div>
	
	<div style="display: none;">
		<p>`f(x, y) = -arccos(-(l_1^2 + l_2^2 - (x^2 + y^2)) / (2 l_1 l_2))`</p>
		<p>`g(x, y) = (x^2 + y^2 - l_1^2 - l_2^2) / (2 l_1 l_2)`</p>
		<p>`f(x, y) = -arccos(g(x, y))`</p>
		<p>`f(x, y) = -arccos(g(x, y))`</p>
		<p>`(del f)/(del x) = (del f(g))/(del g) (del g)/(del x)`</p>
		<p>`(del f(g))/(del g) = 1 / sqrt(1 - g^2)`</p>
		<p>`(del g)/(del x) = (x^2 / (2 l_1 l_2) + (y^2 - l_1^2 - l_2^2) / (2 l_1 l_2))^'`</p>
		<p>`(del g)/(del x) = x / (4 l_1 l_2)`</p>
		<p>`(del f)/(del x) = x / (4 l_1 l_2 sqrt(1 - g^2))`</p>
		
		<p>`(del f)/(del x) = x / (4 l_1 l_2 sqrt(((2 l_1 l_2)^2 - ((x^2 + y^2) - (l_1^2 + l_2^2))^2) / (2 l_1 l_2)^2))`</p>
		
		<p>`(del f)/(del x) = x / (4 l_1 l_2 sqrt(((2 l_1 l_2)^2 - (x^2 + y^2)^2 + 2(x^2 + y^2)(l_1^2 + l_2^2) - (l_1^2 + l_2^2)^2) / (2 l_1 l_2)^2))`</p>
		
		<p>`(del f)/(del x) = x / (4 l_1 l_2 sqrt(((2 l_1 l_2)^2 - (x^2 + y^2)^2 + 2(x^2 + y^2)(l_1^2 + l_2^2) - (l_1^4 + 2 l_1^2 l_2^2 + l_2^4)) / (2 l_1 l_2)^2))`</p>
		
		<p>`(del f)/(del x) = x / (4 l_1 l_2 sqrt((-(x^2 + y^2)^2 + 2(x^2 + y^2)(l_1^2 + l_2^2) - (l_1^4 - 2 l_1^2 l_2^2 + l_2^4)) / (2 l_1 l_2)^2))`</p>
		
		<p>`(del f)/(del x) = x / (4 l_1 l_2 sqrt(-((x^2 + y^2)^2 - 2(x^2 + y^2)(l_1^2 + l_2^2) + (l_1^2 - l_2^2)^2) / (2 l_1 l_2)^2))`</p>
		
		<p>`(del f)/(del x) = x / (4 l_1 l_2 sqrt(-(((x^2 + y^2)^2 - 2(x^2 + y^2)(l_1^2 + l_2^2) + (l_1^2 + l_2^2)^2) - (l_1^2 + l_2^2)^2 + (l_1^2 - l_2^2)^2) / (2 l_1 l_2)^2))`</p>
		
		<p>`(del f)/(del x) = x / (4 l_1 l_2 sqrt(-(((x^2 + y^2) - (l_1^2 + l_2^2))^2 - (l_1^2 + l_2^2)^2 + (l_1^2 - l_2^2)^2) / (2 l_1 l_2)^2))`</p>
		
	</div>
	
	<div style="display: none;">
		<p>`((cos(alpha_2)l_1 + cos(alpha_2 + beta_2)l_2) - (cos(alpha_1)l_1 + cos(alpha_1 + beta_1)l_2))/((sin(alpha_2)l_1 + sin(alpha_2 + beta_2)l_2) - (sin(alpha_1)l_1 + sin(alpha_1 + beta_1)l_2)) = a`</p>
		
		<p>`((cos(alpha_2)l_1 + (cos(alpha_2)cos(beta_2) - sin(alpha_2)sin(beta_2))l_2) - (cos(alpha_1)l_1 + (cos(alpha_1)cos(beta_1) - sin(alpha_1)sin(beta_1))l_2))/((sin(alpha_2)l_1 + (sin(alpha_2)cos(beta_2) + cos(alpha_2)sin(beta_2))l_2) - (sin(alpha_1)l_1 + (sin(alpha_1)cos(beta_1) + cos(alpha_1)sin(beta_1))l_2)) = a`</p>
		
		<p>`((cos(alpha_2)l_1 + cos(alpha_2)cos(beta_2)l_2 - sin(alpha_2)sin(beta_2)l_2) - (cos(alpha_1)l_1 + cos(alpha_1)cos(beta_1)l_2 - sin(alpha_1)sin(beta_1)l_2))/((sin(alpha_2)l_1 + sin(alpha_2)cos(beta_2)l_2 + cos(alpha_2)sin(beta_2)l_2) - (sin(alpha_1)l_1 + sin(alpha_1)cos(beta_1)l_2 + cos(alpha_1)sin(beta_1)l_2)) = a`</p>
		
		<p>`(cos(alpha_2)l_1 + cos(alpha_2)cos(beta_2)l_2 - sin(alpha_2)sin(beta_2)l_2 - cos(alpha_1)l_1 - cos(alpha_1)cos(beta_1)l_2 + sin(alpha_1)sin(beta_1)l_2)/(sin(alpha_2)l_1 + sin(alpha_2)cos(beta_2)l_2 + cos(alpha_2)sin(beta_2)l_2 - sin(alpha_1)l_1 - sin(alpha_1)cos(beta_1)l_2 - cos(alpha_1)sin(beta_1)l_2) = a`</p>
		
		<p>`{(alpha_2 = alpha_1 + d alpha), (beta_2 = beta_1 + d beta):}`</p>
		
		<p>`(cos(alpha_1 + d alpha)l_1 + cos(alpha_1 + d alpha)cos(beta_1 + d beta)l_2 - sin(alpha_1 + d alpha)sin(beta_1 + d beta)l_2 - cos(alpha_1)l_1 - cos(alpha_1)cos(beta_1)l_2 + sin(alpha_1)sin(beta_1)l_2)/(sin(alpha_1 + d alpha)l_1 + sin(alpha_1 + d alpha)cos(beta_1 + d beta)l_2 + cos(alpha_1 + d alpha)sin(beta_1 + d beta)l_2 - sin(alpha_1)l_1 - sin(alpha_1)cos(beta_1)l_2 - cos(alpha_1)sin(beta_1)l_2) = a`</p>
		
		<p>`((cos(alpha_1)cos(d alpha) - sin(alpha_1)sin(d alpha))l_1 + (cos(alpha_1)cos(d alpha) - sin(alpha_1)sin(d alpha))(cos(beta_1)cos(d beta) - sin(beta_1)sin(d beta))l_2 - sin(alpha_1 + d alpha)sin(beta_1 + d beta)l_2 - cos(alpha_1)l_1 - cos(alpha_1)cos(beta_1)l_2 + sin(alpha_1)sin(beta_1)l_2)/(sin(alpha_1 + d alpha)l_1 + sin(alpha_1 + d alpha)(cos(beta_1)cos(d beta) - sin(beta_1)sin(d beta))l_2 + (cos(alpha_1)cos(d alpha) - sin(alpha_1)sin(d alpha))sin(beta_1 + d beta)l_2 - sin(alpha_1)l_1 - sin(alpha_1)cos(beta_1)l_2 - cos(alpha_1)sin(beta_1)l_2) = a`</p>
	</div>
	
	<div style="display: none;">
		<p>`((cos(alpha_1 + d alpha)l_1 + cos((alpha_1 + beta_1) + (d alpha + d beta))l_2) - (cos(alpha_1)l_1 + cos(alpha_1 + beta_1)l_2))/((sin(alpha_1 + d alpha)l_1 + sin((alpha_1 + beta_1) + (d alpha + d beta))l_2) - (sin(alpha_1)l_1 + sin(alpha_1 + beta_1)l_2)) = a`</p>
		
		<p>`(((cos(alpha_1)cos(d alpha) - sin(alpha_1)sin(d alpha))l_1 + (cos(alpha_1 + beta_1)cos(d alpha + d beta) - sin(alpha_1 + beta_1)sin(d alpha + d beta))l_2) - (cos(alpha_1)l_1 + cos(alpha_1 + beta_1)l_2))/(((sin(alpha_1)cos(d alpha) + cos(alpha_1)sin(d alpha))l_1 + (sin(alpha_1 + beta_1)cos(d alpha + d beta) + cos(alpha_1 + beta_1)sin(d alpha + d beta))l_2) - (sin(alpha_1)l_1 + sin(alpha_1 + beta_1)l_2)) = a`</p>
		
		<p>`(cos(alpha_1)cos(d alpha)l_1 - sin(alpha_1)sin(d alpha)l_1 + cos(alpha_1 + beta_1)cos(d alpha + d beta)l_2 - sin(alpha_1 + beta_1)sin(d alpha + d beta)l_2 - cos(alpha_1)l_1 - cos(alpha_1 + beta_1)l_2)/(sin(alpha_1)cos(d alpha)l_1 + cos(alpha_1)sin(d alpha)l_1 + sin(alpha_1 + beta_1)cos(d alpha + d beta)l_2 + cos(alpha_1 + beta_1)sin(d alpha + d beta)l_2 - sin(alpha_1)l_1 - sin(alpha_1 + beta_1)l_2) = a`</p>
		
		<p>`(cos(alpha_1)l_1(cos(d alpha) - 1) - sin(alpha_1)sin(d alpha)l_1 + cos(alpha_1 + beta_1)l_2(cos(d alpha + d beta) - 1) - sin(alpha_1 + beta_1)sin(d alpha + d beta)l_2) / (sin(alpha_1)cos(d alpha)l_1 + cos(alpha_1)sin(d alpha)l_1 + sin(alpha_1 + beta_1)cos(d alpha + d beta)l_2 + cos(alpha_1 + beta_1)sin(d alpha + d beta)l_2 - sin(alpha_1)l_1 - sin(alpha_1 + beta_1)l_2) = a`</p>
	</div>
	
	<div class="hint" id="">
		<h3>微分公式</h3>
		<p>`(df(g(x)))/(dx) = (df)/(dg) * (dg)/(dx) = f'(g) * g'(x)`</p>
		<p>`(a df(x) +- b dg(x))/(dx) = a (df)/(dx) +- b (dg)/(dx) = a f'(x) +- b g'(x)`</p>
		<p>`(d(f(x)g(x)))/(dx) = (dfg(x))/(dx) + (f(x)dg)/(dx) = f'(x)g(x) + f(x)g'(x)`</p>
	</div>
	
	<div class="hint" id="jacobian_matrix">
		<h3><a href="https://ja.wikipedia.org/wiki/%E3%83%A4%E3%82%B3%E3%83%93%E8%A1%8C%E5%88%97" target="_blank">ヤコビ行列(英: Jacobian matrix)</a></h3>
		<p>`J_f = [[(del f_1)/(del x_1),(del f_1)/(del x_2),(del f_1)/(del x_3)],[(del f_2)/(del x_1),(del f_2)/(del x_2),(del f_2)/(del x_3)],[(del f_3)/(del x_1),(del f_3)/(del x_2),(del f_3)/(del x_3)]]`</p>
		<p>`f={(f_1(x_1,x_2,x_3)),(f_2(x_1,x_2,x_3)),(f_3(x_1,x_2,x_3)):}`</p>
	</div>
	
	<div class="hint" id="inverse_matrix">
		<h3>2x2の<a href="https://ja.wikipedia.org/wiki/%E6%AD%A3%E5%89%87%E8%A1%8C%E5%88%97" target="_blank">逆行列</a></h3>
		<p>`1/(ad-cb)[[d,-b],[-c,a]]`</p>
	</div>
	
	<div>
		<p>`f(alpha, beta)={(x = l_1 cos alpha + l_2 cos (alpha + beta)), (y = l_1 sin alpha + l_2 sin (alpha + beta)):}`</p>
		<p>`f = {(f_1 = l_1 cos x_1 + l_2 cos (x_1 + x_2)), (f_2 = l_1 sin x_1 + l_2 sin (x_1 + x_2)):}`</p>
		<p>`(del f_1) / (del x_1) = - l_1 sin x_1 - l_2 sin (x_1 + x_2) `</p>
		<p>`(del f_1) / (del x_2) = - l_2 sin (x_1 + x_2) `</p>
		<p>`(del f_2) / (del x_1) = l_1 cos x_1 + l_2 cos (x_1 + x_2)`</p>
		<p>`(del f_2) / (del x_2) = l_2 cos (x_1 + x_2)`</p>
		<p>`f`のヤコビ行列`J_f`は：</p>
		<p>`[[ - l_1 sin x_1 - l_2 sin (x_1 + x_2), - l_2 sin (x_1 + x_2)],
			 [   l_1 cos x_1 + l_2 cos (x_1 + x_2),   l_2 cos (x_1 + x_2)]]`</p> 
		<p>`x_1`と`x_2`が微妙に変化する時`f_1`と`f_2`の変化をもてめるとしたら</p>
		<p>`[[del f_1],[del f_2]] = [[(del f_1) / (del x_1), (del f_1) / (del x_2)],[(del f_2) / (del x_1), (del f_2) / (del x_2)]] * [[del x_1],[del x_2]]`</p>
		<p>`Df = J_f * Dx`</p>
		<p>逆に`f_1`と`f_2`を微妙に変化させたい場合`x_1`と`x_2`をどう決めればいいか</p>
		<p>`Dx = (J_f)^(-1) * Df`</p>
		
		<p>`[[ - l_1 sin x_1 - l_2 sin (x_1 + x_2), - l_2 sin (x_1 + x_2)],
			 [   l_1 cos x_1 + l_2 cos (x_1 + x_2),   l_2 cos (x_1 + x_2)]]`の逆行列は</p>
			 
		<p>`(J_f)^(-1) = 1 / ((- l_1 sin x_1 - l_2 sin (x_1 + x_2))(l_2 cos (x_1 + x_2)) - (l_1 cos x_1 + l_2 cos (x_1 + x_2))(- l_2 sin (x_1 + x_2))) * [[l_2 cos (x_1 + x_2) , l_2 sin (x_1 + x_2)], [- l_1 cos x_1 - l_2 cos (x_1 + x_2), - l_1 sin x_1 - l_2 sin (x_1 + x_2)]]`</p>
		
		<p>`(J_f)^(-1) = 1 / ((- l_1 sin x_1 l_2 cos (x_1 + x_2) - l_2 sin (x_1 + x_2) l_2 cos (x_1 + x_2)) - (- l_2 sin (x_1 + x_2) l_1 cos x_1 - l_2 sin (x_1 + x_2) l_2 cos (x_1 + x_2))) * [[l_2 cos (x_1 + x_2) , l_2 sin (x_1 + x_2)], [- l_1 cos x_1 - l_2 cos (x_1 + x_2), - l_1 sin x_1 - l_2 sin (x_1 + x_2)]]`</p>
		
		<p>`(J_f)^(-1) = 1 / (l_1 l_2 cos x_1 sin (x_1 + x_2) - l_1 l_2 sin x_1 cos (x_1 + x_2)) * [[l_2 cos (x_1 + x_2) , l_2 sin (x_1 + x_2)], [- l_1 cos x_1 - l_2 cos (x_1 + x_2), - l_1 sin x_1 - l_2 sin (x_1 + x_2)]]`</p>
		
		<p>`det = l_1 l_2 (cos x_1 sin (x_1 + x_2) - sin x_1 cos (x_1 + x_2)) = l_1 l_2 sin(x_2)`</p>
		
		<p>`(J_f)^(-1) =  [[(l_2 cos (x_1 + x_2)) / (det) , (l_2 sin (x_1 + x_2)) / (det)], [(- l_1 cos x_1 - l_2 cos (x_1 + x_2)) / (det), (- l_1 sin x_1 - l_2 sin (x_1 + x_2)) / (det)]]`</p>
		
		<p>`{(del x_1 = (l_2 cos (x_1 + x_2) del f_1 + l_2 sin (x_1 + x_2) del f_2) / (l_1 l_2 sin x_2)),
			 (del x_2 = ((- l_1 cos x_1 - l_2 cos (x_1 + x_2)) del f_1 + (- l_1 sin x_1 - l_2 sin (x_1 + x_2))  del f_2) / (l_1 l_2 sin x_2)):}`</p>
		
		<p>`c_1 = cos x_1`</p>
		<p>`c_2 = cos (x_1 + x_2)`</p>
		<p>`s_1 = sin x_1`</p>
		<p>`s_2 = sin (x_1 + x_2)`</p>
		<p>`s_3 = sin x_2`</p>
		<p>`{(del x_1 = (l_2 c_2 del f_1 + l_2 s_2 del f_2) / (l_1 l_2 s_3)),
			 (del x_2 = ((- l_1 c1 - l_2 c2) del f_1 + (- l_1 s_1 - l_2 s_2)  del f_2) / (l_1 l_2 s_3)):}`</p>
	</div>
	
	<div>
		<h2>逆函数</h2>
		<p>`f(alpha, beta)={(x = l_1 cos alpha + l_2 cos (alpha + beta)), (y = l_1 sin alpha + l_2 sin (alpha + beta)):}` を以下の様に書き換える</p>
		
		<p>`{(l_1 cos x + l_2 cos (x + y) = a), (l_1 sin x + l_2 sin (x + y) = b):}` 指針が座標(a,b)を指す場合のアーム角x, yを求める</p>
		
		<p>`{(l_1 cos x + l_2 (cos x cos y - sin x sin y) = a), (l_1 sin x + l_2 (sin x cos y + cos x sin y) = b):}`</p>
		
		<p>`{(l_1 cos x + l_2 cos x cos y - l_2 sin x sin y = a), (l_1 sin x + l_2 sin x cos y + l_2 cos x sin y = b):}`</p>
		
		<p>`{(cos x (l_1 + l_2 cos y) - l_2 sin x sin y = a), (sin x (l_1 + l_2 cos y) + l_2 cos x sin y = b):}`</p>
		
		<p>`cos x (l_1 + l_2 cos y) - l_2 sin x sin y + sin x (l_1 + l_2 cos y) + l_2 cos x sin y = a + b`</p>
		
		<p>`(cos x + sin x) (l_1 + l_2 cos y) - l_2 sin y (sin x - cos x) = a + b`</p>
		
		<p>`l_1 cos x + l_2 cos x cos y - l_2 sin x sin y + l_1 sin x + l_2 sin x cos y + l_2 cos x sin y = a + b`</p>
		
		<p>`(cos x + sin x) (l_1 + l_2 cos y) - l_2 sin y (sin x - cos x) = a + b`</p>
		<!-- 
		<p>`{( cos x = (a + l_2 sin x sin y)/(l_1 + l_2 cos y)), (l_1 sin x + l_2 sin x cos y + l_2 cos x sin y = b):}`</p>
		
		<p>`{( cos x = (a + l_2 sin x sin y)/(l_1 + l_2 cos y)), (l_1 sin x + l_2 sin x cos y + l_2 (a + l_2 sin x sin y)/(l_1 + l_2 cos y) sin y = b):}`</p>
		 -->
	</div>
</div>
</body></html>
<?php
});