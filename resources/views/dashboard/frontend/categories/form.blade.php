<x-dashboard.template.form :$name :$routeList :$model>
    <x-forms.input name="name" label="name" icon="fas fa-pen-nib" malti_lang="false" required/>
    <x-forms.input name="slug" label="slug" icon="fas fa-pen-nib" malti_lang="false" required/>
    <x-forms.active-switch name="status" label="status" icon="fa-file-alt" />
    <x-forms.dropzone name="image" id="image" label="{{__('image')}}" types=".png, .jpg, .jpeg, .gif" maxFileSizeMb="1" maxFiles="3" :mediaFiles="$model?->getMedia('image')"/>
</x-dashboard.template.form>

