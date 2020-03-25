<div class='form-group{{ $errors->has("{$lang}[title]") ? ' has-error' : '' }}'>
    {!! Form::label("{$lang}[title]", trans('slider::sliders.form.title')) !!}
    {!! Form::text("{$lang}[title]", old("{$lang}[title]"), ['class' => 'form-control', 'placeholder' => trans('slider::sliders.form.title'), 'autofocus']) !!}
    {!! $errors->first("{$lang}[title]", '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class='form-group{{ $errors->has("{$lang}[caption]") ? ' has-error' : '' }}'>
    {!! Form::label("{$lang}[caption]", trans('slider::sliders.form.caption')) !!}
    {!! Form::text("{$lang}[caption]", old("{$lang}[caption]"), ['class' => 'form-control', 'placeholder' => trans('slider::sliders.form.caption'), 'autofocus']) !!}
    {!! $errors->first("{$lang}[caption]", '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {!! Form::label("{$lang}[uri]", trans('slider::sliders.form.uri')) !!}
    <div class='input-group{{ $errors->has("{$lang}[uri]") ? ' has-error' : '' }}'>
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">{{ $lang }}</span>
        </div>
        {!! Form::text("{$lang}[uri]", old("{$lang}[uri]"), ['class' => 'form-control', 'placeholder' => trans('slider::sliders.form.uri')]) !!}
        {!! $errors->first("{$lang}[uri]", '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has("{$lang}[url]") ? ' has-error' : '' }}">
    {!! Form::label("{$lang}[url]", trans('slider::sliders.form.url')) !!}
    {!! Form::text("{$lang}[url]", old("{$lang}[url]"), ['class' => 'form-control', 'placeholder' => trans('slider::sliders.form.url')]) !!}
    {!! $errors->first("{$lang}[url]", '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="checkbox">
    <label for="{{$lang}}[active]">
        <input id="{{$lang}}[active]"
                name="{{$lang}}[active]"
                type="checkbox"
                class="flat-blue"
                value="1" />
        {{ trans('slider::sliders.form.active') }}
    </label>
</div>

<div class="form-group{{ $errors->has("{$lang}[custom_html]") ? ' has-error' : '' }}">
    {!! Form::label("{$lang}[custom_html]", trans('slider::slides.form.custom html')) !!}
    {!! Form::textarea("{$lang}[custom_html]", old("{$lang}[custom_html]"), ['class' => 'form-control ckeditor', 'placeholder' => trans('slider::slides.form.custom html')]) !!}
    {!! $errors->first("{$lang}[custom_html]", '<div class="invalid-feedback">:message</div>') !!}
</div>
