<x-forms.input-profile-color :user="$user" />

<div class="max-w-xl space-y-6 p-4 sm:p-8 ">
<x-header description="kies hier je profielfoto" />
<x-forms.input-image name="profile_image" default="{{$user->profile_image}}"/>
<x-forms.input-error class="mt-2" :messages="$errors->get('profile_image')" />
</div>
