<x-dashboard.template.form :$name :$routeList :$model>

@php
// dd($model->getFirstMedia('image')?->getUrl('ddd'));
@endphp
{{-- With colors using data-* config --}}

<x-forms.input name="name" label="name" icon="fas fa-pen-nib" malti_lang="false" required/>
<x-forms.input name="slug" label="slug" icon="fas fa-pen-nib" malti_lang="false" required/>
<x-forms.textarea name="short_description" label="short description" rows=15 icon="fa-file-alt" malti_lang />
<x-forms.textarea name="description" label="description" type="tinymce" rows=15 icon="fa-file-alt" malti_lang />
<x-forms.active-switch name="status" label="status" icon="fa-file-alt" />
<x-forms.dropzone name="image" id="image" label="{{__('image')}}" types=".png, .jpg, .jpeg, .gif" maxFileSizeMb="1" maxFiles="1" :mediaFiles="$model?->getMedia('image')"/>

</x-dashboard.template.form>

