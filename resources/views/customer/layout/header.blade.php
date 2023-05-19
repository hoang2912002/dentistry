<nav class="navbar navbar-inverse navbar-transparent navbar-fixed-top" role="navigation">
    <div class="container ">

        <div class="navbar-header ">

            <a class="timLink" href="{{ route('homepage.index') }}" style="display: inline-flex;">
                <div class="logo-container">
                    <div class="logo">
                        <img class="" src="{{ asset('img/customer') }}/denticare-logo-inv.png" alt=""
                            style="width: 150px;height: 70px">
                    </div>

                </div>
            </a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="components.html">
                        Trang chủ
                    </a>
                </li>
                <li>
                    <a href="home.html">
                        Giới thiệu
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Dịch vụ
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                            <a href="blog-page.html">
                                <i class="pe-7s-comment"></i> Blog Page
                            </a>
                        </li>
                        <li>
                            <a href="blog-post.html">
                                <i class="pe-7s-news-paper"></i> Blog Post
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Bác sĩ
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                            <a href="ecommerce.html">
                                <i class="pe-7s-ticket"></i> Store Page
                            </a>
                        </li>
                        <li>
                            <a href="product-page.html">
                                <i class="pe-7s-piggy"></i> Product Page
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Liện hệ
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                            <a href="contact-us.html">
                                <i class="pe-7s-mail-open-file"></i> Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="about-us.html">
                                <i class="pe-7s-info"></i> About Us
                            </a>
                        </li>
                        <li>
                            <a href="pricing.html">
                                <i class="pe-7s-cash"></i> Pricing Page
                            </a>
                        </li>
                        <li>
                            <a href="sidebar.html">
                                <i class="pe-7s-menu"></i> Sidebar Menu
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="pe-7s-gift"></i> More (soon)
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="https://www.creative-tim.com/product/get-shit-done-pro"
                        class="btn btn-round btn-default">Đặt lịch hẹn</a></li>
            </ul>
        </div>
    </div>
</nav>