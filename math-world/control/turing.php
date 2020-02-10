<?php
$dispatcher->route('/math-world/'.basename(__FILE__, '.php'), function () {
	common_head();
?>
	<style>
		ul.class {
			
		}
		ul.class li:last-of-type {
			
		}
	</style>
	<ul class="tree">
		<li>1</li>
		<li><div>2</div>
			<ul>
			<li>2-1</li>
			<li>2-2</li>
			<li>2-3</li>
			<li>2-4</li>
			<li>2-5</li>
			<li>2-6</li>
			<li>2-7</li>
		</ul></li>
		<li><div>3</div>
			<ul>
			<li>3-1</li>
			<li>3-2</li>
			<li>3-3</li>
			<li>3-4</li>
		</ul></li>
	</ul>
<?php
	common_foot();
});