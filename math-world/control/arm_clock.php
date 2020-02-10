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
	let s = timestamp % 60;
	let m = timestamp % 3600;
	let h = timestamp % 86400;
	
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
	
	
	// second pointer
	
	
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
<canvas width="300" height="300" style="border: solid 1px;"></canvas>
</div>
</body></html>
<?php
});
