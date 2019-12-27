<?php

$dispatcher->route('/math-world/'.basename(__FILE__, '.php'), function() {
    common_head();
?>
	<h3>`Y=W_4 psi_3(W_3 psi_2(W_2 psi_1(W_1 X)))`</h3>
	<p>`X` は`a xx 1`</p>
	<p>`W_1`は`b xx a`</p>
	<p>`W_2`は`c xx b`</p>
	<p>`W_3`は`d xx c`</p>
	<p>`W_4`は`e xx d`</p>
	<p>`Y` は`e xx 1`, `T`は`Y`と同じ形</p>
	<h3>`E=(||Y-T||^2)/2`</h3>
	<p>`E=(||W_4 psi_3(W_3 psi_2(W_2 psi_1(W_1 X)))-T||^2)/2`</p>
	<p>`E=(||W_4 psi_3(W_3 psi_2(W_2 psi_1([[sum_(i=1)^a w_(1(1,i)) x_i],[sum_(i=1)^a w_(1(2,i)) x_i],[vdots],[sum_(i=1)^a w_(1(b,i)) x_i]])))-T||^2)/2`</p>
	
	<p>`E=(||W_4 psi_3(W_3 psi_2([
		[sum_(j=1)^b w_(2(1,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i)],
		[sum_(j=1)^b w_(2(2,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i)],
		[vdots],
		[sum_(j=1)^b w_(2(c,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i)]]))-T||^2)/2`</p>
		
	<p>`E=(||W_4 psi_3([
		[sum_(k=1)^c w_(3(1,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))],
		[sum_(k=1)^c w_(3(2,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))],
		[vdots],
		[sum_(k=1)^c w_(3(d,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))]])
		-T||^2)/2`</p>
		
	<p>`E=(||[
		[sum_(l=1)^d w_(4(1,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i)))],
		[sum_(l=1)^d w_(4(2,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i)))],
		[vdots],
		[sum_(l=1)^d w_(4(e,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i)))]]
		-T||^2)/2`</p>
		
	<p>`E=(||[
		[sum_(l=1)^d w_(4(1,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_1],
		[sum_(l=1)^d w_(4(2,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_2],
		[vdots],
		[sum_(l=1)^d w_(4(e,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_e]]
		||^2)/2`</p>
		
	<p>`E=(
		[sum_(l=1)^d w_(4(1,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_1]^2 + 
		[sum_(l=1)^d w_(4(2,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_2]^2 +
		cdots,
		[sum_(l=1)^d w_(4(e,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_e]^2 )/2`</p>
		
	<p>`E=sum_(m=1)^e ([sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m]^2 )/2`</p>
		
	<h4>`(del E)/(del W_1)` を求める </h4>
	
	<p>`(del E)/(del w_(1(1,1)))=sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * [sum_(l^'=1)^d w_(4(m,l^')) psi_3(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^'))))]^'`</p>
	
	<p>`(del E)/(del w_(1(1,1)))=sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * [sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * [sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^(''))))]^']`</p>
	
	<p>`(del E)/(del w_(1(1,1)))=sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * [sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * [sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * [sum_(j^(''')=1)^b w_(2(k^(''),j^('''))) psi_1(sum_(i^(''')=1)^b w_(1(j^('''),i^('''))) x_(i^(''')))]^']]`</p>
	
	<p>`(del E)/(del w_(1(1,1)))=sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * [sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * [sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * [sum_(j^(''')=1)^b w_(2(k^(''),j^('''))) psi_1^'(sum_(i^(''')=1)^b w_(1(j^('''),i^('''))) x_(i^('''))) * [sum_(i^('''')=1)^b w_(1(j^('''),i^(''''))) x_(i^(''''))]^' ]]]`</p>
	
	<p>`(del E)/(del w_(1(1,1)))=sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * [sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * [sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * [sum_(j^(''')=1)^b w_(2(k^(''),j^('''))) psi_1^'(sum_(i^(''')=1)^b w_(1(j^('''),i^('''))) x_(i^('''))) * [w_(1(j^('''),1)) x_(1)]^' ]]]`</p>
	
	<p>`(del E)/(del w_(1(1,1)))=sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * [sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * [sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),1)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^('''))) * x_1 ]]`</p>
	
	<p>`(del E)/(del w_(1(1,2)))=sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * [sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * [sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),1)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^('''))) * x_2 ]]`</p>
	
	<p>`(del E)/(del w_(1(2,1)))=sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * [sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * [sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),2)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^('''))) * x_1 ]]`</p>
	
	<p>`(del E)/(del w_(1(b,a)))=sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * [sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * [sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),b)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^('''))) * x_a ]]`</p>
	
	<p>`(del E)/(del W_1) = [
		[
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),1)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^('''))) * x_1,
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),1)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^('''))) * x_2,
			cdots,
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),1)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^('''))) * x_a
		],
		[
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),2)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^('''))) * x_1,
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),2)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^('''))) * x_2,
			cdots,
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),2)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^('''))) * x_a
		],
		[vdots,vdots,ddots,vdots],
		[
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),b)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^('''))) * x_1,
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),b)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^('''))) * x_2,
			cdots,
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),b)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^('''))) * x_a
		]]`</p>
		
	<p>`(del E)/(del W_1) = [
		[
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),1)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^(''')))
		],
		[
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),2)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^(''')))
		],
		[vdots],
		[
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),b)) psi_1^'(sum_(i^(''')=1)^b w_(1(1,i^('''))) x_(i^(''')))
		]] * [[x_1, x_2, cdots, x_a]]`</p>
		
	<p>`(del E)/(del W_1) = ([
		[
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),1))
		],
		[
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),2))
		],
		[vdots],
		[
			sum_(m=1)^e [sum_(l=1)^d w_(4(m,l)) psi_3(sum_(k=1)^c w_(3(l,k)) psi_2(sum_(j=1)^b w_(2(k,j)) psi_1(sum_(i=1)^b w_(1(j,i)) x_i))) - t_m] * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),b))
		]] @ psi_1^'(W_1 X)) * [[x_1, x_2, cdots, x_a]]`</p>
		
	<p>`(del E)/(del W_1) = ([
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),1))
		],
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),2))
		],
		[vdots],
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1(sum_(i^('')=1)^b w_(1(j^(''),i^(''))) x_(i^('')))) * w_(2(k^(''),b)) 
		]] @ psi_1^'(W_1 X)) * [[x_1, x_2, cdots, x_a]]`</p>
		
	<p>`(del E)/(del W_1) = ([
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1([W_1 X]_(j^('')))) * w_(2(k^(''),1))
		],
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1([W_1 X]_(j^('')))) * w_(2(k^(''),2))
		],
		[vdots],
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(sum_(j^('')=1)^b w_(2(k^(''),j^(''))) psi_1([W_1 X]_(j^('')))) * w_(2(k^(''),b)) 
		]] @ psi_1^'(W_1 X)) * [[x_1, x_2, cdots, x_a]]`</p>
		
	<p>`(del E)/(del W_1) = ([
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(W_2 psi_1([W_1 X]_(j^(''))))_(k^('')) * w_(2(k^(''),1))
		],
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(W_2 psi_1([W_1 X]_(j^(''))))_(k^('')) * w_(2(k^(''),2))
		],
		[vdots],
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * sum_(k^('')=1)^c w_(3(l^',k^(''))) psi_2^'(W_2 psi_1([W_1 X]_(j^(''))))_(k^('')) * w_(2(k^(''),b))
		]] @ psi_1^'(W_1 X)) * [[x_1, x_2, cdots, x_a]]`</p>
		
	<p>`(del E)/(del W_1) = ([
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * [W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2]_((l^',1))
		],
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * [W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2]_((l^',2))
		],
		[vdots],
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(sum_(j^'=1)^b w_(2(k^',j^')) psi_1(sum_(i^'=1)^b w_(1(j^',i^')) x_(i^')))) * [W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2]_((l^',b))
		]] @ psi_1^'(W_1 X)) * [[x_1, x_2, cdots, x_a]]`</p>
		
	<p>`(del E)/(del W_1) = ([
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(W_2 psi_1(W_1 X))_(k^')) * [W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2]_((l^',1))
		],
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(W_2 psi_1(W_1 X))_(k^')) * [W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2]_((l^',2))
		],
		[vdots],
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(sum_(k^'=1)^c w_(3(l^',k^')) psi_2(W_2 psi_1(W_1 X))_(k^')) * [W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2]_((l^',b))
		]] @ psi_1^'(W_1 X)) * [[x_1, x_2, cdots, x_a]]`</p>
		
	<p>`(del E)/(del W_1) = ([
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(W_3 psi_2(W_2 psi_1(W_1 X)))_(l^') * [W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2]_((l^',1))
		],
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(W_3 psi_2(W_2 psi_1(W_1 X)))_(l^') * [W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2]_((l^',2))
		],
		[vdots],
		[
			sum_(m=1)^e [Y-T]_m * sum_(l^'=1)^d w_(4(m,l^')) psi_3^'(W_3 psi_2(W_2 psi_1(W_1 X)))_(l^') * [W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2]_((l^',b))
		]] @ psi_1^'(W_1 X)) * [[x_1, x_2, cdots, x_a]]`</p>
		
	<p>`(del E)/(del W_1) = ([
		[
			sum_(m=1)^e [Y-T]_m * [W_4 psi_3^'(W_3 psi_2(W_2 psi_1(W_1 X)))_(l^') * W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2]_((m,1))
		],
		[
			sum_(m=1)^e [Y-T]_m * [W_4 psi_3^'(W_3 psi_2(W_2 psi_1(W_1 X)))_(l^') * W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2]_((m,2))
		],
		[vdots],
		[
			sum_(m=1)^e [Y-T]_m * [W_4 psi_3^'(W_3 psi_2(W_2 psi_1(W_1 X)))_(l^') * W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2]_((m,b))
		]] @ psi_1^'(W_1 X)) * [[x_1, x_2, cdots, x_a]]`</p>
	
	<p>`(del E)/(del W_1) = ([
		[
			[([Y-T]^t * W_4 psi_3^'(W_3 psi_2(W_2 psi_1(W_1 X)))_(l^') * W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2)^t]_1
		],
		[
			[([Y-T]^t * W_4 psi_3^'(W_3 psi_2(W_2 psi_1(W_1 X)))_(l^') * W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2)^t]_2
		],
		[vdots],
		[
			[([Y-T]^t * W_4 psi_3^'(W_3 psi_2(W_2 psi_1(W_1 X)))_(l^') * W_3 psi_2^'(W_2 psi_1(W_1 X)) W_2)^t]_b
		]] @ psi_1^'(W_1 X)) * [[x_1, x_2, cdots, x_a]]`</p>
		
		
	<p>`(del E)/(del W_1) = (([Y-T]^t * W_4 @ psi_3^'(W_3 psi_2(W_2 psi_1(W_1 X))) * W_3 psi_2^'(W_2 psi_1(W_1 X)) * W_2)^t @ psi_1^'(W_1 X)) * X^t`</p>
	
	<p>`(del E)/(del W_1) = ((((([Y-T]^t * W_4)^t @ psi_3^'(W_3 psi_2(W_2 psi_1(W_1 X))))^t * W_3)^t @ psi_2^'(W_2 psi_1(W_1 X)))^t * W_2)^t @ psi_1^'(W_1 X) * X^t` が正しい</p>
	
	<p>`(del E)/(del W_1) = (W_2^t [(W_3^t [(W_4^t [Y-T]) @ psi_3^'(W_3 psi_2(W_2 psi_1(W_1 X)))]) @ psi_2^'(W_2 psi_1(W_1 X))]) @ psi_1^'(W_1 X) * X^t` が正しい</p>
	
	<h4>`(del E)/(del W_2) = `</h4>
	<h4>`(del E)/(del W_3) = `</h4>
<?php
    common_foot();
});
