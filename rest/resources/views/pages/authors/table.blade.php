@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex">
        <div class="p-2">
            <a href="{{ url('authors/form') }}">
                <button class="btn btn-success" style="margin-bottom: 10px">Add New Author</button>
            </a>
            <a href="{{ url('authors/table') }}">
                <button class="btn btn-primary" style="margin-bottom: 10px">Show All Authors</button>
            </a>
        </div>
        <div class="ml-auto p-2">
            <div class="form-group">
                <form method="GET" action="search">
                    <input type="text" name="search_author" class="form-control" autocomplete="off" placeholder="Author name ...">
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-bottom: 10px">
            <div class="col-md-2">
                <div class="form-group">
                    <form method="GET" action="sort">
                        <label>Sort by </label>
                        <select  class="form-control" name="sort_author" required onchange="this.form.submit()">
                            <option selected disabled>--</option>
                            <option value="1">Name</option>
                            <option value="2">Country</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-5"></div>
        </div>
        <div class="col-md-12">

            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

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
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteWarning{{$author->id}}">Delete</button>    
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
                                                            <hr>
                                                            <tr>
                                                                <h4><b>Books:</b></h4>
                                                            </tr>
                                                            <?php $i=1; ?>
                                                            @foreach($books as $book)
                                                                @if($book->id_author == $author->id)
                                                                <tr>
                                                                    <h4>{{$i}}. {{$book->title}} ({{$book->publish_year}})</h4>
                                                                </tr>
                                                                <?php $i+=1; ?>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="deleteWarning{{$author->id}}" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><b>Warning</b></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <table>
                                                        <tbody>
                                                            <h4>Deleting author's data will delete all their book's data as well, continue?</h4>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <a href="{{ url('authors/delete') }}/{{ $author->id }}">
                                                        <button type="button" class="btn btn-danger">Delete</button>
                                                    </a>
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
