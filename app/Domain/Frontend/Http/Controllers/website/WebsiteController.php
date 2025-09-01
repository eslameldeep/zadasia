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
                SEOMeta::setTitle(trans('Products')." ".$category->name);

            }
        }

        return view('frontend.products', [
            'Products'   => $productsQuery->paginate(9),
            'Categories' => Category::where('status', true)->orderBy('sort')->get(),
            'Category'   => $category,
        ]);
    }


    function news()
    {
        SEOMeta::setTitle(trans('Out News'));

        return view('frontend.news', [
            'News'   => Article::where('status', true)->orderBy('sort')->paginate(6) ,
        ]);

    }



    function Product($product_slug) {
        $Product = Product::where('slug', 'like' , "%$product_slug%" )
            ->where('status' , true)
            ->firstOrFail() ;

        SEOMeta::setTitle(trans('Products') . ' - ' .$Product->name);
        return view('frontend.product', [
            'Product' => $Product,
            'Products' => Product::where('status' , true)->with(['media' , 'Category'])->orderBy('sort')->limit(10)->get(),

        ]);
    }

    //ok above



}
