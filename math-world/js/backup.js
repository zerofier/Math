
function circumcircle() {
	let x = [];
	let y = [];

	ctx.clearRect(0, 0, 400, 300);
	
	ctx.save();
	ctx.transform(1, 0, 0, -1, 100, 200);
	ctx.beginPath();
	ctx.moveTo(0, 0);
	
	for (let i = 0; i < 2; i++) {
    	x[i] = Math.random() * 200;
    	y[i] = Math.random() * 200;
    	
    	ctx.lineTo(x[i], y[i]);
	}
	ctx.closePath();
	ctx.stroke();

	let ll = [(x[0]*x[0] + y[0]*y[0]), (x[1]*x[1] + y[1]*y[1])];
	let s2 = 2*(x[1]*y[0] - x[0]*y[1]);
	let ox = (y[0]*ll[1] - y[1]*ll[0]) / s2;
	let oy = (x[1]*ll[0] - x[0]*ll[1]) / s2;

	let r = Math.sqrt(Math.pow(ox-x[0], 2) + Math.pow(oy - y[0], 2));
	ctx.beginPath();
	ctx.moveTo(ox, oy);
	ctx.arc(ox, oy, 1, 0, Math.PI * 2);
	ctx.strokeStyle = 'blue';
	ctx.stroke();
	
	ctx.beginPath();
	ctx.moveTo(ox + r, oy);
	ctx.arc(ox, oy, r, 0, Math.PI * 2);
	ctx.strokeStyle = 'red';
	ctx.stroke();
	ctx.restore();
}

let drawtime;
let target;
let x, y, o;
let l1 = 100;
let l2 = 100;
let path = [];
function draw(timestamp)
{
	if (!drawtime) drawtime = timestamp;
	let progress = timestamp - drawtime;
	drawtime = timestamp;

	if (! x) x = 0;
	if (! y) y = 0;
	if (! o) o = [0, 0];
	
	if (! target || (target.a[0] == o[0] && target.a[1] == o[1])) {
		
		target = {
			'x': Math.random() * 141,
			'y': Math.random() * 141,
		};

		target.a = arm(target.x, target.y, false);
		
		target.d = [
			(target.a[0] - o[0]) / 1000,
			(target.a[1] - o[1]) / 1000
		];

		path = [];
	}

	ctx.clearRect(0, 0, 400, 300);
	
	ctx.save();
	ctx.transform(1, 0, 0, -1, 100, 300);
	ctx.beginPath();
	ctx.moveTo(target.x, target.y);
	ctx.arc(target.x, target.y, 2, 0, Math.PI * 2);
	ctx.fill();

	o[0] += target.d[0] * progress;
	o[1] += target.d[1] * progress;
	if ((target.d[0] > 0 && o[0] > target.a[0]) || (target.d[0] < 0 && o[0] < target.a[0])) o[0] = target.a[0];
	if ((target.d[1] > 0 && o[1] > target.a[1]) || (target.d[1] < 0 && o[1] < target.a[1])) o[1] = target.a[1];

	let point1 = {
		'x': Math.cos(o[0]) * l1, 
		'y': Math.sin(o[0]) * l1
	};

	let point2 = {
		'x': point1.x + Math.cos(o[0] + o[1]) * l2, 
		'y': point1.y + Math.sin(o[0] + o[1]) * l2
	};

	path.push(point2);
	
	ctx.beginPath();
	ctx.moveTo(0, 0);
	ctx.lineTo(point1.x, point1.y);
	ctx.lineTo(point2.x, point2.y);
	ctx.stroke();

	ctx.beginPath();
	ctx.moveTo(path[0].x, path[0].y);
	for (let i = 1; i < path.length; i++) {
		ctx.lineTo(path[i].x, path[i].y);
	}
	ctx.strokeStyle = 'green';
	ctx.stroke();
	
	ctx.restore();
	
	ctx.strokeText((new Date()).toTimeString(), 150, 10);

	window.requestAnimationFrame(draw);
}

function arm(x, y, draw) {
	
	let cos_beta = - (l1 * l1 + l2 * l2 - x * x - y * y) / (2 * l1 * l2);
	let beta = - Math.acos(cos_beta);
	let tan_alpha = (Math.sin(beta) * l2) / (l1 + cos_beta * l2);
	let tan_xy = y / x;
	let alpha = Math.atan(tan_xy) - Math.atan(tan_alpha);
	
	let point1 = {
		'x': Math.cos(alpha) * l1, 
		'y': Math.sin(alpha) * l1
	};

	let point2 = {
		'x': point1.x + Math.cos(alpha + beta) * l2, 
		'y': point1.y + Math.sin(alpha + beta) * l2
	};
	
	if (draw) {
    	ctx.save();
    	ctx.beginPath();
    	ctx.moveTo(0, 0);
    	ctx.lineTo(point1.x, point1.y);
    	ctx.lineTo(point2.x, point2.y);
    	ctx.stroke();
    	ctx.restore();
	}

	return [ alpha, beta ];
}