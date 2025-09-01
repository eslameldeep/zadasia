<x-dashboard.template.form :$name :$routeList :$model>

    <x-forms.input name="name" label="name" icon="fas fa-pen-nib" malti_lang="false" required/>
    <x-forms.input name="slug" label="slug" icon="fas fa-pen-nib" malti_lang="false" required/>
    <x-forms.textarea name="short_description" label="product description" rows=10 icon="fa-file-alt" malti_lang/>
    <x-forms.textarea name="description" label="page description"  type="tinymce" rows=30 icon="fa-file-alt" malti_lang/>
    <x-forms.select name="category_id" label="category" :options="$categories" :selected="$model?->category?->id" />
    <x-forms.active-switch name="status" label="status" icon="fa-file-alt"/>
    <x-forms.dropzone name="image" id="image" label="{{__('image')}}" types=".png, .jpg, .jpeg, .gif" maxFileSizeMb="1"
                      maxFiles="5" :mediaFiles="$model?->getMedia('image')"/>


    @push('scripts')
        <script>
            function slugify(text) {
                return text
                    .toString()
                    .normalize("NFD")
                    .replace(/[\u0300-\u036f]/g, "")
                    .replace(/[^a-zA-Z0-9\u0600-\u06FF\s-]/g, "")
                    .trim()
                    .replace(/\s+/g, "-")
                    .toLowerCase();
            }

            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("name[en]").addEventListener("input", function () {
                    document.getElementById("slug[en]").value = slugify(this.value);
                });

                document.getElementById("name[ar]").addEventListener("input", function () {
                    document.getElementById("slug[ar]").value = slugify(this.value);
                });
            });
        </script>
    @endpush

</x-dashboard.template.form>

