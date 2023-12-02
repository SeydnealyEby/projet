

@extends('products.layout')

@section('content')

<div class="container">
  <div class="row">
    <div class="col align-self-start">
      <a class="btn btn-primary" href= "{{route('products.create')}}" >create</a>
    </div>

    @if($message = Session::get('success'))

    <div class="alert alert-success" role="alert">
        {{$message}}
      </div>

    @endif


  </div>
</div>
<table class="table table-primary table-striped table-hover table-bordered table-sm table-responsive-sm">
    <thead>
        <tr>
            <th >ID</th>
            <th >Image</th>
            <th >Name</th>
            <th >Details</th>
            <th  width ='300px'>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
        <tr>
            <th>{{$item->id}}</th>
            <td><img src= "/images/{{$item->image}}"></td>
            <td>{{$item->name}}</td>
            <td>{{$item->details}}</td>
            <td>
                <form action="{{route('products.destroy',$item->id)}}" method="post">
               @csrf
               @method('DELETE')
               <button type="submit" class="btn btn danger">delete</button>
                </form>
                <a class="btn btn primary" href="{{route('products.edit',$item->id)}}">Edit</a>
                <a  class="btn btn info" href="{{route('products.show',$item->id)}}">show</a>
            </td>
            <td>{{$item->details}}</td>
        </tr>
        @endforeach


    </tbody>
</table>

{!! $products->links() !!}




@endsection



