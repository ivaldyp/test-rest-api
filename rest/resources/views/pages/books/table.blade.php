@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex">
        <div class="p-2">
            <a href="{{ url('books/form') }}">
                <button class="btn btn-success" style="margin-bottom: 10px; margin-right: 10px">Add New Book</button>
            </a>
            <a href="{{ url('books/table') }}">
                <button class="btn btn-primary" style="margin-bottom: 10px">Show All Books</button>
            </a>
        </div>
        <div class="ml-auto p-2">
            <div class="form-group">
                <form method="GET" action="search">
                    <input type="text" name="search_book" class="form-control" autocomplete="off" placeholder="Book name ...">
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
                        <select  class="form-control" name="sort_book" required onchange="this.form.submit()">
                            <option selected disabled>--</option>
                            <option value="1">Author</option>
                            <option value="2">Year Published</option>
                            <option value="3">Title</option>
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
                <div class="card-header">Books List</div>

                <div class="card-body">
                    <table class="table data-tabel" id="example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Book Title</th>
                                <th>Year Publish</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $key => $book)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->publish_year }}</td>
                                <td>{{ $book->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal{{$key}}">Detail</button>
                                    <a href="{{ url('books/edit') }}/{{ $book->id_book }}">
                                        <button class="btn btn-info">Edit</button>
                                    </a>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteWarning{{$book->id_book}}">Delete</button>

                                </td>
                                <td>
                                    <!-- Modal -->
                                    <div id="myModal{{$key}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{$book->title}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <h4><b>Author</b>: {{$book->name}}</h4>
                                                            </tr>
                                                            <hr>
                                                            <tr>
                                                                <h4><b>Year Published</b>: {{$book->publish_year}}</h4>
                                                            </tr>
                                                            <hr>
                                                            <tr>
                                                                <h4><b>Genre:</b></h4>
                                                            </tr>
                                                            <?php $i=1; ?>
                                                            @foreach($tags as $tag)
                                                                @if($tag->book_id == $book->id_book)
                                                                <tr>
                                                                    <h4>{{$i}}. {{$tag->name_type}}</h4>
                                                                </tr>
                                                                <?php $i+=1; ?>
                                                                @endif
                                                            @endforeach
                                                            <hr>
                                                            <tr>
                                                                <h4><b>Synopsis:</b></h4>
                                                            </tr>
                                                            <tr>
                                                                <h4>{{$book->synopsis}}</h4> 
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
                                    <div class="modal fade" id="deleteWarning{{$book->id_book}}" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><b>Warning</b></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <table>
                                                        <tbody>
                                                            <h4>Do you really want to delete {{$book->title}}'s data?</h4>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <a href="{{ url('books/delete') }}/{{ $book->id_book }}">
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