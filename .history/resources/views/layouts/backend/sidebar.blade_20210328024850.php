<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('dashboard')}}" class="brand-link" style="background: #333;text-align:center">
      @if ($data->icon)
        <img height="40px" width="40px" src="{{asset('/images/'.optional($data)->icon)}}" alt="">
      @else 
        <span class="brand-text font-weight-light">Trazenet</span>
      @endif
    </a>

    <div class="sidebar">
      <div class="user-panel mt-2 pb-1 mb-2 d-flex" style="background: linear-gradient(45deg, #87aa59, transparent);
      border-radius: 18px;">
        <div class="image">
        </div>
        <div class="info" style="text-align: center;margin-left: -19px;
        width: 100%;">
          <a href="#" class="d-block" style="text-transform: capitalize;">{{optional($data)->f_name}}</a>
          <span class="badge badge-warning" style="text-transform: capitalize;">{{optional($data)->type}}</span>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview menu-open">
              <a href="{{route('dashboard')}}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  DashBoard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
          </li>
          @if ($data->type == 'super_admin')
          <li class="nav-item has-treeview">
            <a href="{{route('get.user')}}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Manage User
              </p>
            </a>
          </li>
          @endif
          <button onclick="" class="btn btn-dark btn-xs">
            <i class="fa fa-edit"></i>
        </button>
{{print_r($user)}}

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-mobile-alt"></i>
              <p>
                Device
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none; margin-left:20px;">
                <li class="nav-item" style="font-size: 15px;">
                  <a href="{{ route('create.device') }}" class="nav-link">
                    <i class="fa fa-check-circle nav-icon" aria-hidden="true"></i>
                    <p>Add Device</p>
                  </a>
                </li>
                <li class="nav-item" style="font-size: 15px;">
                    <a href="{{route('device')}}" class="nav-link">
                      <i class="fa fa-check-circle nav-icon" aria-hidden="true"></i>
                      <p>Manage Device</p>
                    </a>
                </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{route('virus')}}" class="nav-link">
                <i class="nav-icon fas fa-bug"></i>
              <p>
                Antivirus
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{route('plan')}}" class="nav-link">
                <i class="nav-icon fas fa-retweet"></i>
              <p>
                Price Plan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('order')}}" class="nav-link">
                <i class="nav-icon fab fa-first-order"></i>
              <p>
                @if ($data->type == 'super_admin')
                    User Order
                @else
                    My Order
                @endif
                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-rocket"></i>
              <p>
                API
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none; margin-left:20px;">
                <li class="nav-item" style="font-size: 15px;">
                  <a href="{{ route('get.api.key') }}" class="nav-link">
                    <i class="fa fa-check-circle nav-icon" aria-hidden="true"></i>
                    <p>API key</p>
                  </a>
                </li>
                @if ($data->type == 'super_admin')
                    
                  <li class="nav-item" style="font-size: 15px;">
                      <a href="{{route('fields')}}" class="nav-link">
                        <i class="fa fa-check-circle nav-icon" aria-hidden="true"></i>
                        <p>Add/Manage Order Fields</p>
                      </a>
                  </li>
                  
                @endif
                <li class="nav-item" style="font-size: 15px;">
                  <a href="{{route('rules')}}" class="nav-link">
                    <i class="fa fa-check-circle nav-icon" aria-hidden="true"></i>
                    <p>Add/Manage Rules</p>
                  </a>
              </li>
              <li class="nav-item" style="font-size: 15px;">
                <a href="{{route('noti')}}" class="nav-link">
                  <i class="fa fa-check-circle nav-icon" aria-hidden="true"></i>
                  <p>Alert and Singnal</p>
                </a>
            </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('icon')}}" class="nav-link">
              <i class="nav-icon fas fa-arrows-alt"></i>
              <p>
                Our Icon
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('payment')}}" class="nav-link">
              <i class="nav-icon fab fa-amazon-pay"></i>
              <p>
                Payment
              </p>
            </a>
          </li>
          @if ($data->type == 'super_admin')
          <li class="nav-item has-treeview">
            <a href="{{ route('mail.inbox') }}" class="nav-link">
              <i class="nav-icon fas fa-rss"></i>
              <p>
                Communication
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-ban"></i>
              <p>
                BlackList
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none; margin-left:20px;">
                <li class="nav-item" style="font-size: 15px;">
                  <a href="{{ route('domain') }}" class="nav-link">
                    <i class="fa fa-check-circle nav-icon" aria-hidden="true"></i>
                    <p>Domain</p>
                  </a>
                </li>
                <li class="nav-item" style="font-size: 15px;">
                    <a href="{{ route('ip') }}" class="nav-link">
                      <i class="fa fa-check-circle nav-icon" aria-hidden="true"></i>
                      <p>IP</p>
                    </a>
                </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ url('/ticket') }}" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Ticket
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ url('/messenger') }}" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Help Desk
              </p>
            </a>
          </li>
          @if ($data->type == 'super_admin')
          <li class="nav-item has-treeview">
            <a href="{{ route('setting') }}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Website Setting
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item has-treeview">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
