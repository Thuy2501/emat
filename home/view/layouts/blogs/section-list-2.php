<div class="container py-4">

	<div class="row">
		<div class="col-lg-3">
			<aside class="sidebar">
			    <!-- <form action="https://preview.oklerthemes.com/porto/8.0.0/page-search-results.html" method="get">
			        <div class="input-group mb-3 pb-1">
			            <input class="form-control text-1" placeholder="Tìm kiếm..." type="text" />
			            <span class="input-group-append">
			                <button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
			            </span>
			        </div>
			    </form> -->
			    <div class="tabs tabs-dark mb-4 pb-2">
			        <ul class="nav nav-tabs">
			            <li class="nav-item active"><a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-toggle="tab">Tin mới</a></li>
			            <li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Gợi ý</a></li>
			        </ul>
			        <div class="tab-content">
			            <div class="tab-pane active" id="popularPosts">
			                <ul class="simple-post-list">
			                <?php 
			                if(isset($item_new)&&!empty($item_new)){
			                	foreach($item_new as $v){
			                		echo '<li>
				                        <div class="post-image">
				                            <div class="img-thumbnail img-thumbnail-no-borders d-block">
				                                <a href="'.$base_url['web'].'/'.$v["title_url"].'-'.$v["code"].'.html"> <img src="'.$base_url['web'].'/upload/blogs/'.$v["avatar"].'" width="50" height="50" alt="'.$v["title_url"].'" /> </a>
				                            </div>
				                        </div>
				                        <div class="post-info">
				                            <a title="'.$v["title"].'" href="'.$base_url['web'].'/'.$v["title_url"].'-'.$v["code"].'.html">'.str_trimText($v["title"],30).'</a>
				                            <div class="post-meta">'.date("d/m/Y",strtotime($v["date_create"])).'</div>
				                        </div>
				                    </li>';
			                	}
			                }
			                ?>
			                    
			                </ul>
			            </div>
			            <div class="tab-pane" id="recentPosts">
			                <ul class="simple-post-list">
			                <?php 
			                if(isset($item_hot)&&!empty($item_hot)){
			                	foreach($item_hot as $v){
			                		echo '<li>
				                        <div class="post-image">
				                            <div class="img-thumbnail img-thumbnail-no-borders d-block">
				                                <a href="'.$base_url['web'].'/'.$v["title_url"].'-'.$v["code"].'.html"> <img src="'.$base_url['web'].'/upload/blogs/'.$v["avatar"].'" width="50" height="50" alt="'.$v["title_url"].'" /> </a>
				                            </div>
				                        </div>
				                        <div class="post-info">
				                            <a title="'.$v["title"].'" href="'.$base_url['web'].'/'.$v["title_url"].'-'.$v["code"].'.html">'.str_trimText($v["title"],30).'</a>
				                            <div class="post-meta">'.date("d/m/Y",strtotime($v["date_create"])).'</div>
				                        </div>
				                    </li>';
			                	}
			                }
			                ?>
			                </ul>
			            </div>
			        </div>
			    </div>
			    <h3 class="font-weight-bold pt-4 text-4 mb-2">Về chúng tôi</h3>
			    <p>Appwe (trực thuộc CFT) là đơn vị công nghệ chuyên cung cấp các giải pháp xử lý đa luồng từ phần mềm, phần cứng đến các dịch vụ thiết kế, lập trình website chuyên nghiệp tại Hà Nội với kho giao diện web có sẵn đa dạng hoặc thiết kế website riêng theo nhu cầu.</p>
			</aside>

		</div>
		<div class="col-lg-6">
			<div class="blog-posts">

				<div class="row px-3">
				<?php 
				if(isset($item)&&!empty($item)){
					foreach($item as $k=>$v){
						echo '<div class="col-12">
								<article class="post post-medium border-0 pb-0 mb-5">
									<div class="post-image">
										<a href="'.$base_url['web'].'/'.$v["title_url"].'-'.$v["code"].'.html">
											<img src="'.$base_url['web'].'/upload/blogs/'.$v["avatar"].'" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="'.$v["title_url"].'" />
										</a>
									</div>

									<div class="post-content">

										<h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="'.$base_url['web'].'/'.$v["title_url"].'-'.$v["code"].'.html">'.$v["title"].'</a></h2>
										<p>'.$v["description"].'</p>

										<div class="post-meta">
											<span class="d-block mt-2"><a href="'.$base_url['web'].'/'.$v["title_url"].'-'.$v["code"].'.html" class="btn btn-xs btn-light text-1 text-uppercase">Chi tiết</a></span>
										</div>

									</div>
								</article>
							</div>';
					}
				}
				?>

					
				</div>

				<div class="row">
					<div class="col">
						<ul class="pagination float-right">
						<?php
						if($page_current>1){
							echo '<li class="page-item"><a class="page-link" href="'.$head["title_url"].'?page=1"><i class="fas fa-angle-left"></i></a></li>';
						}

						if(isset($total_page)&&$total_page>1){
							if($page_current>2){
								echo '<li class="page-item active page-link text-danger">...</li>';
							}
							for($i=1;$i<=$total_page;$i++){
								$hieu = abs($page_current-$i);
								if($page_current==$i){
									echo '<li class="page-item active page-link text-danger">'.$i.'</li>';
								}else if($hieu<2){
									echo '<li class="page-item"><a class="page-link" href="'.$head["title_url"].'?page='.$i.'">'.$i.'</a></li>';
								}
							}

							if($total_page-$page_current>1){
								echo '<li class="page-item active page-link text-danger">...</li>';
							}
						}

						if($page_current<$total_page){
							echo '<a class="page-link" href="'.$head["title_url"].'?page='.$total_page.'"><i class="fas fa-angle-right"></i></a>';
						}

						?>
							
						</ul>
					</div>
				</div>

			</div>
		</div>
		<div class="col-lg-3">
			<aside class="sidebar" id="sidebar" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.container', 'padding': {'top': 110}}">		
				<h3 class="font-weight-bold pt-4 text-4 mb-2">Danh mục</h3>
			    <ul class="nav nav-list flex-column mb-5">
			        <li class="nav-item"><a class="nav-link <?=url_menuActive2($head['url_code'],'thiet-ke-ung-dung')?>" href="<?=$base_url['web']?>/thiet-ke-ung-dung">Thiết kế ứng dụng</a></li>
			        <li class="nav-item"><a class="nav-link <?=url_menuActive2($head['url_code'],'kinh-nghiem-lam-app')?>" href="<?=$base_url['web']?>/kinh-nghiem-lam-app">Kinh nghiệm làm app</a></li>
			        <li class="nav-item"><a class="nav-link <?=url_menuActive2($head['url_code'],'y-tuong-kinh-doanh-app')?>" href="<?=$base_url['web']?>/y-tuong-kinh-doanh-app">Ý tưởng kinh doanh app</a></li>
			        <li class="nav-item"><a class="nav-link <?=url_menuActive2($head['url_code'],'bai-hoc-kinh-doanh')?>" href="<?=$base_url['web']?>/bai-hoc-kinh-doanh">Bài học kinh doanh</a></li>
			    </ul>				
				<!-- <h5 class="font-weight-bold pt-4">Tìm chúng tôi trên Facebook</h5>								
										<div class="fb-page" data-href="https://www.facebook.com/OklerThemes/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true">
											<blockquote cite="https://www.facebook.com/OklerThemes/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/OklerThemes/">Appwe</a></blockquote>
										</div>	 -->						
			</aside>
		</div>
	</div>

</div>