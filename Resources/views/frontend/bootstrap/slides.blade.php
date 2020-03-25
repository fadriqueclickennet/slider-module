@foreach($slider->slides as $index => $slide)
    <div class="carousel-item @if($index === 0) active @endif ">
        <img src="{!! $slide->getImageUrl() !!}" title="{{ $slide->title }}" alt="{{$slide->caption}}" class="d-block w-100">
        @if(!empty($slide->getLinkUrl()))
            <a href="{{ $slide->getLinkUrl() }}" target="{{ $slide->target }}">
        @endif
        @if($slide->active)
        <div class="carousel-caption d-none d-md-block">
            <p>{{ $slide->caption }}</p>
        </div>
        @endif
        @if(!empty($slide->getLinkUrl()))
            </a>
        @endif
    </div>
@endforeach