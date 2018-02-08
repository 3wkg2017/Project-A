
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			    <span class="icon-bar"></span>
				<span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			 </button>
			 <a class="navbar-brand" href="{{ route('welcome') }}">RMC</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
			@if(Auth::check())
                @if(Auth::user()->role != 'admin')
                   <li><a href="{{ route('welcome') }}#about">ABOUT</a></li>
    			   <li><a href="{{ route('welcome') }}#portfolio">MEAT</a></li>
    			   <li><a href="{{ route('welcome') }}#contact">CONTACT</a></li>
                @endif
            @endif


			@guest
			    <li><a href="{{ route('welcome') }}#about">ABOUT</a></li>
                <li><a href="{{ route('welcome') }}#portfolio">MEAT</a></li>
                <li><a href="{{ route('welcome') }}#contact">CONTACT</a></li>
                <li><a href="{{ route('login') }}">LOGIN</a></li>
				<li><a href="{{ route('register') }}">REGISTER</a></li>
			@endguest
    		

            @if(Auth::check())
                @if(Auth::user()->role != 'admin')
                   <li>
                        <a href="{{ route('reservations.create') }}">Reservations</a>
                    </li>
                @endif
            @endif

    		@if(Auth::check())
                    
                @if(Auth::user()->role != 'admin')
                    <li>
                      <a href="{{route('orders.index')}}">My Orders</a>
                    </li>
                @endif
                    
                @if(Auth::user()->role == 'admin')
                    <li>
                        <a href="{{ route('dishes_create') }}">Cook Dish</a>
                    </li>
                    
                    <li>
                        <a href="{{ route('profile.users') }}">Users</a>
                    </li>
                     
                    <li>
                       <a href="{{ route('orders.index') }}">Orders</a> 
                    </li>
                    <li>
                        <a href="{{route('reservations.index')}}">Reservations</a> 
                    </li>


             		
               @endif

                    <li>
                      <a href="{{route('profile.edit')}}">Profile</a>
                    </li>

                      <li class="dropdown">
                      	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        	{{ Auth::user()->name }} <span class="caret"></span>
                        </a>
    		            <ul class="dropdown-menu">
                        	<li>
                            	<a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                	{{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                      </li>
            @endif
            <li>
				<a id="cart" href="{{ route('carts.index') }}">
					Cart (<span class="cart-size">{{ $carts_size }}</span>)-
					<span class="cart-total">{{ $carts_total }}</span>$
				</a>
			</li>
	        </ul>
		</div>
	</div>
</nav>


