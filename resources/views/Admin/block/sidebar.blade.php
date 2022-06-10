@php
use App\Models\User;
use App\Models\Admin\Roles;
use App\Models\Admin\Authors;
use App\Models\Admin\Chapters;
use App\Models\Admin\Products;
use App\Models\Admin\Categorys;
use App\Models\Admin\Permissions;
@endphp
<div class="sidebar" id="sidebar">
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 820px">
        <div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 820px">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title"><span>Main</span></li>
                    <li class="<?php #if ($data["Page"] == "dashboard") echo "active";
                    ?>">
                        <a href="/dashboard"><i class="fas fa-home"></i><span>Bảng tin</span></a>
                    </li>
                    {{-- <li class="<?php #if ($data["Page"] == "statistical") echo "active";
                    ?>">
                        <a href="/statistical"><i class="fas fa-chart-bar"></i><span>Thống kê</span></a>
                    </li> --}}
                    <li class="submenu">
                        @can('viewUser', User::class)
                        <a href="#"><i class="fas fa-user"></i> <span>
                                Thành Viên</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li>
                                <a href="{{ route('users.index') }}" class="<?php #if ($data["Page"] == "product") echo "active";
                                ?>">
                                    Danh Sách Thành Viên
                                </a>
                            </li>
                            @can('createUser', User::class)
                            <li>
                                <a href="{{ route('users.create') }}" class="<?php #if ($data["Page"] == "list_author") echo "active";
                                ?>">
                                    Tạo Thành Viên
                                </a>
                            </li>
                            @endcan
                        </ul>
                        @endcan
                    </li>


                    <li class="submenu">
                        @can('viewRoles', Roles::class)
                            <a href="#"><i class="fas fa-boxes"></i> <span>
                                    Vai Trò</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li>
                                    <a href="{{ route('roles.index') }}" class="<?php #if ($data["Page"] == "product") echo "active";
                                    ?>">
                                        Danh Sách Vai Trò
                                    </a>
                                </li>
                                <li>
                                    @can('createRoles', Roles::class)
                                        <a href="{{ route('roles.create') }}" class="<?php #if ($data["Page"] == "list_author") echo "active";
                                        ?>">
                                            Tạo Vai Trò
                                        </a>
                                    @endcan

                                </li>
                            </ul>
                        @endcan
                    </li>

                    <li class="submenu">
                        @can('viewPermissions', Permissions::class)
                            <a href="#"><i class="fas fa-boxes"></i> <span>
                                    Quyền</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li>
                                    <a href="{{ route('permissions.index') }}" class="<?php #if ($data["Page"] == "product") echo "active";
                                    ?>">
                                        Danh Sách Quyền
                                    </a>
                                </li>
                                @can('createPermissions', Permissions::class)
                                    <li>
                                        <a href="{{ route('permissions.create') }}" class="<?php #if ($data["Page"] == "list_author") echo "active";
                                        ?>">
                                            Tạo Quyền
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        @endcan
                    </li>
                    <li class="submenu">
                        @can('viewAuthors', Authors::class)

                            <a href="#"><i class="fas fa-users"></i> <span>
                                    Tác Giả</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li>
                                    <a href="{{ route('authors.index') }}" class="<?php #if ($data["Page"] == "product") echo "active";
                                    ?>">
                                        Danh Sách Tác Giả
                                    </a>
                                </li>
                                @can('createAuthors', Authors::class)
                                    <li>
                                        <a href="{{ route('authors.create') }}" class="<?php #if ($data["Page"] == "list_author") echo "active";
                                        ?>">
                                            Tạo Tác Giả
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        @endcan
                    </li>
                    <li class="submenu">
                        @can('viewCategorys', Categorys::class)
                        <a href="#"><i class="fas fa-boxes"></i> <span>
                                Danh Mục</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li>
                                <a href="{{ route('categorys.index') }}" class="<?php #if ($data["Page"] == "product") echo "active";
                                ?>">
                                    Danh Sách Danh Mục
                                </a>
                            </li>
                        </ul>
                        @endcan
                    </li>
                    <li class="submenu">
                        @can('viewProducts', Products::class)
                            <a href="#"><i class="fas fa-boxes"></i> <span>
                                    Sản phẩm</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li>
                                    <a href="{{ route('products.index') }}" class="">
                                        Danh Sách Sản Phẩm
                                    </a>
                                </li>
                                @can('createProducts', Products::class)
                                    <li>
                                        <a href="{{ route('products.create') }}" class="">
                                            Tạo Sản Phẩm
                                        </a>
                                    </li>
                                @endcan
                                
                            </ul>
                        @endcan
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="far fa-address-book"></i><span>Bài viết</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li>
                                <a href="/post" class="<?php #if ($data["Page"] == "post") echo "active";
                                ?>">
                                    Danh sách bài viết
                                </a>
                            </li>
                            <li>
                                <a href="/postcategory" class="<?php #if ($data["Page"] == "post-category") echo "active";
                                ?>">
                                    Danh mục
                                </a>
                            </li>
                            <li>
                                <a href="/comment" class="<?php #if ($data["Page"] == "post-category") echo "active";
                                ?>">
                                    Bình luận
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <div class="slimScrollBar" style="
        background: rgb(204, 204, 204);
        width: 7px;
        position: absolute;
        top: 0px;
        opacity: 0.4;
        display: block;
        border-radius: 7px;
        z-index: 99;
        right: 1px;
        height: 733.373px;
      "></div>
        <div class="slimScrollRail" style="
        width: 7px;
        height: 100%;
        position: absolute;
        top: 0px;
        display: none;
        border-radius: 7px;
        background: rgb(51, 51, 51);
        opacity: 0.2;
        z-index: 90;
        right: 1px;
      "></div>
    </div>
</div>
