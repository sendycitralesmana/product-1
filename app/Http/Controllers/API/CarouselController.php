<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repository\BackOffice\CarouselRepository;
use App\Http\Resources\Carousel\CarouselListResource;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    private $carouselRepository;

    public function __construct(CarouselRepository $carouselRepository) {
        $this->carouselRepository = $carouselRepository;
    }

    public function index() {
        try {
            $carousels = $this->carouselRepository->getAll();
            $resource = CarouselListResource::collection($carousels);
            return response()->json($resource, 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
