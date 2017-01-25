@extends('layouts.app')
@section('content')
    <div>{{ $bands->appends(['sort_column' => \Request::input('sort_column'), 'order' => \Request::input('order')])->links() }}</div>
    <table class="table table-striped" data-toggle="dataTable" data-form="deleteForm">
        <thead>
        <tr>
            <th></th>
            <th>
                <a href="?sort_column=name&order={{ $sortParams['order'] }}">Band Name</a>
                @if(\Request::input('sort_column') == 'name')
                    <i class="fa fa-sort-alpha-{{ $sortParams['current_order'] }}" aria-hidden="true"></i>
                @endif
                <small>(no. of albums)</small>
            </th>
            <th>
                <a href="?sort_column=website&order={{ $sortParams['order'] }}">Web Site</a>
                @if(\Request::input('sort_column') == 'website')
                    <i class="fa fa-sort-alpha-{{ $sortParams['current_order'] }}" aria-hidden="true">
                @endif
            </th>
            <th>
                <a href="?sort_column=start_date&order={{ $sortParams['order'] }}">Start Date</a>
                @if(\Request::input('sort_column') == 'start_date')
                    <i class="fa fa-sort-numeric-{{ $sortParams['current_order'] }}" aria-hidden="true">
                @endif
            </th>
            <th>
                <a href="?sort_column=still_active&order={{ $sortParams['order'] }}">Still Active?</a>
                @if(\Request::input('sort_column') == 'still_active')
                    <i class="fa fa-sort-{{ $sortParams['current_order'] }}" aria-hidden="true">
                @endif

            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($bands as $band)
            <tr>
                <td>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('bands.edit', ['id' => $band->id]) }}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-edit" aria-hidden="true"></i></a>
                        </div>
                        <form action="{{ route('bands.destroy', ['id' => $band->id]) }}" class="form-inline form-delete" method="post">
                        <input name="_method" type="hidden" value="delete">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <input type="hidden" name="id" value="{{ $band->id }}">
                            <button name="delete_modal" type="submit" class="btn btn-sm btn-danger delete" style="float:left">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                    </div>
                </td>
                <td>{{ $band->name }}
                    <small class="text-muted">({{ $band->albums()->count() }})</small>
                </td>
                <td><a href="#" target="_blank"><i class="fa fa-link" aria-hidden="true"></i> {{ $band->website }}</a>
                </td>
                <td>{{ $band->start_date }}</td>
                <td class="text-center"><i
                            class="fa fa-thumbs-{{ ($band->still_active == 1 ? 'up text-success' : 'down text-muted') }}"
                            aria-hidden="true"></i></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-6">
            {{ $bands->appends(['sort_column' => \Request::input('sort_column'), 'order' => \Request::input('order')])->links() }}</div>
        <div style="margin-top: 20px;">
            <div class="col-md-6 text-right text-muted">Total Bands: <span class="badge">{{ $totalBands }}</span></div>
        </div>
    @include('partials.delete_modal', ['data_type' => 'band','message' => 'All albums associated with this band will also be deleted.'])
@endsection
