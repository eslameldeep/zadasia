<?php

namespace App\Domain\Frontend\Http\Controllers\website;

use App\Domain\Frontend\Models\Article;
use App\Domain\Frontend\Models\Category;
use App\Domain\Frontend\Models\Challenge;
use App\Domain\Frontend\Models\Event;
use App\Domain\Frontend\Models\Field;
use App\Domain\Frontend\Models\Partner;
use App\Domain\Frontend\Models\Product;
use App\Domain\Frontend\Models\Review;
use App\Domain\Frontend\Models\Software;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
    use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
    function Home() {
        SEOMeta::setTitle(trans('Home'));

        return view('frontend.home', [
            'Products' => Product::where('status' , true)->with(['media' , 'Category'])->orderBy('sort')->limit(10)->get(),
            'Articles' => Article::where('status' , true)->with('media')->orderBy('sort')->limit(2)->get(),
            'Categories' => Category::where('status' , true)->with('media')->orderBy('sort')->get() ,
            'Reviews' => Review::where('status' , true)->with('media')->orderBy('sort')->limit(10)->get()
        ]);
    }

    function About()
    {
        SEOMeta::setTitle(trans('About Us'));
        return view('frontend.about', [
            'Reviews' => Review::where('status' , true)->with('media')->orderBy('sort')->limit(10)->get()
        ]);

    }

    function Contact()
    {
        SEOMeta::setTitle(trans('About Us'));
        return view('frontend.contact-us') ;
    }
    function ExportRequests()
    {
        SEOMeta::setTitle(trans('Export Requests'));
        return view('frontend.export');

    }


    function Products()
    {
        SEOMeta::setTitle(trans('Products'));

        // Validate category slug if present
        $validated = Validator::make(request()->all(), [
            'category' => ['nullable', 'string'],
        ])->validate();

        $categorySlug = $validated['category'] ?? null;
        $category = null;

        $productsQuery = Product::where('status', true)
            ->with('media')
            ->orderBy('sort');

        if ($categorySlug) {
            $category = Category::where('slug','like', "%$categorySlug%")->first();
            if ($category) {
                $productsQuery->where('category_id', $category->id);
            }
        }

        return view('frontend.products', [
            'Products'   => $productsQuery->paginate(3),
            'Categories' => Category::where('status', true)->orderBy('sort')->get(),
            'Category'   => $category,
        ]);
    }




    //ok above

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
