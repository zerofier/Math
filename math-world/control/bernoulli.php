<?php
$dispatcher->route('/math-world/' . basename(__FILE__, '.php'), function () {
	common_head();
?>
<div class="container" id="<?php echo basename(__FILE__, '.php')?>">
	<h2>ベルヌーイ試行</h2>
	<p>結果が2つしかない試行で「成功」の確率は`p`、その他「失敗」の確率は`q`とする。</p>
	<p>成功と失敗の関係は `p = 1 - q` (失敗以外は成功)</p>
	<p>試行を`n`回する内「成功」した回数が`k`になる確率は</p>
	<p>`P(k)=((n),(k)) p^k q^(n-k)`</p>
	<p>`((n),(k))`は二項係数(組合せ)である`(!n)/(!k !(n-k))`</p>
	<p>例: コイン投げを4回して表が2回でる確率は</p>
	<p>`P(2)=((4),(2)) * (1/2)^2 * (1/2)^(4-2)` (表が出る確率 `p=1/2`、裏が出る確率 `q=1/2`)</p>
	<p>`P(2)=(4*3)/(2*1) * 1/4 * 1/4`</p>
	<p>`P(2)=3/8`</p>

	<h2>ベルヌーイ分布</h2>
	<p>ベルヌーイ試行によりコイン投げを4回試行する中で表が出る回数とその確率の一覧は以下となる</p>
	<style>
table td {
	border: solid 1px;
}

table thead td {
	padding: .2em;
}

table tbody td {
	padding: .2em;
}
</style>
	<div>
		<table>
			<thead>
				<tr>
					<td>回数</td>
					<td>確率</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>0</td>
					<td>`(1/2)^4 = 1/16`</td>
				</tr>
				<tr>
					<td>1</td>
					<td>`4 * 1/2 * (1/2)^3 = 4/16`</td>
				</tr>
				<tr>
					<td>2</td>
					<td>`6/16`</td>
				</tr>
				<tr>
					<td>3</td>
					<td>`4 * (1/2)^3 * 1/2 = 4/16`</td>
				</tr>
				<tr>
					<td>4</td>
					<td>`(1/2)^4 = 1/16`</td>
				</tr>
			</tbody>
		</table>
<?php
    $golden_ratio = 0.5 + sqrt(5) / 2.0;
?>
		<svg width="400" height="300" viewBox="0 0 400 300">
				<text x="10" y="10">確率</text>
				<line x1="10" y1="10" x2="10" y2="290" stroke="black" stroke-width="1" />
				<line x1="10" y1="290" x2="390" y2="290" stroke="black" stroke-width="1" />
				<text x="390" y="290">回数</text>
			</svg>
		<p>
			この表が表す回数を確率変数にする確率分布を<b>ベルヌーイ分布</b>という
		</p>
	</div>

</div>
<?php
	common_foot();
});