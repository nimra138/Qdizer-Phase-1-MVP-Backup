@extends('admin.layouts.layout')


@section('content')


<h3 class="mb-4">
Subscription Management
</h3>


<div class="row">


<div class="col-md-3">

<div class="card p-3">

<h6>Total</h6>

<h2>
{{ $total }}
</h2>

</div>

</div>



<div class="col-md-3">

<div class="card p-3">

<h6>Active</h6>

<h2>
{{ $active }}
</h2>

</div>

</div>



<div class="col-md-3">

<div class="card p-3">

<h6>Trial</h6>

<h2>
{{ $trial }}
</h2>

</div>

</div>



<div class="col-md-3">

<div class="card p-3">

<h6>Expired</h6>

<h2>
{{ $expired }}
</h2>

</div>

</div>


</div>



<div class="card mt-4">

<div class="card-body">


<table class="table">


<thead>

<tr>

<th>User</th>
<th>Email</th>
<th>Status</th>
<th>Amount</th>
<th>Start</th>
<th>Expiry</th>
<th></th>

</tr>

</thead>



<tbody>


@foreach($subscriptions as $sub)

<tr>


<td>
{{ $sub->user->name }}
</td>


<td>
{{ $sub->user->email }}
</td>


<td>

<span class="badge bg-success">

{{ ucfirst($sub->status) }}

</span>

</td>


<td>

{{ $sub->amount }}
{{ $sub->currency }}

</td>


<td>

{{ $sub->start_date }}

</td>


<td>

{{ $sub->end_date }}

</td>


<td>

<a href="{{route('admin.subscriptions.show',$sub->id)}}"
class="btn btn-sm btn-primary">

View

</a>


</td>


</tr>


@endforeach


</tbody>


</table>


{{ $subscriptions->links() }}


</div>

</div>



@endsection