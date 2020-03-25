@if(count($slider->slides) > 1)
    <a class="carousel-control-prev" href="#{{ $slider->system_name }}" role="button" data-slide="prev">
        <i class="fas fa-chevron-left fa-3x"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#{{ $slider->system_name }}" role="button" data-slide="next">
        <i class="fas fa-chevron-right fa-3x"></i>
        <span class="sr-only">Next</span>
    </a>
@endif