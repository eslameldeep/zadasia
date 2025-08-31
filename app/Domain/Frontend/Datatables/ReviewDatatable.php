<?php

namespace App\Domain\Frontend\Datatables;

use App\Domain\Frontend\Models\Review;
use App\Support\Dashboard\Datatables\BaseDatatable;
use App\Support\Dashboard\Datatables\Columns\AlbumColumn;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class ReviewDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Review::query()->orderBy('sort');
    }

    protected function columns(): array
    {
        return [
            Column::computed('client_name.'.app()->getLocale())->title(__('client name')),
            Column::computed('client_job_title.'.app()->getLocale())->title(__('client job title')),
            Column::computed('client_review.'.app()->getLocale())->title(__('client review')),
            Column::computed('stars')->title(__('stars')),
            Column::computed('image')->title(__('image')),

        ];
    }


    protected function customColumns(): array
    {
        return [
            'image' => function ($model) {
                return AlbumColumn::render($model, 'image' ) ;
            },
            'stars' => function ($model) {
                $stars = (int) $model->stars; // the saved rating (1–5)
                $html = '';

                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $stars) {
                        $html .= '<i class="fa fa-star text-warning"></i>'; // filled star
                    } else {
                        $html .= '<i class="fa fa-star text-secondary"></i>'; // empty star
                    }
                }

                return $html;
            },

        ] ;
    }
}
