@props(['tagsCsv'])

@php
	$tags = explode(',', $tagsCsv);
@endphp

<ul class="flex flex-wrap gap-2">
	@foreach ($tags as $tag)
		<li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 text-xs">
			<a href="/?tag={{ $tag }}">{{ $tag }}</a>
		</li>
	@endforeach
</ul>
