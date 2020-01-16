<?php
function ffnn($layer)
{
    if ($layer >= 0) {
        $buff = "W_".($layer + 1);
    }
    
    if ($layer > 0) {
        $buff .= " psi_$layer(". ffnn($layer - 1) . ")";
    } else {
        $buff .= " X";
    }
    
    if ($layer >= 0) {
        $buff .= " + B_" . ($layer + 1);
    }
    
    return $buff;
}

/**
 * 
 * @param int $number
 * @param int $layer
 * @param int $total
 * @return string
 */
function ffnn_del_w($number, $layer, $total)
{ 
    if ($layer > 0) {
        $buff = ffnn_del_w($number, $layer - 1, $total + 1);
    } else {
        $buff = "Y-T";
    }
    
    $fnc = ffnn($total - 1);
    error_log($fnc);
    
    $matches = [];
    preg_match('/^(W_\d) (.*) \+ B_\d$/', $fnc, $matches);
    
    if ($total > $number + 1) {
        $buff = "(($buff)^T {$matches[1]})^T @ ". preg_replace('/psi_/', 'psi\'_', $matches[2], 1);
    } elseif ($total == $number + 1) {
        $buff = "($buff) {$matches[2]}^T"; 
    }
    
    return $buff;
}

function ffnn_del_b($number, $layer, $total)
{
    if ($layer > 0) {
        $buff = ffnn_del_b($number, $layer - 1, $total + 1);
    } else {
        $buff = "Y-T";
    }
    
    $fnc = ffnn($total - 1);
    error_log($fnc);
    
    $matches = [];
    preg_match('/^(W_\d) (.*) \+ B_\d$/', $fnc, $matches);
    
    if ($total > $number + 1) {
        $buff = "(($buff)^T {$matches[1]})^T @ ". preg_replace('/psi_/', 'psi\'_', $matches[2], 1);
    } else{
    }
    
    return $buff;
}

$dispatcher->route('/math-world/'.basename(__FILE__, '.php'), function() {
    common_head();
    $layer = $_GET['layer'];
?>
	<h1>FFNN (フィードフォワードニューラルネットワーク)</h1>
	
	<p>`<?php echo "Y = ".ffnn($layer)?>` (ニューロンモデル)</p>
	<p>`E = 1/2||Y-T||^2` (誤差函数)</p>
<?php for ($i = 0; $i <= $layer; $i++) { ?>
	<p>`(del E)/(del W_<?php echo $i + 1?>) = <?php echo ffnn_del_w($i, $layer, 1)?>`</p>
	<p>`(del E)/(del B_<?php echo $i + 1?>) = <?php echo ffnn_del_b($i, $layer, 1)?>`</p>
<?php } ?>
	<div>
	<h2>ptyhon code</h2>
	<pre style="border: solid 1px; padding: .5em">
import numpy as np

learn_rate = 0.001
<?php for ($i = 1; $i <= $layer +1 ; $i++) {?>
w<?php echo $i?> = np.array()
b<?php echo $i?> = np.array()
<?php }?>
	
<?php for ($i = 1; $i <= $layer; $i++) {?>
def act<?php echo $i?>(x):
	return x
	
def act<?php echo $i?>_dash(x):
	return x
	
<?php }?>
def forward(x):
	global <?php for ($i = 1; $i <= $layer + 1; $i++) { echo "w$i, b$i, "; } ?>
	
	p0 = x
<?php for ($i = 1; $i <= $layer; $i++) {?>
	p<?php echo $i?> = act<?php echo $i?>(w<?php echo $i?> @ p<?php echo $i - 1?> + b<?php echo $i?>)
<?php }?>
	return w<?php echo $layer+1?> @ p<?php echo $layer?>


def backward(x, diff):
	global <?php for ($i = 1; $i <= $layer + 1; $i++) { echo "w$i, b$i, "; } ?>
	
	p0 = x
<?php for ($i = 1; $i <= $layer; $i++) {?>
	p<?php echo $i?> = act<?php echo $i?>(w<?php echo $i?> @ p<?php echo $i - 1?> + b<?php echo $i?>)
<?php }?>

	v<?php echo $layer + 1?>_b = diff
	v<?php echo $layer + 1?>_w = v<?php echo $layer + 1?>_b @ p<?php echo $layer?>.T
<?php for ($i = $layer; $i >= 1; $i--) {?>
	v<?php echo $i?>_b = (v<?php echo $i + 1?>_b.T @ w<?php echo $i + 1?>).T * act<?php echo $i?>_dash(w<?php echo $i?> @ p<?php echo $i - 1?> + b<?php echo $i?>)
	v<?php echo $i?>_w = v<?php echo $i?>_b @ p<?php echo $i - 1?>.T
<?php }?>
	
<?php for ($i = $layer + 1; $i >= 1; $i--) {?>
	w<?php echo $i?> -= learn_rate * v<?php echo $i?>_w
	b<?php echo $i?> -= learn_rate * v<?php echo $i?>_b
<?php }?>

	</pre></div>
<?php
    common_foot();
});
