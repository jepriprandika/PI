@extends('admin.layout')

@section('content')
<div class="content">
	<div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5">
		<div class="d-flex justify-content-between">
			<h2 class="text-dark font-weight-medium">Order ID #{{ $order->code }}</h2>
			<div class="btn-group">
				<button class="btn btn-sm btn-secondary">
					<i class="mdi mdi-content-save"></i> Save</button>
				<button class="btn btn-sm btn-secondary">
					<i class="mdi mdi-printer"></i> Print</button>
			</div>
		</div>
		<div class="row pt-5">
			<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Billing Address</p>
							<address>
								{{ $order->customer_first_name }} {{ $order->customer_last_name }}
								<br> {{ $order->customer_address1 }}
								<br> {{ $order->customer_address2 }}
								<br> Email: {{ $order->customer_email }}
								<br> Phone: {{ $order->customer_phone }}
							</address>
						</div>
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
							<address>
								Invoice ID:
								<span class="text-dark">#{{ $order->code }}</span>
								<br> {{ \General::datetimeFormat($order->order_date) }}
							</address>
						</div>
		</div>
		<table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
			<thead>
								<tr>
									<th>#</th>
									<th>Item</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
							</thead>
			<tbody>
				@forelse ($order->orderItems as $item)
									<tr>
										<td>{{ $item->sku }}</td>
										<td>{{ $item->name }}</td>
										<td>{{ $item->qty }}</td>
										<td>{{ \General::priceFormat($item->sub_total) }}</td>
									</tr>
								@empty
									<tr>
										<td colspan="6">Order item not found!</td>
									</tr>
								@endforelse
			</tbody>
		</table>
		<div class="row justify-content-end">
			<div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">

					@if (in_array($order->status, [\App\Models\Order::CREATED, \App\Models\Order::CONFIRMED]))
						<a href="{{ url('admin/orders/'. $order->id .'/cancel')}}" class="btn btn-block mt-2 btn-lg btn-warning btn-pill"> Cancel</a>
					@endif

					@if (!in_array($order->status, [\App\Models\Order::DELIVERED, \App\Models\Order::COMPLETED]))
						<a href="#" class="btn btn-block mt-2 btn-lg btn-secondary btn-pill delete" order-id="{{ $order->id }}"> Remove</a>

						{!! Form::open(['url' => 'admin/orders/'. $order->id, 'class' => 'delete', 'id' => 'delete-form-'. $order->id, 'style' => 'display:none']) !!}
						{!! Form::hidden('_method', 'DELETE') !!}
						{!! Form::close() !!}
					@endif
			</div>
		</div>
	</div>
</div>
@endsection
