<?php 
$url_c = isset($_GET['c']) ? $_GET['c'] : '';
$url_a = isset($_GET['a']) ? $_GET['a'] : '';
?>

<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?=$base_url['web']?>"> <img alt="image" src="<?=$base_url['img']?>/upload/icon/red.png" class="header-logo" /> <span
          class="logo-name">APPWE.VN</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <hr>
      <li class="dropdown <?=url_menuActive2('home',$url_c)?>">
        <a href="<?=$base_url['web']?>/admin" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
      </li>
      <?php if(url_checkRole($_role,'blog-list-view')): ?>
      <li class="dropdown <?=url_menuActive2('blog',$url_c)?>">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i
            data-feather="briefcase"></i><span>Bài viết</span></a>
        <ul class="dropdown-menu">
          <li class="<?=url_menuActive2('blog-list',$url_c.'-'.$url_a,'li-active')?>" ><a class="nav-link" href="<?=$base_url['web']?>/adw-blog/list">Danh sách</a></li>
          <li class="<?=url_menuActive2('blog-add',$url_c.'-'.$url_a,'li-active')?>"><a class="nav-link" href="<?=$base_url['web']?>/adw-blog/add">Thêm mới</a></li>
        </ul>
      </li>
      <?php endif; ?>
    </ul>
  </aside>