@extends('layouts.main')

@section('content')
    <main class="main">

        @include('template.banner')

        <section>
            <div class="container">
                <div class="row g-5">
                    <div class="col-md-8">

                        <img src="{{ asset('/storage/cultures/' . $data->cover) }}" alt="{{ $data->name }}" class="w-100 object-fit-cover rounded-4" height="400px">

                        <article class="blog-post">
                            <h2 class="blog-post-title mt-3">{{ $data->name }}</h2>
                            <p class="blog-post-meta">{{ date('l, j F Y', strtotime($data->created_at)) }}</p>

                            <hr>

                            <section class="py-2">
                                {!! $data->content !!}
                            </section>

                        </article>

                    </div>

                    <div class="col-md-4">
                        <div class="position-sticky" style="top: 9rem;">
                            
                            <p class="mb-3 fs-4">Budaya Lainnya</p>

                            @foreach ($suggestions as $item)
                                
                                <div class="card shadow-sm border-0 mb-3 card-hover table-color">
                                    <a href="cultures-description.html">
                                        <div class="row g-0">
                                            <div class="col-lg-4">
                                                <img src="{{ asset('/storage/cultures/' . $item->cover) }}" class="card-cultures2 rounded shadow-sm" alt="{{ $item->name }}">
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-2">{{ $item->name }}</h5>
                                                    <p class="card-text">{{ substr(preg_replace('/<[^>]*>/i', '', $item->content), 0, 50) . "..." }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            @endforeach

                            
                        </div>
                    </div>
                </div>

                <hr class="mt-5">

            </div>
        </section>

    </main>
@endsection
