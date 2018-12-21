@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <a href="{{ url('authors/form') }}">
                <button class="btn btn-success" style="margin-bottom: 10px">Add New Author</button>
            </a>
            <div class="card">
                <div class="card-header">Author List</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($authors as $key => $author)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->country }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal{{$key}}">Detail</button>
                                    <a href="{{ url('authors/edit') }}/{{ $author->id }}">
                                        <button class="btn btn-info">Edit</button>
                                    </a>
                                    <a href="{{ url('authors/delete') }}/{{ $author->id }}">
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                                <td>
                                    <!-- Modal -->
                                    <div id="myModal{{$key}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Author {{$key+1}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <h4><b>Name</b>: {{$author->name}}</h4>
                                                            </tr>
                                                            <tr>
                                                                <h4><b>Country from</b>: {{$author->country}}</h4>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
