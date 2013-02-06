<!DOCTYPE html>
<html>
	<head>
		<title>Sign Up</title>
	</head>
	<body>
		<h1>View</h1>
		<div>
			<table border="1" style="border-collapse: collapse; border: 1px solid #000;">
				<tr>
					<th> No. </th>
					<th> Name </th>
					<th> Email </th>
					<th> Country </th>
				</tr>
				<?php $count=1; foreach ($results as $items):	?>
				<tr>
					<td>
						<!-- Set row number -->
						<?php echo ($current_page + $count++); ?>
					</td>
					<td>
						<?php echo $items['FullName'] ?>
						<input type="hidden" id="user_id" value="<?php echo $items['Id'] ?>">
					</td>
					<td>
						<a href="mailto:<?php echo $items['Email'] ?>"><?php echo $items['Email'] ?></a>
					</td>
					<td>
						<?php echo $items['CountryName'] ?>
					</td>
				</tr>
				<? endforeach; ?>
				<tr>
					<td colspan="4">
						<?php echo $page_links ?>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
