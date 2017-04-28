<?php
//«il fiore perfetto è una cosa rara, se si trascorresse la vita a cercarne uno, non sarebbe una vita sprecata»
?>



<!-- END Side Overlay -->

<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="side-header side-content bg-white-op">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times"></i>
                </button>
                <!-- Themes functionality initialized in App() -> uiHandleTheme() -->

                <a class="h5 text-white">
                    <span class="h4 font-w600 sidebar-mini-hide">Admin</span>
                </a>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="side-content">
                <ul class="nav-main">
                    <li>
                        <a href="<?php echo $abs?>dashboard/index"><i class="fa fa-home"></i><span class="sidebar-mini-hide">Home</span></a>
                    </li>

                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Menu</span></li>

                    <li><a href="<?php echo $abs?>users/list"><i class="fa fa-users"></i><span class="sidebar-mini-hide">Utenti</span></a></li>


                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-note"></i><span class="sidebar-mini-hide">Forms</span></a>
                        <ul>
                            <li>
                                <a href="base_forms_premade.html">Pre-made</a>
                            </li>
                            <li>
                                <a href="base_forms_elements.html">Elements</a>
                            </li>
                            <li>
                                <a href="base_forms_pickers_more.html">Pickers &amp; More</a>
                            </li>
                            <li>
                                <a href="base_forms_editors.html">Text Editors</a>
                            </li>
                            <li>
                                <a href="base_forms_validation.html">Validation</a>
                            </li>
                            <li>
                                <a href="base_forms_wizard.html">Wizard</a>
                            </li>
                        </ul>
                    </li>



                </ul>
            </div>
            <!-- END Side Content -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>

<header id="header-navbar" class="content-mini content-mini-full">


    <!-- Header Navigation Left -->
    <ul class="nav-header pull-left">
        <li class="hidden-md hidden-lg">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                <i class="fa fa-navicon"></i>
            </button>
        </li>
        <li class="hidden-xs hidden-sm">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                <i class="fa fa-angle-left"></i>
            </button>
        </li>

    </ul>
    <!-- END Header Navigation Left -->
</header>