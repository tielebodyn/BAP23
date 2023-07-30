<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
  type="button"
  class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
  <span class="sr-only">Open sidebar</span>
  <img src={{ asset('storage/icons/menu.svg') }} alt="">
</button>
<aside id="default-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
  aria-label="Sidebar">
  <div class="h-full py-4 overflow-y-auto bg-white flex flex-col  justify-between border-r border-gray2">
    <div class="group">
      <a href="" class="self-baseline text-gray4 flex bg-gray2 m-5 py-3 px-2 rounded-lg justify-between"><img
          class="w-6 rounded" src={{ asset('storage/group-logo.png') }}><img /><span class="pr-5"> Let's gdm </span>
        <x-svg icon="caret-down" size="24" fill="" />
      </a>
      <ul class="space-y-2 font-medium pt-8">
        <x-navigation.nav-item text="Dashboard" icon="stack" route="dashboard" />
        <x-navigation.nav-item text="Profiel" icon="user" route="profile.edit" />
        <x-navigation.nav-item text="Kaart" icon="location" route="map" />
        <x-navigation.nav-item text="Aanbiedingen" icon="shopping-cart" route="aanbiedingen" />
        <x-navigation.nav-item text="Transacties" icon="bank" route="transacties" />
        <x-navigation.nav-item text="Groep" icon="group" route="groep" last={{ true }} />
      </ul>
    </div>
    <x-buttons.logout />
  </div>
</aside>
