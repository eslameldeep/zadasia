@extends('adminlte::page')

@section('title', 'Examples')

@section('content_header')
    <h1 class="m-0 text-dark">Test plugin</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>


                    {{-- Minimal --}}
                    <x-adminlte-button label="Button"/>

                    {{-- Disabled --}}
                    <x-adminlte-button label="Disabled" theme="dark" disabled/>

                    {{-- Themes + icons --}}
                    <x-adminlte-button label="Primary" theme="primary" icon="fas fa-key"/>
                    <x-adminlte-button label="Secondary" theme="secondary" icon="fas fa-hashtag"/>
                    <x-adminlte-button label="Info" theme="info" icon="fas fa-info-circle"/>
                    <x-adminlte-button label="Warning" theme="warning" icon="fas fa-exclamation-triangle"/>
                    <x-adminlte-button label="Danger" theme="danger" icon="fas fa-ban"/>
                    <x-adminlte-button label="Success" theme="success" icon="fas fa-thumbs-up"/>
                    <x-adminlte-button label="Dark" theme="dark" icon="fas fa-adjust"/>

                    {{-- Types --}}
                    <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save"/>
                    <x-adminlte-button class="btn-lg" type="reset" label="Reset" theme="outline-danger" icon="fas fa-lg fa-trash"/>
                    <x-adminlte-button class="btn-sm bg-gradient-info" type="button" label="Help" icon="fas fa-lg fa-question"/>

                    {{-- Icons Only --}}
                    <x-adminlte-button theme="primary" icon="fab fa-fw fa-lg fa-facebook-f"/>
                    <x-adminlte-button theme="info" icon="fab fa-fw fa-lg fa-twitter"/>



                    {{-- Minimal --}}
                    <x-adminlte-input name="iBasic"/>

                    {{-- Email type --}}
                    <x-adminlte-input name="iMail" type="email" placeholder="mail@example.com"/>

                    {{-- With label, invalid feedback disabled and form group class --}}
                    <div class="row">
                        <x-adminlte-input name="iLabel" label="Label" placeholder="placeholder"
                            fgroup-class="col-md-6" disable-feedback/>
                    </div>

                    {{-- With prepend slot --}}
                    <x-adminlte-input name="iUser" label="User" placeholder="username" label-class="text-lightblue">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    {{-- With append slot, number type and sm size --}}
                    <x-adminlte-input name="iNum" label="Number" placeholder="number" type="number"
                        igroup-size="sm" min=1 max=10>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-hashtag"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    {{-- With a link on the bottom slot and old support enabled --}}
                    <x-adminlte-input name="iPostalCode" label="Postal Code" placeholder="postal code"
                        enable-old-support>
                        <x-slot name="prependSlot">
                            <div class="input-group-text text-olive">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                        </x-slot>
                        <x-slot name="bottomSlot">
                            <a href="#">Search your postal code here</a>
                        </x-slot>
                    </x-adminlte-input>

                    {{-- With extra information on the bottom slot --}}
                    <x-adminlte-input name="iExtraAddress" label="Other Address Data">
                        <x-slot name="prependSlot">
                            <div class="input-group-text text-purple">
                                <i class="fas fa-address-card"></i>
                            </div>
                        </x-slot>
                        <x-slot name="bottomSlot">
                            <span class="text-sm text-gray">
                                [Add other address information you may consider important]
                            </span>
                        </x-slot>
                    </x-adminlte-input>

                    {{-- With multiple slots and lg size --}}
                    <x-adminlte-input name="iSearch" label="Search" placeholder="search" igroup-size="lg">
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="outline-danger" label="Go!"/>
                        </x-slot>
                        <x-slot name="prependSlot">
                            <div class="input-group-text text-danger">
                                <i class="fas fa-search"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>



                    <h1>InputFile</h1>
                    @section('plugins.BsCustomFileInput', true)
                    {{-- Minimal --}}
                    <x-adminlte-input-file name="ifMin"/>

                    {{-- Placeholder, sm size and prepend icon --}}
                    <x-adminlte-input-file name="ifPholder" igroup-size="sm" placeholder="Choose a file...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-upload"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-file>

                    {{-- With label and feedback disabled --}}
                    <x-adminlte-input-file name="ifLabel" label="Upload file" placeholder="Choose a file..."
                        disable-feedback/>

                    {{-- With multiple slots and multiple files --}}
                    <x-adminlte-input-file id="ifMultiple" name="ifMultiple[]" label="Upload files"
                        placeholder="Choose multiple files..." igroup-size="lg" legend="Choose" multiple>
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="primary" label="Upload"/>
                        </x-slot>
                        <x-slot name="prependSlot">
                            <div class="input-group-text text-primary">
                                <i class="fas fa-file-upload"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-file>



                    {{-- Options with empty option --}}
                    <x-adminlte-options :options="['Option 1', 'Option 2', 'Option 3']"
                    disabled="1" empty-option="Select an option..."/>

                    {{-- Options with placeholder --}}
                    <x-adminlte-options :options="['Option 1', 'Option 2', 'Option 3']"
                    disabled="1" placeholder="Select an option..."/>



                    {{-- Example with empty option (for Select) --}}
                    <x-adminlte-select name="optionsTest1">
                        <x-adminlte-options :options="['Option 1', 'Option 2', 'Option 3']" disabled="1"
                            empty-option="Select an option..."/>
                    </x-adminlte-select>

                    {{-- Example with placeholder (for Select) --}}
                    <x-adminlte-select name="optionsTest2">
                        <x-adminlte-options :options="['Option 1', 'Option 2', 'Option 3']" disabled="1"
                            placeholder="Select an option..."/>
                    </x-adminlte-select>

                    {{-- Example with empty option (for Select2) --}}
                    <x-adminlte-select2 name="optionsVehicles" igroup-size="lg" label-class="text-lightblue"
                        data-placeholder="Select an option...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-car-side"></i>
                            </div>
                        </x-slot>
                        <x-adminlte-options :options="['Car', 'Truck', 'Motorcycle']" empty-option/>
                    </x-adminlte-select2>

                    {{-- Example with multiple selections (for Select) --}}
                    @php
                        $options = ['s' => 'Spanish', 'e' => 'English', 'p' => 'Portuguese'];
                        $selected = ['s','e'];
                    @endphp
                    <x-adminlte-select id="optionsLangs" name="optionsLangs[]" label="Languages"
                        label-class="text-danger" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-red">
                                <i class="fas fa-lg fa-language"></i>
                            </div>
                        </x-slot>
                        <x-adminlte-options :options="$options" :selected="$selected"/>
                    </x-adminlte-select>

                    {{-- Example with multiple selections (for SelectBs) --}}
                    @php
                        $config = [
                            "title" => "Select multiple options...",
                            "liveSearch" => true,
                            "liveSearchPlaceholder" => "Search...",
                            "showTick" => true,
                            "actionsBox" => true,
                        ];
                    @endphp
                    <x-adminlte-select-bs id="optionsCategory" name="optionsCategory[]" label="Categories"
                        label-class="text-danger" :config="$config" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-red">
                                <i class="fas fa-tag"></i>
                            </div>
                        </x-slot>
                        <x-adminlte-options :options="['News', 'Sports', 'Science', 'Games']"/>
                    </x-adminlte-select-bs>




                    {{-- Minimal --}}
                    <x-adminlte-select name="selBasic">
                        <option>Option 1</option>
                        <option disabled>Option 2</option>
                        <option selected>Option 3</option>
                    </x-adminlte-select>

                    {{-- Disabled --}}
                    <x-adminlte-select name="selDisabled" disabled>
                        <option>Option 1</option>
                        <option>Option 2</option>
                    </x-adminlte-select>

                    {{-- With prepend slot, lg size, and label --}}
                    <x-adminlte-select name="selVehicle" label="Vehicle" label-class="text-lightblue"
                        igroup-size="lg">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-car-side"></i>
                            </div>
                        </x-slot>
                        <option>Vehicle 1</option>
                        <option>Vehicle 2</option>
                    </x-adminlte-select>

                    {{-- With multiple slots and multiple options --}}
                    <x-adminlte-select id="selUser" name="selUser[]" label="User" label-class="text-danger" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-red">
                                <i class="fas fa-lg fa-user"></i>
                            </div>
                        </x-slot>
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger"/>
                        </x-slot>
                        <option>Admin</option>
                        <option>Guest</option>
                    </x-adminlte-select>


                    {{-- important --}}
                    @section('plugins.Select2', true)

                    {{-- Minimal --}}
                    <x-adminlte-select2 name="sel2Basic">
                        <option>Option 1aa</option>
                        <option disabled>Option 2</option>
                        <option selected>Option 3</option>
                    </x-adminlte-select2>

                    {{-- Disabled --}}
                    <x-adminlte-select2 name="sel2Disabled" disabled>
                        <option>Option 1aa</option>
                        <option>Option 2</option>
                    </x-adminlte-select2>

                    {{-- With prepend slot, label and data-placeholder config --}}
                    <x-adminlte-select2 name="sel2Vehicle" label="Vehicle" label-class="text-lightblue"
                        igroup-size="lg" data-placeholder="Select an option...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-car-side"></i>
                            </div>
                        </x-slot>
                        <option/>
                        <option>Vehicle 1aa</option>
                        <option>Vehicle 2</option>
                    </x-adminlte-select2>

                    {{-- With multiple slots, and plugin config parameter --}}
                    @php
                        $config = [
                            "placeholder" => "Select multiple options...",
                            "allowClear" => true,
                        ];
                    @endphp
                   
                    <x-adminlte-select2 id="sel2Category" name="sel2Category[]" label="Categories"
                        label-class="text-danger" igroup-size="sm" :config="$config" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-red">
                                <i class="fas fa-tag"></i>
                            </div>
                        </x-slot>
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger"/>
                        </x-slot>
                        <option>Sportsa</option>
                        <option>News</option>
                        <option>Games</option>
                        <option>Science</option>
                        <option>Maths</option>
                    </x-adminlte-select2>




                    {{-- Minimal with placeholder --}}
                    <x-adminlte-textarea name="taBasic" placeholder="Insert description..."/>

                    {{-- Disabled --}}
                    <x-adminlte-textarea name="taDisabled" disabled>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis nibh massa.
                    </x-adminlte-textarea>

                    {{-- With prepend slot, sm size and label --}}
                    <x-adminlte-textarea name="taDesc" label="Description" rows=5 label-class="text-warning"
                        igroup-size="sm" placeholder="Insert description...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-lg fa-file-alt text-warning"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-textarea>

                    {{-- With slots, sm size and feedback disabled --}}
                    <x-adminlte-textarea name="taMsg" label="Message" rows=5 igroup-size="sm"
                        label-class="text-primary" placeholder="Write your message..." disable-feedback>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-lg fa-comment-dots text-primary"></i>
                            </div>
                        </x-slot>
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="primary" icon="fas fa-paper-plane" label="Send"/>
                        </x-slot>
                    </x-adminlte-textarea>




                    @section('plugins.DateRangePicker', true)
                    {{-- Minimal --}}
                    <x-adminlte-date-range name="drBasic"/>

                    {{-- Disabled with predefined config --}}
                    @php
                    $config = [
                        "timePicker" => true,
                        "startDate" => "js:moment().subtract(6, 'days')",
                        "endDate" => "js:moment()",
                        "locale" => ["format" => "YYYY-MM-DD HH:mm"],
                    ];
                    @endphp
                    <x-adminlte-date-range name="drDisabled" :config="$config" disabled/>

                    {{-- Prepend slot and custom ranges enables --}}
                    <x-adminlte-date-range name="drCustomRanges" enable-default-ranges="Last 30 Days">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-date-range>

                    {{-- Label and placeholder --}}
                    <x-adminlte-date-range name="drPlaceholder" placeholder="Select a date range..."
                        label="Date Range">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-danger">
                                <i class="far fa-lg fa-calendar-alt"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-date-range>
                    @push('js')<script>$(() => $("#drPlaceholder").val(''))</script>@endpush

                    {{-- SM size with single date/time config --}}
                    @php
                    $config = [
                        "singleDatePicker" => true,
                        "showDropdowns" => true,
                        "startDate" => "js:moment()",
                        "minYear" => 2000,
                        "maxYear" => "js:parseInt(moment().format('YYYY'),10)",
                        "timePicker" => true,
                        "timePicker24Hour" => true,
                        "timePickerSeconds" => true,
                        "cancelButtonClasses" => "btn-danger",
                        "locale" => ["format" => "YYYY-MM-DD HH:mm:ss"],
                    ];
                    @endphp
                    <x-adminlte-date-range name="drSizeSm" label="Date/Time" igroup-size="sm" :config="$config">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-date-range>

                    {{-- LG size with some config and add-ons --}}
                    @php
                    $config = [
                        "showDropdowns" => true,
                        "startDate" => "js:moment()",
                        "endDate" => "js:moment().subtract(1, 'days')",
                        "minYear" => 2000,
                        "maxYear" => "js:parseInt(moment().format('YYYY'),10)",
                        "timePicker" => true,
                        "timePicker24Hour" => true,
                        "timePickerIncrement" => 30,
                        "locale" => ["format" => "YYYY-MM-DD HH:mm"],
                        "opens" => "center",
                    ];
                    @endphp
                    <x-adminlte-date-range name="drSizeLg" label="Date/Time Range" label-class="text-primary"
                        igroup-size="lg" :config="$config">
                        <x-slot name="prependSlot">
                            <div class="input-group-text text-primary">
                                <i class="fas fa-lg fa-calendar-alt"></i>
                            </div>
                        </x-slot>
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="outline-primary" label="Review" icon="fas fa-lg fa-clipboard-check"/>
                        </x-slot>
                    </x-adminlte-date-range>


                    <h1>Input date</h1>
                    @section('plugins.TempusDominusBs4', true)
                    {{-- Minimal --}}
                    <x-adminlte-input-date name="idBasic"/>

                    {{-- Disabled with predefined value --}}
                    @php
                    $config = ['format' => 'YYYY-MM-DD'];
                    @endphp
                    <x-adminlte-input-date name="idDisabled" value="2020-10-04" :config="$config" disabled/>

                    {{-- Placeholder, time only and prepend icon --}}
                    @php
                    $config = ['format' => 'LT'];
                    @endphp
                    <x-adminlte-input-date name="idTimeOnly" :config="$config" placeholder="Choose a time...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>

                    {{-- Placeholder, date only and append icon --}}
                    @php
                    $config = ['format' => 'L'];
                    @endphp
                    <x-adminlte-input-date name="idDateOnly" :config="$config" placeholder="Choose a date...">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-gradient-danger">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>

                    {{-- With Label --}}
                    @php
                    $config = ['format' => 'DD/MM/YYYY HH:mm'];
                    @endphp
                    <x-adminlte-input-date name="idLabel" :config="$config" placeholder="Choose a date..."
                        label="Datetime" label-class="text-primary">
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="outline-primary" icon="fas fa-lg fa-birthday-cake"
                                title="Set to Birthday"/>
                        </x-slot>
                    </x-adminlte-input-date>

                    {{-- SM size, restricted to current month and week days --}}
                    @php
                    $config = [
                        'format' => 'YYYY-MM-DD HH.mm',
                        'dayViewHeaderFormat' => 'MMM YYYY',
                        'minDate' => "js:moment().startOf('month')",
                        'maxDate' => "js:moment().endOf('month')",
                        'daysOfWeekDisabled' => [0, 6],
                    ];
                    @endphp
                    <x-adminlte-input-date name="idSizeSm" label="Working Datetime" igroup-size="sm"
                        :config="$config" placeholder="Choose a working day...">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>

                    {{-- LG size with multiple datetimes --}}
                    @php
                    $config = [
                        'allowMultidate' => true,
                        'multidateSeparator' => ',',
                        'format' => 'DD MMM YYYY',
                    ];
                    @endphp
                    <x-adminlte-input-date name="idSizeLg" label="Multiple Datetimes" label-class="text-danger"
                        igroup-size="lg" placeholder="Multidate..." :config="$config">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-white">
                                <i class="far fa-lg fa-calendar-alt text-danger"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>


                    <h1>Files</h1>
                    @section('plugins.KrajeeFileinput', true)
                    {{-- Basic --}}
                    <x-adminlte-input-file-krajee name="kifBasic"/>

                    {{-- With placeholder, SM size multiple and data-* options --}}
                    <x-adminlte-input-file-krajee id="kifPholder" name="kifPholder[]"
                        igroup-size="sm" data-msg-placeholder="Choose multiple files..."
                        data-show-cancel="false" data-show-close="false" multiple/>

                    {{-- With a label, some plugin config, and error feedback disabled --}}
                    @php
                    $config = [
                        'allowedFileTypes' => ['text', 'office', 'pdf'],
                        'browseOnZoneClick' => true,
                        'theme' => 'explorer-fa5',
                    ];
                    @endphp
                    <x-adminlte-input-file-krajee name="kifLabel" label="Upload document file"
                        data-msg-placeholder="Choose a text, office or pdf file..."
                        label-class="text-primary" :config="$config" disable-feedback/>

                    {{-- With the avatar preset-mode --}}
                    <x-adminlte-input-file-krajee name="kifAvatar" label="Set Profile Picture"
                        preset-mode="avatar"/>

                    {{-- With the minimalist preset-mode --}}
                    <x-adminlte-input-file-krajee name="kifMinimalist" label="Choose a file"
                        preset-mode="minimalist"/>

                    
                    <h1>slider</h1>
                    @section('plugins.BootstrapSlider', true)
                    {{-- Minimal --}}
                    <x-adminlte-input-slider name="isMin"/>

                    {{-- Disabled --}}
                    <x-adminlte-input-slider name="isDisabled" disabled/>

                    {{-- With min, max, step and value --}}
                    <x-adminlte-input-slider name="isMinMax" min=5 max=15 step=0.5 value=11.5 color="purple"/>

                    {{-- Label, prepend icon and sm size --}}
                    <x-adminlte-input-slider name="isSizeSm" label="Slider" igroup-size="sm"
                        color="#3c8dbc" data-slider-handle="square">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-sliders-h"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-slider>

                    {{-- With slots, range mode and lg size --}}
                    @php
                    $config = [
                        'handle' => 'square',
                        'range' => true,
                        'value' => [3, 8],
                    ];
                    @endphp
                    <x-adminlte-input-slider name="isSizeLg" label="Range" size="lg"
                        color="orange" label-class="text-orange" :config="$config">
                        <x-slot name="prependSlot">
                            <x-adminlte-button theme="warning" icon="fas fa-minus" title="Decrement"/>
                        </x-slot>
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="warning" icon="fas fa-plus" title="Increment"/>
                        </x-slot>
                    </x-adminlte-input-slider>

                    {{-- Vertical slider with ticks --}}
                    @php
                    $config = [
                        'value' => 150,
                        'orientation' => 'vertical',
                        'ticks' => [0, 100, 200, 300],
                        'ticks_labels' => ['$0', '$100', '$200', '$300'],
                    ];
                    @endphp
                    <x-adminlte-input-slider name="isVertical" label="Vertical" color="#77dd77"
                        label-class="text-olive" :config="$config"/>

                    <h1>switch</h1>
                    @section('plugins.BootstrapSwitch', true)
                    {{-- Minimal --}}
                    <x-adminlte-input-switch name="iswMin"/>

                    {{-- Disabled --}}
                    <x-adminlte-input-switch name="iswDisabled" disabled/>

                    {{-- With colors using data-* config --}}
                    <x-adminlte-input-switch name="iswColor" data-on-color="success" data-off-color="danger" checked/>

                    {{-- With custom text using data-* config --}}
                    <x-adminlte-input-switch name="iswText" data-on-text="YES" data-off-text="NO"
                        data-on-color="teal" checked/>

                    {{-- Label, and prepend icon --}}
                    <x-adminlte-input-switch name="iswPrepend" label="Switch">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-toggle-on"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-switch>

                    {{-- Label, slots and lg size --}}
                    @php
                    $config = [
                        'onColor' => 'orange',
                        'offColor' => 'dark',
                        'inverse' => true,
                        'animate' => false,
                        'state' => true,
                        'labelText' => '<i class="fas fa-2x fa-fw fa-lightbulb text-orange"></i>',
                    ];
                    @endphp
                    <x-adminlte-input-switch name="iswSizeLG" label="Switch LG" igroup-size="lg"
                        :config="$config">
                        <x-slot name="appendSlot">
                            <x-adminlte-button icon="fas fa-caret-right" title="On"/>
                        </x-slot>
                        <x-slot name="prependSlot">
                            <x-adminlte-button icon="fas fa-caret-left" title="Off"/>
                        </x-slot>
                    </x-adminlte-input-switch>

                    {{-- Indeterminate with icon and SM size --}}
                    @php
                    $config = [
                        'onColor' => 'indigo',
                        'offColor' => 'gray',
                        'onText' => '1',
                        'offText' => '0',
                        'indeterminate' => true,
                        'labelText' => '<i class="fas fa-power-off text-muted"></i>',
                    ];
                    @endphp
                    <x-adminlte-input-switch name="iswSizeSM" label="Switch SM (indeterminate)"
                        igroup-size="sm" :config="$config"/>



                    <h1>SelectBs</h1>
                    @section('plugins.BootstrapSelect', true)
                    {{-- Minimal --}}
                    <x-adminlte-select-bs name="selBsBasic">
                        <option>Option 1</option>
                        <option disabled>Option 2</option>
                        <option selected>Option 3</option>
                    </x-adminlte-select-bs>

                    {{-- Disabled --}}
                    <x-adminlte-select-bs name="selBsDisabled" disabled>
                        <option>Option 1</option>
                        <option>Option 2</option>
                    </x-adminlte-select-bs>

                    {{-- With prepend slot, label and data-* config --}}
                    <x-adminlte-select-bs name="selBsVehicle" label="Vehicle" label-class="text-lightblue"
                        igroup-size="lg" data-title="Select an option..." data-live-search
                        data-live-search-placeholder="Search..." data-show-tick>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-car-side"></i>
                            </div>
                        </x-slot>
                        <option data-icon="fa fa-fw fa-car">Car</option>
                        <option data-icon="fa fa-fw fa-motorcycle">Motorcycle</option>
                    </x-adminlte-select-bs>

                    {{-- With multiple slots, plugin config parameter and custom options --}}
                    @php
                        $config = [
                            "title" => "Select multiple options...",
                            "liveSearch" => true,
                            "liveSearchPlaceholder" => "Search...",
                            "showTick" => true,
                            "actionsBox" => true,
                        ];
                    @endphp
                    <x-adminlte-select-bs id="selBsCategory" name="selBsCategory[]" label="Categories"
                        label-class="text-danger" igroup-size="sm" :config="$config" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-red">
                                <i class="fas fa-tag"></i>
                            </div>
                        </x-slot>
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger"/>
                        </x-slot>
                        <option data-icon="fa fa-fw fa-running text-info" data-subtext="Running">Sports</option>
                        <option data-icon="fa fa-fw fa-futbol text-info" data-subtext="Futbol">Sports</option>
                        <option data-icon="fa fa-fw fa-newspaper text-danger">News</option>
                        <option data-icon="fa fa-fw fa-gamepad text-warning">Games</option>
                        <option data-icon="fa fa-fw fa-flask text-primary">Science</option>
                        <option data-icon="fa fa-fw fa-calculator text-dark">Maths</option>
                    </x-adminlte-select-bs>


                    <h1>Text Editor</h1>
                    @section('plugins.Summernote', true)
                    {{-- Minimal --}}
                    <x-adminlte-text-editor name="teBasic"/>

                    {{-- Disabled with content --}}
                    <x-adminlte-text-editor name="teDisabled" disabled>
                        <b>Lorem ipsum dolor sit amet</b>, consectetur adipiscing elit.
                        <br>
                        <i>Aliquam quis nibh massa.</i>
                    </x-adminlte-text-editor>

                    {{-- With placeholder, sm size, label and some configuration --}}
                    @php
                    $config = [
                        "height" => "100",
                        "toolbar" => [
                            // [groupName, [list of button]]
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough', 'superscript', 'subscript']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']],
                        ],
                    ]
                    @endphp
                    <x-adminlte-text-editor name="teConfig" label="WYSIWYG Editor" label-class="text-danger"
                        igroup-size="sm" placeholder="Write some text..." :config="$config"/>



                <h1>Modal</h1>
                    {{-- Minimal --}}
                    <x-adminlte-modal id="modalMin" title="Minimal"/>
                    {{-- Example button to open modal --}}
                    <x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalMin"/>

                    {{-- Themed --}}
                    <x-adminlte-modal id="modalPurple" title="Theme Purple" theme="purple"
                    icon="fas fa-bolt" size='lg' disable-animations>
                    This is a purple theme modal without animations.
                    </x-adminlte-modal>
                    {{-- Example button to open modal --}}
                    <x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalPurple" class="bg-purple"/>

                    {{-- Custom --}}
                    <x-adminlte-modal id="modalCustom" title="Account Policy" size="lg" theme="teal"
                    icon="fas fa-bell" v-centered static-backdrop scrollable>
                    <div style="height:800px;">Read the account policies...</div>
                    <x-slot name="footerSlot">
                        <x-adminlte-button class="mr-auto" theme="success" label="Accept"/>
                        <x-adminlte-button theme="danger" label="Dismiss" data-dismiss="modal"/>
                    </x-slot>
                    </x-adminlte-modal>
                    {{-- Example button to open modal --}}
                    <x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalCustom" class="bg-teal"/>



                    <h1>Alert</h1>
                    {{-- Minimal --}}
                    <x-adminlte-alert>Minimal example</x-adminlte-alert>

                    {{-- Minimal with title and dismissable --}}
                    <x-adminlte-alert title="Well done!" dismissable>
                        Minimal example
                    </x-adminlte-alert>

                    {{-- Minimal with icon only --}}
                    <x-adminlte-alert icon="fas fa-user">
                        User has logged in!
                    </x-adminlte-alert>

                    {{-- Themes --}}
                    <x-adminlte-alert theme="light" title="Tip">
                        Light theme alert!
                    </x-adminlte-alert>
                    <x-adminlte-alert theme="dark" title="Important">
                        Dark theme alert!
                    </x-adminlte-alert>
                    <x-adminlte-alert theme="primary" title="Primary Notification">
                        Primary theme alert!
                    </x-adminlte-alert>
                    <x-adminlte-alert theme="secondary" icon="" title="Secondary Notification">
                        Secondary theme alert!
                    </x-adminlte-alert>
                    <x-adminlte-alert theme="info" title="Info">
                        Info theme alert!
                    </x-adminlte-alert>
                    <x-adminlte-alert theme="success" title="Success">
                        Success theme alert!
                    </x-adminlte-alert>
                    <x-adminlte-alert theme="warning" title="Warning">
                        Warning theme alert!
                    </x-adminlte-alert>
                    <x-adminlte-alert theme="danger" title="Danger">
                        Danger theme alert!
                    </x-adminlte-alert>

                    {{-- Custom --}}
                    <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Done" dismissable>
                        Your payment was complete!
                    </x-adminlte-alert>



                    <h1>callout</h1>
                    {{-- Minimal --}}
                    <x-adminlte-callout>Minimal example</x-adminlte-callout>

                    {{-- themes --}}
                    <x-adminlte-callout theme="info" title="Information">
                        Info theme callout!
                    </x-adminlte-callout>
                    <x-adminlte-callout theme="success" title="Success">
                        Success theme callout!
                    </x-adminlte-callout>
                    <x-adminlte-callout theme="warning" title="Warning">
                        Warning theme callout!
                    </x-adminlte-callout>
                    <x-adminlte-callout theme="danger" title="Danger">
                        Danger theme callout!
                    </x-adminlte-callout>

                    {{-- Custom --}}
                    <x-adminlte-callout theme="success" class="bg-teal" icon="fas fa-lg fa-thumbs-up" title="Done">
                        <i class="text-dark">Your payment was complete!</i>
                    </x-adminlte-callout>
                    <x-adminlte-callout theme="danger" title-class="text-danger text-uppercase"
                        icon="fas fa-lg fa-exclamation-circle" title="Payment Error">
                        <i>There was an error on the payment procedure!</i>
                    </x-adminlte-callout>
                    <x-adminlte-callout theme="info" class="bg-gradient-info" title-class="text-bold text-dark"
                        icon="fas fa-lg fa-bell text-dark" title="Notification">
                        This is a notification.
                    </x-adminlte-callout>
                    <x-adminlte-callout theme="danger" class="bg-gradient-pink" title-class="text-uppercase"
                        icon="fas fa-lg fa-leaf text-purple" title="observation">
                        <i>A styled observation for the user.</i>
                    </x-adminlte-callout>


                    <h1>card</h1>
                    {{-- Minimal with a title / no body --}}
                    <x-adminlte-card title="A card without body"/>

                    {{-- Minimal without header / body only --}}
                    <x-adminlte-card theme="lime" theme-mode="outline">
                        A card without header...
                    </x-adminlte-card>

                    {{-- Disabled --}}
                    <x-adminlte-card title="Disabled Card" theme="teal" disabled>
                        A disabled card with teal theme...
                    </x-adminlte-card>

                    {{-- Themes --}}
                    <x-adminlte-card title="Dark Card" theme="dark" icon="fas fa-lg fa-moon">
                        A dark theme card...
                    </x-adminlte-card>
                    <x-adminlte-card title="Lightblue Card" theme="lightblue" theme-mode="outline"
                        icon="fas fa-lg fa-envelope" header-class="text-uppercase rounded-bottom border-info"
                        removable>
                        A removable card with outline lightblue theme...
                    </x-adminlte-card>
                    <x-adminlte-card title="Purple Card" theme="purple" icon="fas fa-lg fa-fan" removable collapsible>
                        A removable and collapsible card with purple theme...
                    </x-adminlte-card>
                    <x-adminlte-card title="Success Card" theme="success" theme-mode="full" icon="fas fa-lg fa-thumbs-up"
                        collapsible="collapsed">
                        A collapsible card with full success theme and collapsed...
                    </x-adminlte-card>
                    <x-adminlte-card title="Info Card" theme="info" icon="fas fa-lg fa-bell" collapsible removable maximizable>
                        An info theme card with all the tool buttons...
                    </x-adminlte-card>

                    {{-- Complex / Extra tool / Footer --}}
                    <x-adminlte-card title="Form Card" theme="maroon" theme-mode="outline"
                        class="elevation-3" body-class="bg-maroon" header-class="bg-light"
                        footer-class="bg-maroon border-top rounded border-light"
                        icon="fas fa-lg fa-bell" collapsible removable maximizable>
                        <x-slot name="toolsSlot">
                            <select class="custom-select w-auto form-control-border bg-light">
                                <option>Skin 1</option>
                                <option>Skin 2</option>
                                <option>Skin 3</option>
                            </select>
                        </x-slot>
                        <x-adminlte-input name="User" placeholder="Username"/>
                        <x-adminlte-input name="Pass" type="password" placeholder="Password"/>
                        <x-slot name="footerSlot">
                            <x-adminlte-button class="d-flex ml-auto" theme="light" label="submit"
                                icon="fas fa-sign-in"/>
                        </x-slot>
                    </x-adminlte-card>


                    <h1>Info Box </h1>

                    {{-- Minimal with title, text and icon --}}
                    <x-adminlte-info-box title="Title" text="some text" icon="far fa-lg fa-star"/>

                    {{-- Themes --}}
                    <x-adminlte-info-box title="Views" text="424" icon="fas fa-lg fa-eye text-dark" theme="gradient-teal"/>

                    <x-adminlte-info-box title="Downloads" text="1205" icon="fas fa-lg fa-download" icon-theme="purple"/>

                    <x-adminlte-info-box title="528" text="User Registrations" icon="fas fa-lg fa-user-plus text-primary"
                        theme="gradient-primary" icon-theme="white"/>

                    <x-adminlte-info-box title="Tasks" text="75/100" icon="fas fa-lg fa-tasks text-orange" theme="warning"
                        icon-theme="dark" progress=75 progress-theme="dark"
                        description="75% of the tasks have been completed"/>

                    {{-- Updatable --}}
                    <x-adminlte-info-box title="Reputation" text="0/1000" icon="fas fa-lg fa-medal text-dark"
                        theme="danger" id="ibUpdatable" progress=0 progress-theme="teal"
                        description="0% reputation completed to reach next level"/>

                    @push('js')
                    <script>

                        $(document).ready(function() {

                            let iBox = new _AdminLTE_InfoBox('ibUpdatable');

                            let updateIBox = () =>
                            {
                                // Update data.
                                let rep = Math.floor(1000 * Math.random());
                                let idx = rep < 100 ? 0 : (rep > 500 ? 2 : 1);
                                let progress = Math.round(rep * 100 / 1000);
                                let text = rep + '/1000';
                                let icon = 'fas fa-lg fa-medal ' + ['text-primary', 'text-light', 'text-warning'][idx];
                                let description = progress + '% reputation completed to reach next level';

                                let data = {text, icon, description, progress};
                                iBox.update(data);
                            };

                            setInterval(updateIBox, 5000);
                        })

                    </script>
                    @endpush


                    <h1>profile wedgit</h1>

                    {{-- Minimal with a name --}}
                    <x-adminlte-profile-widget name="User Name"/>

                    {{-- Themes --}}
                    <x-adminlte-profile-widget name="John Doe" desc="Administrator" theme="teal"
                        img="https://picsum.photos/id/1/100">
                        <x-adminlte-profile-col-item title="Followers" text="125" url="#"/>
                        <x-adminlte-profile-col-item title="Following" text="243" url="#"/>
                        <x-adminlte-profile-col-item title="Posts" text="37" url="#"/>
                    </x-adminlte-profile-widget>

                    <x-adminlte-profile-widget name="Sarah O'Donell" desc="Commercial Manager" theme="primary"
                        img="https://picsum.photos/id/1011/100">
                        <x-adminlte-profile-col-item class="text-primary border-right" icon="fas fa-lg fa-gift"
                            title="Sales" text="25" size=6 badge="primary"/>
                        <x-adminlte-profile-col-item class="text-danger" icon="fas fa-lg fa-users" title="Dependents"
                            text="10" size=6 badge="danger"/>
                    </x-adminlte-profile-widget>

                    <x-adminlte-profile-widget name="Robert Gleeis" desc="Sound Manager" theme="warning"
                        img="https://picsum.photos/id/304/100" header-class="text-left" footer-class="bg-gradient-dark">
                        <x-adminlte-profile-col-item title="I'm also" text="Artist" size=3
                            class="text-orange border-right border-warning"/>
                        <x-adminlte-profile-col-item title="Loves" text="Music" size=6
                            class="text-orange border-right border-warning"/>
                        <x-adminlte-profile-col-item title="Like to" text="Travel" size=3
                            class="text-orange"/>
                    </x-adminlte-profile-widget>

                    <x-adminlte-profile-widget name="Alice Viorich" desc="Community Manager" theme="purple"
                        img="https://picsum.photos/id/454/100" footer-class="bg-gradient-pink">
                        <x-adminlte-profile-col-item icon="fab fa-2x fa-instagram" text="Instagram" badge="purple" size=4/>
                        <x-adminlte-profile-col-item icon="fab fa-2x fa-facebook" text="Facebook" badge="purple" size=4/>
                        <x-adminlte-profile-col-item icon="fab fa-2x fa-twitter" text="Twitter" badge="purple" size=4/>
                    </x-adminlte-profile-widget>

                    {{-- Custom --}}
                    <x-adminlte-profile-widget class="elevation-4" name="Willian Dubling" desc="Web Developer"
                        img="https://picsum.photos/id/177/100" cover="https://picsum.photos/id/541/550/200"
                        header-class="text-white text-right" footer-class='bg-gradient-dark'>
                        <x-adminlte-profile-row-item title="4+ years of experience with"
                            class="text-center border-bottom border-secondary"/>
                        <x-adminlte-profile-col-item title="Javascript" icon="fab fa-2x fa-js text-orange" size=3/>
                        <x-adminlte-profile-col-item title="PHP" icon="fab fa-2x fa-php text-orange" size=3/>
                        <x-adminlte-profile-col-item title="HTML5" icon="fab fa-2x fa-html5 text-orange" size=3/>
                        <x-adminlte-profile-col-item title="CSS3" icon="fab fa-2x fa-css3 text-orange" size=3/>
                        <x-adminlte-profile-col-item title="Angular" icon="fab fa-2x fa-angular text-orange" size=4/>
                        <x-adminlte-profile-col-item title="Bootstrap" icon="fab fa-2x fa-bootstrap text-orange" size=4/>
                        <x-adminlte-profile-col-item title="Laravel" icon="fab fa-2x fa-laravel text-orange" size=4/>
                    </x-adminlte-profile-widget>


                    {{-- Layout Classic / Minimal --}}
                    <x-adminlte-profile-widget name="User Name" layout-type="classic"/>

                    {{-- Layout Classic / Theme --}}
                    <x-adminlte-profile-widget name="John Doe" desc="Administrator" theme="lightblue"
                        img="https://picsum.photos/id/1/100" layout-type="classic">
                        <x-adminlte-profile-row-item icon="fas fa-fw fa-user-friends" title="Followers" text="125"
                            url="#" badge="teal"/>
                        <x-adminlte-profile-row-item icon="fas fa-fw fa-user-friends fa-flip-horizontal" title="Following"
                            text="243" url="#" badge="lightblue"/>
                        <x-adminlte-profile-row-item icon="fas fa-fw fa-sticky-note" title="Posts" text="37"
                            url="#" badge="navy"/>
                    </x-adminlte-profile-widget>

                    {{-- Layout Classic / Custom --}}
                    <x-adminlte-profile-widget name="Roxana Saziadko" desc="Graphic Designer" class="elevation-4"
                        img="https://picsum.photos/id/1027/100" cover="https://picsum.photos/id/130/550/200"
                        layout-type="classic" header-class="text-right" footer-class="bg-gradient-teal">
                        <x-adminlte-profile-col-item class="border-right text-dark" icon="fas fa-lg fa-tasks"
                            title="Projects Done" text="25" size=6 badge="lime"/>
                        <x-adminlte-profile-col-item class="text-dark" icon="fas fa-lg fa-tasks"
                            title="Projects Pending" text="5" size=6 badge="danger"/>
                        <x-adminlte-profile-row-item title="Contact me on:" class="text-center text-dark border-bottom"/>
                        <x-adminlte-profile-row-item icon="fab fa-fw fa-2x fa-instagram text-dark" title="Instagram"
                            url="#" size=4/>
                        <x-adminlte-profile-row-item icon="fab fa-fw fa-2x fa-facebook text-dark" title="Facebook"
                            url="#" size=4/>
                        <x-adminlte-profile-row-item icon="fab fa-fw fa-2x fa-twitter text-dark" title="Twitter"
                            url="#" size=4/>
                    </x-adminlte-profile-widget>


                    <h1>Progress</h1>
                    {{-- Minimal --}}
                    <x-adminlte-progress/>

                    {{-- themes --}}
                    <x-adminlte-progress theme="light" value=55/>
                    <x-adminlte-progress theme="dark" value=30/>
                    <x-adminlte-progress theme="primary" value=95/>
                    <x-adminlte-progress theme="secondary" value=40/>
                    <x-adminlte-progress theme="info" value=85/>
                    <x-adminlte-progress theme="warning" value=25/>
                    <x-adminlte-progress theme="danger" value=50/>
                    <x-adminlte-progress theme="success" value=75/>

                    {{-- Custom --}}
                    <x-adminlte-progress theme="teal" value=75 animated/>
                    <x-adminlte-progress size="sm" theme="indigo" value=85 animated/>
                    <x-adminlte-progress theme="pink" value=50 animated with-label/>

                    {{-- Vertical --}}
                    <x-adminlte-progress theme="purple" value=40 vertical/>
                    <x-adminlte-progress theme="orange" value=80 vertical animated/>
                    <x-adminlte-progress theme="navy" value=70 vertical striped with-label/>
                    <x-adminlte-progress theme="lime" size="xxs" value=90 vertical/>

                    {{-- Dinamic Change --}}
                    <x-adminlte-progress id="pbDinamic" value="5" theme="lighblue" animated with-label/>
                    {{-- Update the previous progress bar every 2 seconds, incrementing by 10% each step --}}
                    @push('js')
                    <script>
                        $(document).ready(function() {

                            let pBar = new _AdminLTE_Progress('pbDinamic');

                            let inc = (val) => {
                                let v = pBar.getValue() + val;
                                return v > 100 ? 0 : v;
                            };

                            setInterval(() => pBar.setValue(inc(10)), 2000);
                        })
                    </script>
                    @endpush


                    <h1>Small Box</h1>
                    {{-- Minimal with title, text and icon --}}
                    <x-adminlte-small-box title="Title" text="some text" icon="fas fa-star"/>

                    {{-- Loading --}}
                    <x-adminlte-small-box title="Loading" text="Loading data..." icon="fas fa-chart-bar"
                        theme="info" url="#" url-text="More info" loading/>

                    {{-- Themes --}}
                    <x-adminlte-small-box title="424" text="Views" icon="fas fa-eye text-dark"
                        theme="teal" url="#" url-text="View details"/>

                    <x-adminlte-small-box title="Downloads" text="1205" icon="fas fa-download text-white"
                        theme="purple"/>

                    <x-adminlte-small-box title="528" text="User Registrations" icon="fas fa-user-plus text-teal"
                        theme="primary" url="#" url-text="View all users"/>

                    {{-- Updatable --}}
                    <x-adminlte-small-box title="0" text="Reputation" icon="fas fa-medal text-dark"
                        theme="danger" url="#" url-text="Reputation history" id="sbUpdatable"/>

                    @push('js')
                    <script>

                        $(document).ready(function() {

                            let sBox = new _AdminLTE_SmallBox('sbUpdatable');

                            let updateBox = () =>
                            {
                                // Stop loading animation.
                                sBox.toggleLoading();

                                // Update data.
                                let rep = Math.floor(1000 * Math.random());
                                let idx = rep < 100 ? 0 : (rep > 500 ? 2 : 1);
                                let text = 'Reputation - ' + ['Basic', 'Silver', 'Gold'][idx];
                                let icon = 'fas fa-medal ' + ['text-primary', 'text-light', 'text-warning'][idx];
                                let url = ['url1', 'url2', 'url3'][idx];

                                let data = {text, title: rep, icon, url};
                                sBox.update(data);
                            };

                            let startUpdateProcedure = () =>
                            {
                                // Simulate loading procedure.
                                sBox.toggleLoading();

                                // Wait and update the data.
                                setTimeout(updateBox, 2000);
                            };

                            setInterval(startUpdateProcedure, 10000);
                        })

                    </script>
                    @endpush



                </div>
            </div>
        </div>
    </div>
@stop
