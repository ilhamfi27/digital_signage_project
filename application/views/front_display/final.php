<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="http://localhost/digital_signage_project/assets/vendor/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
			<div class="row" style="height: 100vh">
				<?php foreach ($cl as $cll): ?>
					<?php if ($cll->position == 'kanan'): ?>
						<div class="col-md-4" style="height: 100%;border-right: 1px solid #202020">
							<img style="width: 100%; height: 100%" src="<?php echo site_url('storage/images/front_display/'.$cll->file) ?>">
						</div>
					<?php else : ?>
						<div class="col-md-8" style="height: 100%;">
							<img style="width: 100%; height: 100%" src="<?php echo site_url('storage/images/front_display/'.$cll->file) ?>">
						</div>
					<?php endif ?>
				<?php endforeach ?>
			</div>
	</div>
</body>
</html>