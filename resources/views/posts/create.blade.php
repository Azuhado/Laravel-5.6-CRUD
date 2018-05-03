<!-- blade php to add new post -->
@extends('layouts.app')

@section('content')
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/pace.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/pace_minimal.css')}}">

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
                    
                      <form class="form-horizontal" method="post" action="{{url('posts')}}" enctype="multipart/form-data">
                        @csrf
                        <fieldset>

                        <!-- Form Name -->
                        <legend>Add New Post</legend>

                        <input type="hidden" name="uid" value="<?php echo uniqid(); ?>">

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="name">Name:</label>  
                          <div class="col-md-4">
                          <input id="name" name="name" placeholder="Name" class="form-control input-md" required="" type="text">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="email">Email:</label>  
                          <div class="col-md-4">
                          <input id="email" name="email" placeholder="Email" class="form-control input-md" required="" type="email">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="number">Number:</label>  
                          <div class="col-md-4">
                          <input id="number" name="number" placeholder="Number" class="form-control input-md" required="" type="text">
                            
                          </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="content">Content:</label>
                          <div class="col-md-4">
                            <select id="content" name="content" class="form-control">
                              <option value="Assalamualaikum w.b.t.">1</option>
                              <option value="Selamat Pagi">2</option>
                              <option value="Selamat Petang">3</option>
                              <option value="Selamat Malam">4</option>
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
                            <button id="ajaxSubmit" name="submit" class="btn btn-primary">Submit</button>
                            <button type="button" id="cancel" name="cancel" class="btn btn-danger" onclick="window.location.href='/posts'">Cancel</button>
                          </div>
                        </div>

                        </fieldset>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jscode')

@endsection