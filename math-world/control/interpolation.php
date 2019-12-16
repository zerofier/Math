<?php
$dispatcher->route('/math-world/interpolation', function() 
{
?>
<!DOCTYPE html>
<html><head>
<meta charset="utf-8">
<style type="text/css">
#add, #del {
    padding: 0;
}

#matrix td,
#matrix th {
    border: solid 1px;
}

#matrix th {
    padding: 0 .5rem;
}

#matrix td>input {
    width: 2rem;
}
</style>
<script type="text/javascript">
window.onload = function() {
	document.getElementById('add').onclick = function () {
		let tbl = document.getElementById('matrix');
		let hdr = tbl.querySelector('thead>tr');
		let hth = document.createElement('th');
		hth.innerHTML = (hdr.cells.length - 2).toString();
		hdr.insertBefore(hth, hdr.cells[hdr.cells.length - 1]);

		let tbd = tbl.querySelector('tbody');
		let tbr = document.createElement('tr');
		tbd.append(tbr);
		let cells = 1;
		for (let i = 0; i < tbd.rows.length; i++) {
			if (cells < tbd.rows[i].cells.length + 1) {
				cells = tbd.rows[i].cells.length + 1;
			}
			
			for (let j = tbd.rows[i].cells.length; j < cells; j++) {
				let tbc = null
				if (j == 0) {
					tbc = document.createElement('th');
					tbc.innerHTML = i.toString();
					tbd.rows[i].append(tbc);
				} else if (j > 1) {
					tbc = tbd.rows[i].insertCell(j - 1);
				} else { 
					tbc = tbd.rows[i].insertCell(j);
				}
				
				if (j != 0) {
					let inp = document.createElement('input');
					inp.setAttribute('required', 'required');
					tbc.append(inp);
				}
			}
		}

		tbd.querySelectorAll('input').forEach(function(element) {
			element.onchange = function (event) {
				let cel = event.target.closest('td');
				let row = cel.closest('tr');
				let tbl = row.closest('tbody');
				let org = cel.querySelector('input');
				if (row.rowIndex == 1) {
					for (let i = 1; i < tbl.rows.length; i++) {
						let inp = tbl.rows[i].cells[cel.cellIndex].querySelector('input');
						if (inp.value && inp.value != 0) continue;
						inp.value = Math.pow(parseFloat(org.value), i + 1) | '';
					}	
				}
			};
		});
	};

	document.getElementById('del').onclick = function () {
		let tbl = document.getElementById('matrix');
		if (tbl.rows.length <= 2) return;

		tbl.deleteRow(tbl.rows.length - 1);
		for (let i = 0; i < tbl.rows.length; i++) {
			tbl.rows[i].deleteCell(tbl.rows[i].cells.length - 2);
		}
	};

	document.getElementById('cal').onclick = function () {
		let tbd = document.querySelector('#matrix tbody');
		let mat = [];
		for (let r = 0; r < tbd.rows.length; r++) {
			if (mat.length < r + 1) mat.push([]);
			for (let c = 1; c < tbd.rows[r].cells.length; c++) {
				let inp = tbd.rows[r].cells[c].querySelector('input');
				if (inp.value) {
					if (mat[r].length < c) {
						mat[r].push(parseFloat(inp.value));
					} else {
						mat[r][c] = parseFloat(inp.value);
					}
				} else {
					alert("no value.");
					return;
				}
			}	
		}

		var p = 0
		for (let s = 0; s < mat[0].length; s++) {			
			for (; p < mat.length && mat[p][s] == 0; p++);
			for (let i = 0; i < mat.length; i++) {
				if (i == p) continue;
				if (mat[i][s] == 0) continue;
				let m = mat[i][s] / mat[p][s];
				
				for (let c = 0; c < mat[i].length; c++) {
					mat[i][c] -= mat[p][c] * m; 
				}
			}
			p++;
			if (p >= mat.length) break;
		}

		console.log(mat);
	};
};
</script>
</head><body>
<button type="button" id="add">+</button>&nbsp;<button type="button" id="del">-</button>
<table id="matrix"><thead>
<tr><th /><th>0</th><th>a</th></tr>
</thead><tbody>
<tr><th>0</th><td><input required="required" /></td><td><input /></td></tr>
</tbody></table>
<button type="button" id="cal">calc</button>
</body></html>
<?php 
});
?>