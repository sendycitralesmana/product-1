<?php

namespace App\Http\Controllers\FE;

use App\Models\Post;
use App\Models\Client;
use App\Models\Content;
use App\Models\Product;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index () {
        $galleries = Gallery::orderBy('id', 'desc')->get()->take(8);
        $aboutTK = Content::where('id', 1)->first();
        $aboutVM = Content::where('id', 2)->first();
        $posts = Post::orderBy('id', 'desc')->get()->take(3);
        $products = Product::orderBy('id', 'desc')->get();
        $productCategories = ProductCategory::all();
        $applications = Application::orderBy('id', 'desc')->get()->take(3);
        $applicationC = Application::get();
        $clients = Client::get();

        return view('front.homepage.index', [
            'galleries' => $galleries,
            'aboutTK' => $aboutTK,
            'aboutVM' => $aboutVM,
            'posts' => $posts,
            'products' => $products,
            'productCategories' => $productCategories,
            'applications' => $applications,
            'applicationC' => $applicationC,
            'clients' => $clients
        ]);
    }

    public function search(Request $request) {
        if ($request->ajax()) {

            $output = '';
            
            $products = Product::where('name', 'like', '%' . $request->search . '%')->get();

            if ($products) {

                if (count($products) == 0) {
                    $output .= '
                    <div class="card allData">
                        <div class="card-body">
                            <h4 class="text-center">-- Data tidak ditemukan --</h4>
                        </div>
                    </div>';
                } else {
                    $output .= '
                <div class="card allData">
                    <div class="card-body">
                        <div class="row">';

                    foreach ($products as $product) {
                        $output .= '
                            <div class="col-sm-6 col-md-4 col-lg-3 isotope-item text-center">
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="'. asset('storage/image/product/'.$product->thumbnail) .'" alt="IMG-PRODUCT" style="height: 150px; width: 150px">
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 ">
                                            <a href="/product/'.$product->id.'" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2" style="text-align: center">
                                                '. $product->name .'
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }

                $output .= '
                        </div>
                    </div>
                </div>';
                }

                


                
                // foreach ($products as $product) {
                //     $output .= '
                //     <div class="card">
                //         <div class="card-header">
                        
                //         </div>
                //         <div class="card-body">
                        
                //         </div>
                //     </div>
                //     <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                //         <div class="card">
                //             <div class="card-body">
                //                 <div class="block2">
                //                     <div class="block2-pic hov-img0">
                //                         <img src="'. asset('images/banner.jpg') .'" alt="IMG-PRODUCT">
                //                     </div>
                
                //                     <div class="block2-txt flex-w flex-t p-t-14">
                //                         <div class="block2-txt-child1 flex-col-l ">
                //                             <a href="/product/'.$product->id.'" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                //                                 '. $product->name .'
                //                             </a>
                //                         </div>
                //                     </div>
                //                 </div>
                //             </div>
                //         </div>
                //     </div>
                    
                //     ';
                // }

            return response()->json($output);

            if ($request->search == '') {
                return response()->json('No Data Found');
            }


            } else {

                return response()->json('No Data Found');
            }

        }
        return view('front.homepage.index');
    }
    
    public function indexEn () {
        $posts = Post::orderBy('id', 'desc')->get()->take(3);
        $products = Product::orderBy('id', 'desc')->get();
        $productCategories = ProductCategory::all();
        $applications = Application::orderBy('id', 'desc')->get()->take(3);
        $applicationC = Application::get();
        $clients = Client::get();

        return view('front-en.homepage.index', [
            'posts' => $posts,
            'products' => $products,
            'productCategories' => $productCategories,
            'applications' => $applications,
            'applicationC' => $applicationC,
            'clients' => $clients
        ]);
    }
}
