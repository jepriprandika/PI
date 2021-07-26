<div class="row">
    @forelse ($services as $service)
        @include('themes.shocap.services.grid_box')
    @empty
        No service found!
    @endforelse
</div>