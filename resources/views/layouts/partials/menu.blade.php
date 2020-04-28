<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="{{asset('assets/img/user.png')}}" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
                     </span> <span class="text-muted text-xs block">{{Auth::user()->roles()->get()->pluck('name')}} </a>
                </div>
                <div class="logo-element">
                    BBF+
                </div>
            </li>
            <li class="active">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Tableau de bord</span></a>

            </li>
            <li>
                <a href="layouts.html"><i class="fa fa-cart-arrow-down"></i> <span class="nav-label">Facturations</span></a>
            </li>
            <li>
                <a href="{{route('produits.index')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Stock</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Entrées</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="graph_flot.html">Ordres d'entrées</a></li>
                </ul>
            </li>
            <li>
                <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Sortie </span><span class="fa arrow"></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="mailbox.html">Bon de sortie</a></li>

                </ul>
            </li>
            <li>
                <a href="mailbox.html"><i class="fa fa-users"></i> <span class="nav-label">Comptes </span><span class="fa arrow"></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('admin.users.index')}}">Listes des utilisateurs</a></li>
                    <li><a href="#">Rôles</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Configurations</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Fournisseurs</a></li>
                    <li><a href="{{route('types.index')}}">Classe Nomenclature</a></li>

                </ul>


        </ul>

    </div>
</nav>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

        </div>
        <ul class="nav navbar-top-links navbar-right">

            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">

                    <i class="fa fa-sign-out"></i>  {{ __('Déconnexion') }}

                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>

    </nav>
</div>
