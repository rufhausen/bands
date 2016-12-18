<div class="row">
    <div class="col-md-12">
        @if(isset($album))
        <div class="media">
          <div class="media-left media-bottom">
              <img width="80px;" src="/img/covers/{{ $album->id }}.jpg" class="img-rounded"/>
          </div>
          <div class="media-body">
            <h3>{{ $album->name }}<small> by {{ $album->band->name }}</small></h3>
          </div>
        </div>
    @else
        <h3>Add a new Album</h3>
    @endif
        <hr />
    </div>
</div>
