@extends('layouts.app')
@section('title', $title)

@section('content')
    <section class=" p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12 flex flex-col items-center">
            @include('categories.components.form', [
                'action' => route('categories.store'),
                'method' => 'POST',
            ])
        </div>
    </section>
@endsection
