@extends('layouts.app')
@section('content')
@include('partials.album_header')
    {!! Form::model($album, [
        'route' => ['albums.update', $album],
        'method' => 'put',
        'class' => 'form-horizontal'
        ]) !!}
        <div class="row">
            <div class="form-group">
                <label for="albumName" class="col-md-2 control-label">Album Name</label>
                <div class="col-md-10">
                    <input class="form-control" name="name" id="albumName" type="text" value="{{ $album->name }}" />
                </div>
            </div>

            <div class="form-group">
                <label for="band" class="col-md-2 control-label">Band</label>
                <div class="col-md-4">
                    <select name="band_id" class="form-control">
                        @foreach($bands as $band)
                            @php
                            $selected = ($band->id == $album->band_id ? 'selected' : null);
                            @endphp
                            <option value="{{ $band->id }}" {{ $selected }}>{{ $band->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="recordDate" class="col-md-2 control-label">Recording Date</label>
                <div class="col-md-2">
                    <div class="input-group date" id="recordDate">
                        <input class="form-control" name="record_date" type="text" id="record_date_input" value="{{ $album->record_date }}"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="releaseDate" class="col-md-2 control-label">Release Date</label>
                <div class="col-md-2">
                    <div class="input-group date" id="releaseDate">
                        <input class="form-control" name="release_date" type="text" id="release_date_input" value="{{ $album->release_date }}"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="band" class="col-sm-2 control-label">No. of Tracks</label>
                <div class="col-md-1">
                    <select name="number_of_tracks" class="form-control">
                        @for ($i = 1; $i <= 99; $i++)
                            @php
                            $selected = ($i == $album->number_of_tracks ? 'selected' : null);
                            @endphp
                            <option value="{{ $i }}" {{ $selected }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="labelName" class="col-sm-2 control-label">Label</label>
                <div class="col-md-3">
                    <input class="form-control" name="label" id="labelName" type="text" value="{{ $album->label }}" />
                </div>
            </div>

            <div class="form-group">
                <label for="producerName" class="col-sm-2 control-label">Producer</label>
                <div class="col-md-3">
                    <input class="form-control" name="producer" id="producerName" type="text" value="{{ $album->producer }}" />
                </div>
            </div>

            <div class="form-group">
                <label for="genre" class="col-md-2 control-label">Genre</label>
                <div class="col-md-3">
                    <select name="genre_id" class="form-control">
                        @foreach($genres as $genre)
                            @php
                            $selected = ($genre->id == $album->genre_id ? 'selected' : null);
                            @endphp
                            <option value="{{ $genre->id }}" {{ $selected }}>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-2 control-label"><button type="submit" class="btn btn-default">Submit</button></div>
        </div>
        {!! Form::close() !!}
    @endsection
