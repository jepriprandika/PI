<div class="col-md-6 col-xl-4">
	<div class="product-wrapper mb-30">
		<div class="product-img">
			<a href="{{ url('service/'. $service->slug) }}">
				@if ($service->serviceImages->first())
					<img src="{{ asset('storage/'.$service->serviceImages->first()->path) }}" alt="{{ $service->name }}">
				@else
					<img src="{{ asset('themes/shocap/assets/img/product/fashion-colorful/1.jpg') }}" alt="{{ $service->name }}">
				@endif
			</a>
			<div class="product-action">
				<a class="animate-top" title="Add To Bag" href="#">
					<i class="pe-7s-shopbag"></i>
				</a>
			</div>
		</div>
		<div class="product-content">
			<h4><a href="{{ url('service/'. $service->slug) }}">{{ $service->name }}</a></h4>
			<span>{{ number_format($service->price_label()) }}</span>
		</div>
	</div>
</div>