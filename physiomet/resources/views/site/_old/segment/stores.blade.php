@if(!$stores->isEmpty())
<section class="w-100 content">
	<div class="w-100 p-bottom-50 p-bottom-1024-20">
		<div class="center">
			<ul class="f-left w-100 d_flex list-group">
				@foreach($stores as $row)
					@include('site.store._list')
				@endforeach
			</ul>
			@if(!$stores->isEmpty())
				{!! $stores->links() !!}
			@endif
		</div>
	</div>
</section>
@endif