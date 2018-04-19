@if(!empty($params['organization']->results_email))
    <div class="row">
        <div class="col-md-3 well">
            <form method="post" action="/send">
                {{ csrf_field() }}
                <h4 class="text-muted">Share your results with<br>{{ $params['organization']->name }}</h4>
                <label for="name" required>Name</label>
                <input class="form-control" name="name">
                <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-share" aria-hidden="true"></i> Share</button>
            </form>
        </div>
    </div>
@endif

<?php echo $params['display']; ?>
