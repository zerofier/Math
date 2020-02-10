<?php
$dispatcher->route('/math-world/'.basename(__FILE__, '.php'), function() {
    common_head();
?>
	<div class="container math">
		<p>`M`は階数`r`の`m`行`n`行列とする。この時<br />
			`M = U Sigma V^**`<br />
			という`M`の分解が存在する。ここで`U`は`m xx m`のユニタリ行列(`U U^** = U^* U = I`)、<br />
			`V^**`は `n xx n`のユニタリ行列Vの随伴行列(複素共役かつ転置行列)。<br />
			更に半正定値行列`M M^**`(あいるは`M^** M`) の正の固有値の平方根`sigma_1 > sigma_2 > ... > sigma_r > 0`が存在して、<br />
			`q = min(m, n),sigma_(r+1)=...=sigma_q=0`と置けば`m xx n`行列`Sigma`は以下の形になる。<br />
			`Sigma = {([[Delta, O]], (m < n)), (Delta, (m = n)), ([[Delta], [O]], (m > n)):}`
			<span style="display:inline-block; width: 3em; height: 1em"></span>`where Delta = diag(sigma_1,sigma_2,...,sigma_q)`<br />
			ここで`Delta`は`sigma_1,sigma_2,...,sigma_q`を対角成分とする`q xx q`の対角行列、部分行列`O`は零行列である。<br />
		</p>
	</div>
<?php
    common_foot();
});