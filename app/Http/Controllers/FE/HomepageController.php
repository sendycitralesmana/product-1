<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Client;
use App\Models\MediaApplication;
use App\Models\MediaProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductVariant;
use App\Models\ProductVideo;
use App\Models\VideoApplication;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {
        $productCategories = ProductCategory::get();
        $products = Product::with('media')->get();
        $applicationC = Application::count();
        if ($applicationC > 2) {
            $applications = Application::with(['media'])->get()->random(2);
        } else {
            $applications = Application::with(['media'])->get();
        }

        $clients = Client::get();
        return view('frontend.homepage.index', [
            'productCategories' => $productCategories,
            'products' => $products,
            'applications' => $applications,
            'clients' => $clients
        ]);
    }

    public function application() {
        $applications = Application::with(['media'])->paginate(6);
        $productCategories = ProductCategory::get();

        return view('frontend.application.application', [
            'applications' => $applications,
            'productCategories' => $productCategories

        ]);
    }
    
    public function applicationDetail($id) {
        $application = Application::with(['media', 'client'])->find($id);
        $mediaApps = MediaApplication::where('application_id', $id)->Where('type_id', 1)->get();
        $fileApps = MediaApplication::where('application_id', $id)->Where('type_id', 2)->get();
        $videoApps = VideoApplication::where('application_id', $id)->get();
        $productCategories = ProductCategory::get();

        return view('frontend.application.detail', [
            'application' => $application,
            'mediaApps' => $mediaApps,
            'fileApps' => $fileApps,
            'videoApps' => $videoApps,
            'productCategories' => $productCategories

        ]);
    }

    public function client() {
        $clients = Client::get();
        $productCategories = ProductCategory::get();

        return view('frontend.client.client', [
            'clients' => $clients,
            'productCategories' => $productCategories
        ]);
    }

    public function clientDetail($id) {
        $client = Client::find($id);
        $productCategories = ProductCategory::get();
        return view('frontend.client.detail', [
            'client' => $client,
            'productCategories' => $productCategories
        ]);
    }

    public function product() {
        $products = Product::paginate(6);
        $productCategories = ProductCategory::get();
        return view('frontend.product.product', [
            'products' => $products,
            'productCategories' => $productCategories,
        ]);
    }
    
    public function productCategory($id) {
        $products = Product::where('product_category_id', $id)->paginate(6);
        $productCategories = ProductCategory::get();
        $productCategory = ProductCategory::find($id);

        return view('frontend.product.productCategory', [
            'products' => $products,
            'productCategories' => $productCategories,
            'productCategory' => $productCategory,
        ]);
    }
    
    public function productDetail($id) {
        $product = Product::find($id);
        $productCategories = ProductCategory::get();
        $productCategory = ProductCategory::find($id);
        $imgProducts = MediaProduct::where('type_id', 1)->where('product_id', $id)->get();
        $fileProducts = MediaProduct::where('type_id', 2)->where('product_id', $id)->get();
        $variantProducts = ProductVariant::where('product_id', $id)->get();
        $videoProducts = ProductVideo::where('product_id', $id)->get();

        return view('frontend.product.detail', [
            'product' => $product,
            'productCategories' => $productCategories,
            'productCategory' => $productCategory,
            'imgProducts' => $imgProducts,
            'fileProducts' => $fileProducts,
            'variantProducts' => $variantProducts,
            'videoProducts' => $videoProducts,
        ]);
    }

    public function productVariant($id) {
        $product = Product::find($id);
        $productCategories = ProductCategory::get();
        $variantProduct = ProductVariant::where('product_id', $id)->get();

        return view('frontend.variant.variantProduct', [
            'product' => $product,
            'productCategories' => $productCategories,
            'variantProduct' => $variantProduct
        ]);
    }
    
}
