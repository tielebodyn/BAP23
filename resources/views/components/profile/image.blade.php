<img
  @if ($user->profile_image) src="{{ asset($user->profile_image) }}"
  @else src="{{ Vite::asset('resources/images/profile.png') }}"
  @endif
  alt="{{ $user->username }}"
    {{ $attributes->merge(['class' => '']) }}
  >
