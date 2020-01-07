<?php
$dispatcher->route('/math-world/ffnn', function() {
?><!DOCTYPE html>
<html><head>
<meta charset="utf-8">
<title></title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=AM_CHTML"></script>
</head><body>
<p>`X`は入力、`Y`は出力、`T`は訓練データの結果の縦ベクトル</p>
<p>`X`はn個の要素、`Y`はm個の要素(`T`は`Y`と同じ)、中間層はl個の要素になる</p>
<p>`Y = W_2 psi(W_1 X)`</p>
<p>`E = ||Y - T||^2 / 2`</p>

<p>`Y - T ＝ W_2 * [[psi(w_(1(1,1)) x_1 + w_(1(1,2)) x_2 + ... + w_(1(1,n)) x_n)],[psi(w_(1(2,1)) x_1 + w_(1(2,2)) x_2 + ... + w_(1(2,n)) x_n)],[vdots],[psi(w_(1(l,1)) x_1 + w_(1(l,2)) x_2 + ... + w_(1(l,n)) x_n)]] - T`</p>
<p>`Y - T ＝ W_2 * [[psi(sum_(i=1)^n w_(1(1,i)) x_i)],[psi(sum_(i=1)^n w_(1(2,i)) x_i)],[vdots],[psi(sum_(i=1)^n w_(1(l,i)) x_i)]] - T`</p>
<p>`Y - T = [
[w_(2(1,1)) psi(sum_(i=1)^n w_(1(1,i)) x_i) + w_(2(1,2)) psi(sum_(i=1)^n w_(1(2,i)) x_i) + ... + w_(2(1,l)) psi(sum_(i=1)^n w_(1(l,i)) x_i) - t_1],
[w_(2(2,1)) psi(sum_(i=1)^n w_(1(1,i)) x_i) + w_(2(2,2)) psi(sum_(i=1)^n w_(1(2,i)) x_i) + ... + w_(2(2,l)) psi(sum_(i=1)^n w_(1(l,i)) x_i) - t_2],
[vdots],
[w_(2(m,1)) psi(sum_(i=1)^n w_(1(1,i)) x_i) + w_(2(m,2)) psi(sum_(i=1)^n w_(1(2,i)) x_i) + ... + w_(2(m,l)) psi(sum_(i=1)^n w_(1(l,i)) x_i) - t_m]]`</p>

<div>`Y - T = [
[sum_(j=1)^l w_(2(1,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_1],
[sum_(j=1)^l w_(2(2,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_2],
[vdots],
[sum_(j=1)^l w_(2(m,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_m]]`</div>


<p>`E = (
[sum_(j=1)^l w_(2(1,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_1]^2 +
[sum_(j=1)^l w_(2(2,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_2]^2 +
cdots +
[sum_(j=1)^l w_(2(m,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_m]^2) / 2`</p>

<p>`E = 
[sum_(j=1)^l w_(2(1,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_1]^2 / 2 +
[sum_(j=1)^l w_(2(2,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_2]^2 / 2 +
cdots +
[sum_(j=1)^l w_(2(m,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_m]^2 / 2`</p>

<p>`(del E)/(del W_1) = [
	[(del E)/(del w_(1(1,1))), (del E)/(del w_(1(1,2))), cdots, (del E)/(del w_(1(1,n)))],
	[(del E)/(del w_(1(2,1))), (del E)/(del w_(1(2,2))), cdots, (del E)/(del w_(1(2,n)))],
	[vdots,vdots,ddots,vdots],
	[(del E)/(del w_(1(l,1))), (del E)/(del w_(1(l,2))), cdots, (del E)/(del w_(1(l,n)))]]`</p>

<p>`(del E)/(del w_(1(1,1))) = 
	[sum_(j=1)^l w_(2(1,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_1] w_(2(1,1)) psi'(sum_(i=1)^n w_(1(1,i)) x_i) x_1 + 
	[sum_(j=1)^l w_(2(2,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_2] w_(2(2,1)) psi'(sum_(i=1)^n w_(1(1,i)) x_i) x_1 +
	cdots +
	[sum_(j=1)^l w_(2(m,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_m] w_(2(m,1)) psi'(sum_(i=1)^n w_(1(1,i)) x_i) x_1`</p>

<p>`(del E)/(del w_(1(1,1))) = sum_(k=1)^m ([sum_(j=1)^l w_(2(k,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_k] w_(2(k,1)) psi'(sum_(i=1)^n w_(1(1,i)) x_i) x_1)`</p>
<p>`(del E)/(del w_(1(1,2))) = sum_(k=1)^m ([sum_(j=1)^l w_(2(k,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_k] w_(2(k,1)) psi'(sum_(i=1)^n w_(1(1,i)) x_i) x_2)`</p>
<p>`(del E)/(del w_(1(2,1))) = sum_(k=1)^m ([sum_(j=1)^l w_(2(k,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_k] w_(2(k,2)) psi'(sum_(i=1)^n w_(1(2,i)) x_i) x_1)`</p>

<p>`(del E)/(del w_(1(m,l))) = sum_(k=1)^m ([sum_(j=1)^l w_(2(k,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_k] w_(2(k,m)) psi'(sum_(i=1)^n w_(1(m,i)) x_i) x_l)`</p>

<p>`{
([Y - T]_1 = [sum_(j=1)^l w_(2(1,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_1]),
([Y - T]_2 = [sum_(j=1)^l w_(2(2,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_2]),
(vdots),
([Y - T]_m = [sum_(j=1)^l w_(2(m,j)) psi(sum_(i=1)^n w_(1(j,i)) x_i) - t_m]):}`</p>

<p>`(del E)/(del W_1) = [
[
	sum_(k=1)^m [Y-T]_k w_(2(k,1)) psi'(sum_(i=1)^n w_(1(1,i)) x_i) x_1,
	sum_(k=1)^m [Y-T]_k w_(2(k,1)) psi'(sum_(i=1)^n w_(1(1,i)) x_i) x_2,
	cdots,
	sum_(k=1)^m [Y-T]_k w_(2(k,1)) psi'(sum_(i=1)^n w_(1(1,i)) x_i) x_n
],
[
	sum_(k=1)^m [Y-T]_k w_(2(k,2)) psi'(sum_(i=1)^n w_(1(2,i)) x_i) x_1,
	sum_(k=1)^m [Y-T]_k w_(2(k,2)) psi'(sum_(i=1)^n w_(1(2,i)) x_i) x_2,
	cdots,
	sum_(k=1)^m [Y-T]_k w_(2(k,2)) psi'(sum_(i=1)^n w_(1(2,i)) x_i) x_n
],
[vdots,vdots,ddots,vdots],
[
	sum_(k=1)^m [Y-T]_k w_(2(k,l)) psi'(sum_(i=1)^n w_(1(l,i)) x_i) x_1,
	sum_(k=1)^m [Y-T]_k w_(2(k,l)) psi'(sum_(i=1)^n w_(1(l,i)) x_i) x_2,
	cdots,
	sum_(k=1)^m [Y-T]_k w_(2(k,l)) psi'(sum_(i=1)^n w_(1(l,i)) x_i) x_n
]
]`</p>

<p>`(del E)/(del W_1) = [
[
	sum_(k=1)^m [Y-T]_k w_(2(k,1)) psi'(sum_(i=1)^n w_(1(1,i)) x_i)
],
[
	sum_(k=1)^m [Y-T]_k w_(2(k,2)) psi'(sum_(i=1)^n w_(1(2,i)) x_i)
],
[vdots],
[
	sum_(k=1)^m [Y-T]_k w_(2(k,l)) psi'(sum_(i=1)^n w_(1(l,i)) x_i)
]
] [[x_1, x_2, cdots, x_n]]`</p>

<p>`(del E)/(del W_1) = ([
    [
    	sum_(k=1)^m [Y-T]_k w_(2(k,1))
    ],
    [
    	sum_(k=1)^m [Y-T]_k w_(2(k,2))
    ],
    [vdots],
    [
    	sum_(k=1)^m [Y-T]_k w_(2(k,l))
    ]
] @ [
	[
	 	psi'(sum_(i=1)^n w_(1(1,i)) x_i)
	],
	[
	 	psi'(sum_(i=1)^n w_(1(2,i)) x_i)
	],
	[vdots],
	[
	 	psi'(sum_(i=1)^n w_(1(l,i)) x_i)
	]
]) [[x_1, x_2, cdots, x_n]]
`</p>
<p>`
[Y - T]^t W_2 = [[
	[Y - T]_1 w_(2(1,1)) +
	[Y - T]_2 w_(2(2,1)) +
	cdots +
	[Y - T]_m w_(2(m,1)),
	
	[Y - T]_1 w_(2(1,2)) +
	[Y - T]_2 w_(2(2,2)) +
	cdots +
	[Y - T]_m w_(2(m,2)),
	
	cdots,
	
	[Y - T]_1 w_(2(1,l)) +
	[Y - T]_2 w_(2(2,l)) +
	cdots +
	[Y - T]_m w_(2(m,l)) 
]]
`</p>
<p>`(del E)/(del W_1) = (((Y - T)^t W_2)^t @ [
	[
	 	psi'(sum_(i=1)^n w_(1(1,i)) x_i)
	],
	[
	 	psi'(sum_(i=1)^n w_(1(2,i)) x_i)
	],
	[vdots],
	[
	 	psi'(sum_(i=1)^n w_(1(l,i)) x_i)
	]
]) [[x_1,x_2,cdots,x_n]]
`</p>

<p>`(del E)/(del W_1) = (((Y - T)^t W_2)^t @ psi'(
[
	[sum_(i=1)^n w_(1(1,i)) x_i],
	[sum_(i=1)^n w_(1(2,i)) x_i],
	[vdots],
	[sum_(i=1)^n w_(1(l,i)) x_i]
])) [[x_1,x_2,cdots,x_n]]
`</p>

<p>`(del E)/(del W_1) = (([Y - T]^t W_2)^t @ psi'(W_1 X)) [[x_1,x_2,cdots,x_n]]`</p>

<p>`(del E)/(del W_1) = (([Y - T]^t W_2)^t @ psi'(W_1 X)) X^t`</p>

</body></html>
<?php
});
