<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Erasmus</li>
            <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}"><i class="fa fa-dashboard "></i> <span>Dashboard</span></a></li>

            <li class="header">Stránky</li>
            <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}"><i class="fa fa-dashboard "></i> <span>O nás</span></a></li>

        </ul>
    </section>
</aside>