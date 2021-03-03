
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Accounting Software</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('sales.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Particular</th>
            <th>Date</th>
            <th>Details</th>
            <th>Amount</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->sType }}</td>
            <td>{{ $product->date }}</td>
            <td>{{ $product->notes }}</td>
            <td>{{ $product->amount }}</td>
            <td>
            <form action="{{ route('sales.destroy',$product->id) }}" method="POST">
    {{ csrf_field() }}
        {{ method_field('DELETE')}} 
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <a class="btn btn-info" href="{{ route('sales.show',$product->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('sales.edit',$product->id) }}">Edit</a>
   
                 
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $products->links() !!}
      
@endsection