@extends('layouts.main')

@section('content')
    <a class="btn btn-default btn-xs pull-right" href="/{{ $params['organization']->shortname }}/">
        <i class="fa fa-angle-double-left" aria-hidden="true"></i> Return
    </a>
    <div class="text-center">
        @if(!empty($params['organization']->logo_url))
            <img style="max-width: 300px;" src="{{ $params['organization']->logo_url }}">
        @endif
        @if(!empty($params['organization']->show_name) && $params['organization']->show_name == 1)
            <h3>{{ $params['organization']->name }}</h3>
        @endif
    </div>
    @if(Session::has('alert-success'))
        <div class="alert alert-success">{{ Session::get('alert-success') }}</div>
    @endif
    <div id="results">
        @if(!empty($params['organization']->results_email))
            <div class="row">
                <div class="col-md-3 well">
                    <form method="post" action="/send">
                        {{ csrf_field() }}
                        <h4 class="text-muted">Share your results with<br>{{ $params['organization']->name }}</h4>
                        <label for="name" required>Name</label>
                        <input class="form-control" name="name">
                        <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-share" aria-hidden="true" onclick="this.disabled=true;"></i> Share</button>
                    </form>
                </div>
            </div>
        @endif

        <?php echo $params['display']; ?>
    </div>
@endsection
