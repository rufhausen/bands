@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-8">{{ $albums->appends(['sort_column' => \Request::input('sort_column'), 'order' => \Request::input('order'), 'band_id' => \Request::input('band_id')])->links() }}
            &nbsp
        </div>
        <div style="margin-top: 20px;">
            @if(\Request::exists('band_id'))
                <div class="col-md-1 pull-right">
                    <a href="{{ route('albums.index') }}" class="btn btn-default"><i class="fa fa-refresh"
                                                                                     aria-hidden="true"></i>Reset</a>
                </div>
            @endif
            <div class="col-md-3 pull-right">
                <form method="get">
                <select name="band_id" id="bands_select" class="form-control">
                    <option value="">Filter by Band...</option>
                    @foreach($bands as $band)
                        @php
                            $band_id = (\Request::exists('band_id') ? \Request::input('band_id') : null);
                            $selected = ( !empty($band_id) && ($band_id == $band->id) ? 'selected' : null);
                        @endphp
                        <option value="{{ $band->id }}" {{ $selected }}>{{ $band->name }}</option>
                    @endforeach
                </select>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped" data-toggle="dataTable" data-form="deleteForm">
                <thead>
                <tr>
                    <th></th>
                    <th>
                        <a href="?sort_column=name&order={{ $sortParams['order'] }}">Album
                            <small class="text-muted">(Genre)</small>
                        </a>
                        @if(\Request::input('sort_column') == 'name')
                            <i class="fa fa-sort-alpha-{{ $sortParams['current_order'] }}" aria-hidden="true"></i>
                        @endif
                    </th>
                    <th>
                        <a href="?sort_column=record_date&order={{ $sortParams['order'] }}">Record Date</a>
                        @if(\Request::input('sort_column') == 'record_date')
                            <i class="fa fa-sort-alpha-{{ $sortParams['current_order'] }}" aria-hidden="true"></i>
                        @endif
                    </th>
                    <th>
                        <a href="?sort_column=release_date&order={{ $sortParams['order'] }}">Release Date</a>
                        @if(\Request::input('sort_column') == 'release_date')
                            <i class="fa fa-sort-alpha-{{ $sortParams['current_order'] }}" aria-hidden="true"></i>
                        @endif
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($albums as $album)
                    <tr>
                        {{-- class="clickable-row" data-href='{{ route('bands.edit', ['id' => $album->id]) }}' --}}
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('albums.edit', ['id' => $album->id]) }}"
                                       class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <form method="post" action="{{ route('albums.destroy', ['id' => $album->id]) }}" class="form-inline form-delete">
                                    <input name="_method" type="hidden" value="delete">
                                    {{ csrf_field() }}
                                <div class="col-md-6">
                                    <input type="hidden" name="id" value="{{ $album->id }}">
                                    <button name="delete_modal" type="submit" class="btn btn-sm btn-danger delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </form>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-2 pull-left">
                                    @if (\File::exists(public_path($album->cover_image_path)))
                                        <img width="80px;" src="{{ $album->cover_image_path }}"
                                             class="img-rounded img-responsive"/>
                                    @else
                                        <image width="80px;" src="https://unsplash.it/100"
                                               class="img-rounded img-responsive"/>
                                    @endif
                                </div>
                                <div class="col-md-10 pull-left">
                                    <strong>{{ $album->name }}</strong>
                                    <small class="text-muted"> ({{ $album->genre->name }})<br/>
                                        <span class="small">by <a
                                                    href="{{ route('bands.edit', ['id' => $album->band->id]) }}">{{ $album->band->name }}</a><br/>
                                            {{ $album->number_of_tracks }} Tracks
                                        </span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $album->record_date }}</td>
                        <td>{{ $album->release_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">{{ $albums->appends(['band_id' => \Request::input('band_id')])->links() }}</div>
        <div style="margin-top: 20px;">
            <div class="col-md-6 text-right text-muted">Total Albums: <span class="badge">{{ $totalAlbums }}</span>
            </div>
        </div>
    </div>

    @include('partials.delete_modal', ['data_type' => 'album'])
@endsection
