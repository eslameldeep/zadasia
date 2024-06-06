<x-dashboard.template.form :$name :$routeList :$model>

    <x-forms.input name="name" label="name" icon="fas fa-pen-nib" malti_lang="false" required/>
    <x-forms.input name="sub_name" label="Sub name" icon="fas fa-pen-nib" malti_lang="false" required/>
    <x-forms.input name="slug" label="slug" icon="fas fa-pen-nib" malti_lang="false" required/>
    <x-forms.textarea name="short_description" label="short description" rows=10 icon="fa-file-alt" malti_lang />
    <x-forms.textarea name="description" label="description" rows=10 icon="fa-file-alt" malti_lang />
    <x-forms.textarea name="specs" label="Specs" type="tinymce" rows=15 icon="fa-file-alt" malti_lang />
    <x-forms.active-switch name="status" label="status" icon="fa-file-alt" />
    <x-forms.dropzone name="image" id="image" label="{{__('image')}}" types=".png, .jpg, .jpeg, .gif" maxFileSizeMb="1" maxFiles="1" :mediaFiles="$model?->getMedia('image')"/>
    <x-forms.dropzone name="background" id="background" label="{{__('background')}}" types=".png, .jpg, .jpeg, .gif" maxFileSizeMb="1" maxFiles="1" :mediaFiles="$model?->getMedia('background')"/>
    
</x-dashboard.template.form>
    
    