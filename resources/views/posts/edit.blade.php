<!-- blade php to update post -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                  <!-- ALERT for Form Validation -->
                    @if (\Session::has('errors'))
                      <div class="alert alert-danger">
                      @foreach($errors as $err)
                        <ul>
                          <li>{{ $err }}</li>
                        </ul>
                      @endforeach
                      </div><br />
                     @endif


                    <form method="post" action="{{action('PostController@update', $id)}}" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Edit Post | ID: {{ $id }}</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="name">Name:</label>  
                          <div class="col-md-4">
                          <input id="name" name="name" placeholder="Name" class="form-control input-md" required="" type="text" value="{{$posts->name}}">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="email">Email:</label>  
                          <div class="col-md-4">
                          <input id="email" name="email" placeholder="Email" class="form-control input-md" required="" type="text" value="{{$posts->email}}">
                          <input type="hidden" name="oldMail" value="{{$posts->email}}">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="number">Number:</label>  
                          <div class="col-md-4">
                          <input id="number" name="number" placeholder="Number" class="form-control input-md" required="" type="text" value="{{$posts->number}}">
                            
                          </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="content">Content:</label>
                          <div class="col-md-4">
                            <select id="content" name="content" class="form-control">
                              <option value="Assalamualaikum w.b.t." @if($posts->content == "Assalamualaikum w.b.t.") selected @endif>1</option>
                              <option value="Selamat Pagi" @if($posts->content == "Selamat Pagi") selected @endif>2</option>
                              <option value="Selamat Petang" @if($posts->content == "Selamat Petang") selected @endif>3</option>
                              <option value="Selamat Malam" @if($posts->content == "Selamat Malam") selected @endif>4</option>
                            </select>
                          </div>
                        </div>

                        <!-- File Button --> 
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="filename">Add Image:</label>
                          <div class="col-md-4">
                            <input id="filename" name="filename" class="input-file" type="file">
                          </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="submit"></label>
                          <div class="col-md-8">
                            <button id="submit" name="submit" class="btn btn-primary">Submit</button>
                            <button type="button" id="cancel" name="cancel" class="btn btn-danger" onclick="window.history.back();">Cancel</button>
                          </div>
                        </div>

                        </fieldset>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
