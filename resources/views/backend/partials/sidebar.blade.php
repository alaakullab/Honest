    <aside id="leftsidebar" class="sidebar">

        <!-- Menu -->
        <div class="menu">
            <ul class="list">

                <li class="header">MAIN NAVIGATION</li>
                
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard',app()->getLocale()) }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/sliders*') ? 'active' : '' }}">
                    <a href="{{ route('admin.sliders.index',app()->getLocale()) }}">
                        <i class="material-icons">burst_mode</i>
                        <span>Sliders</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/properties*') ? 'active' : '' }}">
                    <a href="{{ route('admin.properties.index',app()->getLocale()) }}">
                        <i class="material-icons">home</i>
                        <span>Property</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/features*') ? 'active' : '' }}">
                    <a href="{{ route('admin.features.index',app()->getLocale()) }}">
                        <i class="material-icons">star</i>
                        <span>Features</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/services*') ? 'active' : '' }}">
                    <a href="{{ route('admin.services.index',app()->getLocale()) }}">
                        <i class="material-icons">wb_sunny</i>
                        <span>Services</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/testimonials*') ? 'active' : '' }}">
                    <a href="{{ route('admin.testimonials.index',app()->getLocale()) }}">
                        <i class="material-icons">view_carousel</i>
                        <span>Testimonials</span>
                    </a>
                </li>

                <li class="header">Blog</li>
                <li class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index',app()->getLocale()) }}">
                        <i class="material-icons">category</i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/tags*') ? 'active' : '' }}">
                    <a href="{{ route('admin.tags.index',app()->getLocale()) }}">
                        <i class="material-icons">label</i>
                        <span>Tags</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/posts*') ? 'active' : '' }}">
                    <a href="{{ route('admin.posts.index',app()->getLocale()) }}">
                        <i class="material-icons">library_books</i>
                        <span>Posts</span>
                    </a>
                </li>

                <li class="header"> </li>
                <li class="{{ Request::is('admin/galleries*') ? 'active' : '' }}">
                    <a href="{{ route('admin.album',app()->getLocale()) }}">
                        <i class="material-icons">view_list</i>
                        <span>Gallery</span>
                    </a>
                </li>
 
                <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                            <a href="{{ route('admin.settings',app()->getLocale()) }}">
                                <span>Settings</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/changepassword') ? 'active' : '' }}">
                            <a href="{{ route('admin.changepassword',app()->getLocale()) }}">
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/profile') ? 'active' : '' }}">
                            <a href="{{ route('admin.profile',app()->getLocale()) }}">
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/message*') ? 'active' : '' }}">
                            <a href="{{ route('admin.message',app()->getLocale()) }}">
                                <span>Message</span>
                            </a>
                        </li>
                    </ul>
                </li>
                

            </ul>
        </div>
        <!-- #Menu -->
        
    </aside>