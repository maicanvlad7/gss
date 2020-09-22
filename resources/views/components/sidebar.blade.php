<div class="sidebar" data-color="blue">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <!-- LOGO CAND O FI SA IL AVEM-->
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            San Stephen
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="{{Request::is('home') ? 'active' : ''}}">
                <a href="{{route('home')}}">
                    <i class="now-ui-icons design_app"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{route('products')}}">
                    <i class="now-ui-icons education_atom"></i>
                    <p>Produse</p>
                </a>
            </li>
        </ul>
    </div>
</div>
