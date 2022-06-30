@extends('news.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('news.create') }}"> Create News</a>
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
            <th>Title</th>
            <th>Image</th>
            <th>Description</th>
            <th>Author</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($news as $new)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $new->title }}</td>
            <td>{{ $new->image }}</td>
            <td>{{ $new->description }}</td>
            <td>{{ $new->author }}</td>            
            <td>
                <form action="{{ route('news.destroy',$new->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('news.show',$new->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('news.edit',$new->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
               
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $news->links() !!}
      
@endsection