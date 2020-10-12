<header>
    <div class="navigation-wrap menu-bg-msa start-header start-style">
        <div class="my-container">
            <div class="">
                <div class="">
                    <a class="cft-lang-smartphone" id="cft-lang-smartphone" title="Tiếng Việt" href="<?=$base_url['web']?>?lang=vi"><img width="36px" src="<?=$base_url['web']?>/upload/icon/vi.png" alt=""></a>
                    <nav class="navbar navbar-expand-md navbar-light">
                    
                        <a title="MSA" class="navbar-brand" href="<?=$base_url['web'].url_lang($_lang)?>" ><img id="myImage" src="<?=$base_url['web']?>/upload/logo/ms-icon-150x150.png" alt="msa logo"></a>    
                        

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span style="border-bottom: 1px solid #fff;" class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto py-4 py-md-0">
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link menu-text" href="<?=$base_url['web']?>/gioi-thieu<?=url_lang($_lang) ?>"><?=lang_menu($_lang,'gioi-thieu')?></a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link dropdown-toggle menu-text" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?=lang_menu($_lang,'chuong-trinh-hoc')?> <i class="fa fa-angle-down"></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?=$base_url['web']?>/chuong-trinh/toan-hoc<?=url_lang($_lang) ?>"><?=lang_menu($_lang,'chuong-trinh-toan')?> </a>
                                        <a class="dropdown-item" href="<?=$base_url['web']?>/chuong-trinh/khoa-hoc<?=url_lang($_lang) ?>"><?=lang_menu($_lang,'chuong-trinh-khoahoc')?> </a>
                                        <a class="dropdown-item" href="<?=$base_url['web']?>/thi-quoc-te/igcse<?=url_lang($_lang) ?>">IGCSE</a>
                                        <a class="dropdown-item" href="<?=$base_url['web']?>/thi-quoc-te/ssat-sat<?=url_lang($_lang) ?>"> SSAT & SAT</a>
                                        <a class="dropdown-item" href="<?=$base_url['web']?>/thi-quoc-te/amo-simoc<?=url_lang($_lang) ?>"> AMO & SIMOC</a>
                                        <a class="dropdown-item" href="<?=$base_url['web']?>/thi-quoc-te/vanda<?=url_lang($_lang) ?>"> VANDA</a>
                                        <a class="dropdown-item" href="<?=$base_url['web']?>/chuong-trinh/lo-trinh-hoc<?=url_lang($_lang) ?>"><?=lang_menu($_lang,'lo-trinh-hoc')?>  </a>
                                    </div>
                                </li>

                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link menu-text" href="<?=$base_url['web']?>/lich-hoc-hoc-phi<?=url_lang($_lang) ?>"><?=lang_menu($_lang,'lich-hoc-hoc-phi')?></a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link menu-text" href="<?=$base_url['web']?>/tin-tuc<?=url_lang($_lang) ?>"><?=lang_menu($_lang,'tin-tuc-su-kien')?></a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link menu-text" href="<?=$base_url['web']?>/cau-hoi<?=url_lang($_lang) ?>"><?=lang_menu($_lang,'cau-hoi-thuong-gap')?></a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link menu-text" href="<?=$base_url['web']?>/tu-van<?=url_lang($_lang) ?>"><?=lang_menu($_lang,'tu-van')?> </a>
                                </li>
                            </ul>
                            <?php 
                            if($_lang=='en'){
                                echo '<a title="Tiếng Việt" class="pl-4 cft-lang-pc" href="'.$base_url['web'].'?lang=vi"><img width="30px" src="'.$base_url['web'].'/upload/icon/vi.png" alt=""></a>';
                            }else{
                                echo '<a title="English" class="pl-4 cft-lang-pc" href="'.$base_url['web'].'?lang=en"><img width="30px" src="'.$base_url['web'].'/upload/icon/en.png" alt=""></a>';
                            }
                            ?>
                        </div>
                        
                    </nav>      
                </div>
            </div>
        </div>
    </div>
</header>