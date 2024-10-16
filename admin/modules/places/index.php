<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('templates/head.html'); ?>
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="wrapper">
		<?php include('templates/sidebar.html'); ?>
		<div class="main">
			<?php include('templates/navbar.html'); ?>
			
			<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between align-items-center mb-3">
						<h1 class="h1">Places</h1>
						<button class="btn btn-outline-primary">New +</button>
					</div>
					
					<table id="datatables-reponsive" class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Name</th>
								<th>Subjects</th>
								<th>Teacher</th>
							</tr>
						</thead>
						<tbody>
				<?php
					foreach($places as $place) {
						$place_id = $place['place_id'];
						$place_name = $place['place_name']; 
				?>
				
							 <tr>
								<td><?= $place_name ?></td>
								<td></td>
								<td class="d-none d-md-table-cell"></td>
							 </tr>
				<?php
					}
				?>			 
						  </tbody>
					   </table>
				</div>
			</main>

			<?php include('templates/footer.html'); ?>
		</div>
	</div>

	<?php include('templates/foot.html'); ?>

</body>

</html>