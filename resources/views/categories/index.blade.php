@extends('layouts.app')
@section('title', $title)

@section('content')
    <section class=" p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            @include('categories.components.list', [
                'categories' => $categories,
            ])
        </div>
    </section>
@endsection
