<?php
$dispatcher->route('/math-world/'.basename(__FILE__, '.php'), function() {
    common_head();
?>
	<p>`s = a_1(b_1 + b_2 + cdots + b_n) + a_2(b_1 + b_2 + cdots + b_n) + cdots + a_m(b_1 + b_2 + cdots + b_n)`</p>
	
	<p>`s = (a_1b_1 + a_1b_2 + cdots + a_1b_n) + (a_2b_1 + a_2b_2 + cdots + a_2b_n) + cdots + (a_mb_1 + a_mb_2 + cdots + a_mb_n)`</p>
	
	<p>`s = a_1b_1 + a_1b_2 + cdots + a_1b_n + a_2b_1 + a_2b_2 + cdots + a_2b_n + cdots + a_mb_1 + a_mb_2 + cdots + a_mb_n`</p>
	
	<p>`s = a_1(sum_(i=1)^n b_i) + a_2(sum_(i=1)^n b_i) + cdots + a_m(sum_(i=1)^n b_i)`</p>
	
	<p>`s = sum_(j=1)^m a_j(sum_(i=1)^n b_i)`</p>
	
	<p>`s = sum_(j=1)^m sum_(i=1)^n a_j b_i`</p>
	
<?php
    common_foot();
});
