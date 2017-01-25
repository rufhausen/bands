<form class="form-horizontal" action="{{ $formAction }}" method="post">
    @if (isset($band))<input name="_method" type="hidden" value="PUT">@endif
    {{ csrf_field() }}
<div class="row">
    <div class="form-group">
        <label for="bandName" class="col-md-2 control-label">Band Name</label>
        <div class="col-md-8">
            <input class="form-control" name="name" id="bandName" type="text"
                   value="{{ old('name',  isset($band->name) ? $band->name : null) }}"/>
        </div>
    </div>

    <div class="form-group">
        <label for="startDate" class="col-md-2 control-label">Start Date</label>
        <div class="col-md-2">
            <div class="input-group date" id="startDate">
                <input class="form-control" name="start_date" type="text" id="start_date_input"
                       value="{{ old('start_date',  isset($band->start_date) ? $band->start_date : null) }}"/>
                <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="website" class="col-md-2 control-label">Web Site</label>
        <div class="col-md-8">
            <input class="form-control" name="website" id="website" type="text"
                   value="{{ old('website',  isset($band->website) ? $band->website : null) }}"/>
        </div>
    </div>

    <div class="col-md-10 col-md-offset-2">
        <div class="checkbox">
            <label>
                <input name="still_active"
                        id='still_active'
                       type="checkbox" {{ (isset($band->still_active) && ($band->still_active == 1) ? 'checked' : null)}}>
                Still Active?
                </input>
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-4">
        <button type="submit" class="btn btn-default">
            @if(isset($band))
                Update
            @else
                Create
            @endif
        </button>
        <button onclick="history.back();" class="btn btn-notice">Cancel</button>
    </div>
</div>

@if(isset($band) && $band->albums()->count())
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Albums by {{ $band->name}}</h2>
                </div>
                <div class="panel-body">
                    @foreach($band->albums as $album)
                        <div class="media">

                            <div class="media-left media-middle">
                                <img width="40px;" src="{{ $album->coverImagePath }}" class="img-rounded"/>
                            </div>

                            <div class="media-body">
                                <a href="{{ route('albums.edit', ['id' => $album->id]) }}">{{ $album->name }}</a>
                                <br/>
                                <small>Released {{ $album->release_date }}</small>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    @endif
    </div>
</form>
