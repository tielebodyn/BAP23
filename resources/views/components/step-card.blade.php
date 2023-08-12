
<div class="item1 flex lg:items-center flex-col lg:flex-row space-y-6 lg:space-y-0 space-x-6 mt-20 lg:mt-40">
  <img src="{{ Vite::asset('resources/images/' . $image)}}" alt="home_mockup" class="w-2/3 md:w-1/3 lg:w-1/3 rounded-r-lg shadow-md" />
  <div class="w-fit lg:block rounded-full bg-violet-400 px-4 py-2 text-white hidden lg:block">1</div>
  <div class="w-3/4 md:w-1/4 lg:w-1/3 space-y-2">
    <h1 class="text-4xl font-bold">{{$title}}</h1>
    <p>{{$description}}</p>
  </div>
</div>
