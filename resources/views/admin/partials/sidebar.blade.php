 <!--
	====================================
	——— LEFT SIDEBAR WITH FOOTER
	=====================================
-->
<aside class="left-sidebar bg-sidebar">
	<div id="sidebar" class="sidebar sidebar-with-footer">
		<!-- Aplication Brand -->
		<div class="app-brand">
			<a href="{{ url('admin/dashboard') }}">
			<span class="brand-name">LaraShop Dashboard</span>
			</a>
		</div>
		<!-- begin sidebar scrollbar -->
		<div class="sidebar-scrollbar">

			<!-- sidebar menu -->
			<ul class="nav sidebar-inner" id="sidebar-menu">
				<li  class="has-sub  {{ ($currentAdminMenu == 'catalog') ? 'expand active' : ''}}" >
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
						aria-expanded="false" aria-controls="dashboard">
						<i class="mdi mdi-view-dashboard-outline"></i>
						<span class="nav-text">Catalog</span> <b class="caret"></b>
					</a>
					<ul  class="collapse  {{ ($currentAdminMenu == 'catalog') ? 'show' : ''}}"  id="dashboard"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="{{ ($currentAdminSubMenu == 'product') ? 'active' : ''}}">
								<a class="sidenav-item-link" href="{{ url('admin/services')}}">
								<span class="nav-text">Services</span>
								</a>
							</li>
							<li class="{{ ($currentAdminSubMenu == 'category') ? 'active' : ''}}">
								<a class="sidenav-item-link" href="{{ url('admin/categories')}}">
								<span class="nav-text">Categories</span>
								</a>
							</li>
						</div>
					</ul>
				</li>
				<li  class="has-sub {{ ($currentAdminMenu == 'order') ? 'expand active' : ''}}">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#order"
						aria-expanded="false" aria-controls="dashboard">
						<i class="mdi mdi-cart-outline"></i>
						<span class="nav-text">Orders</span> <b class="caret"></b>
					</a>
					<ul class="collapse {{ ($currentAdminMenu == 'order') ? 'show' : ''}}"  id="order"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="{{ ($currentAdminSubMenu == 'order') ? 'active' : ''}}" >
								<a class="sidenav-item-link" href="{{ url('admin/orders')}}">
								<span class="nav-text">Orders</span>
								</a>
							</li>
							<!-- <li class="{{ ($currentAdminSubMenu == 'trashed-order') ? 'active' : ''}}">
								<a class="sidenav-item-link" href="{{ url('admin/orders/trashed')}}">
								<span class="nav-text">Trashed</span>
								</a>
							</li>
							<li class="{{ ($currentAdminSubMenu == 'shipment') ? 'active' : ''}}">
								<a class="sidenav-item-link" href="{{ url('admin/shipments')}}">
								<span class="nav-text">Shipments</span>
								</a>
							</li> -->
						</div>
					</ul>
				</li> 
				<li  class="has-sub {{ ($currentAdminMenu == 'role-user') ? 'expand active' : ''}}">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#auth"
						aria-expanded="false" aria-controls="dashboard">
						<i class="mdi mdi-account-multiple-outline"></i>
						<span class="nav-text">Users</span> <b class="caret"></b>
					</a>
					<ul class="collapse {{ ($currentAdminMenu == 'role-user') ? 'show' : ''}}"  id="auth"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="{{ ($currentAdminSubMenu == 'user') ? 'active' : ''}}" >
								<a class="sidenav-item-link" href="{{ url('admin/users')}}">
								<span class="nav-text">Users</span>
								</a>
							</li>
						</div>
					</ul>
				</li>             
			</ul>
		</div>
	</div>
</aside>