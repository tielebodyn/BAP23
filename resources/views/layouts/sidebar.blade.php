@vite('resources/js/components/sidebar.js')

<button id="sidebar-toggle" type="button" class="p-3 fixed w-full top-0 sm:w-0   bg-gray-50 shadow-md flex z-10 items-center">
  @include('components.icons.menu', ['class' => 'fill-slate-800'])
  <x-app-logo class="ml-auto mr-auto" />
</button>
<aside id="sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
  aria-label="Sidebar">
  <div class="h-full py-4 bg-white flex flex-col justify-between border-r border-gray-200">
    <div>
      <div class="mt-5 ">
        <div class="m-5">
          <x-app-logo class="" />
        </div>
        @include('layouts.partials.group-dropdown')

      </div>
      <ul class="mt-10">
        @if (isset($group))
          <x-navigation.nav-item text="Dashboard" icon="stack" route="group.dashboard" :$group />
          <x-navigation.nav-item text="Kaart" icon="location" route="group.map" :$group />
          <x-navigation.nav-item text="Ruilen" icon="shopping-cart" route="group.post.index" :$group />
          <x-navigation.nav-item text="Transacties" icon="bank" route="group.transactions" :$group />
          <x-navigation.nav-item text="Leden" icon="group" route="group.members" last={{ true }} :$group />
        @endif
      </ul>
    </div>
    <div>
      <ul>
        <x-navigation.nav-item text="Mijn Groepen" icon="lightning" route="group.start" :$group notification="{{auth()->user()->groups->where('pivot.status', 'awaiting')->count()}}"/>
        <x-navigation.nav-item text="Profiel" route="profile.show" :$group
          image={{ true }} last={{ true }} />
      </ul>
      <x-buttons.logout />
    </div>
  </div>
</aside>
