<!DOCTYPE html>
<html>
<head>
	<title>Dynamic Table Generator</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#generate').click(function() {
				var num = $('#num').val();

				$.ajax({
					type: 'POST',
					url: 'generateTable.php',
					data: { num: num },
					success: function(data) {
						$('#tableBody').html(data);
					}
				});
			});
		});
	</script>
</head>
<?php
if(isset($_POST['num'])) {
	$num = $_POST['num'];

	for($i = 1; $i <= $num; $i++) {
		echo "<tr><td>$i</td></tr>";
	}
}
?>
<body>
	<label>Enter a number:</label>
	<input type="number" id="num">
	<button id="generate">Generate Table</button>

	<table id="table">
		<thead>
			<tr>
				<th>Number</th>
			</tr>
		</thead>
		<tbody id="tableBody">
		</tbody>
	</table>
</body>
</html>
