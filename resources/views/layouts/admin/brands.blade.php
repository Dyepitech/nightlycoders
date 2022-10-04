@extends('_layouts.master')

@section('body')
<div class="flex justify-between">
    <h1 class="text-2xl font-bold mb-6">Gestion des Brands</h1>
</div>
@if($brands)
<div
    class="mb-11 flex w-3/3 rounded-lg border-l-[6px] border-warning bg-warning bg-opacity-[15%] px-7 py-8 shadow-md md:p-9"
    >
    <div
    class="mr-5 flex h-9 w-full max-w-[36px] items-center justify-center rounded-lg bg-warning bg-opacity-30"
    >
    <svg
        width="19"
        height="16"
        viewBox="0 0 19 16"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
        d="M1.50493 16H17.5023C18.6204 16 19.3413 14.9018 18.8354 13.9735L10.8367 0.770573C10.2852 -0.256858 8.70677 -0.256858 8.15528 0.770573L0.156617 13.9735C-0.334072 14.8998 0.386764 16 1.50493 16ZM10.7585 12.9298C10.7585 13.6155 10.2223 14.1433 9.45583 14.1433C8.6894 14.1433 8.15311 13.6155 8.15311 12.9298V12.9015C8.15311 12.2159 8.6894 11.688 9.45583 11.688C10.2223 11.688 10.7585 12.2159 10.7585 12.9015V12.9298ZM8.75236 4.01062H10.2548C10.6674 4.01062 10.9127 4.33826 10.8671 4.75288L10.2071 10.1186C10.1615 10.5049 9.88572 10.7455 9.50142 10.7455C9.11929 10.7455 8.84138 10.5028 8.79579 10.1186L8.13574 4.75288C8.09449 4.33826 8.33984 4.01062 8.75236 4.01062Z"
        fill="#FBBF24"
        />
    </svg>
    </div>
    <div class="w-1/3">
    <h5 class="mb-3 text-lg font-semibold text-[#9D5425]">
        Il y a actuellement {{count($brands)}} Brands
    </h5>
    </div>
</div>
@endif

<a href="{{route('admin-brands-create')}}" class="mb-5 inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    Nouvelle brand
</a>
<div class="flex flex-wrap gap-6">
    @foreach ($brands as $brand)
        <div class="justify-center flex-row p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 flex flex-wrap gap-6">
            <a class="" href="#">
                <h5 class="text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$brand->name}}</h5>
                <img src="/{{$brand->image}}" class="h-10 w-full"></img>
            </a>
            <div class="flex flex-wrap gap-5 mt-3 mb-3">
                <a href="{{route('admin-brands-edit', $brand->id)}}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Modifier
                </a>
                <form action="{{ route('admin-category-delete', $brand->id) }}" method="post" class="inline">
                <a href="{{route('admin-brands-delete', $brand->id)}}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Supprimer
                </a>
                </form>
                <a href="{{ route('admin-brands-show', $brand->id)}}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Voir
                </a>
            </div>
        </div>
        @endforeach
    </div>
@endsection