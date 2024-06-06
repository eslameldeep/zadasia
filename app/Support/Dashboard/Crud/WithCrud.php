<?php

namespace App\Http\Controllers\Crud;

trait WithCrud
{
    use WithDatatable;
    use WithForm;
    use WithStore;
    use WithUpdate;
    use WithDestroy;
}
