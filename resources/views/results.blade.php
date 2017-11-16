<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DISC & Spiritual Profile | Powered by ARC</title>
    <meta name="keywords" content="spiritual gifts, disc test, profile, leadership style, spiritual gifts test" />

    <!-- Framework Stylesheets -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic|Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href="/disc/style.css" rel="stylesheet" >

    <!-- Scripts -->
    <script type="text/javascript" charset="utf-8" src="/disc/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/disc/js/modernizr-2.6.2.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/disc/js/jquery.formalize.js"></script>
    <script type="text/javascript" charset="utf-8" src="/disc/js/superfish.js"></script>
    <script type="text/javascript" charset="utf-8" src="/disc/js/jquery.validate.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/disc/js/jquery.controls.js"></script>
    <script type="text/javascript" charset="utf-8" src="/disc/js/jquery.form.js"></script>
    <script type="text/javascript" charset="utf-8" src="/disc/js/main.js"></script>

</head>

<body>
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

    <div class="footer navbar-fixed-bottom">
    	<div class="container-fluid">
    		<div class="col-xs-12 copyrightbar text-center">
    			<p>Powered by <a href="https://www.arcchurches.com">ARC</a>
				&copy; 2000-{{ date('Y') }}. All Rights Reserved</p>
    		</div>
    	</div>
    </div>


    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-63845739-2', 'auto');
      ga('send', 'pageview');

    </script>

</body>
</html>