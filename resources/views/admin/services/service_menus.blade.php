<div class="card card-default">
  <div class="card-header card-header-border-bottom">
      <h2>Service Menus</h2>
  </div>
    <div class="card-body">
      <nav class="nav flex-column">
        <a class="nav-link"href="{{ url('admin/services/'.$serviceID . '/edit') }}">Service Detail</a>
        <a class="nav-link"href="{{ url('admin/services/'.$serviceID . '/images') }}">Service Images</a>
      </nav>  
    </div>
</div>