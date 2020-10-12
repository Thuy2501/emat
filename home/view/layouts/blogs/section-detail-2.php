<div class="container py-2">

					<div class="row">
						<div class="col-lg-3">
							<aside class="sidebar" id="sidebar" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.container', 'padding': {'top': 110}}">
								<?php 
								$blog_content = '';
								if(isset($item['content'])&&count($item['content'])>1){
									
									echo '<h3 class="font-weight-bold pt-4 text-3 mb-2">Mục lục</h3><ul class="nav nav-list flex-column mb-5">';
									foreach($item['content'] as $k=>$v){
										echo '<li class="nav-item"><a class="nav-link" data-hash data-hash-offset="95" href="#appwe-1-'.($k+1).'">'.$v['title_content'].'</a></li>';
										$blog_content .= '<h2 style="color:'.$v['title_color'].';" class="font-weight-bold pt-4 text-4 mb-2" id="appwe-1-'.($k+1).'">'.$v['title_content'].'</h2>'.$v['content'];
									}
									echo '</ul>';
								}else{
									$blog_content = isset($item['content'][0]['content']) ? $item['content'][0]['content'] : '' ;
								}
								?>
								
								<h3 class="font-weight-bold pt-4 text-3 mb-2">Danh mục</h3>
							    <ul class="nav nav-list flex-column mb-5">
							        <li class="nav-item"><a class="nav-link <?=url_menuActive2($item['cat_code'],'thiet-ke-ung-dung')?>" href="<?=$base_url['web']?>/thiet-ke-ung-dung">Thiết kế ứng dụng</a></li>
							        <li class="nav-item"><a class="nav-link <?=url_menuActive2($item['cat_code'],'kinh-nghiem-lam-app')?>" href="<?=$base_url['web']?>/kinh-nghiem-lam-app">Kinh nghiệm làm app</a></li>
							        <li class="nav-item"><a class="nav-link <?=url_menuActive2($item['cat_code'],'y-tuong-kinh-doanh-app')?>" href="<?=$base_url['web']?>/y-tuong-kinh-doanh-app">Ý tưởng kinh doanh app</a></li>
							        <li class="nav-item"><a class="nav-link <?=url_menuActive2($item['cat_code'],'bai-hoc-kinh-doanh')?>" href="<?=$base_url['web']?>/bai-hoc-kinh-doanh">Bài học kinh doanh</a></li>
							    </ul>

							</aside>
						</div>
						<div class="col-lg-9">
							<div class="text-center">*********</div>
							<div class="font-weight-bold pt-4 text-4 mb-2">
								<?=(isset($item['description']) ? $item['description'] : '')?>
							</div>
							<div id="blog-content">
								<?=$blog_content?>
							</div>

						</div>

					</div>

				</div>