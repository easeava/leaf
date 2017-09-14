@if(Leaf::user()->visible($item['roles']))
    @if(!isset($item['children']))
		<li>
			@if(url()->isValidUrl($item['uri']))
                <a href="{{ $item['uri'] }}" target="_blank">
            @else
                 <a href="{{ admin_base_path($item['uri']) }}">
            @endif
                <span class="title">{{ $item['title'] }}</span>
            </a>
		</li>
	@else
		<li>
			<a href="javascript:;"><span class="title">{{ $item['title'] }}</span>
		<span class=" arrow"></span></a>
			<ul class="">
				@foreach($item['children'] as $item)
                    @include('leaf::layouts.menu', $item)
                @endforeach
			</ul>
		</li>
	@endif
@endif
