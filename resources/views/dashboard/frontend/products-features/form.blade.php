<x-dashboard.template.form :$name :$routeList :$model>

    <x-forms.input name="name" label="name" icon="fas fa-pen-nib" malti_lang="false" required/>
    <x-forms.textarea name="description" label="description" rows=10 icon="fa-file-alt" malti_lang />
    <x-forms.active-switch name="status" label="status" icon="fa-file-alt" />
    <x-forms.dropzone name="image" id="image" label="{{__('image')}}" types=".png, .jpg, .jpeg, .gif , .svg" maxFileSizeMb="1" maxFiles="3" :mediaFiles="$model?->getMedia('image')"/>
    
    <x-forms.input name="product_id" value="{{ request('product') }}" type="hidden" label_class="d-none" class="d-none" />

</x-dashboard.template.form>
    
    