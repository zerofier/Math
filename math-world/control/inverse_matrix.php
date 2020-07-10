<?php

$dispatcher->route('/math-world/'.basename(__FILE__, '.php'), function() {
	common_head();
?>
	<div class="container">
		<div id="input">
			<input id="num" value="3" pattern="\d+" />
			<button type="button" onclick="generate()">Generate</button>
		</div>
		<div id="output">
			<h5>`M I = `</h5>
		</div>
	</div>
	<script type="text/javascript">
		var M = [];
		var I = [];
		function generate() {
			let num = parseInt(document.getElementById("num").value);
			for (let r = 0; r < num; r++) {
				M[r] = [];
				I[r] = []
				for (let c = 0; c < num; c++) {
					M[r][c] = parseInt(Math.random() * 99.9);
					I[r][c] = r == c ? 1 : 0;
				}
			}

			let output = document.getElementById("output");
			let origin = document.getElementById("origin");
			if (! origin) {
				origin = document.createElement("div");
				origin.id = "origin";
				output.append(origin);
			}
			origin.innerHTML = '';
			origin.append(createTable(M));
			origin.append(createTable(I));
			let btn = document.createElement("button");
			btn.innerHTML = "calc"
			btn.click = calc;
			origin.append(btn);
		}

		function createTable(m) {
			var table = document.createElement('table');
			table.style = "";
			for (let r = 0; r < m.length; r++) {
				var tr = document.createElement('tr');
				table.append(tr);
				for (let c = 0; c < m.length; c++) {
					var td = document.createElement('td');
					td.innerHTML = ("0" + m[r][c]).substr(-2);
					tr.append(td);
				}
			}
			return table;
		}

		function calc()
		{
		}
			
	</script>
<?php
	common_foot();
});