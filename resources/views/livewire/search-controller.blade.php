<div>

<form class="flex items-center">   
    <label for="search" class="sr-only">Search</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-900 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input wire:model="search" type="text" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Live Search" required>
        
    </div>

</form>
<ul>    
        
       @if(strlen($search)>= 2 && $searchResults->isEmpty())
            <li class="text-gray-900 dark:text-gray-400">No results found for "{{ $search }}"</li>
        @else
       @foreach($searchResults as $product)
         <li> <img src="{{ asset('/storage/'.$product->getImage()) }}" class="card-img-top img-card" width="100" height="50"> </li> <li> $ {{$product->getPrice() }}</li> <li> <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="text-white btn bg-primary">{{$product->getName()}}</a></li> 
        @endforeach
       @endif
        
    </ul>


  
</div>