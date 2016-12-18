<div class="row">
    <div class="col-md-12">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
        @endif
        @if(session('notice'))
        <div class="alert alert-notice">{{ session('notice') }}</div>
        @endif
    </div>
</div>
