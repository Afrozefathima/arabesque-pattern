@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-8 text-center">Find Parts by Car Make</h1>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($makes as $make)
                <a href="{{ route('find-parts', ['make' => strtolower($make['name'])]) }}"
                    class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 text-center group">
                    @if (!empty($make['img']))
                        <div class="mb-4 flex items-center justify-center">
                            <img src="{{ asset('img/' . $make['img']) }}" alt="{{ $make['name'] }}"
                                class="rounded-full w-32 h-32 shadow-2xl">
                        </div>
                    @endif

                    <h3 class="text-xl font-semibold mb-2 group-hover:text-blue-600 transition">
                        {{ $make['name'] }}
                    </h3>

                    <p class="text-gray-500 text-sm">
                        {{ $make['count'] }} models
                    </p>
                </a>
            @endforeach
        </div>
    </div>
@endsection
