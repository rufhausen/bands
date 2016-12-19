<div class="row">
    <div class="col-md-12">
        @if(isset($band))
            <h3>{{ $band->name }}</h3>
        @else
            <h3>Add a new Album</h3>
        @endif
        <hr/>
    </div>
</div>
