@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(Session::has('message'))
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">Edit author</div>

                <div class="card-body">
                    <form method="post" action="../update/{{ $author->id }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Author's Name</label>
                                <input type="text" class="form-control" name="name" autocomplete="off" required value="{{ $author->name }}">
                            </div>
                            <div class="form-group">
                                <label>Author's Country</label>
                                <input type="text" class="form-control" name="country" autocomplete="off" required value="{{ $author->country }}">
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
