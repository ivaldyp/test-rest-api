@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Books List</div>

                <div class="card-body">
                    <table class="table data-tabel" id="example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Book Title</th>
                                <th>Synopsis</th>
                                <th>Year Publish</th>
                                <th>Author</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $key => $book)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->synopsis }}</td>
                                <td>{{ $book->publish_year }}</td>
                                <td>{{ $book->name }}</td>
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