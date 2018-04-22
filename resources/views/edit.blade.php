@extends('layouts.app')

@section('content')


<h1>Edit Book</h1>
    <hr>
     <form action="{{url('book', [$book->id])}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
    
      <div class="form-group">
        <label for="title">Bookname</label>
        <input type="text" value="{{$book->bookname}}" class="form-control" id="bookname"  name="bookname" >
      </div>
      
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <button type="submit" class="btn btn-primary">Update</button>
    </form>


@stop