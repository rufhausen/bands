<form method="post" class="form-horizontal" action="{{ $formAction }}">
    @if (isset($album))<input name="_method" type="hidden" value="PUT">@endif
{{ csrf_field() }}
<div class="row">
    <div class="form-group">
        <label for="albumName" class="col-md-2 control-label">Album Name</label>
        <div class="col-md-10">
            <input class="form-control" name="name" id="albumName" type="text"
                   value="{{ old('name', isset($album->name) ? $album->name : null) }}"/>
        </div>
    </div>

    <div class="form-group">
        <label for="band" class="col-md-2 control-label">Band</label>
        <div class="col-md-10">
            <select name="band_id" class="form-control">
                <option value="">Select a Band...</option>
                @foreach($bands as $band)
                    @php
                        $selected = '';
                        if (isset($album->band_id)) {
                        $selected = ($band->id == $album->band_id ? 'selected' : null);
                        }
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
                <input class="form-control" name="record_date" type="text" id="record_date_input"
                       value="{{ old('record_date', isset($album->record_date) ? $album->record_date : null) }}"/>
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
                <input class="form-control" name="release_date" type="text" id="release_date_input"
                       value="{{ old('release_date', isset($album->release_date) ? $album->release_date : null) }}"/>
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
                        $selected = '';
                        if (isset($album->number_of_tracks)){
                           $selected = ($i == $album->number_of_tracks ? 'selected' : null);
                        }
                    @endphp
                    <option value="{{ $i }}" {{ $selected }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="labelName" class="col-sm-2 control-label">Label</label>
        <div class="col-md-3">
            <input class="form-control" name="label" id="labelName" type="text"
                   value="{{ old('label', isset($album->label) ? $album->label : null) }}"/>
        </div>
    </div>

    <div class="form-group">
        <label for="producerName" class="col-sm-2 control-label">Producer</label>
        <div class="col-md-3">
            <input class="form-control" name="producer" id="producerName" type="text"
                   value="{{ old('producer', isset($album->producer) ? $album->producer : null) }}"/>
        </div>
    </div>

    <div class="form-group">
        <label for="genre" class="col-md-2 control-label">Genre</label>
        <div class="col-md-3">
            <select name="genre_id" class="form-control">
                <option value="">Select a Genre...</option>
                @foreach($genres as $genre)
                    @php
                        $selected = '';
                        if (isset($album->genre_id)) {
                            $selected = ($genre->id == $album->genre_id ? 'selected' : null);
                        }
                    @endphp
                    <option value="{{ $genre->id }}" {{ $selected }}>{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-default">
                @if(isset($album))
                    Update
                @else
                    Create
                @endif
            </button>
            <button onclick="history.back();" class="btn btn-notice">Cancel</button>
        </div>
    </div>
</form>
