<?php
function ffnn($layer) {
    $buff = "W_".($layer + 1)." psi_$layer(";
    
    if ($layer > 1) {
        $buff .= ffnn($layer - 1);
    } else {
        $buff .= "W_1 X + B_1";
    }
    
    $buff .= ") + B_" . ($layer + 1);
    
    return $buff;
}

function ffnn_w1($layer) {
    if ($layer > 1) {
        
    } else {
        $buff = "[Y-T]^T";
    }
    
    $buff .= "W_$layer";
    
    return $buff;
}

$dispatcher->route('/math-world/'.basename(__FILE__, '.php'), function() {
    common_head();
    $layer = $_GET['layer'];
?>
	<p>`<?php echo "Y = ".ffnn($layer)?>`</p>
	<p>`<?php echo "(del E)/(del W_1) = ".ffnn_w1($layer)?>`</p>
<?php
    common_foot();
});
