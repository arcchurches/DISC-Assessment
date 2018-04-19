@extends('layouts.main')

@section('content')
    <div id="disc-intro">
        <div class="text-center">
            <h1>Oops!</h1>
            <p>It looks like we couldn't find the organization you were looking for.</p>
        </div>
    </div>

    <div class="footer navbar-fixed-bottom">
    	<div class="container-fluid">
    		<div class="col-xs-12 copyrightbar text-center">
    			<p>Powered by <a href="https://www.arcchurches.com">ARC</a>
				&copy; 2000-{{ date('Y') }}. All Rights Reserved</p>
    		</div>
    	</div>
    </div>
@endsection