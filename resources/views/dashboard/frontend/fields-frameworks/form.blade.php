<x-dashboard.template.form :$name :$routeList :$model>

    <x-forms.input name="name" label="name" icon="fas fa-pen-nib" malti_lang="true" required />
    <x-forms.input name="sub_name" label="sub_name" icon="fas fa-pen-nib" malti_lang="true" required />
    <x-forms.textarea name="description" label="description" rows=15 icon="fa-file-alt" malti_lang />
    <x-forms.active-switch name="status" label="status" icon="fa-file-alt" />
    <x-forms.dropzone name="image" id="image" label="{{ __('image') }}" types=".png, .jpg, .jpeg, .gif"
        maxFileSizeMb="2" maxFiles="1" :mediaFiles="$model?->getMedia('image')" />

    <x-forms.input name="field_id" value="{{ request('field') }}" type="hidden" label_class="d-none" class="d-none"
        required />
</x-dashboard.template.form>
