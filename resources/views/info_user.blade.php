@auth
    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="text-decoration: none">
        Se Deconnecter  <i style="color:red" class="fa fa-sign-out-alt"></i>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <span class="badge badge-primary">Bienvenue {{Auth::user()->name}}</span>
@endauth
