@extends('themes.shocap.layout')

@section('content')
	<div class="product-details ptb-100 pb-90">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-7 col-12">
					<div class="product-details-img-content">
						<div class="product-details-tab mr-70">
							<div class="product-details-large tab-content">
								@php
									$i = 1
								@endphp
								@forelse ($service->serviceImages as $image)
									<div class="tab-pane fade {{ ($i == 1) ? 'active show' : '' }}" id="pro-details{{ $i}}" role="tabpanel">
										<img  style="width: 650px;" src="{{ asset('storage/'.$image->path) }}" alt="{{ $service->name }}">
									</div>
									@php
										$i++
									@endphp
								@empty
									No image found!
								@endforelse
							</div>
							<div class="product-details-small nav mt-12" role=tablist>
								@php
									$i = 1
								@endphp
								@forelse ($service->serviceImages as $image)
									<a class="{{ ($i == 1) ? 'active' : '' }} mr-12" href="#pro-details{{ $i }}" data-toggle="tab" role="tab" aria-selected="true">
										<img src="{{ asset('themes/shocap/assets/img/product-details/s1.jpg') }}" alt="">
									</a>
									@php
										$i++
									@endphp
								@empty
									No image found!
								@endforelse
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-5 col-12">
					<div class="product-details-content">
						<h3>{{ $service->name }}</h3>
						<div class="details-price">
							<span>{{ number_format($service->price_label()) }}</span>
						</div>
						<p>{{ $service->short_description }}</p>
						{!! Form::open(['url' => 'carts']) !!}
							{{ Form::hidden('service_id', $service->id) }}
							@if ($service->type == 'configurable')
								<div class="quick-view-select">
									<div class="select-option-part">
										<label>Size*</label>
										{!! Form::select('size', $sizes , null, ['class' => 'select', 'placeholder' => '- Please Select -', 'required' => true]) !!}
									</div>
									<div class="select-option-part">
										<label>Color*</label>
										{!! Form::select('color', $colors , null, ['class' => 'select', 'placeholder' => '- Please Select -', 'required' => true]) !!}
									</div>
								</div>
							@endif

							<div class="quickview-plus-minus">
								<div class="cart-plus-minus">
									{!! Form::number('qty', 1, ['class' => 'cart-plus-minus-box', 'placeholder' => 'qty', 'min' => 1]) !!}
								</div>
								<div class="quickview-btn-cart">
									<button type="submit" class="submit contact-btn btn-hover">add to cart</button>
								</div>
							</div>
						{!! Form::close() !!}
						<div class="product-details-cati-tag mt-35">
							<ul>
								<li class="categories-title">Categories :</li>
								@foreach ($service->categories as $category)
									<li><a href="{{ url('products/category/'. $category->slug ) }}">{{ $category->name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="product-description-review-area pb-90">
		<div class="container">
			<div class="product-description-review text-center">
				<div class="description-review-title nav" role=tablist>
					<a class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
						Description
					</a>
				</div>
				<div class="description-review-text tab-content">
					<div class="tab-pane active show fade" id="pro-dec" role="tabpanel">
						<p>{{ $service->description }} </p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection