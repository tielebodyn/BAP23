@props(['count' => 1, 'default' => false])
{{-- <input
  {{ $attributes->merge(['class' => 'mt-1 file:cursor-pointer file:p-2 file:text-white file:bg-violet-400 file:border-none file:rounded-lg block text-sm text-black rounded-lg cursor-pointer bg-gray-200 focus:outline-none']) }}
  aria-describedby="file_input_help" id="file_input" accept=".jpeg, .png, .jpg, .gif, .svg" type="file">
 --}}
<div class="js-file-input-wrapper">
  <div class="mb-2">
    <span class="sr-only">afbeelding kiezen</span>
    <div
      class="preview-wrapper h-fit rounded border grid gap-1 p-2 h-80 @if ($count > 1) grid-cols-2 w-full @else w-1/2 @endif">
      @if ($default)
        <img src="{{ asset($default) }}" class="max-h-40 w-full object-contain js-image-default" alt="">
      @else
        @for ($i = 0; $i < $count; $i++)
          <div class="bg-gray-100 h-40 js-image-default"></div>
        @endfor
      @endif
    </div>
    <input data-max-amount="{{ $count }}" type="file" @if ($count > 1) multiple @endif
      placeholder="kies afbeelding" accept=".jpg, .jpeg, .png, .gif, .svg"
      {{ $attributes->merge(['class' => 'mt-2 js-file-input text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100']) }}
      max="{{ $count }}" />
    <button type="button" class="js-remove-file opacity-30 bg-red-500 py-1 px-2 rounded text-white">leegmaken</button>

    <x-forms.input-error class="mt-2 js-error-message hidden" :messages="['']" />
  </div>
</div>
