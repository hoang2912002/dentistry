<footer class="footer footer-big background-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h5 class="title">Company</h5>
                <nav>
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Find offers
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Discover Projects
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Our Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                About Us
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-3 col-md-offset-1">
                <h5 class="title"> Dịch vụ</h5>
                <nav>
                    <ul>
                        @foreach ($services as $service)
                            <li style="margin-bottom: 5px">
                                <a href="#">
                                    {{ $service->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="col-md-3">
                <h5 class="title"> Hỗ trợ</h5>
                <nav>
                    <ul>
                        <li>
                            <a href="#">
                                Liên hệ chúng tôi
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Đặt lịch khám
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company Policy
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Money Back
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-3">
                <h5 class="title">Liên hệ với chúng tôi</h5>
                <nav>
                    <ul>
                        <li>
                            <a href="#" style="display: flex;align-items: center">
                                <i class='bx bxs-phone' ></i> &nbsp; <b>0987654321</b>
                            </a>
                            <br>
                        </li>
                        <li>
                            <a href="#" style="display: flex;align-items: center">
                                <i class='bx bx-envelope' ></i>
                                &nbsp; <b>DentiCare@gmail.com</b>
                            </a>
                            <br>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </div>
        <hr />
        <div class="copyright">
            &copy; 2023 DentiCare, made by G37
        </div>
    </div>
</footer>