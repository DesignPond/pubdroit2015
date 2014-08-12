<ul id="sidebar" class="acc-menu">

    <!-- Recherche globale -->
    @include('layouts.partials.admin.search')

    <li class="divider"></li>

    <!-- Accueil admin -->
    <li><a class="" href="{{ url('admin') }}"><i class="fa fa-circle"></i> <span>Accueil</span></a></li>

    <!-- Outils: membres, specialisations, professions -->
    <li><a href="javascript:;"><i class="fa fa-cogs"></i> <span>Outils</span></a>
        <ul class="acc-menu">
            <li><a class="" href="{{ url('admin/specialisation') }}"><span>Spécialisations</span></a></li>
            <li><a class="" href="{{ url('admin/membre') }}"><span>Membres</span></a></li>
            <li><a class="" href="{{ url('admin/profession') }}"><span>Profession</span></a></li>
        </ul>
    </li>

    <!-- Utilisateurs -->
    <li><a href="javascript:;" class=""><i class="fa fa-group"></i> <span>Utilisateurs</span></a>
        <ul class="acc-menu">
            <li>{{ link_to('admin/users', 'Comptes utilisateurs' , array('class' => '')) }}</li>
            <li>{{ link_to('admin/adresses', 'Adresses' , array('class' => '')) }}</li>
        </ul>
    </li>

    <!-- Shop -->
    <li><a href="javascript:;" class=""><i class="fa fa-shopping-cart"></i> <span>Shop</span></a>
        <ul class="acc-menu">
            <li><a class="" href="#"><span>Produits</span></a></li>
            <li><a class="" href="#"><span>Ventes</span></a></li>
        </ul>
    </li>

    <!-- Colloques -->
    <li><a href="javascript:;" class=""><i class="fa fa-exclamation"></i> <span>Colloques</span></a>
        <ul class="acc-menu">
            <li><a class="" href="{{ url('admin/colloque') }}"><span>En cours</span></a></li>
            <li><a class="" href="{{ url('admin/colloque/archives') }}"><span>Archivés</span></a></li>
        </ul>
    </li>

    <!-- Newsletter -->
    <li><a href="javascript:;" class=""><i class="fa fa-envelope-o"></i> <span>Newsletter</span></a>
        <ul class="acc-menu">
            <li><a class="" href="#"><span>Créer une newsletter</span></a></li>
            <li><a class="" href="#"><span>Archives</span></a></li>
            <li><a class="" href="#"><span>Abonnées</span></a></li>
            <li><a class="" href="#"><span>Statistiques</span></a></li>
        </ul>
    </li>
    <li class="divider"></li>
    <!-- Site: publications-droit.ch -->
    <li><a href="javascript:;" class=""><i class="fa fa-book"></i> <span>Publications-droit</span></a>
        <ul class="acc-menu">
            <li><a class="" href="#"><span>Liens</span></a></li>
        </ul>
    </li>

    <!-- Site: bail.ch -->
    <li><a href="javascript:;" class=""><i class="fa fa-home"></i> <span>Bail</span></a>
        <ul class="acc-menu">
            <li><a class="" href="#"><span>Pages</span></a></li>
            <li>{{ link_to('admin/bail/arrets', 'Arrêts' , array('class' => Request::is( 'admin/bail/arrets') ? 'active' : '') ) }}</li>
            <li>{{ link_to('admin/bail/analyses', 'Analyses' , array('class' => Request::is( 'admin/bail/analyses') ? 'active' : '') ) }}</li>
        </ul>
    </li>

    <!-- Site: droitmatrimonial.ch -->
    <li><a href="javascript:;" class=""><i class="fa fa-heart-o"></i> <span>Droit matrimonial</span></a>
        <ul class="acc-menu">
            <li><a class="" href="#"><span>Pages</span></a></li>
            <li>{{ link_to('admin/matrimonial/arrets', 'Arrêts' , array('class' => Request::is( 'admin/matrimonial/arrets') ? 'active' : '') ) }}</li>
            <li>{{ link_to('admin/matrimonial/analyses', 'Analyses' , array('class' => Request::is( 'admin/matrimonial/analyses') ? 'active' : '') ) }}</li>
        </ul>
    </li>
    <li class="divider"></li>
    <!-- Configurations -->
    <li><a href="javascript:;" class=""><i class="fa fa-cog"></i> <span>Configurations</span></a>
        <ul class="acc-menu">
            <li><a class="" href="#"><span>Documents</span></a></li>
            <li><a class="" href="#"><span>Shop</span></a></li>
        </ul>
    </li>

</ul>