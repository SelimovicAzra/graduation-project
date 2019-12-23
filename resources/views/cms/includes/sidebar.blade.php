<div id="sidebar">
         <nav id="sidebar-nav">
                 <ul class="list-unstyled components">
                         <li class="nav-title">General</li>
                        <li class="nav-item sidebarItem">
                                <a class="nav-link sidebarLink " href="{{route('home')}}"><i class="fas fa-home"></i>  Home</a>
                            </li>
                     <li class="nav-item sidebarItem">
                         <a class="nav-link sidebarLink" href="{{route('profile',auth()->user()->id)}}"><i class="fas fa-user"></i>  Profile</a>
                     </li>
                     <li class="nav-item sidebarItem">
                         <a class="nav-link sidebarLink" href="{{route('items.create')}}"><i class="fas fa-heart"></i>  Donate</a>
                     </li>
                     <li class="nav-item sidebarItem">
                         <a class="nav-link sidebarLink" href="{{route('donations.index')}}"><i class="fab fa-gratipay"></i>  Donations</a>
                     </li>
                        <li class="nav-title">Management</li>
                     <li class="nav-item sidebarItem">
                             <a class="nav-link sidebarLink" href="{{route('users.index')}}"><i class="fas fa-users"></i>  Users</a>
                         </li>
                     <li class="nav-item sidebarItem">
                         <a class="nav-link sidebarLink" {{--href="{{route('')}}"--}}><i class="fas fa-clipboard-list"></i>  Donations</a>
                     </li>
                     <li class="nav-item sidebarItem">
                         <a class="nav-link sidebarLink" {{--href="{{route('')}}"--}}><i class="fas fa-city"></i>  Countries</a>
                     </li>
                     <li class="nav-item sidebarItem">
                         <a class="nav-link sidebarLink" {{--href="{{route('')}}"--}}><i class="fas fa-building"></i>  Cities</a>
                     </li>

                     </ul>
             </nav>
     </div>
