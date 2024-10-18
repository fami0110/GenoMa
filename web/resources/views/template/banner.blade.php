@php
    // $options = isset($options) ? explode('|', $options) : [];
    $segments = request()->segments();

    $prefix = '';
    if (in_array('admin', $segments)) {
        $prefix = __('manage') . ' ';
    } elseif (count($segments) == 2) {
        $prefix = __('details') . ' ';
    }
@endphp


<div class="page-title" data-aos="fade" style="margin-top: 80px;">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">{{ $prefix . __("title-$current_page") }}</h1>
        <nav class="breadcrumbs">
            <ol>
                <li class="fw-bold"><a href="{{ url('/') }}">{{ __('title-home') }}</a></li>

                @if (in_array('admin', $segments))
                    <li class="fw-bold current">{{ __('manage') . ' ' . __("title-$current_page") }}</li>
                @elseif (count($segments) == 2)
                    <li class="fw-bold"><a href="{{ url("/$current_page") }}">{{ __("title-$current_page") }}</a></li>
                    <li class="fw-bold current">Detail</li>
                @else
                    <li class="fw-bold current">{{ __("title-$current_page") }}</li>
                @endif
            </ol>
        </nav>
    </div>
</div>
