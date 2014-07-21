<ul class="nav navbar-nav pull-right toolbar">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
            <span class="hidden-xs">Cindy Leschaud <i class="fa fa-caret-down"></i></span><img src="{{ asset('images/admin/dangerfield.png') }}" alt="Dangerfield" />
        </a>
        <ul class="dropdown-menu userinfo arrow">
            <li class="username">
                <a href="#">
                    <div class="pull-left"><img class="userimg" src="{{ asset('images/admin/dangerfield.png') }}" alt="Jeff Dangerfield"/></div>
                    <div class="pull-right"><h5>Howdy, Cindy!</h5><small>Logged in as <span>admin</span></small></div>
                </a>
            </li>
            <li class="userlinks">
                <ul class="dropdown-menu">
                    <li><a href="#">Edit Profile <i class="pull-right fa fa-pencil"></i></a></li>
                    <li><a href="#">Account <i class="pull-right fa fa-cog"></i></a></li>
                    <li><a href="#">Help <i class="pull-right fa fa-question-circle"></i></a></li>
                    <li class="divider"></li>
                    <li>{{ link_to('logout', 'Logout') }}</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>