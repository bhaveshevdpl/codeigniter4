<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $this->include('auth/layout/include_meta'); ?>
		<title><?php echo getenv('appName'); ?> - <?php $this->renderSection('web_page_title'); ?></title>
		<?php echo $this->include('auth/layout/include_css'); ?>
	</head>
	<body id="page-top" class="sidebar-toggled">
		<div class="">
			<?php $this->renderSection('page_content'); ?>
		</div>
		<?php $this->renderSection('extra_page_content'); ?>
	</body>
	<?php echo $this->include('auth/layout/include_js'); ?>
</html>