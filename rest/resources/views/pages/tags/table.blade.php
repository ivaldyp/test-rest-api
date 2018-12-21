@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex">
        <div class="p-2">
            <a href="{{ url('tags/form') }}">
                <button class="btn btn-success" style="margin-bottom: 10px; margin-right: 10px">Add New Tags</button>
            </a>
            <a href="{{ url('tags/table') }}">
                <button class="btn btn-primary" style="margin-bottom: 10px">Show All Tags</button>
            </a>
        </div>
        <div class="ml-auto p-2">
            <div class="form-group">
                <form method="GET" action="search">
                    <input type="text" name="search_tag" class="form-control" autocomplete="off" placeholder="Genre name ...">
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header"><b>Genre List</b></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Genre</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $key => $tag)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $tag->name_type }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal{{$key}}">Detail</button>
                                    <a href="{{ url('tags/edit') }}/{{ $tag->id }}">
                                        <button class="btn btn-info">Edit</button>
                                    </a>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteWarning{{$tag->id}}">Delete</button>
                                </td>
                                <td>
                                    <!-- Modal -->
                                    <div id="myModal{{$key}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tag {{$key+1}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <h4><b>Genre</b>: {{$tag->name_type}}</h4>
                                                            </tr>
                                                            <hr>
                                                            <tr>
                                                                <h4><b>What is {{$tag->name_type}}:</b></h4>
                                                            </tr>
                                                            <tr>
                                                                <h4>{{$tag->type_exp}}</h4>
                                                            </tr>
                                                            <hr>
                                                            <tr>
                                                                <h4><b>Books in this genre:</b></h4>
                                                            </tr>
                                                            <?php $i=1; ?>
                                                            @foreach($books as $book)
                                                                @if($book->tag_id == $tag->id)
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
                                    <div class="modal fade" id="deleteWarning{{$tag->id}}" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><b>Warning</b></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <table>
                                                        <tbody>
                                                            <h4>Do you really want to delete {{$tag->name_type}}'s data?</h4>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <a href="{{ url('tags/delete') }}/{{ $tag->id }}">
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
