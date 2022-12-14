@extends('_layouts.master')

@section('body')

<h1 class="text-2xl font-bold mb-6">Vous modifiez la brand {{$brand->name }}</h1>
@if($errors->all())
<div
class="mb-11 flex w-full rounded-lg border-l-[6px] border-[#F87171] bg-[#F87171] bg-opacity-[15%] px-7 py-8 shadow-md md:p-9"
>
<div
  class="mr-5 flex h-9 w-full max-w-[36px] items-center justify-center rounded-lg bg-[#F87171]"
>
  <svg
    width="13"
    height="13"
    viewBox="0 0 13 13"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
  >
    <path
      d="M6.4917 7.65579L11.106 12.2645C11.2545 12.4128 11.4715 12.5 11.6738 12.5C11.8762 12.5 12.0931 12.4128 12.2416 12.2645C12.5621 11.9445 12.5623 11.4317 12.2423 11.1114C12.2422 11.1113 12.2422 11.1113 12.2422 11.1113C12.242 11.1111 12.2418 11.1109 12.2416 11.1107L7.64539 6.50351L12.2589 1.91221L12.2595 1.91158C12.5802 1.59132 12.5802 1.07805 12.2595 0.757793C11.9393 0.437994 11.4268 0.437869 11.1064 0.757418C11.1063 0.757543 11.1062 0.757668 11.106 0.757793L6.49234 5.34931L1.89459 0.740581L1.89396 0.739942C1.57364 0.420019 1.0608 0.420019 0.740487 0.739944C0.42005 1.05999 0.419837 1.57279 0.73985 1.89309L6.4917 7.65579ZM6.4917 7.65579L1.89459 12.2639L1.89395 12.2645C1.74546 12.4128 1.52854 12.5 1.32616 12.5C1.12377 12.5 0.906853 12.4128 0.758361 12.2645L1.1117 11.9108L0.758358 12.2645C0.437984 11.9445 0.437708 11.4319 0.757539 11.1116C0.757812 11.1113 0.758086 11.111 0.75836 11.1107L5.33864 6.50287L0.740487 1.89373L6.4917 7.65579Z"
      fill="#ffffff"
      stroke="#ffffff"
    />
  </svg>
</div>
<div class="w-full">
  <h5 class="mb-3 text-base font-semibold text-[#B45454]">
    Le champ n'est pas remplis correctement
  </h5>
  <ul class="list-inside list-disc">
    @foreach ($errors->all() as $error)
    <li class="text-base leading-relaxed text-[#CD5D5D]">
        {{ $error }}
    </li>
    @endforeach
  </ul>
</div>
</div>
@endif
<div class="mt-5 md:col-span-2 md:mt-0">
    <form method="POST">
        @csrf
        @method('put')
      <div class="shadow sm:overflow-hidden sm:rounded-md">
        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 sm:col-span-2">
              <label name="title" for="company-website" class="block text-sm font-medium text-gray-700">Nom de la brand</label>
              <div class="mt-1 flex rounded-md shadow-sm">
                <input type="text" name="title" id="title" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="mt-6">
                <label name="picture" class="inline-block mb-2 text-gray-500">Upload
                    Image(jpg,png,svg,jpeg)</label>
                <div class="flex items-center justify-center w-full">
                    <label name ="picture" class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                        <div class="flex flex-col items-center justify-center pt-7">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-12 h-12 text-gray-400 group-hover:text-gray-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                clip-rule="evenodd" />
                            </svg>
                            <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                Select a photo</p>
                            </div>
                        <input name="picture" type="file" class="opacity-0" />
                    </label>
                </div>
            </div>
        </div>
    </div>
    <button class="inline-flex items-center justify-center bg-primary py-4 px-10 text-center text-base font-normal text-white hover:bg-opacity-90 lg:px-8 xl:px-10 rounded-full">
      Valider
    </button>
    </form>
</div>
@endsection