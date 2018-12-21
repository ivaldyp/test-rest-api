@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <a href="{{ url('tags/form') }}">
                <button class="btn btn-success" style="margin-bottom: 10px">Add New Genre</button>
            </a>

            <div class="card">
                <div class="card-header">Genre List</div>

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
                                    <a href="{{ url('tags/delete') }}/{{ $tag->id }}">
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
                                                                <h4><b>Books example with this genre:</b></h4>
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
