@extends('themes.shocap.layout')

@section('content')
	<div class="shop-page-wrapper shop-page-padding ptb-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3">
					@include('themes.shocap.services.sidebar')
				</div>
				<div class="col-lg-9">
					<div class="shop-product-wrapper res-xl">
						<div class="shop-bar-area">
							<div class="shop-product-content tab-content">
								<div id="grid-sidebar3" class="tab-pane fade active show">
									@include('themes.shocap.services.grid_view')
								</div>
							</div>
						</div>
					</div>
					<div class="mt-50 text-center">
						{{ $services->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection