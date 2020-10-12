<?php if(!defined('PATH_SYSTEM')) die('Bad requested');

function lang_menu($lang,$key){
	switch ($key) {
		case 'trang-chu':
			return $lang=='en' ? 'MSA - Home' : 'MSA - Trang chủ';
		case 'gioi-thieu':
			return $lang=='en' ? 'Introduce' : 'Giới thiệu';
		case 'chuong-trinh-hoc':
			return $lang=='en' ? 'Study program' : 'Chương trình học';
		case 'chuong-trinh-toan':
			return $lang=='en' ? 'Math program' : 'Chương trình toán';
		case 'chuong-trinh-khoahoc':
			return $lang=='en' ? 'Science program' : 'Chương trình khoa học';
		case 'lo-trinh-hoc':
			return $lang=='en' ? 'Learning roadmap' : 'Lộ trình học tập';
		case 'lich-hoc-hoc-phi':
			return $lang=='en' ? 'Schedule & Tuition' : 'Lịch Học & Học phí';
		case 'tin-tuc-su-kien':
			return $lang=='en' ? 'News & Event' : 'Tin tức & Sự kiện';
		case 'cau-hoi-thuong-gap':
			return $lang=='en' ? 'Q&A' : 'Câu hỏi thường gặp';
		case 'tu-van':
			return $lang=='en' ? 'Advisory' : 'Tư vấn';
		case 'thong-tin-lien-he':
			return $lang=='en' ? 'CONTACT INFORMATION' : 'THÔNG TIN LIÊN HỆ';
		case 'goi-tu-van':
			return $lang=='en' ? 'Call for advice, Now' : 'Gọi ngay tư vấn !';
		case 'dang-ky-tu-van':
			return $lang=='en' ? 'Contact consultant, Now !' : 'Đăng ký tư vấn ngay !';
		case 'xem-chi-tiet':
			return $lang=='en' ? 'View details' : 'Xem chi tiết';
		case 'thong-tin':
			return $lang=='en' ? '243/8 Chu Van An, 12 Ward, Binh Thanh District, Sai Gon' : '243/8 Chu Văn An, P.12, Q.Bình Thạnh, Sài Gòn';
		case 'dien-thoai':
			return $lang=='en' ? 'Phone' : 'Điện thoại';
		case 'dang-ky':
			return $lang=='en' ? 'Registration' : 'Đăng ký';
		case 'ho-ten':
			return $lang=='en' ? 'Full name' : 'Họ tên';
		case 'nam-sinh-cua-con':
			return $lang=='en' ? 'Child birth year' : 'Năm sinh của con';
		case 'truong-hoc':
			return $lang=='en' ? 'School (If applicable)' : 'Trường học (Nếu có)';
		case 'mon-hoc-dk':
			return $lang=='en' ? 'Theme you want to subscribe' : 'Môn học muốn đăng ký';
		case 'dk-thi-thu':
			return $lang=='en' ? 'Sign up for a mock test' : 'Đăng ký thi thử';
		case 'mon-dk-thi':
			return $lang=='en' ? 'Exam registration subject' : 'Môn đăng ký thi';
		case 'chuong-trinh-dk-thi':
			return $lang=='en' ? 'Exam registration program' : 'Chương trình đăng ký thi';
		case 'yeu-cau-them':
			return $lang=='en' ? 'Other request' : 'Yêu cầu thêm';
		case 'vui-long-chon':
			return $lang=='en' ? 'Please choose' : 'Vui lòng chọn';
		case 'face-book':
			return $lang=='en' ? 'Wish you a good day! Can the MSA help you ?' : 'Chúc quý phụ huynh một ngày tốt lành! MSA có thể giúp gì cho anh/chị không ạ?';
		
		default: 
			return '';
	}
}