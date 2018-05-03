<!-- blade php to view post list -->
@extends('layouts.app')

@section('content')
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/pace.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/pace_minimal.css')}}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    
                    <!-- Alert after task success |Create / Update / Destroy|-->
                    @if (\Session::has('success'))
                      <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                      </div><br />
                     @endif

                    <br/>

                    <div class="pull-right">
                        <button type="button" class="btn btn-primary" onclick="window.location.href='posts/create'"><i class="fa fa-plus"></i> Add Record</button>
                    </div>

                    <form method="get" role="search" action="{{action('PostController@search')}}" name="findform" id="findform" class="form-inline">
                        @csrf
                        <div class="form-group">
                            <label class="" for="search">Search: </label>&nbsp;
                            <input class="form-control input-md" type="text" placeholder="SEARCH" name="search" id="search">&nbsp;
                            <button class="btn btn-warning"><i class="fa fa-search"></i></button>&nbsp;
                            <button type="button" class="btn btn-danger" onclick="window.location.href='posts'"><i class="fa fa-times-circle"></i></button>
                        </div>
                    </form>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Content</th>
                                    <th scope="col" colspan="3">Actions</th>
                                </tr>
                            </thead>
                            <?php $i=1; $i + (($posts->currentPage()-1)*5);  ?>
                            <tbody>
                                @if($posts->count() == 0)
                                    <tr>
                                        <td colspan="9"><i>No record to be displayed...</i></td>
                                    </tr>
                                @endif
                                @foreach($posts as $post)
                                @php
                                    @endphp

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->name }}</td>
                                        <td>{{ $post->email }}</td>
                                        <td>{{ $post->number }}</td>
                                        <td>{{ $post->content }}</td>
                                        <td>
                                            <a href="{{action('PostController@show', $post->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                                        </td>
                                        <td><a href="{{action('PostController@edit', $post->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a></td>
                                        <td>
                                            <form class="deletepost" action="{{action('PostController@destroy', $post->id)}}" method="post" onsubmit="return confirm('Are you sure that you want to delete this post?');">
                                            @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $posts->links() }} 
                        Current Page: {{ $posts->currentPage() }} 
                    </div>
                    


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jscode')
<script type="text/javascript">
    function confirmDelete() {
        return confirm("Are you sure that you want to delete this post?");
    }
</script>
@endsection