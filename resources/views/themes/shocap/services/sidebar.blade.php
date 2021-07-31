 <div class="shop-sidebar mr-50">
 @if ($categories)
        <div class="sidebar-widget mb-45">
            <h3 class="sidebar-title">Categories</h3>
            <div class="sidebar-categories">
                <ul>
                    @foreach ($categories as $category)
                            <li><a href="{{ url('services?category='. $category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    </div>