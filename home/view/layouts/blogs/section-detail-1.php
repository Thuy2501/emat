<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(<?=$base_url['web']?>/public/home/img/page-header/page-header-services.jpg);">
	<div class="container">
		<div class="row">
			<div class="col">
				<ul class="breadcrumb">
					<li><a href="<?=$base_url['web']?>">Trang chủ</a></li>
					<li><a href="<?=$base_url['web']?>/<?=isset($item['cat_code']) ? $item['cat_code'] : 'tin-tuc-cong-nghe'?>">Tin tức</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col p-static">
				<h1 data-title-border><?=isset($item['title']) ? $item['title'] : 'Nội dung bài viết không tồn tại'?></h1>

			</div>
		</div>
	</div>
</section>