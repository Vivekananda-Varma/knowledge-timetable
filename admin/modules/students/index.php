<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('admin/templates/head.html'); ?>
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="wrapper">
		<?php include('admin/templates/sidebar.html'); ?>
		<div class="main">
			<?php include('admin/templates/navbar.html'); ?>
			
			<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between align-items-center mb-3">
						<h1 class="h1"><?= $page_title ?></h1>
						<div>
							<a class="btn btn-outline-primary" href="/admin/students/export/">Export</a>
							<a class="btn btn-outline-primary" href="/admin/students/import/">Import</a>
							<button class="btn btn-primary">New +</button>
						</div>
					</div>
					
					<table id="datatables-reponsive" class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Name</th>
								<th>Year</th>
								<th>Mobile</th>
								<th>Email</th>
								<th>Periods</th>
							</tr>
						</thead>
						<tbody>
				<?php
					foreach($students as $student) {
						$student_id = $student['student_id'];
						
						$uid = $student['uid'];
						$firstname = $student['firstname'];
						$lastname = $student['lastname'];
						$fullname = "<b>$firstname</b> $lastname";
						$year = $student['year'];
						$class_of = $student['class_of'];
						
						$mobile = $student['mobile'];
						$email = $student['email'];
						$last_login = $student['last_login'];
						
						$num_periods = $student['num_periods'];
						
						if ($class_of == '') {
							$class_of = date('Y') - $year + 3;
						}
						
						if ($num_periods == 0) {
							$num_periods = '';
						}
						
						$profile_image_url = GetProfileImagePathForUID($uid);
				?>
							<tr data-href="/admin/students/<?= $student_id ?>/edit/">
								<td>
									<img src="<?= $profile_image_url ?>" width="44" height="44" class="rounded-circle me-2 align-top" alt="Ashley Briggs">
									<div class="d-inline-block mt-1">
										<?= $fullname ?>
										<small class="text-muted d-block" style="margin-top: -2px">Class of <?= $class_of ?></small>
									</div>
								</td>
								<td width="50" class="text-center">HC-<?= $year ?></td>
								<td><?= $mobile ?></td>
								<td><?= $email ?></td>
								<td width="50" class="text-center"><?= $num_periods ?></td>
							</tr>
				<?php
					}
				?>			 
						</tbody>
					</table>
				</div>
			</main>

			<?php include('admin/templates/footer.html'); ?>
		</div>
	</div>

	<?php include('admin/templates/foot.html'); ?>

</body>

</html>