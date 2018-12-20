@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(Session::has('message'))
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">Add new book {{$data['book']->id}}</div>

                <div class="card-body">
                    <form method="post" action="../update/{{ $data['book']->id }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Book's Title</label>
                                <input type="text" class="form-control" name="title" autocomplete="off" required value="{{$data['book']->title}}">
                            </div>
                            <div class="form-group">
                                <label>Book's Synopsis</label>
                                <textarea class="form-control" name="synopsis" autocomplete="off">{{$data['book']->synopsis}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Book's year of publish</label>
                                <input type="number" class="form-control" name="publish_year" autocomplete="off" required value="{{$data['book']->publish_year}}" id="input_year">
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <select class="form-control" name="id_author" required>
                                    <option value="" selected disabled>--</option>
                                    @foreach($data['authors'] as $author)
                                    <option 
                                    <?php if($data['book']->id_author == $author['id'])
                                        echo "selected='selected'"
                                    ?>
                                    value="{{$author->id}}">{{$author->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Genre</label>
                                <select class="form-control js-example-basic-multiple" name="id_type[]" required multiple="multiple">
                                    @foreach($data['tags'] as $tag)
                                    <option
                                    <?php if($data['book']->id_type == $tag['id'])
                                        echo "selected='selected'"
                                    ?>
                                    value="{{$tag->id}}">{{$tag->name_type}}</option>
                                    @endforeach
                                </select>
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

@section('select2js')
<script type="text/javascript">
    $('.js-example-basic-multiple').select2();
</script>
@endsection
