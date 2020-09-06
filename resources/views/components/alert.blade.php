<div class="alert alert-{{ $type }} @if(\App::getLocale() === 'en') border-left-success @elseif(\App::getLocale() === 'ar') border-right-success @endif alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>