@foreach($band->albums() as $album)
    <div class="media">
      <div class="media-left media-bottom">
          <img width="80px;" src="{{ $album->coverImagePath }}" class="img-rounded"/>
      </div>
      <div class="media-body">
        <h3>{{ $album->name }}</h3>
      </div>
    </div>
@endforeach
