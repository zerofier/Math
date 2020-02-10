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
</head><body>
<ul>
<?php foreach ($dispatcher->routes as $path =>$callebel) {?>
	<li><a href="<?php echo $path ?>"><?php echo $path ?></a></li>
<?php }?>
</ul>
</body></html>


