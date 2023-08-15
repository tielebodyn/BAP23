<div class="max-w-xl space-y-6 p-4 sm:p-8 ">
  <div>
    <x-forms.input-label for="body" :value="__('Achtergrondkleur')" />
    <div class="flex flex-col">
      <input type="color" name="profile_color" id="body" class="w-20 h-20 my-1"
        value="{{ old('profile_color', $user->profile_color) }}">
      <label for="body" class="w-fit py-2 px-4 bg-violet-400 text-white rounded cursor-pointer hover:bg-violet-500">
        kies
        kleur</label>
    </div>
    <x-forms.input-color :value={{$user->profile_color}} name="profile_color" title="profielkleur" />
    <x-forms.input-error class="mt-1" :messages="$errors->get('color')" />
  </div>
  <x-header description="kies hier je profielfoto" />
  <x-forms.input-image name="profile_image" default="{{ $user->profile_image }}" />
  <x-forms.input-error class="mt-2" :messages="$errors->get('profile_image')" />
</div>
