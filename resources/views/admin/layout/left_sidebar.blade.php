<aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0"
                href=" https://demos.creative-tim.com/argon-dashboard-pro/pages/dashboards/default.html "
                target="_blank">
                <img src="../../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Argon Dashboard 2 PRO</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link active"
                        aria-controls="dashboardsExamples" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                            
                        </div>
                        <span class="nav-link-text ms-1">Dashboards</span>
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <div class="collapse  show " id="dashboardsExamples">
                        <ul class="nav ms-4">
                            <li class="nav-item ">
                                <a class="nav-link " href="{{ route('user.index') }}">
                                    <span class="sidenav-mini-icon"> L </span>
                                    <span class="sidenav-normal"> User </span>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link active" href="{{ route('user.create') }}">
                                    <span class="sidenav-mini-icon"> D </span>
                                    <span class="sidenav-normal"> User create </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/dashboards/automotive.html">
                                    <span class="sidenav-mini-icon"> A </span>
                                    <span class="sidenav-normal"> Automotive </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/dashboards/smart-home.html">
                                    <span class="sidenav-mini-icon"> S </span>
                                    <span class="sidenav-normal"> Smart Home </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#vrExamples">
                                    <span class="sidenav-mini-icon"> V </span>
                                    <span class="sidenav-normal"> Virtual Reality <b class="caret"></b></span>
                                </a>
                                <div class="collapse " id="vrExamples">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/dashboards/vr/vr-default.html">
                                                <span class="sidenav-mini-icon text-xs"> V </span>
                                                <span class="sidenav-normal"> VR Default </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/dashboards/vr/vr-info.html">
                                                <span class="sidenav-mini-icon text-xs"> V </span>
                                                <span class="sidenav-normal"> VR Info </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/dashboards/crm.html">
                                    <span class="sidenav-mini-icon"> C </span>
                                    <span class="sidenav-normal"> CRM </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">PAGES</h6>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link "
                        aria-controls="pagesExamples" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="ni ni-ungroup text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pages</span>
                    </a>
                    <div class="collapse " id="pagesExamples">
                        <ul class="nav ms-4">
                            <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#profileExample">
                                    <span class="sidenav-mini-icon"> P </span>
                                    <span class="sidenav-normal"> Profile <b class="caret"></b></span>
                                </a>
                                <div class="collapse " id="profileExample">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/pages/profile/overview.html">
                                                <span class="sidenav-mini-icon text-xs"> P </span>
                                                <span class="sidenav-normal"> Profile Overview </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/pages/profile/teams.html">
                                                <span class="sidenav-mini-icon text-xs"> T </span>
                                                <span class="sidenav-normal"> Teams </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/pages/profile/projects.html">
                                                <span class="sidenav-mini-icon text-xs"> A </span>
                                                <span class="sidenav-normal"> All Projects </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#usersExample">
                                    <span class="sidenav-mini-icon"> U </span>
                                    <span class="sidenav-normal"> Users <b class="caret"></b></span>
                                </a>
                                <div class="collapse " id="usersExample">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/pages/users/reports.html">
                                                <span class="sidenav-mini-icon text-xs"> R </span>
                                                <span class="sidenav-normal"> Reports </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/pages/users/new-user.html">
                                                <span class="sidenav-mini-icon text-xs"> N </span>
                                                <span class="sidenav-normal"> New User </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#accountExample">
                                    <span class="sidenav-mini-icon"> A </span>
                                    <span class="sidenav-normal"> Account <b class="caret"></b></span>
                                </a>
                                <div class="collapse " id="accountExample">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/pages/account/settings.html">
                                                <span class="sidenav-mini-icon text-xs"> S </span>
                                                <span class="sidenav-normal"> Settings </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/pages/account/billing.html">
                                                <span class="sidenav-mini-icon text-xs"> B </span>
                                                <span class="sidenav-normal"> Billing </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/pages/account/invoice.html">
                                                <span class="sidenav-mini-icon text-xs"> I </span>
                                                <span class="sidenav-normal"> Invoice </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/pages/account/security.html">
                                                <span class="sidenav-mini-icon text-xs"> S </span>
                                                <span class="sidenav-normal"> Security </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#projectsExample">
                                    <span class="sidenav-mini-icon"> P </span>
                                    <span class="sidenav-normal"> Projects <b class="caret"></b></span>
                                </a>
                                <div class="collapse " id="projectsExample">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/pages/projects/general.html">
                                                <span class="sidenav-mini-icon text-xs"> G </span>
                                                <span class="sidenav-normal"> General </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/pages/projects/timeline.html">
                                                <span class="sidenav-mini-icon text-xs"> T </span>
                                                <span class="sidenav-normal"> Timeline </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/pages/projects/new-project.html">
                                                <span class="sidenav-mini-icon text-xs"> N </span>
                                                <span class="sidenav-normal"> New Project </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/pages/pricing-page.html">
                                    <span class="sidenav-mini-icon"> P </span>
                                    <span class="sidenav-normal"> Pricing Page </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/pages/rtl-page.html">
                                    <span class="sidenav-mini-icon"> R </span>
                                    <span class="sidenav-normal"> RTL </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/pages/widgets.html">
                                    <span class="sidenav-mini-icon"> W </span>
                                    <span class="sidenav-normal"> Widgets </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/pages/charts.html">
                                    <span class="sidenav-mini-icon"> C </span>
                                    <span class="sidenav-normal"> Charts </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/pages/sweet-alerts.html">
                                    <span class="sidenav-mini-icon"> S </span>
                                    <span class="sidenav-normal"> Sweet Alerts </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/pages/notifications.html">
                                    <span class="sidenav-mini-icon"> N </span>
                                    <span class="sidenav-normal"> Notifications </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/pages/chat.html">
                                    <span class="sidenav-mini-icon"> C </span>
                                    <span class="sidenav-normal"> Chat </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#applicationsExamples" class="nav-link "
                        aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Applications</span>
                    </a>
                    <div class="collapse " id="applicationsExamples">
                        <ul class="nav ms-4">
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/applications/kanban.html">
                                    <span class="sidenav-mini-icon"> K </span>
                                    <span class="sidenav-normal"> Kanban </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/applications/wizard.html">
                                    <span class="sidenav-mini-icon"> W </span>
                                    <span class="sidenav-normal"> Wizard </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/applications/datatables.html">
                                    <span class="sidenav-mini-icon"> D </span>
                                    <span class="sidenav-normal"> DataTables </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/applications/calendar.html">
                                    <span class="sidenav-mini-icon"> C </span>
                                    <span class="sidenav-normal"> Calendar </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/applications/analytics.html">
                                    <span class="sidenav-mini-icon"> A </span>
                                    <span class="sidenav-normal"> Analytics </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#ecommerceExamples" class="nav-link "
                        aria-controls="ecommerceExamples" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="ni ni-archive-2 text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Ecommerce</span>
                    </a>
                    <div class="collapse " id="ecommerceExamples">
                        <ul class="nav ms-4">
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/ecommerce/overview.html">
                                    <span class="sidenav-mini-icon"> O </span>
                                    <span class="sidenav-normal"> Overview </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#productsExample">
                                    <span class="sidenav-mini-icon"> P </span>
                                    <span class="sidenav-normal"> Products <b class="caret"></b></span>
                                </a>
                                <div class="collapse " id="productsExample">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="../../pages/ecommerce/products/new-product.html">
                                                <span class="sidenav-mini-icon text-xs"> N </span>
                                                <span class="sidenav-normal"> New Product </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="../../pages/ecommerce/products/edit-product.html">
                                                <span class="sidenav-mini-icon text-xs"> E </span>
                                                <span class="sidenav-normal"> Edit Product </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="../../pages/ecommerce/products/product-page.html">
                                                <span class="sidenav-mini-icon text-xs"> P </span>
                                                <span class="sidenav-normal"> Product Page </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="../../pages/ecommerce/products/products-list.html">
                                                <span class="sidenav-mini-icon text-xs"> P </span>
                                                <span class="sidenav-normal"> Products List </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#ordersExample">
                                    <span class="sidenav-mini-icon"> O </span>
                                    <span class="sidenav-normal"> Orders <b class="caret"></b></span>
                                </a>
                                <div class="collapse " id="ordersExample">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/ecommerce/orders/list.html">
                                                <span class="sidenav-mini-icon text-xs"> O </span>
                                                <span class="sidenav-normal"> Order List </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/ecommerce/orders/details.html">
                                                <span class="sidenav-mini-icon text-xs"> O </span>
                                                <span class="sidenav-normal"> Order Details </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../../pages/ecommerce/referral.html">
                                    <span class="sidenav-mini-icon"> R </span>
                                    <span class="sidenav-normal"> Referral </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#authExamples" class="nav-link " aria-controls="authExamples"
                        role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Authentication</span>
                    </a>
                    <div class="collapse " id="authExamples">
                        <ul class="nav ms-4">
                            <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#signinExample">
                                    <span class="sidenav-mini-icon"> S </span>
                                    <span class="sidenav-normal"> Sign In <b class="caret"></b></span>
                                </a>
                                <div class="collapse " id="signinExample">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/authentication/signin/basic.html">
                                                <span class="sidenav-mini-icon text-xs"> B </span>
                                                <span class="sidenav-normal"> Basic </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/authentication/signin/cover.html">
                                                <span class="sidenav-mini-icon text-xs"> C </span>
                                                <span class="sidenav-normal"> Cover </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="../../pages/authentication/signin/illustration.html">
                                                <span class="sidenav-mini-icon text-xs"> I </span>
                                                <span class="sidenav-normal"> Illustration </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#signupExample">
                                    <span class="sidenav-mini-icon"> S </span>
                                    <span class="sidenav-normal"> Sign Up <b class="caret"></b></span>
                                </a>
                                <div class="collapse " id="signupExample">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/authentication/signup/basic.html">
                                                <span class="sidenav-mini-icon text-xs"> B </span>
                                                <span class="sidenav-normal"> Basic </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/authentication/signup/cover.html">
                                                <span class="sidenav-mini-icon text-xs"> C </span>
                                                <span class="sidenav-normal"> Cover </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="../../pages/authentication/signup/illustration.html">
                                                <span class="sidenav-mini-icon text-xs"> I </span>
                                                <span class="sidenav-normal"> Illustration </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#resetExample">
                                    <span class="sidenav-mini-icon"> R </span>
                                    <span class="sidenav-normal"> Reset Password <b class="caret"></b></span>
                                </a>
                                <div class="collapse " id="resetExample">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/authentication/reset/basic.html">
                                                <span class="sidenav-mini-icon text-xs"> B </span>
                                                <span class="sidenav-normal"> Basic </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/authentication/reset/cover.html">
                                                <span class="sidenav-mini-icon text-xs"> C </span>
                                                <span class="sidenav-normal"> Cover </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="../../pages/authentication/reset/illustration.html">
                                                <span class="sidenav-mini-icon text-xs"> I </span>
                                                <span class="sidenav-normal"> Illustration </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#lockExample">
                                    <span class="sidenav-mini-icon"> L </span>
                                    <span class="sidenav-normal"> Lock <b class="caret"></b></span>
                                </a>
                                <div class="collapse " id="lockExample">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/authentication/lock/basic.html">
                                                <span class="sidenav-mini-icon text-xs"> B </span>
                                                <span class="sidenav-normal"> Basic </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/authentication/lock/cover.html">
                                                <span class="sidenav-mini-icon text-xs"> C </span>
                                                <span class="sidenav-normal"> Cover </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="../../pages/authentication/lock/illustration.html">
                                                <span class="sidenav-mini-icon text-xs"> I </span>
                                                <span class="sidenav-normal"> Illustration </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#StepExample">
                                    <span class="sidenav-mini-icon"> 2 </span>
                                    <span class="sidenav-normal"> 2-Step Verification <b class="caret"></b></span>
                                </a>
                                <div class="collapse " id="StepExample">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="../../pages/authentication/verification/basic.html">
                                                <span class="sidenav-mini-icon text-xs"> B </span>
                                                <span class="sidenav-normal"> Basic </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="../../pages/authentication/verification/cover.html">
                                                <span class="sidenav-mini-icon text-xs"> C </span>
                                                <span class="sidenav-normal"> Cover </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="../../pages/authentication/verification/illustration.html">
                                                <span class="sidenav-mini-icon text-xs"> I </span>
                                                <span class="sidenav-normal"> Illustration </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#errorExample">
                                    <span class="sidenav-mini-icon"> E </span>
                                    <span class="sidenav-normal"> Error <b class="caret"></b></span>
                                </a>
                                <div class="collapse " id="errorExample">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/authentication/error/404.html">
                                                <span class="sidenav-mini-icon text-xs"> E </span>
                                                <span class="sidenav-normal"> Error 404 </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="../../pages/authentication/error/500.html">
                                                <span class="sidenav-mini-icon text-xs"> E </span>
                                                <span class="sidenav-normal"> Error 500 </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                
            </ul>
        </div>
    </aside>