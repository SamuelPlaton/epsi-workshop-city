<!DOCTYPE html>
<html>
<head>
	<!-- Title -->
	<title>City+</title>

	<?php include('components/links.php')?>
	<style>

	</style>
</head>
<body>
	<?php include('components/header.php')?>
		<div class="main-content">
			<div class="section__content section__content--p30">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">Tickets à proximité</div>
								<div class="card-body">
									<div class="card-title">
										<h3 class="text-center title-2">A moins de 50m</h3>
									</div>
									<hr>
									<?php for ($i = 0; $i < 15; $i++) { ?>
										<div style="display: inline-block;border:1px solid rgba(0,0,0,0.3);text-align:center;padding:10px;margin-left: 10px;margin-top: 10px">
											<div><b>Nature</b>: Sécurité routière</div>
											<div><b>Problème</b>: Route déformée</div>
											<div>
												<img src="https://picsum.photos/500" alt="" style="max-width: 150px" />
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>

