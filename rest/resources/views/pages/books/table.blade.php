@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <a href="{{ url('books/form') }}">
                <button class="btn btn-primary" style="margin-bottom: 10px">Add New Book</button>
            </a>

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
                                    <a href="{{ url('books/delete') }}/{{ $book->id_book }}">
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                                <td>
                                    <!-- Modal -->
                                    <div id="myModal{{$key}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-sm">
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
                                                            <tr>
                                                                <h4><b>Year Published</b>: {{$book->publish_year}}</h4>
                                                            </tr>
                                                            <tr>
                                                                <h4><b>Synopsis</b>: {{$book->synopsis}}</h4>
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

@section('datatables')
<script>
// Basic example
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection