            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">My challenge</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ action('LoginController@logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> cerrar sesión</a></li>
              </ul>
            </li>