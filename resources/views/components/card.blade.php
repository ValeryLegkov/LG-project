@props(['padding' => 'p-4 sm:p-6 lg:p-10'])

<div
	{{ $attributes->merge(['class' => "bg-gray-50 border border-gray-200 rounded {$padding} overflow-hidden break-words"]) }}>
	{{ $slot }}
</div>
