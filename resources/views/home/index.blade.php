@extends('layouts.app') 
@section('title', $viewData["title"])
@section('content')
@livewire('search-controller')
<div class="row">
<div class="flex items-center justify-center">
  <div class="w-full px-4 py-12 2xl:mx-auto 2xl:container sm:px-6 xl:px-20 2xl:px-0">
    <div class="flex flex-col items-center space-y-10 jusitfy-center">
      <div class="flex flex-col items-center justify-center ">
        <h1 class="text-3xl font-semibold leading-7 text-gray-800 xl:text-4xl xl:leading-9 dark:text-white">Shop By Category</h1>
      </div>
      <div class="grid w-full grid-cols-1 md:grid-cols-2 lg:grid-cols-3 md:gap-x-4 md:gap-x-8">
        <div class="relative flex items-center justify-center w-full h-full group">
          <img class="object-cover object-center w-full h-full" src="https://i.ibb.co/ThPFmzv/omid-armin-m-VSb6-PFk-VXw-unsplash-1-1.png" alt="girl-image" />
          <button class="absolute z-10 py-3 text-base font-medium leading-none text-gray-800 bg-white dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bottom-4 w-36">Women</button>
          <div class="absolute z-0 px-20 py-6 transition duration-500 bg-white bg-opacity-50 opacity-0 group-hover:opacity-100 bottom-3 w-36"></div>
        </div>

        <div class="flex flex-col mt-4 space-y-4 md:space-y-8 md:mt-0">
          <div class="relative flex items-center justify-center w-full h-full group">
            <img class="object-cover object-center w-full h-full" src="https://i.ibb.co/SXZvYHs/irene-kredenets-DDqx-X0-7v-KE-unsplash-1.png" alt="shoe-image" />
            <button class="absolute z-10 py-3 text-base font-medium leading-none text-gray-800 bg-white dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bottom-4 w-36">Shoes</button>
            <div class="absolute z-0 px-20 py-6 transition duration-500 bg-white bg-opacity-50 opacity-0 group-hover:opacity-100 bottom-3 w-36"></div>
          </div>
          <div class="relative flex items-center justify-center w-full h-full group">
            <img class="object-cover object-center w-full h-full" src="https://i.ibb.co/Hd1pVxW/louis-mornaud-Ju-6-TPKXd-Bs-unsplash-1-2.png" alt="watch-image" />
            <button class="absolute z-10 py-3 text-base font-medium leading-none text-gray-800 bg-white dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bottom-4 w-36">Watches</button>
            <div class="absolute z-0 px-20 py-6 transition duration-500 bg-white bg-opacity-50 opacity-0 group-hover:opacity-100 bottom-3 w-36"></div>
          </div>
        </div>

        <div class="relative items-center justify-center hidden w-full h-full group lg:flex">
          <img class="object-cover object-center w-full h-full" src="https://i.ibb.co/PTtRBLL/olive-tatiane-Im-Ez-F9-B91-Mk-unsplash-1.png" alt="girl-image" />
          <button class="absolute z-10 py-3 text-base font-medium leading-none text-gray-800 bg-white dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bottom-4 w-36">Accessories</button>
          <div class="absolute z-0 px-20 py-6 transition duration-500 bg-white bg-opacity-50 opacity-0 group-hover:opacity-100 bottom-3 w-36"></div>
        </div>
        <div class="relative flex items-center justify-center w-full h-full mt-4 group md:hidden md:mt-8 lg:hidden">
          <img class="hidden object-cover object-center w-full h-full md:block" src="https://i.ibb.co/6FjW19n/olive-tatiane-Im-Ez-F9-B91-Mk-unsplash-2.png" alt="girl-image" />
          <img class="object-cover object-center w-full h-full md:hidden" src="https://i.ibb.co/sQgHwHn/olive-tatiane-Im-Ez-F9-B91-Mk-unsplash-1.png" alt="olive-tatiane-Im-Ez-F9-B91-Mk-unsplash-2" />
          <button class="absolute z-10 py-3 text-base font-medium leading-none text-gray-800 bg-white dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bottom-4 w-36">Accessories</button>
          <div class="absolute z-0 px-20 py-6 transition duration-500 bg-white bg-opacity-50 opacity-0 group-hover:opacity-100 bottom-3 w-36"></div>
        </div>
      </div>
      <div class="relative items-center justify-center hidden w-full h-full mt-4 group md:flex md:mt-8 lg:hidden">
        <img class="hidden object-cover object-center w-full h-full md:block" src="https://i.ibb.co/6FjW19n/olive-tatiane-Im-Ez-F9-B91-Mk-unsplash-2.png" alt="girl-image" />
        <img class="object-cover object-center w-full h-full sm:hidden" src="https://i.ibb.co/sQgHwHn/olive-tatiane-Im-Ez-F9-B91-Mk-unsplash-1.png" alt="olive-tatiane-Im-Ez-F9-B91-Mk-unsplash-2" />
        <button class="absolute z-10 py-3 text-base font-medium leading-none text-gray-800 bg-white dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bottom-4 w-36">Accessories</button>
        <div class="absolute z-0 px-20 py-6 transition duration-500 bg-white bg-opacity-50 opacity-0 group-hover:opacity-100 bottom-3 w-36"></div>
      </div>
    </div>
  </div>
</div>
 </div>
@endsection