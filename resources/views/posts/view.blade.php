<!-- blade php to view post -->
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View Details</div>

                <div class="card-body">
                    
                  <table class="table table-bordered table-striped table-hover table-condensed">
                    <thead>
                      <tr>
                        <th>Point</th>
                        <th>Value</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>ID:</th>
                        <td>{{$posts->id}}</td>
                      </tr>
                      <tr>
                        <th>NAME:</th>
                        <td>{{$posts->name}}</td>
                      </tr>
                      <tr>
                        <th>EMAIL:</th>
                        <td>{{$posts->email}}</td>
                      </tr>
                      <tr>
                        <th>CONTACT:</th>
                        <td>{{$posts->number}}</td>
                      </tr>
                      <tr>
                        <th>CONTENT:</th>
                        <td>{{$posts->content}}</td>
                      </tr>
                      <tr>
                        <th>IMAGE:</th>
                        <td><img src="{{ $imageurl }}" style="width: 45%"></td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <button type="button" class="btn btn-danger" onclick="window.history.back();">GO BACK</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
