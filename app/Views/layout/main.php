<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $this->include('layout/include_meta'); ?>
		<title><?php echo getenv('appName'); ?> - <?php $this->renderSection('web_page_title'); ?></title>
		<?php echo $this->include('layout/include_css'); ?>
	</head>
	<body id="page-top" class="sidebar-toggled pos-page <?php $this->renderSection('body_class'); ?>">
		<?php $this->renderSection('page_loader'); ?>
		<!-- Page Wrapper -->
		<div id="wrapper">
			<!-- Sidebar -->
			<?php echo $this->include('layout/sidebar'); ?>
			<!-- End of Sidebar -->
			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column <?php $this->renderSection('pos_class'); ?>">
				<!-- Main Content -->
            	<div id="content">
					<!-- Topbar -->
					<?php echo $this->include('layout/topbar'); ?>
					<!-- End of Topbar -->
					<!-- Begin Page Content -->
					<div class="container-fluid <?php $this->renderSection('pos_class'); ?>">
						<?php $this->renderSection('page_content'); ?>
					</div>
					<!-- End of Page Content -->
				</div>
				<!-- End of Main Content -->
			</div>
			<!-- End of Content Wrapper -->
		</div>
		<!-- End of Page Wrapper -->
		<?php $this->renderSection('extra_page_content'); ?>
	</body>
	<?php echo $this->include('layout/include_js'); ?>
</html>