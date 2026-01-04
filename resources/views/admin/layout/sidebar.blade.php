<div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{ route('admin_home') }}">Yönetim Paneli</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="{{ route('admin_home') }}"></a>
                </div>

                <ul class="sidebar-menu">

                    <li class="{{ Request::is('admin/home') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_home') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Pano"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

                    <li class="{{ Request::is('admin/setting') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_setting') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Settings"><i class="fas fa-hand-point-right"></i> <span>Site Ayarları</span></a></li>

                    <li class="nav-item dropdown {{ Request::is('admin/home-*') ? "active":"" }}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Ana Sayfa Ayarları</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ Request::is('admin/home-banner') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_home_banner') }}"><i class="fas fa-angle-right"></i> Afiş Bloğu Ayarları</a></li>
                            <li class="{{ Request::is('admin/home-about') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_home_about') }}"><i class="fas fa-angle-right"></i> Hakkımda Bloğu Ayarları</a></li>
                            <li class="{{ Request::is('admin/home-skill') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_home_skill') }}"><i class="fas fa-angle-right"></i> Yetenek Bloğu Ayarları</a></li>
                            <li class="{{ Request::is('admin/home-qualification') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_home_qualification') }}"><i class="fas fa-angle-right"></i> Nitelik Bloğu Ayarları</a></li>
                            <li class="{{ Request::is('admin/home-counter') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_home_counter') }}"><i class="fas fa-angle-right"></i> Sayaç Bloğu Ayarları</a></li>
                            <li class="{{ Request::is('admin/home-testimonial') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_home_testimonial') }}"><i class="fas fa-angle-right"></i> Referanslar Bloğu Ayarları</a></li>
                            <li class="{{ Request::is('admin/home-client') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_home_client') }}"><i class="fas fa-angle-right"></i> Müşteri Bloğu Ayarları</a></li>
                            <li class="{{ Request::is('admin/home-service') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_home_service') }}"><i class="fas fa-angle-right"></i> Servis Bloğu Ayarları</a></li>
                            <li class="{{ Request::is('admin/home-portfolio') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_home_portfolio') }}"><i class="fas fa-angle-right"></i> Portfolio Bloğu Ayarları</a></li>
                            <li class="{{ Request::is('admin/home-blog') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_home_blog') }}"><i class="fas fa-angle-right"></i> Blog Bloğu Ayarları</a></li>
                            <li class="{{ Request::is('admin/home-seo') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_home_seo') }}"><i class="fas fa-angle-right"></i> SEO Ayarları</a></li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown {{ Request::is('admin/page/*') ? "active":"" }}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Sayfa Ayarları</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ Request::is('admin/page/services') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_page_services') }}"><i class="fas fa-angle-right"></i> Servis Sayfası Ayarları</a></li>
                            <li class="{{ Request::is('admin/page/portfolios') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_page_portfolios') }}"><i class="fas fa-angle-right"></i> Portfolio Sayfası Ayarları</a></li>
                            <li class="{{ Request::is('admin/page/about') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_page_about') }}"><i class="fas fa-angle-right"></i> Hakkımda Sayfası Ayarları</a></li>
                            <li class="{{ Request::is('admin/page/contact') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_page_contact') }}"><i class="fas fa-angle-right"></i> İletişim Sayfası Ayarları</a></li>
                            <li class="{{ Request::is('admin/page/blog') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_page_blog') }}"><i class="fas fa-angle-right"></i> Blog Sayfası Ayarları</a></li>

                        </ul>
                    </li>

                    <li class="{{ Request::is('admin/skill/show') ? "active":"" }}">
                        <a class="nav-link" href="{{ route('admin_skill_show') }}">
                            <i class="fas fa-hand-point-right"></i>
                            <span>Yetenekler</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/education/show') ? "active":"" }}">
                        <a class="nav-link" href="{{ route('admin_education_show') }}">
                            <i class="fas fa-hand-point-right"></i>
                            <span>Eğitim Yönetimi</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/experience/show') ? "active":"" }}">
                        <a class="nav-link" href="{{ route('admin_experience_show') }}">
                            <i class="fas fa-hand-point-right"></i>
                            <span>Deneyim Yönetimi</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/testimonial/show') ? "active":"" }}">
                        <a class="nav-link" href="{{ route('admin_testimonial_show') }}">
                            <i class="fas fa-hand-point-right"></i>
                            <span>Referans Yönetimi</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/client/show') ? "active":"" }}">
                        <a class="nav-link" href="{{ route('admin_client_show') }}">
                            <i class="fas fa-hand-point-right"></i>
                            <span>Müşteri Yönetimi</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/service/show') ? "active":"" }}">
                        <a class="nav-link" href="{{ route('admin_service_show') }}">
                            <i class="fas fa-hand-point-right"></i>
                            <span>Servis Yönetimi</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown {{ Request::is('admin/portfolio-category/*') || Request::is('admin/portfolio/*') ? "active":"" }}">
                        <a href="#" class="nav-link has-dropdown"> <i class="fas fa-hand-point-right"></i>
                            <span>Portfolyo Yönetimi</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ Request::is('admin/portfolio-category/*') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_portfolio_category_show') }}"><i class="fas fa-angle-right"></i> Category</a></li>
                            <li class="{{ Request::is('admin/portfolio/*') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_portfolio_show') }}"><i class="fas fa-angle-right"></i> Portfolio</a></li>
                        </ul>
                    </li>


                    <li class="nav-item dropdown {{ Request::is('admin/post-category/*') || Request::is('admin/post/*') || Request::is('admin/post-comment/*') || Request::is('admin/post-reply/*') ? "active":"" }}">
                        <a href="#" class="nav-link has-dropdown"> <i class="fas fa-hand-point-right"></i>
                            <span>Blog Yönetimi</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ Request::is('admin/post-category/*') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_post_category_show') }}"><i class="fas fa-angle-right"></i> Blog Kategorileri</a></li>
                            <li class="{{ Request::is('admin/post/*') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_post_show') }}"><i class="fas fa-angle-right"></i> Blog Yazıları</a></li>
                            <li class="{{ Request::is('admin/post-comment/approved') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_comment_approved') }}"><i class="fas fa-angle-right"></i> Onaylı Yorumlar</a></li>
                            <li class="{{ Request::is('admin/post-comment/pending') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_comment_pending') }}"><i class="fas fa-angle-right"></i> Onay Bekleyen Yorumlar</a></li>
                            <li class="{{ Request::is('admin/post-reply/approved') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_reply_approved') }}"><i class="fas fa-angle-right"></i> Onaylı Yanıt Yorumlar</a></li>
                            <li class="{{ Request::is('admin/post-reply/pending') ? "active":"" }}"><a class="nav-link" href="{{ route('admin_reply_pending') }}"><i class="fas fa-angle-right"></i> Onay Bekleyen Yanıtlar</a></li>
                        </ul>
                    </li>

                </ul>
            </aside>
        </div>
