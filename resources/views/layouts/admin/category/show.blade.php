@extends('_layouts.master')


@section('body')
    <a href="{{ route('admin-category') }}">Retour aux catégories</a>
    <h1 class="text-3xl font-bold mt-4">{{ $category->name }}</h1>

    <div class="flex flex-wrap -mx-3 py-8 gap-4">
        @foreach ($projects as $project)
        <div class="relative mb-12">
            <div class="overflow-hidden rounded-lg">
              <img
                src="{{ $project->image }}"
                alt="portfolio"
                class="w-full"
              />
            </div>
            <div
              class="relative z-10 mx-7 -mt-20 rounded-lg bg-white py-9 px-3 text-center shadow-lg"
            >
              <span class="mb-2 block text-sm font-semibold text-primary">
                {{ $project->category->name }}
              </span>
              <h3 class="mb-4 text-xl font-bold text-dark">
                {{ $project->name }}
              </h3>
              <a
                href="javascript:void(0)"
                class="inline-block rounded-md border py-3 px-7 text-sm font-semibold text-body-color transition hover:border-primary hover:bg-gray-800 hover:text-white"
              >
                Plus d'infos
              </a>
            </div>
          </div>
        @endforeach
    </div>
@endsection