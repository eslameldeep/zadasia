<?php

namespace App\Domain\Frontend\Http\Controllers\website;

use App\Domain\Frontend\Models\Article;
use App\Domain\Frontend\Models\Category;
use App\Domain\Frontend\Models\Challenge;
use App\Domain\Frontend\Models\Event;
use App\Domain\Frontend\Models\Field;
use App\Domain\Frontend\Models\Partner;
use App\Domain\Frontend\Models\Product;
use App\Domain\Frontend\Models\Software;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;

class WebsiteController extends Controller
{
    function Home() {
        SEOMeta::setTitle(trans('Home'));

        return view('frontend.home', [
            'Fields' => Field::where('status' , true)->with('media')->orderBy('sort')->limit(4)->get(),
            'Products' => Product::where('status' , true)->with(['media' , 'Category'])->orderBy('sort')->limit(10)->get(),
            'Challenges' => Challenge::where('status' , true)->with('media')->orderBy('sort')->get(),
            'Partners' => Partner::where('status' , true)->with('media')->orderBy('sort')->get(),
            'Events' => Event::where('status' , true)->with('media')->orderBy('created_at' , 'DESC')->limit(6)->get(),
            'Articles' => Article::where('status' , true)->with('media')->orderBy('sort')->limit(2)->get(),
            'Categories' => Category::where('status' , true)->with('media')->orderBy('sort')->get()
        ]);
    }

    function Fields() {
        SEOMeta::setTitle(trans('Fields'));
        return view('frontend.fields', [
            'Fields' => Field::where('status' , true)->with('media')->orderBy('sort')->get(),
        ]);
    }
    function Field($field_slug) {
        $Field = Field::where('slug', 'like' , "%$field_slug%" )
                    ->where('status' , true)
                    ->with(['FieldsFramework' => function ($query) {
                        return $query->where('status' , true) -> with('media')->orderBy('sort') ;
                    } , 'FieldsObjective' => function ($query) {
                        return $query->where('status' , true) ->with('media')-> orderBy('sort') ;
                    }, 'media'])
                    ->firstOrFail() ;
                SEOMeta::setTitle(trans('Fields') . ' - ' . $Field->name);
        return view('frontend.field', [
            'Field' => $Field,
            'Fields' => Field::where([['status' , '=' ,true] , ['id' , '!=' , $Field->id ]])->with('media')->orderBy('sort')->limit(4)->get(),
        ]);
    }

    function Products() {
        SEOMeta::setTitle(trans('Products'));
        return view('frontend.products', [
            'Products' => Product::where('status' , true)->with('media')->orderBy('sort')->get(),
        ]);
    }

    function Product($product_slug) {
        $Product = Product::where('slug', 'like' , "%$product_slug%" )
                    ->where('status' , true)
                    ->with(['ProductsFeature' => function ($query) {
                        return $query->where('status' , true)-> with('media') -> orderBy('sort') ;
                    } , 'ProductsSensor' => function ($query) {
                        return $query->where('status' , true)->with('media') -> orderBy('sort') ;
                    } , 'media'])
                    ->firstOrFail() ;
                    SEOMeta::setTitle(trans('Products') . ' - ' .$Product->name);
        return view('frontend.product', [
            'Product' => $Product,
        ]);
    }

    function Software() {
        SEOMeta::setTitle(trans('Software And Applications'));
        return view('frontend.software', [
            'Softwares' => Software::where('status' , true)->with('media')->orderBy('sort')->get(),
        ]);
    }


    function challenges() {
        SEOMeta::setTitle(trans('Challenges Solved'));
        return view('frontend.challenges', [
            'Challenges' => Challenge::where('status' , true)->with('media')->orderBy('sort')->get(),
        ]);
    }


    function challenge($id) {
        $challenge = Challenge::where('id', $id )
        ->where('status' , true)
        ->with(['media'])
        ->firstOrFail()  ;
        SEOMeta::setTitle(trans('Challenges Solved') . ' - ' . $challenge->title);
        return view('frontend.challenge', [
            'Challenge' =>  $challenge ,
            'Challenges' => Challenge::where([['status' , '=' ,true] , ['id' , '!=' , $challenge->id ]])->with('media')->orderBy('sort')->limit(3)->get(),

        ]);
    }

}
