<?php
$dispatcher->route('/math-world/triangle', function() {
?>
<!DOCTYPE html>
<html><head>
<meta charset="utf-8">
<style type="text/css">
p {
    margin-bottom: 2rem;
}

p.comment {
    margin-bottom: inherit;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=AM_CHTML"></script>
<script type="text/javascript">

/**
 * | a c e |
 * | b d f |
 * | 0 0 1 |
 */
 var m;
function setTransform(a, b, c, d, e, f) {
	m = [[a,c,e][b,d,f][0,0,1]];
}

function transform(v)
{
	return [ m[0][0] * v[0] + m[0][1] * v[1] + m[0][2] * v[2], m[1][0] * v[0] + m[1][1] * v[1] + m[1][2] * v[2] ];
}

function calc() {
	let a = parseFloat(document.getElementById('a').value);
	let b = parseFloat(document.getElementById('b').value);
	let c = parseFloat(document.getElementById('c').value);
	let aa = a*a;
	let bb = b*b;
	let cc = c*c;
	
	let cos_a = (bb + cc - aa) / (2.0 * b * c);
	let cos_b = (aa + cc - bb) / (2.0 * a * c);
	let cos_c = (aa + bb - cc) / (2.0 * a * b);

	let agl_a = Math.acos(cos_a);
	let agl_b = Math.acos(cos_b);
	let agl_c = Math.acos(cos_c);
	
	let sin_a = Math.sin(agl_a);
	let sin_b = Math.sin(agl_b);
	let sin_c = Math.sin(agl_c);

	let pos_a = {'x': c * cos_b, 'y': c * sin_b};
	let pos_b = {'x': 0, 'y': 0};
	let pos_c = {'x': a, 'y': 0};

	let circu = circumcircle(pos_a, pos_b, pos_c);
	let incir = incircle(pos_a, pos_b, pos_c);

	let cvs = document.getElementById('view');
	let ctx = cvs.getContext('2d');
	ctx.clearRect(0, 0, 400, 300);
	ctx.save();
	ctx.transform(1, 0, 0, -1, 50, 250);

	ctx.beginPath();
	ctx.moveTo(pos_b.x, pos_b.y);
	ctx.lineTo(pos_c.x, pos_c.y);
	ctx.lineTo(pos_a.x, pos_a.y);
	ctx.closePath();
	ctx.stroke();

	let ra = 20

	ctx.beginPath();
	ctx.moveTo(pos_b.x + ra, pos_b.y);
	ctx.arc(pos_b.x, pos_b.y, ra, 0, agl_b);
	ctx.stroke();

	ctx.beginPath();
	ctx.moveTo(pos_c.x- ra, pos_c.y);
	ctx.arc(pos_c.x, pos_c.y, ra, Math.PI, Math.PI - agl_c, 1);
	ctx.stroke();

	ctx.beginPath();
	ctx.moveTo(pos_a.x - cos_b * ra, pos_a.y - sin_b * ra);
	ctx.arc(pos_a.x, pos_a.y, ra, Math.PI + agl_b, Math.PI + agl_b + agl_a);
	ctx.stroke();

	ctx.beginPath();
	ctx.moveTo(circu.x, circu.y, 1, 0, 2 * Math.PI);
	ctx.arc(circu.x, circu.y, 1, 0, 2 * Math.PI);
	ctx.strokeStyle = "green";
	ctx.stroke();

	ctx.beginPath();
	ctx.moveTo(circu.x + circu.r, circu.y, 1, 0, 2 * Math.PI);
	ctx.arc(circu.x, circu.y, circu.r, 0, 2 * Math.PI);
	ctx.stroke();

	ctx.beginPath();
	ctx.moveTo(incir.x, incir.y, 1, 0, 2 * Math.PI);
	ctx.arc(incir.x, incir.y, 1, 0, 2 * Math.PI);
	ctx.strokeStyle = "red";
	ctx.stroke();

	ctx.beginPath();
	ctx.moveTo(incir.x + incir.r, incir.y, 1, 0, 2 * Math.PI);
	ctx.arc(incir.x, incir.y, incir.r, 0, 2 * Math.PI);
	ctx.stroke();
	
	ctx.restore();

	setTransform(1, 0, 0, -1, 50, 250);
	let txt_a = transform(pos_a);
	let txt_b = transform(pos_b);
	let txt_c = transform(pos_c);	
}

function circumcircle(a, b, c) {
	let a_squ = a.x*a.x + a.y*a.y;
	let b_squ = b.x*b.x + b.y*b.y;
	let c_squ = c.x*c.x + c.y*c.y;
	let x = (a_squ * (c.y - b.y) + b_squ * (a.y - c.y) + c_squ * (b.y - a.y)) / (2 * (a.x * (c.y - b.y)  + b.x * (a.y - c.y) + c.x * (b.y - a.y)));
	let y = (b_squ - a_squ - 2 * x * (b.x - a.x)) / (2 * (b.y - a.y));

	return {
		'x': x,
		'y': y,
		'r': Math.sqrt(Math.pow(x - a.x, 2) + Math.pow(y - a.y, 2))
	};
}

function incircle(a, b, c) {
	let a_squ = a.x*a.x + a.y*a.y;
	let b_squ = b.x*b.x + b.y*b.y;
	let c_squ = c.x*c.x + c.y*c.y;
	let d_aby = a.y - b.y;
	let d_bcy = b.y - c.y;
	let d_cay = c.y - a.y;
	let denom = 2 * (a.x * d_bcy + b.x* d_cay + c.x * d_aby);

	let x = (a_squ * d_bcy + b_squ * d_cay + c_squ * d_aby) / denom;
	let y = (a_squ * (c.x - b.x) + b_squ * (a.x - c.x) + c_squ * (b.x - a.x)) / denom;

	return {
		'x': x,
		'y': y,
		'r': Math.sqrt(Math.pow(x - (a.x + b.x)/2, 2) + Math.pow(y -(a.y + b.y)/2, 2))
	};
}


</script>
</head><body>
<table><thead></thead><tbody>
<tr><td>a</td><td><input id="a"></td><td></td></tr>
<tr><td>b</td><td><input id="b"></td><td></td></tr>
<tr><td>c</td><td><input id="c"></td><td></td></tr>
<tr><td colspan="3"><button type="button" onclick="calc();">calc</button></td></tr>
</tbody></table>
<div><canvas id="view" width="400", height="300" style="border: solid 1px;"></canvas></div>
<div style="font-size: 75%; display: none">
	<p>`{((x-a_x)^2+(y-a_y)^2 = R^2),((x-b_x)^2+(y-b_y)^2 = R^2),((x-c_x)^2+(y-c_y)^2 = R^2):}`</p>

	<p>`(x^2-2 x a_x + a_x^2)+(y^2-2 y a_y + a_y^2) = R^2` (1)</p>
	<p>`(x^2-2 x b_x + b_x^2)+(y^2-2 y b_y + b_y^2) = R^2` (2)</p>
	<p>`(x^2-2 x c_x + c_x^2)+(y^2-2 y c_y + c_y^2) = R^2` (3)</p>
	<p class="comment">(1)-(2) ABを結ぶ線分の垂直二等分線</p>
	<p>`(-2 x a_x + a_x^2 - 2 y a_y + a_y^2) - (-2 x b_x + b_x^2 -2 y b_y + b_y^2) = 0`</p>
	<p>`2 x (b_x - a_x) + 2 y (b_y - a_y) + (a_x^2 + a_y^2) - (b_x^2 + b_y^2) = 0`</p>

	<p>`2 x (b_x - a_x) + 2 y (b_y - a_y) = (b_x^2 + b_y^2) - (a_x^2 + a_y^2)` (4)</p>

	<p class="comment">(1)-(3) ACを結ぶ線分の垂直二等分線<</p>
	<p>`2 x (c_x - a_x) + 2 y (c_y - a_y) = (c_x^2 + c_y^2) - (a_x^2 + a_y^2)` (5)</p>

	<p class="comment">(4), (5)を連立</p>
	<p>`{(2 x (b_x - a_x) + 2 y (b_y - a_y) = (b_x^2 + b_y^2) - (a_x^2 + a_y^2)),
		 (2 x (c_x - a_x) + 2 y (c_y - a_y) = (c_x^2 + c_y^2) - (a_x^2 + a_y^2)):}`</p>

	<p>`{(2 y = ((b_x^2 + b_y^2) - (a_x^2 + a_y^2) - 2 x (b_x - a_x)) / (b_y - a_y)),
		 (2 y = ((c_x^2 + c_y^2) - (a_x^2 + a_y^2) - 2 x (c_x - a_x)) / (c_y - a_y)):}`</p>

	<p>`((b_x^2 + b_y^2) - (a_x^2 + a_y^2) - 2 x (b_x - a_x)) / (b_y - a_y) -
		((c_x^2 + c_y^2) - (a_x^2 + a_y^2) - 2 x (c_x - a_x)) / (c_y - a_y) = 0`</p>

	<p>`(((b_x^2 + b_y^2) - (a_x^2 + a_y^2) - 2 x (b_x - a_x))(c_y - a_y) - ((c_x^2 + c_y^2) - (a_x^2 + a_y^2) - 2 x (c_x - a_x))(b_y - a_y)) / ((b_y - a_y)(c_y - a_y)) = 0`</p>

	<p>`((b_x^2 + b_y^2)(c_y - a_y) - (a_x^2 + a_y^2)(c_y - a_y) - 2 x (b_x - a_x)(c_y - a_y) - (c_x^2 + c_y^2)(b_y - a_y) + (a_x^2 + a_y^2)(b_y - a_y) + 2 x (c_x - a_x)(b_y - a_y)) / ((b_y - a_y)(c_y - a_y)) = 0`</p>

	<p>`(2 x ((c_x - a_x)(b_y - a_y) - (b_x - a_x)(c_y - a_y)) + (a_x^2 + a_y^2)((b_y - cancel(a_y)) - (c_y - cancel(a_y))) + (b_x^2 + b_y^2)(c_y - a_y) - (c_x^2 + c_y^2)(b_y - a_y)) / ((b_y - a_y)(c_y - a_y)) = 0`</p>
	
	<p>`(2 x (c_x b_y - a_x b_y - c_x a_y + cancel(a_x a_y) - b_x c_y + a_x c_y + b_x a_y - cancel(a_x a_y)) + (a_x^2 + a_y^2)(b_y - c_y) + (b_x^2 + b_y^2)(c_y - a_y) - (c_x^2 + c_y^2)(b_y - a_y)) / ((b_y - a_y)(c_y - a_y)) = 0`</p>
	
	<p>`(2 x (c_x b_y - a_x b_y - c_x a_y - b_x c_y + a_x c_y + b_x a_y) + (a_x^2 + a_y^2)(b_y - c_y) + (b_x^2 + b_y^2)(c_y - a_y) - (c_x^2 + c_y^2)(b_y - a_y)) / ((b_y - a_y)(c_y - a_y)) = 0`</p>
	
	<p>`2 x (c_x b_y - a_x b_y - c_x a_y - b_x c_y + a_x c_y + b_x a_y) = (a_x^2 + a_y^2)(c_y - b_y) + (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2)(b_y - a_y)`&nbsp;&nbsp;&nbsp;&nbsp;`(b_y != a_y, c_y != a_y)`</p>
	
	<p>`x = ((a_x^2 + a_y^2)(c_y - b_y) + (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2)(b_y - a_y)) / (2(c_x b_y - a_x b_y - c_x a_y - b_x c_y + a_x c_y + b_x a_y))`&nbsp;&nbsp;&nbsp;&nbsp;`(b_y != a_y, c_y != a_y)`</p>
	
	<p>`x = ((a_x^2 + a_y^2)(c_y - b_y) + (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2)(b_y - a_y)) / (2(a_x(c_y - b_y)  + b_x (a_y - c_y) + c_x (b_y - a_y)))`&nbsp;&nbsp;&nbsp;&nbsp;`(b_y != a_y, c_y != a_y)`</p>	
</div>

<div style="font-size: 75%; display: none">
	<p class="comment">`A`と`B`を通る直線を`bar(AB)`</p>
	
	<p>`bar(AB) = {(a_y = a_x a + b),(b_y = b_x a + b):}`</p>
	
	<p>`a_y - b_y = (a_x a + b) - (b_x a + b)`</p>
	
	<p>`a = (a_y - b_y) / (a_x - b_x)` (1)</p>
	
	<p>`b = a_y - a_x (a_y - b_y) / (a_x - b_x)`</p>
	
	<p>`b = (a_y (a_x - b_x) - a_x (a_y - b_y)) / (a_x - b_x)`</p>
	
	<p>`b = (cancel(a_x a_y) - b_x a_y - cancel(a_x a_y) + a_x b_y) / (a_x - b_x)`</p>
	
	<p>または</p>
	
	<p>`b = b_y - b_x (a_y - b_y) / (a_x - b_x)`</p>
	
	<p>`b = (b_y (a_x - b_x) - b_x (a_y - b_y)) / (a_x - b_x)`</p>
	
	<p>`b = (a_x b_y - cancel(b_x b_y) - a_y b_x + cancel(b_x  b_y)) / (a_x - b_x)`</p>
	
	<p>`b = (a_x b_y - a_y b_x) / (a_x - b_x)` (2)</p>
	
	<p>`y = (a_y - b_y) / (a_x - b_x) x + (a_x b_y - a_y b_x) / (a_x - b_x)`</p>
	
	<p class="comment">`bar(AB)`の中点を`D`とする</p>
	
	<p>`d_x = (a_x + b_x) / 2`</p>
	
	<p>`d_y = (a_y + b_y) / 2`</p>
	
	<p class="comment">ポイント`D`通る`bar(AB)`に垂直する直線は(`tan(alpha + pi/2) = -cot(alpha)`によって)</p>
	
	<p>`d_y = - d_x / a + b'`</p>
	
	<p>`b' = d_y + d_x / a`</p>
	
	<p>`y = -x/a + d_y + d_x/a`</p>
	
	<p>`y = (-x + a d_y + d_x) 1/a`</p>
	
	<p>`y = (-x + (a_y - b_y) / (a_x - b_x) * (a_y + b_y) / 2 + (a_x + b_x) / 2) 1/a`</p>
	
	<p>`y = (-x + (a_y^2 - b_y^2) / (2(a_x - b_x)) + (a_x + b_x) / 2) 1/a`</p>
	
	<p>`y = (-x + ((a_y^2 - b_y^2) + (a_x^2 - b_x^2)) / (2(a_x - b_x))) 1/a` に(1)を代入</p>
	
	<p>`y = -x (a_x - b_x) / (a_y - b_y)  + ((a_y^2 - b_y^2) + (a_x^2 - b_x^2)) / (2cancel(a_x - b_x)) * cancel(a_x - b_x) / (a_y - b_y) `</p>
	
	<p>`y = (-2x (a_x - b_x) + (a_x^2 + a_y^2) - (b_x^2 + b_y^2)) / (2(a_y - b_y))`が`bar(AB)`の垂直二等分線になる</p>
	
	<p class="comment">同様`bar(AC)`の垂直二等分線は</p>
	
	<p>`y = (-2x (a_x - c_x) + (a_x^2 + a_y^2) - (c_x^2 + c_y^2)) / (2(a_y - c_y))`</p>
	
	<p class="comment">連立</p>
	
	<p>`{(y = (-2x (a_x - b_x) + (a_x^2 + a_y^2) - (b_x^2 + b_y^2)) / (2(a_y - b_y))), (y = (-2x (a_x - c_x) + (a_x^2 + a_y^2) - (c_x^2 + c_y^2)) / (2(a_y - c_y))):}`</p>
	
	<p class="comment">解く</p>
	
	<p>`0 = (-2x (a_x - b_x) + (a_x^2 + a_y^2) - (b_x^2 + b_y^2)) / (2(a_y - b_y)) - (-2x (a_x - c_x) + (a_x^2 + a_y^2) - (c_x^2 + c_y^2)) / (2(a_y - c_y))`</p>
	
	<p>`0 = ((-2x (a_x - b_x)(a_y - c_y) + (a_x^2 + a_y^2)(a_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y)) - (-2x (a_x - c_x)(a_y - b_y) + (a_x^2 + a_y^2)(a_y - b_y) - (c_x^2 + c_y^2 )(a_y - b_y))) / ((a_y - b_y)(a_y - c_y))`</p>
	
	<p>`0 = (-2x (a_x - b_x)(a_y - c_y) + (a_x^2 + a_y^2)(a_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + 2x (a_x - c_x)(a_y - b_y) - (a_x^2 + a_y^2)(a_y - b_y) + (c_x^2 + c_y^2 )(a_y - b_y)) / ((a_y - b_y)(a_y - c_y))`</p>
	
	<p>`0 = (2x ((a_x - c_x)(a_y - b_y) - (a_x - b_x)(a_y - c_y)) + (a_x^2 + a_y^2)(b_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2 )(a_y - b_y)) / ((a_y - b_y)(a_y - c_y))`</p>
	
	<p>`0 = (2x (a_xa_y - c_xa_y - a_xb_y + c_xb_y - a_xa_y + b_xa_y + a_xc_y - b_xc_y) + (a_x^2 + a_y^2)(b_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2 )(a_y - b_y)) / ((a_y - b_y)(a_y - c_y))`</p>
	
	<p>`0 = (2x (-c_xa_y - a_xb_y + c_xb_y + b_xa_y + a_xc_y - b_xc_y) + (a_x^2 + a_y^2)(b_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2 )(a_y - b_y)) / ((a_y - b_y)(a_y - c_y))`</p>
	
	<p>`0 = (2x (-a_xb_y + a_xc_y - c_xa_y  + c_xb_y + b_xa_y - b_xc_y) + (a_x^2 + a_y^2)(b_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2 )(a_y - b_y)) / ((a_y - b_y)(a_y - c_y))`</p>
	
	<p>`0 = (2x (-a_x(b_y - c_y) - c_x(a_y - b_y) + b_x(a_y - c_y)) + (a_x^2 + a_y^2)(b_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2 )(a_y - b_y)) / ((a_y - b_y)(a_y - c_y))`</p>
	
	<p>`0 = 2x (-a_x(b_y - c_y) - c_x(a_y - b_y) + b_x(a_y - c_y)) + (a_x^2 + a_y^2)(b_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2 )(a_y - b_y) with (a_y != b_y, a_y != c_y)`</p>
	
	<p>`2x (a_x(b_y - c_y) + c_x(a_y - b_y) - b_x(a_y - c_y)) = (a_x^2 + a_y^2)(b_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2 )(a_y - b_y) with (a_y != b_y, a_y != c_y)`</p>
	
	<p>`x = ((a_x^2 + a_y^2)(b_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2 )(a_y - b_y)) / (2(a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y))) with (a_y != b_y, a_y != c_y)`</p>
	
	<p>`y = -2 ((a_x^2 + a_y^2)(b_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2 )(a_y - b_y)) / (2(a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y))) * (a_x - b_x) / (2(a_y - b_y)) + ((a_x^2 + a_y^2) - (b_x^2 + b_y^2)) / (2(a_y - b_y))`</p>
	
	<p>`y = -((a_x^2 + a_y^2)(b_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2 )(a_y - b_y)) / (a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)) * (a_x - b_x) / (2(a_y - b_y)) + ((a_x^2 + a_y^2) - (b_x^2 + b_y^2)) / (2(a_y - b_y))`</p>
	
	<p>`y = -(((a_x^2 + a_y^2)(b_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2 )(a_y - b_y))(a_x - b_x)) / ((a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)) (2(a_y - b_y))) + ((a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)) ((a_x^2 + a_y^2) - (b_x^2 + b_y^2))) / ((a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)) (2(a_y - b_y)))`</p>
	
	<p>`y = (-((a_x^2 + a_y^2)(b_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2 )(a_y - b_y))(a_x - b_x) + (a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)) ((a_x^2 + a_y^2) - (b_x^2 + b_y^2))) / ((a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)) (2(a_y - b_y)))`</p>
	
	<p>`y = ((-((a_x^2 + a_y^2)(b_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2 )(a_y - b_y))a_x + ((a_x^2 + a_y^2)(b_y - c_y) - (b_x^2 + b_y^2)(a_y - c_y) + (c_x^2 + c_y^2 )(a_y - b_y))b_x) + ((a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y))(a_x^2 + a_y^2) - (a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y))(b_x^2 + b_y^2))) / ((a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)) (2(a_y - b_y)))`</p>
	
	<p>`y = (-a_x(a_x^2 + a_y^2)(b_y - c_y) + a_x(b_x^2 + b_y^2)(a_y - c_y) - a_x(c_x^2 + c_y^2 )(a_y - b_y) + b_x(a_x^2 + a_y^2)(b_y - c_y) - b_x(b_x^2 + b_y^2)(a_y - c_y) + b_x(c_x^2 + c_y^2 )(a_y - b_y) + (a_x(a_x^2 + a_y^2)(b_y - c_y) - b_x(a_x^2 + a_y^2)(a_y - c_y) + c_x(a_x^2 + a_y^2)(a_y - b_y)) - (a_x(b_x^2 + b_y^2)(b_y - c_y) - b_x(b_x^2 + b_y^2)(a_y - c_y) + c_x(b_x^2 + b_y^2)(a_y - b_y))) / ((a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)) (2(a_y - b_y)))`</p>
	
	<p>`y = (cancel(-a_x(a_x^2 + a_y^2)(b_y - c_y)) + a_x(b_x^2 + b_y^2)(a_y - c_y) - a_x(c_x^2 + c_y^2 )(a_y - b_y) + b_x(a_x^2 + a_y^2)(b_y - c_y) - cancel(b_x(b_x^2 + b_y^2)(a_y - c_y)) + b_x(c_x^2 + c_y^2 )(a_y - b_y) + cancel(a_x(a_x^2 + a_y^2)(b_y - c_y)) - b_x(a_x^2 + a_y^2)(a_y - c_y) + c_x(a_x^2 + a_y^2)(a_y - b_y) - a_x(b_x^2 + b_y^2)(b_y - c_y) + cancel(b_x(b_x^2 + b_y^2)(a_y - c_y)) - c_x(b_x^2 + b_y^2)(a_y - b_y)) / ((a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)) (2(a_y - b_y)))`</p>
	
	<p>`y = (a_x(b_x^2 + b_y^2)((a_y - c_y) - (b_y - c_y)) - a_x(c_x^2 + c_y^2 )(a_y - b_y) + b_x(a_x^2 + a_y^2)((b_y - c_y) - (a_y - c_y)) + b_x(c_x^2 + c_y^2 )(a_y - b_y)  + c_x(a_x^2 + a_y^2)(a_y - b_y) - c_x(b_x^2 + b_y^2)(a_y - b_y)) / ((a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)) (2(a_y - b_y)))`</p>
	
	<p>`y = (a_x(b_x^2 + b_y^2)(a_y - b_y) - a_x(c_x^2 + c_y^2)(a_y - b_y) + b_x(a_x^2 + a_y^2)(b_y - a_y) + b_x(c_x^2 + c_y^2)(a_y - b_y) + c_x(a_x^2 + a_y^2)(a_y - b_y) - c_x(b_x^2 + b_y^2)(a_y - b_y)) / ((a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)) (2(a_y - b_y)))`</p>
	
	<p>`y = ((b_x^2 + b_y^2)(a_x(a_y - b_y) - c_x(a_y - b_y)) + (c_x^2 + c_y^2)(b_x(a_y - b_y) - a_x(a_y - b_y)) + (a_x^2 + a_y^2)(c_x(a_y - b_y) - b_x(a_y - b_y) )) / ((a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)) (2(a_y - b_y)))`</p>
	
	<p>`y = ((b_x^2 + b_y^2)(a_x - c_x)(a_y - b_y) + (c_x^2 + c_y^2)(b_x - a_x)(a_y - b_y) + (a_x^2 + a_y^2)(c_x - b_x)(a_y - b_y)) / ((a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)) (2(a_y - b_y)))`</p>
	
	<p>`y = ((cancel(a_y - b_y))((b_x^2 + b_y^2)(a_x - c_x) + (c_x^2 + c_y^2)(b_x - a_x) + (a_x^2 + a_y^2)(c_x - b_x))) / ((a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)) (2(cancel(a_y - b_y))))`</p>
	
	<p>`y = ((b_x^2 + b_y^2)(a_x - c_x) + (c_x^2 + c_y^2)(b_x - a_x) + (a_x^2 + a_y^2)(c_x - b_x)) / (2(a_x(b_y - c_y) - b_x(a_y - c_y) + c_x(a_y - b_y)))`</p>
	
	<p class="comment">まとめ: 内心は</p>
	<p>`{(x = ((a_x^2 + a_y^2)(b_y - c_y) + (b_x^2 + b_y^2)(c_y - a_y) + (c_x^2 + c_y^2)(a_y - b_y)) / (2(a_x(b_y - c_y) + b_x(c_y - a_y) + c_x(a_y - b_y)))),
	     (y = ((a_x^2 + a_y^2)(c_x - b_x) + (b_x^2 + b_y^2)(a_x - c_x) + (c_x^2 + c_y^2)(b_x - a_x)) / (2(a_x(b_y - c_y) + b_x(c_y - a_y) + c_x(a_y - b_y)))):}`</p>
</div>

<div style="font-size: 75%; display: none;">
	<p>三角形`ABC`の内心を`D`とする</p>
	<p>`D`から`bar(AB)`距離は</p>
	<p>`y = (a_y - b_y) / (a_x - b_x) x + (a_x b_y - a_y b_x) / (a_x - b_x)`に垂直し`D`通る直線と交点`E`と`D`の距離</p>
	<p>`D`を通り`bar(AB)`垂直する直線を求める(`tan(alpha + pi/2) = -cot(alpha)`によって)<p>
	<p>`d_y = - d_x / a + b'`</p>
	<p>`b' = d_y + d_x * (a_x - b_x) / (a_y - b_y)`</p>
	<p>`y = -x * (a_x - b_x) / (a_y - b_y) + d_y + d_x * (a_x - b_x) / (a_y - b_y)`</p>
	<p>交点`E`は</p>
	<p>`{(y = -x * (a_x - b_x) / (a_y - b_y) + d_y + d_x * (a_x - b_x) / (a_y - b_y)),
	     (y = (a_y - b_y) / (a_x - b_x) x + (a_x b_y - a_y b_x) / (a_x - b_x)):}` を解く</p>
	     
	<p>`d_y + d_x * (a_x - b_x) / (a_y - b_y) - (a_x b_y - a_y b_x) / (a_x - b_x) = (a_y - b_y) / (a_x - b_x) x + x * (a_x - b_x) / (a_y - b_y) `</p>
	
	<p>`d_y + d_x * (a_x - b_x) / (a_y - b_y) - (a_x b_y - a_y b_x) / (a_x - b_x) = x ((a_y - b_y) / (a_x - b_x) + (a_x - b_x) / (a_y - b_y)) `</p>
	
	<p>`d_y * ((a_x - b_x)(a_y - b_y)) / ((a_x - b_x)(a_y - b_y)) + d_x * (a_x - b_x)^2 / ((a_x - b_x)(a_y - b_y)) - ((a_y - b_y)(a_x b_y - a_y b_x)) / ((a_x - b_x)(a_y - b_y)) = x ((a_y - b_y)^2 + (a_x - b_x)^2) / ((a_x - b_x)(a_y - b_y)) `</p>
	
	<p>`d_y ((a_x - b_x)(a_y - b_y)) + d_x (a_x - b_x)^2 - ((a_y - b_y)(a_x b_y - a_y b_x)) = x ((a_y - b_y)^2 + (a_x - b_x)^2)`</p>
	
	<p>`x = (d_y ((a_x - b_x)(a_y - b_y)) + d_x (a_x - b_x)^2 - ((a_y - b_y)(a_x b_y - a_y b_x))) / ((a_y - b_y)^2 + (a_x - b_x)^2)`</p>
	
	<p>`y = (a_y - b_y) / (a_x - b_x) x + (a_x b_y - a_y b_x) / (a_x - b_x)` に代入</p>
	
	<p>`y = (a_y - b_y) / (a_x - b_x) * (d_y ((a_x - b_x)(a_y - b_y)) + d_x (a_x - b_x)^2 - ((a_y - b_y)(a_x b_y - a_y b_x))) / ((a_y - b_y)^2 + (a_x - b_x)^2) + (a_x b_y - a_y b_x) / (a_x - b_x)`</p>
	
	<p>`y = ((a_y - b_y)(d_y ((a_x - b_x)(a_y - b_y)) + d_x (a_x - b_x)^2 - ((a_y - b_y)(a_x b_y - a_y b_x)))) / ((a_x - b_x)((a_y - b_y)^2 + (a_x - b_x)^2)) + ((a_x b_y - a_y b_x)((a_y - b_y)^2 + (a_x - b_x)^2)) / ((a_x - b_x)((a_y - b_y)^2 + (a_x - b_x)^2))`</p>
	
	<p>`y = ((a_y - b_y)(d_y (a_x - b_x)(a_y - b_y) + d_x (a_x - b_x)^2 - (a_y - b_y)(a_x b_y - a_y b_x)) + (a_x b_y - a_y b_x)((a_y - b_y)^2 + (a_x - b_x)^2)) / ((a_x - b_x)((a_y - b_y)^2 + (a_x - b_x)^2))`</p>
	
	<p>`y = (d_y (a_x - b_x)(a_y - b_y)^2 + d_x (a_x - b_x)^2(a_y - b_y) - (a_y - b_y)^2(a_x b_y - a_y b_x) + (a_y - b_y)^2(a_x b_y - a_y b_x) + (a_x - b_x)^2(a_x b_y - a_y b_x)) / ((a_x - b_x)((a_y - b_y)^2 + (a_x - b_x)^2))`</p>
	
	<p>`y = ((a_x - b_x)(d_y (a_y - b_y)^2 + d_x (a_x - b_x)(a_y - b_y) + (a_x - b_x)(a_x b_y - a_y b_x))) / ((a_x - b_x)((a_y - b_y)^2 + (a_x - b_x)^2))`</p>
	
	<p>`y = (d_y (a_y - b_y)^2 + d_x (a_x - b_x)(a_y - b_y) + (a_x - b_x)(a_x b_y - a_y b_x)) / ((a_y - b_y)^2 + (a_x - b_x)^2)`</p>
	
	<p>`E`は</p>
	<p>`{(e_x = (d_y (a_x - b_x)(a_y - b_y) + d_x (a_x - b_x)^2 - (a_y - b_y)(a_x b_y - a_y b_x)) / ((a_y - b_y)^2 + (a_x - b_x)^2)),
	     (e_y = (d_x (a_x - b_x)(a_y - b_y) + d_y (a_y - b_y)^2 + (a_x - b_x)(a_x b_y - a_y b_x)) / ((a_y - b_y)^2 + (a_x - b_x)^2)):}`</p>
	     
	<p>`D`から`bar(AC)`に垂直線を引くと`F`で交差する</p>
	<p>`F`は<p>
	<p>`{(f_x = (d_y (a_x - c_x)(a_y - c_y) + d_x (a_x - c_x)^2 - (a_y - c_y)(a_x c_y - a_y c_x)) / ((a_y - c_y)^2 + (a_x - c_x)^2)),
	     (f_y = (d_x (a_x - c_x)(a_y - c_y) + d_y (a_y - c_y)^2 + (a_x - c_x)(a_x c_y - a_y c_x)) / ((a_y - c_y)^2 + (a_x - c_x)^2)):}`</p>
	     
	<p>`(d_x - e_x)^2 + (d_y - e_y)^2 = (d_x - f_x)^2 + (d_y - f_y)^2`</p>
	
	<p>`(d_x^2 - 2 d_x e_x + e_x^2) + (d_y^2 - 2d_ye_y + e_y^2) = (d_x^2 - 2d_xf_x + f_x^2) + (d_y^2 - 2d_yf_y + f_y^2)`</p>
	
	<p>`- 2 d_x e_x + e_x^2 - 2 d_y e_y + e_y^2 = -2d_xf_x + f_x^2 - 2d_yf_y + f_y^2`</p>
	
	<p>`e_x(e_x - 2 d_x) + e_y(e_y - 2d_y) = f_x(f_x-2d_x) + f_y(f_y- 2d_y)`</p>

	<p>`e_x * ((d_y (a_x - b_x)(a_y - b_y) + d_x (a_x - b_x)^2 - (a_y - b_y)(a_x b_y - a_y b_x)) / ((a_y - b_y)^2 + (a_x - b_x)^2) - 2 d_x) + e_y * ((d_x (a_x - b_x)(a_y - b_y) + d_y (a_y - b_y)^2 + (a_x - b_x)(a_x b_y - a_y b_x)) / ((a_y - b_y)^2 + (a_x - b_x)^2) - 2d_y) = f_x * ((d_y (a_x - c_x)(a_y - c_y) + d_x (a_x - c_x)^2 - (a_y - c_y)(a_x c_y - a_y c_x)) / ((a_y - c_y)^2 + (a_x - c_x)^2)-2d_x) + f_y * ((d_x (a_x - c_x)(a_y - c_y) + d_y (a_y - c_y)^2 + (a_x - c_x)(a_x c_y - a_y c_x)) / ((a_y - c_y)^2 + (a_x - c_x)^2) - 2d_y)`</p>
	
	<p>`e_x * ((d_y (a_x - b_x)(a_y - b_y) + d_x (a_x - b_x)^2 - (a_y - b_y)(a_x b_y - a_y b_x) - 2 d_x (a_y - b_y)^2 - 2 d_x (a_x - b_x)^2) / ((a_y - b_y)^2 + (a_x - b_x)^2)) + e_y * ((d_x (a_x - b_x)(a_y - b_y) + d_y (a_y - b_y)^2 + (a_x - b_x)(a_x b_y - a_y b_x) - 2d_y (a_y - b_y)^2 - 2d_y (a_x - b_x)^2) / ((a_y - b_y)^2 + (a_x - b_x)^2)) = f_x * ((d_y (a_x - c_x)(a_y - c_y) + d_x (a_x - c_x)^2 - (a_y - c_y)(a_x c_y - a_y c_x) - 2d_x (a_y - c_y)^2 - 2d_x (a_x - c_x)^2) / ((a_y - c_y)^2 + (a_x - c_x)^2)) + f_y * ((d_x (a_x - c_x)(a_y - c_y) + d_y (a_y - c_y)^2 + (a_x - c_x)(a_x c_y - a_y c_x) - 2d_y (a_y - c_y)^2  - 2d_y (a_x - c_x)^2) / ((a_y - c_y)^2 + (a_x - c_x)^2))`</p>
</div>
<div style="font-size: 75%;">
	<p>三角形`ABC`の内心を`D`とする< /p>
	<p>`bar(AB)`は`(a_y - b_y) x - (a_x - b_x) y + (a_x b_y - a_y b_x) = 0`</p>
	<p>`bar(AC)`は`(a_y - c_y) x - (a_x - c_x) y + (a_x c_y - a_y c_x) = 0`</p>
	<p>`bar(BC)`は`(b_y - c_y) x - (b_x - c_x) y + (b_x c_y - b_y c_x) = 0`</p>
	<p>`D`から`bar(AB)`の距離</p>
	<p>`|(a_y - b_y) d_x - (a_x - b_x) d_y + (a_x b_y - a_y b_x)| / sqrt((a_y - b_y)^2 + (a_x - b_x)^2)`</p> 
	
	<p>`D`から`bar(AC)`の距離</p>
	<p>`|(a_y - c_y) d_x - (a_x - c_x) d_y + (a_x c_y - a_y c_x)| / sqrt((a_y - c_y)^2 + (a_x - c_x)^2)`</p>
	
	<p>`D`から`bar(BC)`の距離</p>
	<p>`|(b_y - c_y) d_x - (b_x - c_x) d_y + (b_x c_y - b_y c_x)| / sqrt((b_y - c_y)^2 + (b_x - c_x)^2)`</p>
	<p>が全部同じ</p>
	<p>`|(a_y - b_y) d_x - (a_x - b_x) d_y + (a_x b_y - a_y b_x)| / sqrt((a_y - b_y)^2 + (a_x - b_x)^2) = |(a_y - c_y) d_x - (a_x - c_x) d_y + (a_x c_y - a_y c_x)| / sqrt((a_y - c_y)^2 + (a_x - c_x)^2)`</p>
	
	<p>`((a_y - b_y) d_x - (a_x - b_x) d_y + (a_x b_y - a_y b_x))^2 / ((a_y - b_y)^2 + (a_x - b_x)^2) = ((a_y - c_y) d_x - (a_x - c_x) d_y + (a_x c_y - a_y c_x))^2 / ((a_y - c_y)^2 + (a_x - c_x)^2)`</p>
	
	<p>`((a_y - b_y) d_x - (a_x - b_x) d_y + (a_x b_y - a_y b_x))^2 / (a_y^2 - 2a_yb_y + b_y^2 + a_x^2 - 2 a_x b_x + b_x^2) = ((a_y - c_y) d_x - (a_x - c_x) d_y + (a_x c_y - a_y c_x))^2 / (a_y^2 - 2 a_y c_y + c_y^2 + a_x^2 - 2 a_x c_x + c_x^2)`</p>
	
	<p>`(((a_y - b_y) d_x - (a_x - b_x) d_y + (a_x b_y - a_y b_x)) ((a_y - b_y) d_x - (a_x - b_x) d_y + (a_x b_y - a_y b_x))) / (a_y^2 - 2a_yb_y + b_y^2 + a_x^2 - 2 a_x b_x + b_x^2) = (((a_y - c_y) d_x - (a_x - c_x) d_y + (a_x c_y - a_y c_x)) ((a_y - c_y) d_x - (a_x - c_x) d_y + (a_x c_y - a_y c_x))) / (a_y^2 - 2 a_y c_y + c_y^2 + a_x^2 - 2 a_x c_x + c_x^2)`</p>
	
	<p>`(((a_y - b_y)^2 d_x^2 - (a_x - b_x) (a_y - b_y) d_x d_y + (a_x b_y - a_y b_x)(a_y - b_y) d_x) - ((a_x - b_x)(a_y - b_y) d_x d_y - (a_x - b_x)^2 d_y^2 + (a_x b_y - a_y b_x)(a_x - b_x) d_y) + ((a_x b_y - a_y b_x)(a_y - b_y) d_x - (a_x b_y - a_y b_x) (a_x - b_x) d_y + (a_x b_y - a_y b_x)^2)) / (a_y^2 - 2a_yb_y + b_y^2 + a_x^2 - 2 a_x b_x + b_x^2) = (((a_y - c_y) d_x - (a_x - c_x) d_y + (a_x c_y - a_y c_x)) ((a_y - c_y) d_x - (a_x - c_x) d_y + (a_x c_y - a_y c_x))) / (a_y^2 - 2 a_y c_y + c_y^2 + a_x^2 - 2 a_x c_x + c_x^2)`</p>
	
	<p>`((a_y^2 - 2 a_y b_y + b_y^2) d_x^2 - (a_xa_y - b_xa_y  - a_xb_y + b_xb_y) d_x d_y + (a_x a_y b_y - a_y^2 b_x - a_x b_y^2 + a_y b_x b_y) d_x - (a_x a_y - b_x a_y - a_x b_y + b_x b_y) d_x d_y + (a_x^2 -2 a_x b_x + b_x^2) d_y^2 - (a_x^2 b_y - a_x a_y b_x - a_x b_x b_y - a_y b_x^2) d_y + (a_x a_y b_y - a_y^2 b_x - a_x b_y^2 + a_y b_x b_y) d_x - (a_x^2 b_y - a_x a_y b_x - a_x b_x b_y - a_y b_x^2) d_y + (a_x^2 b_y^2 - 2 a_x b_y a_y b_x - a_y^2 b_x^2)) / (a_y^2 - 2a_yb_y + b_y^2 + a_x^2 - 2 a_x b_x + b_x^2) = (((a_y - c_y) d_x - (a_x - c_x) d_y + (a_x c_y - a_y c_x)) ((a_y - c_y) d_x - (a_x - c_x) d_y + (a_x c_y - a_y c_x))) / (a_y^2 - 2 a_y c_y + c_y^2 + a_x^2 - 2 a_x c_x + c_x^2)`</p>
	
</body></html>
<?php  
});
