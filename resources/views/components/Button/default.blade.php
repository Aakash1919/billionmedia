{{-- 
/**
 * Component file : Universal Button
 *
 * @param $atrribute :  contains the value of the button
 * 
 * @example Usage
 * render('components/Button/default', array);
 * @endexample
 */ 
 --}}

@if(isset($attributes) && is_array($attributes))
    <a href="{{ $attributes['href'] ?? '#' }}"
    @if(isset($attributes['id'])) id="{{ $attributes['id'] ?? '' }}" @endif
    @if(isset($attributes['class'])) class="{{ $attributes['class'] ?? '' }}" @endif 
    @if(isset($attributes['data-toggle'])) data-toggle="{{ $attributes['data-toggle'] ?? '' }}" @endif
    @if(isset($attributes['data-target'])) data-target= "{{ $attributes['data-target'] ?? '' }}" @endif>
    @if(isset($attributes['icon']))
        <span class="{{ $attributes['icon'] ?? ''}}"></span> 
    @endif
    {{ $attributes['title'] ?? '' }}</a>
@endif