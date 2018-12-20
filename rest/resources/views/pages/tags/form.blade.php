@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(Session::has('message'))
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">Add new genre type</div>

                <div class="card-body">
                    <form method="post" action="store">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Genre Name</label>
                                <input type="text" class="form-control" name="name_type" autocomplete="off" required>
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
