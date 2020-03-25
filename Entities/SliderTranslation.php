<?php

namespace Modules\Slider\Entities;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'slider__slider_translations';
}
