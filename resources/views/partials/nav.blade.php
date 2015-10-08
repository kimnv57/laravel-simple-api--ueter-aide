<div class="header-wrapper">
    <div class="header header-v1">


    <header id="header-top" style="padding:9px 0;">
        <div class="container">
            <div class="row">
                <div class="header-top clearfix">
                    <div class="header-top-1 col-xs-12 col-sm-4 col-md-4 collg-4">
                        <div id="cs_social_widget-2" class="header-top-widget-col widget_cs_social_widget">
                        <ul class="cs-social">
                            <li>
                                <a href="#" class="twitter"></a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/thaocoj.k57" class="facebook"></a>
                            </li>
                            <li>
                                <a href="https://plus.google.com/u/0/" class="googleplus"></a>
                            </li>
                            <li>
                                <a href="#" class="vimeo"></a>
                            </li>
                        </ul> 
                        </div>             
                    </div>
                    <div class="header-top-2 col-xs-12 col-sm-4 col-md-4 collg-4"></div>
                    <div class="header-top-3 col-xs-12 col-sm-4 col-md-4 collg-4"></div>
                </div>
            </div>
        </div>
    </header>
    <header id="cshero-header" class style="background-color:rgba(255,255,255,1);">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <hr>
                    <span class="icon-bar" style="background: #656565;"></span>
                    <span class="icon-bar" style="background: #656565;"></span>
                    <span class="icon-bar" style="background: #656565;"></span>
                    <span class="icon-bar" style="background: #656565;"></span>
                </button>
                <a class="navbar-brand" href="{{URL::to('/')}}">
                    <img src="{{URL::to('images/logo.png')}}" style="height: 55px" class="normal-logo logo-v1">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul id="menu" class="nav navbar-nav" >
                    
                    
                    @if (Auth::guest())
                        <li class="{{ (Request::is('about') ? 'active' : '') }}">
                        <a href="{!! URL::to('about') !!}"></i>about</a>
                    </li>

                    @else
                    @if (!Auth::user()->isAdmin())
                    <li class="{{ (Request::is('about') ? 'active' : '') }}">
                        <a href="{!! URL::to('about') !!}"></i>about</a>
                    </li>

                    @else
                    <li class="{{ (Request::is('admin/dashboard') ? 'active' : '') }}">
                        <a href="{!! URL::to('admin/dashboard') !!}">Thống kê</a>
                    </li>
                    <li class="{{ (Request::is('admin/users*') ? 'active' : '') }}">
                        <a href="{!! URL::to('admin/users') !!}">users</a>
                    </li>
                     <li class="{{ (Request::is('admin/notifications*') ? 'active' : '') }}">
                        <a href="{!! URL::to('admin/notifications') !!}">notifications</a>
                    </li>
                     <li class="{{ (Request::is('admin/packages*') ? 'active' : '') }}">
                        <a href="{!! URL::to('admin/packages') !!}">packages</a>
                    </li>
                     <li class="{{ (Request::is('admin/apitest*') ? 'active' : '') }}">
                        <a href="{!! URL::to('admin/apitest') !!}">Api test</a>
                    </li>
                     
                    @endif
                    @endif
                   
                    
                </ul>
                <ul class="nav navbar-nav navbar-right" id="button-login" >
                    @if (Auth::guest())
                        <li class="{{ (Request::is('auth/login') ? 'active' : '') }} " data-toggle="modal" ><a href="{{URL::to('auth/login')}}"><i
                                    class="fa fa-sign-in"></i> Login</a></li>
                    @else
                    <li class="dropdown" id="user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i ></i> {{ Auth::user()->fullname }} <i
                                    class="glyphicon glyphicon-triangle-bottom"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            
                            <li>
                                <a href="{{ URL::to('users/' . Auth::user()->username) }}"><i class="fa fa-sign-out"></i> Ho So</a>
                            </li>
                             <li role="presentation" class="divider"></li>
                            <li>
                                <a href="{!! URL::to('auth/logout') !!}"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                @endif
                </ul>
            @yield('firstcontent')
            
            </div>
        </div>
    </header>
    </div>
    </div>