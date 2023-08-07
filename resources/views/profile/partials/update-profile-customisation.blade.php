<x-forms.input-profile-color :user="$user" />
<x-forms.input-profile-image :user="$user" />
<x-forms.input-error class="mt-2" :messages="$errors->get('profile_image')" />
