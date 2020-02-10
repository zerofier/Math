<?php
function common_head($append="") {
?>
<!DOCTYPE html>
<html><head>
<meta charset="utf-8">
<title></title>
<style type="text/css">
body {
	font-size: 12px;
}

p {
	padding-bottom: .5rem;
	margin-bottom: 2rem;
	border-bottom: dashed 1px #CCC;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=AM_CHTML"></script>
<?php echo $append?>
</head><body>
<?php
}
function common_foot() {
?>
</body></html>
<?php
}

require_once __DIR__ . '/triangle.php';

require_once __DIR__ . '/interpolation.php';

require_once __DIR__ . '/ffnn.php';

require_once __DIR__ . '/ffnn2.php';

require_once __DIR__ . '/ffnn3.php';

require_once __DIR__ . '/ffnn2c.php';

require_once __DIR__ . '/sigma.php';

require_once __DIR__ . '/ffnnx.php';

require_once __DIR__ . '/matrix.php';

require_once __DIR__ . '/bernoulli.php';

require_once __DIR__ . '/turing.php';

require_once __DIR__ . '/arm.php';

require_once __DIR__ . '/arm_clock.php';

require_once __DIR__ . '/svd.php';
