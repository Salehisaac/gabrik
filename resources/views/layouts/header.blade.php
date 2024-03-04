<header class="u-clearfix u-header u-header" id="sec-a694"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <a href="{{ route('home') }}" class="u-image u-logo u-image-1" style="display: inline-block; margin-left: -100px;">
            <img src="{{ asset('images/logo.jpeg') }}" class="u-logo-image u-logo-image-1" style="width: 100px; height: auto; margin-top: -15px;">
        </a>

        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
            <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
                <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                    <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
                    <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
                        </g></svg>
                </a>
            </div>

            @php
                $menus = \Modules\Menue\App\Models\Menu::where(['parent_id' => null , 'status' => 1 ])->get();
            @endphp


            <div class="u-nav-container">
                @foreach($menus as $menu)
                    <ul class="u-nav u-unstyled u-nav-1">
                        <li class="u-nav-item" style="display: block">
                            <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="{{$menu->url}}" style="padding: 10px 20px; font-weight: bold; font-style: normal;">{{ $menu->name }}</a>
                            @if($menu->children->count() !== 0)
                                <div class="u-nav-popup">
                                    <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                                        @foreach($menu->children as $children)
                                            <li class="u-nav-item">
                                                <a class="u-button-style u-nav-link u-white"  href="{{$children->url}}" style="font-weight: bold; font-style: normal;">{{$children->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </li>
                    </ul>
                @endforeach
            </div>



        </nav>
    </div>
</header>
