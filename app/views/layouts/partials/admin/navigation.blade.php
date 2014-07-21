<ul id="sidebar" class="acc-menu">

    <!-- Recherche globale -->
    @include('layouts.partials.admin.search')

    <li class="divider"></li>

    <!-- Accueil admin -->
    <li><a class="{{ Request::is( 'admin') ? 'active' : '' }}" href="#"><i class="fa fa-cog"></i> <span>Dashboard</span></a></li>

    <!-- Outils: membres, specialisations, professions -->
    <li><a href="javascript:;"><i class="fa fa-cogs"></i> <span>Outils</span></a>
        <ul class="acc-menu">
            <li><a class="{{ Request::is( 'admin/pubdroit/specialisation') ? 'active' : '' }}" href="{{ url('admin/pubdroit/specialisation') }}">
                    <span>Spécialisations</span></a>
            </li>
            <li><a class="{{ Request::is( 'admin/pubdroit/membre') ? 'active' : '' }}" href="{{ url('admin/pubdroit/membre') }}">
                    <span>Membres</span></a>
            </li>
            <li><a class="{{ Request::is( 'admin/pubdroit/profession') ? 'active' : '' }}" href="{{ url('admin/pubdroit/profession') }}">
                    <span>Profession</span></a>
            </li>
        </ul>
    </li>

    <!-- Utilisateurs -->
    <li><a href="javascript:;" class="{{ Request::is( 'admin/users') ? 'active' : '' }}"><i class="fa fa-group"></i> <span>Utilisateurs</span></a>
        <ul class="acc-menu">
            <li>{{ link_to('admin/users', 'Comptes utilisateurs' , array('class' => Request::is( 'admin/users') ? 'active' : '') ) }}</li>
            <li>{{ link_to('admin/adresses', 'Adresses' , array('class' => Request::is( 'admin/adresses') ? 'active' : '') ) }}</li>
        </ul>
    </li>

    <!-- Site: publications-droit.ch -->
    <li><a href="javascript:;" class="{{ Request::is( 'admin/pubdroit') ? 'active' : '' }}"><i class="fa fa-book"></i> <span>Publications-droit</span></a>
        <ul class="acc-menu">
            <li><a class="{{ Request::is( 'admin/pubdroit/lists') ? 'active' : '' }}" href="{{ url('admin/pubdroit/lists') }}">
                    <span>Colloques</span></a>
            </li>
            <li><a class="{{ Request::is( 'admin/pubdroit/archives') ? 'active' : '' }}" href="{{ url('admin/pubdroit/archives') }}">
                    <span>Archives</span></a>
            </li>
        </ul>
    </li>

    <!-- Site: bail.ch -->
    <li><a href="javascript:;" class="{{ Request::is( 'admin/bail') ? 'active' : '' }}"><i class="fa fa-home"></i> <span>Bail</span></a>
        <ul class="acc-menu">
            <li>{{ link_to('admin/bail/arrets', 'Arrêts' , array('class' => Request::is( 'admin/bail/arrets') ? 'active' : '') ) }}</li>
            <li>{{ link_to('admin/bail/analyses', 'Analyses' , array('class' => Request::is( 'admin/bail/analyses') ? 'active' : '') ) }}</li>
        </ul>
    </li>

    <!-- Site: droitmatrimonial.ch -->
    <li><a href="javascript:;" class="{{ Request::is( 'admin/matrimonial') ? 'active' : '' }}"><i class="fa fa-heart-o"></i> <span>Droit matrimonial</span></a>
        <ul class="acc-menu">
            <li>{{ link_to('admin/matrimonial/arrets', 'Arrêts' , array('class' => Request::is( 'admin/matrimonial/arrets') ? 'active' : '') ) }}</li>
            <li>{{ link_to('admin/matrimonial/analyses', 'Analyses' , array('class' => Request::is( 'admin/matrimonial/analyses') ? 'active' : '') ) }}</li>
        </ul>
    </li>

</ul>