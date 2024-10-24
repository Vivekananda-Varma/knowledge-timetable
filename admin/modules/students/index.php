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
						<h1 class="h1"><?= $page_title ?></h1>
						<button class="btn btn-outline-primary">New +</button>
					</div>
					
					<table id="datatables-reponsive" class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Name</th>
								<th>Mobile</th>
								<th>Email</th>
								<th>Last Login</th>
							</tr>
						</thead>
						<tbody>
				<?php
					foreach($students as $student) {
						$student_id = $student['user_id'];
						$firstname = $student['firstname'];
						$lastname = $student['lastname'];
						$fullname = "$firstname $lastname";
						
						$mobile = $student['mobile'];
						$email = $student['email'];
						$last_login = $student['last_login'];
				?>
				
							 <tr data-href="/admin/students/<?= $student_id ?>/edit/">
								<td><?= $fullname ?></td>
								<td><?= $mobile ?></td>
								<td><?= $email ?></td>
								<td><?= $last_login ?></td>								
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