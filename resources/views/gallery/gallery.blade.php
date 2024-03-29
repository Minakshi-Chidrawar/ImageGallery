@extends('master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>My Galleries</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            @if ($galleries->count() > 0)
                <table class="table table-striped table-responsive table-width">
                    <thead class="table-width">
                        <tr>
                            <th>Name of the Gallery</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody class="table-width">
                        @foreach ($galleries as $gallery)
                        <tr>
                            <td>{{ $gallery->name }}</td>
                            <td><a href="{{ url('gallery/view/' . $gallery->id) }}">View</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    
        <div class="col-md-4">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        @endif
            <form method="post" action="{{ url('gallery/save') }}" class="form">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" name="gallery_name"
                        id='gallery_name' placeholder='Name of the Gallery'
                    class="form-control" 
                    value="{{ old('gallery_name')}}" />
                </div>

                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection