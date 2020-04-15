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
<script type="text/javascript">
var ctx;
var start = null;
var points = [];

function point(theta, l1, l2) {
	let x = Math.cos(theta) * 90.0 + 100.0;
	let y = Math.sin(theta) * 90.0 + 100.0;

	let cos_beta = -((l1 * l1 + l2 * l2) - (x * x + y * y)) / (2 * l1 * l2);
	let beta = Math.acos(cos_beta);
	let sin_beta = Math.sin(beta);
	let tan_alpha_1 = sin_beta / (l1 / l2 + cos_beta);
	let sin_alpha_2 = y / Math.sqrt(x * x + y * y);
	let alpha = Math.atan(tan_alpha_1) + Math.asin(sin_alpha_2);
	let l1_x = Math.cos(alpha) * l1;
	let l1_y = Math.sin(alpha) * l1;
	let l2_x = l1_x + Math.cos(alpha - beta) * l2;
	let l2_y = l1_y + Math.sin(alpha - beta) * l2;

	ctx.beginPath();
	ctx.moveTo(0, 0);
	ctx.lineTo(l1_x, l1_y);
	ctx.lineTo(l2_x, l2_y);
	ctx.stroke();
}

function animation(timestamp) {
	
	ctx.clearRect(0, 0, 300, 300);

	// drow dial
	ctx.save();
	ctx.textAlign = "center";
	ctx.textBaseline = "middle";
	for (let h = 1; h <= 12; h++) {
		let a = - Math.PI * (-h + 3.0) / 6.0;
		let x = Math.cos(a) * 90.0 + 150.0;
		let y = Math.sin(a) * 90.0 + 150.0;
		ctx.fillText(h.toString(), x, y);
	}
	ctx.restore();
	
	ctx.save();
	ctx.transform(1, 0, 0, -1, 150, 150);
	ctx.beginPath();
	ctx.arc(0, 0, 100, 0, Math.PI * 2, true);
	ctx.stroke();
	
	ctx.restore();

	if (! start) start = Date.now();

	// second pointer
	ctx.save();
	ctx.transform(1, 0, 0, -1, 50, 250);
	let theta = 2 * Math.PI * (0.25 - ((start + timestamp) / 60000.0));
	point(theta, 150, 150);
	ctx.restore();

	// minute pointer
	ctx.save();
	ctx.transform(-1, 0, 0, -1, 250, 250);
	theta = 2 * Math.PI * (0.25 + ((start + timestamp) / 3600000.0));
	point(theta, 150, 150);
	ctx.restore();

	// houre pointer
	ctx.save();
	ctx.transform(1, 0, 0, 1, 50, 50);
	theta = 2 * Math.PI * (0.50 + ((start + timestamp) / 43200000.0));
	point(theta, 150, 150);
	ctx.restore();
	
	window.requestAnimationFrame(animation);
}


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

</script>
<title></title>
</head><body onload="main()">
<div class="container">
<canvas width="300" height="300" style="border: solid 1px;"></canvas>
</div>
</body></html>
<?php
});
