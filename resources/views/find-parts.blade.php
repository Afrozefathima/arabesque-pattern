@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">{{ $make }} Parts</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-auto gap-6">
            @foreach ($cars as $car)
                <div class="rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <div>
                        @if (!empty($car['img']))
                            <img src="{{ asset('img/' . $car['img']) }}" alt="{{ $car['make'] }} {{ $car['model'] }}"
                                class="rounded-2xl w-32 h-32 shadow-2xl">
                        @else
                            <div class="flex items-center justify-center h-full">
                                <span class="text-gray-400">No image</span>
                            </div>
                        @endif
                    </div>

                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">
                            {{ $car['model'] }}
                        </h3>

                        <p class="text-gray-600 mb-2">
                            Year: {{ implode(', ', $car['year']) }}
                        </p>

                        @if (!empty($car['description']))
                            <p class="text-gray-700 mb-4 line-clamp-1">
                                {{ $car['description'] }}
                            </p>
                        @endif

                        <a href="#"
                            class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            View Parts
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            <a href="{{ route('find-parts.index') }}" class="text-blue-600 hover:underline">
                ← Back to All Makes
            </a>
        </div>
    </div>
@endsection
