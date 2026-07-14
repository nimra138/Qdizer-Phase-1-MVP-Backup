@extends('admin.layouts.layout')


@section('content')


<h3>
Subscription Details
</h3>



<div class="row">


<div class="col-md-6">


<div class="card">

<div class="card-header">
Customer
</div>


<div class="card-body">


<p>
<b>Name:</b>

{{ $subscription->owner->name }}

</p>


<p>
<b>Email:</b>

{{ $subscription->owner->email }}

</p>


<p>
<b>Phone:</b>

{{ $subscription->owner->phone }}

</p>


</div>

</div>


</div>





<div class="col-md-6">


<div class="card">


<div class="card-header">
Subscription
</div>


<div class="card-body">


<p>
<b>Status:</b>

<span class="badge bg-success">

{{ $subscription->stripe_status }}

</span>

</p>



<p>
<b>Plan:</b>

{{ $subscription->stripe_price }}

</p>



<p>
<b>Stripe Subscription:</b>

{{ $subscription->stripe_id }}

</p>



<p>
<b>Quantity:</b>

{{ $subscription->quantity }}

</p>



</div>


</div>


</div>


</div>





<div class="card mt-4">


<div class="card-header">

Subscription Items

</div>


<div class="card-body">


<table class="table">


<tr>

<th>Product</th>
<th>Price</th>
<th>Quantity</th>

</tr>



@foreach($subscription->items as $item)


<tr>

<td>
{{ $item->stripe_product }}
</td>


<td>
{{ $item->stripe_price }}
</td>


<td>
{{ $item->quantity }}
</td>


</tr>


@endforeach


</table>


</div>


</div>



@endsection