<?php
require_once __DIR__.'/dispatcher.php';

$call = $dispatcher->find($_SERVER['REDIRECT_URL']);

if ($call != null) {
	$call();
	exit(0);
}
?>
<!DOCTYPE html>
<html><head>
<meta charset="utf-8">
<style type="text/css">
.menu .btn {
    padding: .5rem .75rem; 
    display: inline-block; 
    border: solid 1px; 
    margin: .2rem 0px; 
    border-radius: .4rem;
    /*filter: url('#f3');*/
    /*mask: url('#Mask');*/
}
</style>
</head><body>
<svg height="0">
	<defs>
		<linearGradient id="Gradient1">
			<stop class="stop1" offset="0%" />
			<stop class="stop2" offset="50%" />
			<stop class="stop3" offset="100%" />
		</linearGradient>
		<linearGradient id="Gradient2" x1="0" x2="0" y1="0" y2="1">
			<stop offset="0%" stop-color="red" />
			<stop offset="50%" stop-color="black" stop-opacity="0" />
			<stop offset="100%" stop-color="blue" />
		</linearGradient>
		<style type="text/css">
		<![CDATA[
            #rect1 { fill: url(#Gradient1); }
            .stop1 { stop-color: red; }
            .stop2 { stop-color: black; stop-opacity: 0; }
            .stop3 { stop-color: blue; }
        ]]></style>
		<linearGradient id="Gradient">
			<stop offset="0" stop-color="white" stop-opacity="0" />
			<stop offset="1" stop-color="white" stop-opacity="1" />
		</linearGradient>
		<mask id="Mask">
			<rect x="0" y="0" width="200" height="200" fill="url(#Gradient)" />
		</mask>
	</defs>
	<rect id="rect1" x="0" y="0" rx="15" ry="15" width="100" height="100" />
	<filter id="f2">
		<feColorMatrix values="0.3333 0.3333 0.3333 0 0
		                       0.3333 0.3333 0.3333 0 0
		                       0.3333 0.3333 0.3333 0 0
		                       0      0      0      1 0" />
	</filter>
	<filter id="f3">
		<feConvolveMatrix filterRes="100 100"
			style="color-interpolation-filters:sRGB"
			order="3"
			kernelMatrix=" 0 -1  0
			              -1  4 -1
			               0 -1  0" preserveAlpha="true" />
	</filter>
</svg>
<ul class="menu">
<?php foreach ($dispatcher->routes as $path => $callebel) {?>
	<li><a class="btn" href="<?php echo $path ?>"><?php echo $path ?></a></li>
<?php }?>
</ul>
</body></html>
