@props(['user'])

<div style="background-color: {{ $user->profile_color }}"
  {{ $attributes->merge(['class' => 'h-36 w-100 rounded rounded-b-none flex justify-end items-start']) }}>
  <input type="color" name="profile_color" value="{{ old('profile_color', $user->profile_color) }}" class="m-5">
</div>
