<?php

namespace Modules\Slider\Services;

use Illuminate\Support\Facades\URL;

class SliderRenderer
{
    /**
     * @var int Id of the slider to render
     */
    protected $sliderId;
    /**
     * @var string
     */

    /**
     * @var string
     */
    private $slides = '';

    /**
     * @param Slider $slider
     * @param $slides
     * @return string
     */
    public function renderForSlider($slider, $slides)
    {
        $this->sliderId = $slider->id;

        $this->generateHtmlFor($slides);

        return $this->slides;
    }

    /**
     * Generate the html for the given items
     * @param $slides
     */
    private function generateHtmlFor($slides)
    {
        foreach ($slides as $slide) {
            $editLink = route('admin.slider.slide.edit', [$this->sliderId, $slide->id]);
            $this->slides .= '
            <div class="col-lg-3 col-md-4 col-6 thumb position-relative">
                            <div class="capaInterior">
                                <a class="deleteImg jsDeleteSlide" data-item-id="'.$slide->id.'"><i style="color:white" class="far fa-trash-alt"></i></a>
                                <div class="row justify-content-around w-100">
                                    <div class="col-auto">
                                        <a href="'.$editLink.'"><i class="far fa-edit fa-2x"></i></a>
                                    </div>
                                    <div class="col-auto">
                                        <a class="single_image" href="'. $slide->getImageUrl() .'">
                                            <i class="far fa-eye fa-2x"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                <img src="'. $slide->getImageUrl() .'"
                    class="zoom img-fluid" alt="'.$slide->title.'">
            </div>
            ';
        }
        
        
    }
}
