@php 
    $options = isset($options) ? explode('|', $options) : [];
@endphp

<div style="margin-top: 80px;">

    @if (in_array('with_hero', $options))
        <section class="section container-title">
            <div class="container section-title pb-0 text-start">
                <h3>{{ __("title-$current_page") }}</h3>
                <p>{{ __("banner-$current_page") }}</p>
            </div>
        </section>
    @endif
    
    <div class="page-title {{ (auth()->check()) ? "container-title" : "" }}" data-aos="fade">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">{{ __("title-$current_page") }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <?php $segments = request()->segments() ?>
                    @if (count($segments) == 2)
                        <li><a href="{{ url('/') }}">{{ __("title-home") }}</a></li>
                        <li><a href="{{ url("/$current_page") }}">{{ __("title-$current_page") }}</a></li>
                        <li class="current">Detail</li>
                    @else
                        <li><a href="{{ url('/') }}">{{ __("title-home") }}</a></li>
                        <li class="current">{{ __("title-$current_page") }}</li>
                    @endif
                </ol>
            </nav>
        </div>
    </div>
    
</div>

