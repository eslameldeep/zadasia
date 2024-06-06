<x-dashboard.template.form :$name :$routeList :$model>

    <x-forms.input name="title" label="Title" icon="fas fa-pen-nib" malti_lang="false" required/>
    <x-forms.input name="slogan" label="Slogan" icon="fas fa-pen-nib" malti_lang="false" required/>
    <x-forms.textarea name="short_description" label="short description" rows=15 icon="fa-file-alt" malti_lang />
    <x-forms.textarea name="article" label="Article" type="tinymce" rows=15 icon="fa-file-alt" malti_lang />
    
    <x-forms.active-switch name="status" label="status" icon="fa-file-alt" />
    <x-forms.dropzone name="image" id="image" label="{{__('image')}}" types=".png, .jpg, .jpeg, .gif" maxFileSizeMb="1" maxFiles="3" :mediaFiles="$model?->getMedia('image')"/>
    
</x-dashboard.template.form>
