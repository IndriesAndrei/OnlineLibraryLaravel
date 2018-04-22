@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
  <div class="container">
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Book Form -->
        <form action="{{ url('book') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
           
            <!-- Book Name -->
            <div class="form-group">
                <label for="book" class="col-sm-3 control-label">Book</label>

                <div class="col-sm-6">
                    <input type="text" name="bookname" id="bookname" class="form-control">
                </div>
            </div>

            <!-- Add Book Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus-sign"></span> Add Book
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Books -->
    @if (count($books) > 0)
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                Current Books
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th class="text-center">User_id</th>
                        <th class="text-center">Book Name</th>
                        <th class="text-center">Action</th>
                        <th class="text-center">Action</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <!-- BookName -->
                                <td class="table-text text-center">
                                    
                                    <div>{{ $book->user_id }}</div>
                                </td>

                                <td class="table-text text-center">
                                        <div>{{ $book->bookname }}</div>
                                </td>

                                <td class="table-text text-center">
                                    <!-- TODO: Delete Button -->
                                    <form action="{{ url('book', [$book->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                            
                                        <button type="submit" class="btn btn-danger">
                                                <span class="glyphicon glyphicon-trash"></span> Delete
                                        </button>
                                    </form>
                                </td>

                                <td class="table-text text-center">
                                    
                                   <a href="/book/{{ $book->id }}">
                                        <button type="submit" class="btn btn-success">
                                                <span class="glyphicon glyphicon-pencil"></span> Update
                                        </button>
                                    </a>
                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
@endsection