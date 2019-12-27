<?php
$dispatcher->route('/math-world/'.basename(__FILE__, '.php'), function() {
    common_head();
?>
	<h2>`(([Y-T]^t * W_3 * psi_2^'(W_2 * psi_1(W_1 X)) * W_2)^t @ psi_1^'(W_1 X)) * X^t`を展開</h2>
	
	<ul>
	<li>`X` は`a xx 1`</li>
	<li>`W_1`は`b xx a`</li>
	<li>`W_2`は`c xx b`</li>
	<li>`W_3`は`d xx c`</li>
	<li>`Y` は`d xx 1`, `T`は`Y`と同じ形</li></ul>
	
	<p>`(([[sum_(l=1)^d [Y-T]_l * w_3(l,1),sum_(l=1)^d [Y-T]_l * w_3(l,2),cdots, sum_(l=1)^d [Y-T]_l * w_3(l,c)]] * psi_2^'(W_2 * psi_1(W_1 X)) * W_2)^t @ psi_1^'(W_1 X)) * X^t`</p>
	
	<p>`((sum_(k=1)^c sum_(l=1)^d [Y-T]_l * w_3(l,k) * psi_2^'(W_2 * psi_1(W_1 X))_k) * W_2)^t @ psi_1^'(W_1 X)) * X^t`</p>
	
	<p>`([
	[
		(sum_(k=1)^c sum_(l=1)^d [Y-T]_l * w_3(l,k) * psi_2^'(W_2 * psi_1(W_1 X))_k) * w_(2(1,1)),
		(sum_(k=1)^c sum_(l=1)^d [Y-T]_l * w_3(l,k) * psi_2^'(W_2 * psi_1(W_1 X))_k) * w_(2(1,2)),
		cdots,
		(sum_(k=1)^c sum_(l=1)^d [Y-T]_l * w_3(l,k) * psi_2^'(W_2 * psi_1(W_1 X))_k) * w_(2(1,b))
	],
	[
		(sum_(k=1)^c sum_(l=1)^d [Y-T]_l * w_3(l,k) * psi_2^'(W_2 * psi_1(W_1 X))_k) * w_(2(2,1)),
		(sum_(k=1)^c sum_(l=1)^d [Y-T]_l * w_3(l,k) * psi_2^'(W_2 * psi_1(W_1 X))_k) * w_(2(2,2)),
		cdots,
		(sum_(k=1)^c sum_(l=1)^d [Y-T]_l * w_3(l,k) * psi_2^'(W_2 * psi_1(W_1 X))_k) * w_(2(2,b))
	],
	[vdots,vdots,ddots,vdots],
	[
		(sum_(k=1)^c sum_(l=1)^d [Y-T]_l * w_3(l,k) * psi_2^'(W_2 * psi_1(W_1 X))_k) * w_(2(c,1)),
		(sum_(k=1)^c sum_(l=1)^d [Y-T]_l * w_3(l,k) * psi_2^'(W_2 * psi_1(W_1 X))_k) * w_(2(c,2)),
		cdots,
		(sum_(k=1)^c sum_(l=1)^d [Y-T]_l * w_3(l,k) * psi_2^'(W_2 * psi_1(W_1 X))_k) * w_(2(c,b))
	]]^t @ psi_1^'(W_1 X)) * X^t`</p>
	
	<h2>`((([Y-T]^t * W_3)^t @ psi_2^'(W_2 * psi_1(W_1 X)) * W_2)^t @ psi_1^'(W_1 X)) * X^t`を展開</h2>
	
	<p>`(([
		[sum_(l=1)^d [Y-T]_l * w_3(l,1)],
		[sum_(l=1)^d [Y-T]_l * w_3(l,2)],
		[vdots],
		[sum_(l=1)^d [Y-T]_l * w_3(l,c)]] @ psi_2^'(W_2 * psi_1(W_1 X)) * W_2)^t @ psi_1^'(W_1 X)) * X^t`</p>
		
	<p>`(([
		[sum_(l=1)^d [Y-T]_l * w_3(l,1) * psi_2^'(W_2 * psi_1(W_1 X))_1],
		[sum_(l=1)^d [Y-T]_l * w_3(l,2) * psi_2^'(W_2 * psi_1(W_1 X))_2],
		[vdots],
		[sum_(l=1)^d [Y-T]_l * w_3(l,c) * psi_2^'(W_2 * psi_1(W_1 X))_c]] * W_2)^t @ psi_1^'(W_1 X)) * X^t`</p>
		
		
	<p>`([
		[sum_(k=1)^c sum_(l=1)^d [Y-T]_l * w_3(l,k) * psi_2^'(W_2 * psi_1(W_1 X))_k * w_(2(k,1))],
		[sum_(k=1)^c sum_(l=1)^d [Y-T]_l * w_3(l,k) * psi_2^'(W_2 * psi_1(W_1 X))_k * w_(2(k,2))],
		[vdots],
		[sum_(k=1)^c sum_(l=1)^d [Y-T]_l * w_3(l,k) * psi_2^'(W_2 * psi_1(W_1 X))_k * w_(2(k,b))]] @ psi_1^'(W_1 X)) * X^t`</p>
	
<?php
    common_foot();
});
