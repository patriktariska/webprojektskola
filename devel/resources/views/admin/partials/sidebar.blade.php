<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Erazmus Program</li>
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard "></i> <span>Dashboard</span></a></li>
            <li class="{{ request()->is('dashboard/school') ? 'active' : '' }}"><a href="{{ url('/dashboard/school') }}"><i class="fa fa-dashboard "></i> <span>Školy</span></a></li>
            <li class="{{ request()->is('dashboard/mobility') ? 'active' : '' }}"><a href="{{ url('/dashboard/mobility') }}"><i class="fa fa-dashboard "></i> <span>Mobility</span></a></li>
            <li class="{{ request()->is('dashboard/feedback') ? 'active' : '' }}"><a href="{{ url('/dashboard/feedback') }}"><i class="fa fa-dashboard "></i> <span>Feedback</span></a></li>

            <li class="header">Manažment</li>
            <li class="{{ request()->is('dashboard/profile') ? 'active' : '' }}"><a href="{{ url('/dashboard/profile') }}"><i class="fa fa-gears"></i><i class="fa fa-circle-o text-aqua pull-right"></i><span>Profil</span></a></li>
            <li class="{{ request()->is('') ? 'active' : '' }}"><a href=""><i class="fa fa-leaf"></i><i class="fa fa-circle-o text-orange pull-right"></i><span>Logy</span></a></li>
        </ul>
    </section>
</aside>