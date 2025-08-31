<x-dashboard.template.form :$name :$routeList :$model>
    <x-forms.input      name="client_name" label="client name"            icon="fas fa-pen-nib" malti_lang="true" required/>
    <x-forms.input      name="client_job_title" label="client job title"  icon="fas fa-pen-nib" malti_lang="true" required/>
    <x-forms.textarea   name="client_review" label="client review"        icon="fas fa-pen-nib" malti_lang="true" rows="5" required/>


    <div class="star-rating">
        @for ($i = 5; $i >= 1; $i--)
            <input
                type="radio"
                id="star{{ $i }}"
                name="stars"
                value="{{ $i }}"
                {{ (old('stars', $model->stars ?? '') == $i) ? 'checked' : '' }}
            >
            <label for="star{{ $i }}">&#9733;</label>
        @endfor
    </div>

    <style>
        .star-rating {
            direction: rtl; /* so higher stars come first */
            display: inline-flex;
        }
        .star-rating input {
            display: none;
        }
        .star-rating label {
            font-size: 2rem;
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s;
        }
        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #f5c518;
        }
    </style>



    <x-forms.active-switch name="status" label="status" icon="fa-file-alt" />
    <x-forms.dropzone name="image" id="image" label="{{__('image')}}" types=".png, .jpg, .jpeg, .gif" maxFileSizeMb="1" maxFiles="1" :mediaFiles="$model?->getMedia('image')"/>

</x-dashboard.template.form>

