<aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('siwo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIWO</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('rai.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block">Ida Bagus Rai Kusuma N.</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <router-link to="beranda" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt blue"></i>
                                <p>
                                    Beranda

                                </p>
                            </router-link>

                        </li>
                        <li class="nav-item">
                            <router-link to="data-pekerjaan" class="nav-link">
                                <i class="nav-icon fas fa-pencil-alt blue"></i>
                                <p>
                                    Pekerjaan

                                </p>
                            </router-link>

                        </li>
                        <li class="nav-item">
                            <router-link to="data-unit" class="nav-link">
                                <i class="nav-icon fas fa-users blue"></i>
                                <p>
                                    Unit

                                </p>
                            </router-link>

                        </li>
                        <li class="nav-item">
                            <router-link to="data-user" class="nav-link">
                                <i class="nav-icon fas fa-user blue"></i>
                                <p>
                                    Pengguna

                                </p>
                            </router-link>

                        </li>

                        <li class="nav-item">
                            <router-link to="data-level" class="nav-link">
                                <i class="nav-icon fas fa-user-cog blue"></i>
                                <p>
                                    Level Pengguna

                                </p>
                            </router-link>

                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt blue"></i>
                                <p>
                                    Log Out

                                </p>
                            </a>

                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>