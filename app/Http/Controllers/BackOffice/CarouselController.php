<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Repository\BackOffice\CarouselRepository;
use App\Http\Requests\CarouselRequest;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    private $carouselRepository;

    public function __construct(CarouselRepository $carouselRepository)
    {
        $this->carouselRepository = $carouselRepository;
    }

    public function index()
    {
        try {
            $carousels = $this->carouselRepository->getAllByPagination();
            return view('backoffice.carousel.index', compact('carousels'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(CarouselRequest $request)
    {
        try {
            $carousel = $this->carouselRepository->store($request);
            return redirect('/backoffice/carousel');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(CarouselRequest $request, $id)
    {
        try {
            $carousel = $this->carouselRepository->update($request, $id);
            return redirect('/backoffice/carousel');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $carousel = $this->carouselRepository->delete($id);
            return redirect('/backoffice/carousel');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
