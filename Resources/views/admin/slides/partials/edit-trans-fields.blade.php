<div class='form-group{{ $errors->has("{$lang}[title]") ? ' has-error' : '' }}'>
    {!! Form::label("{$lang}[title]", trans('slider::sliders.form.title')) !!}
    <?php $old = $slide->hasTranslation($lang) ? $slide->translate($lang)->title : '' ?>
    {!! Form::text("{$lang}[title]", old("{$lang}[title]", $old), ['class' => 'form-control','required' => 'required', 'placeholder' => trans('slider::sliders.form.title'), 'autofocus']) !!}
    {!! $errors->first("{$lang}[title]", '<div class="invalid-feedback">:message</div>') !!}
    <p class="text-muted m-0 pt-1"><i class="fa fa-info-circle mr-2" style="color:#008ca2;margin-right:5px;"></i>Sera el texto que aparecera en el atributo 'title'</p>
</div>
<div class='m-0 form-group{{ $errors->has("{$lang}[caption]") ? ' has-error' : '' }}'>
    {!! Form::label("{$lang}[caption]", trans('slider::sliders.form.caption')) !!}
    <?php $old = $slide->hasTranslation($lang) ? $slide->translate($lang)->caption : '' ?>
    {!! Form::text("{$lang}[caption]", old("{$lang}[caption]", $old), ['class' => 'form-control', 'placeholder' => trans('slider::sliders.form.caption'), 'autofocus']) !!}
    {!! $errors->first("{$lang}[caption]", '<div class="invalid-feedback">:message</div>') !!}
    <p class="text-muted m-0 pt-1"><i class="fa fa-info-circle mr-2" style="color:#008ca2;margin-right:5px;"></i>Sera el texto que aparecera encima del slide, en caso de activarlo. Sera el texto que aparecera en el atributo 'alt'</p>
</div>

<div class='form-group'>
    <div class="checkbox">
            <?php $old = $slide->hasTranslation($lang) ? $slide->translate($lang)->active : false ?>
            <label for="{{$lang}}[active]">
                <input id="{{$lang}}[active]"
                    name="{{$lang}}[active]"
                    type="checkbox"
                    class="flat-blue"
                    {{ (bool) $old ? 'checked' : '' }}
                    value="1" />
                Activar leyenda
            </label>
        </div>
</div>
<div class="form-group{{ $errors->has("{$lang}[url]") ? ' has-error' : '' }}">
    {!! Form::label("{$lang}[url]", trans('slider::sliders.form.url')) !!}
    <?php $old = $slide->hasTranslation($lang) ? $slide->translate($lang)->url : '' ?>
    {!! Form::text("{$lang}[url]", old("{$lang}[url]", $old), ['class' => 'form-control url', 'placeholder' => trans('slider::sliders.form.url')]) !!}
    {!! $errors->first("{$lang}[url]", '<div class="invalid-feedback">:message</div>') !!}
</div>