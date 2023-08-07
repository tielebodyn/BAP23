@vite('resources/js/components/sidebar.js')
<button id="sidebar-toggle" type="button" class="p-3 mt-2 ml-3 fixed bg-violet-400 rounded-lg">
  <x-svg icon="menu" size="24" fill="white" />
</button>
<aside id="sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
  aria-label="Sidebar">
  <div class="h-full py-4 bg-white flex flex-col justify-between border-r border-gray-200">
    <div>
      <ul class="mt-10">
        <x-navigation.nav-item text="Home" icon="trash" route="start" />
        <x-navigation.nav-item text="Profiel" icon="user" route="profile.edit" />
      </ul>
@include('layouts.partials.group-dropdown')
      @if (isset($group))
        <ul>
          <x-navigation.nav-item text="Dashboard" icon="stack" route="group.dashboard" :$group />
          <x-navigation.nav-item text="Kaart" icon="location" route="map" />
          <x-navigation.nav-item text="Aanbiedingen" icon="shopping-cart" route="offers" />
          <x-navigation.nav-item text="Transacties" icon="bank" route="transactions" />
          <x-navigation.nav-item text="Leden" icon="group" route="group.members" last={{ true }}
            :$group />
        </ul>
      @endif
    </div>
    <x-buttons.logout />
  </div>
</aside>
