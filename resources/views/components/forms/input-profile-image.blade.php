@props(['user' => null])

<div
  class="{{ isset($user) ?? 'absolute' }}  m-5 top-10  bg-center bg-no-repeat bg-cover w-40 h-40 rounded-full bg-gray-50"
  @if (isset($user)) style="background-image: url('{{ asset(old('profile_image', $user->profile_image)) }}')"> @endif
  </div>
  <div class="p-x4 sm:px-8">
    <label for="files">Afbeelding Kiezen</label>
    <input name="profile_image"
      class="mt-1 file:cursor-pointer file:p-2 file:text-white file:bg-violet-400 file:border-none file:rounded-lg block text-sm text-black rounded-lg cursor-pointer bg-gray-200 focus:outline-none"
      aria-describedby="file_input_help" id="file_input" accept=".jpeg, .png, .jpg, .gif, .svg" type="file">
