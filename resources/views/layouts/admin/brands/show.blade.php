@extends('_layouts.master')


@section('body')
    <a href="{{ route('admin-category') }}">Retour aux brands</a>
    <h1 class="text-3xl font-bold mt-4">{{ $brand->name }}</h1>

    <div class="mt-5 bg-white-100 w-full md:w-1/2">
        <div class="bg-white rounded-lg shadow-lg flex justify-center flex-col text-center">
          <img src="/{{ $brand->image }}" alt="" class="rounded-t-lg h-10 w-full mt-10">
          <div class="p-6">
            <h2 class="font-bold mb-2 text-2xl text-white-800">{{ $brand->name }}
            </h2>
          </div>
      
        </div>
      </div>
      
@endsection