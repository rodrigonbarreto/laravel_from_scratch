<div class="box has-bg-gray-0 is-shadowless">
	<div class="content">
		<h3>About</h1>

	    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur pusuis sit amet fermentum. Aenan licinia bibendum nulla sed consecetur.</p>
	</div>
</div>

<div class="box is-shadowless">
	<div class="content">
		<h3>Archives</h1>
	    <ul>
			@foreach($archives as $stats)
				<li><a href="?month={{$stats['month']}}&year={{$stats['year']}}">{{$stats['month'] }} {{$stats['year']}}</a></li>
			@endforeach
	    </ul>
	</div>
</div>

<div class="box is-shadowless">
	<div class="content">
		<h3>Elsewhere</h1>
	    <ul>
	    	<li><a href="#">Github</a></li>
	    	<li><a href="#">Twitter</a></li>
	    	<li><a href="#">Facebook</a></li>
	    </ul>
	</div>
</div>