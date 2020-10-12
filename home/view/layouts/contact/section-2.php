<div class="container">

	<div class="row py-4">
		<div class="col-lg-7 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="650">

			<div>
				<h1 class="text-6 font-weight-bold">Tạo ứng dụng di động chuyên nghiệp, nhanh với Appwe</h1>
			</div>

			
			<form id="contact-form-all" enctype="multipart/form-data">
				<input type="hidden" value="true" name="emailSent" id="emailSent">
				<div class="form-row">
					<div class="form-group col-md-4">
						<label class="required font-weight-bold text-dark text-2">Tên liên hệ</label>
						<input type="text" minlength="2" maxlength="100" class="form-control" name="guest-name" id="guest-name" required>
					</div>
					<div class="form-group col-md-4">
						<label class="required font-weight-bold text-dark text-2">Số điện thoại</label>
						<input type="text" minlength="10" maxlength="15" class="form-control" name="guest-phone" id="guest-phone" required>
					</div>
					<div class="form-group col-md-4">
						<label class="required font-weight-bold text-dark text-2">Email</label>
						<input type="email" minlength="10" maxlength="100" class="form-control" name="guest-email" id="guest-email" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12 mb-4">
						<label class="required font-weight-bold text-dark text-2">Nội dung</label>
						<textarea minlength="6" maxlength="2000" rows="6" class="form-control" name="guest-content" id="guest-content"></textarea>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12 mb-5" id="contact-submit-all">
						<input type="submit" value="Gửi liên hệ" class="btn btn-primary btn-modern pull-right">
					</div>
				</div>
			</form>

		</div>
		<div class="col-lg-5">

			<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">
				<h4 class="text-primary pt-5">Trụ sở công ty</h4>
				<ul class="list list-icons list-icons-style-3 mt-2">
					<li><i class="fas fa-map-marker-alt top-6"></i> <strong>Address:</strong> 34 Nguyên Hồng,Ba Đình, Hà Nội</li>
					<li><i class="fas fa-phone top-6"></i> <strong>Phone:</strong> +84 818.456.969</li>
					<li><i class="fas fa-envelope top-6"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">info@cooftech.com</a></li>
				</ul>

				<div class="row lightbox mt-4 mb-0 pb-0" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}}">
					<div class="col-md-4 mb-4 mb-md-0">
						<a class="img-thumbnail p-0 border-0 d-block" href="<?=$base_url['web']?>/public/home/img/office/our-office-1.jpg" data-plugin-options="{'type':'image'}">
							<img class="img-fluid" src="<?=$base_url['web']?>/public/home/img/office/our-office-1.jpg" alt="Office">
						</a>
					</div>
					<div class="col-md-4 mb-4 mb-md-0">
						<a class="img-thumbnail p-0 border-0 d-block" href="<?=$base_url['web']?>/public/home/img/office/our-office-2.jpg" data-plugin-options="{'type':'image'}">
							<img class="img-fluid" src="<?=$base_url['web']?>/public/home/img/office/our-office-2.jpg" alt="Office">
						</a>
					</div>
					<div class="col-md-4">
						<a class="img-thumbnail p-0 border-0 d-block" href="<?=$base_url['web']?>/public/home/img/office/our-office-3.jpg" data-plugin-options="{'type':'image'}">
							<img class="img-fluid" src="<?=$base_url['web']?>/public/home/img/office/our-office-3.jpg" alt="Office">
						</a>
					</div>
				</div>

				<h4 class="text-primary pt-5">Giờ làm việc</h4>
				<ul class="list list-icons list-dark mt-2">
					<li><i class="far fa-clock top-6"></i> Thứ 2 - Thứ 6 - 9h00 đến 18h00</li>
					<li><i class="far fa-clock top-6"></i> Thứ 7 - 9h00 đến 17h00</li>
					<li><i class="far fa-clock top-6"></i> Chủ nhật - Đóng cửa</li>
				</ul>
			</div>

		</div>

	</div>

</div>