<?php

namespace App\Http\Repository\BackOffice;

use App\Models\Carousel;
use Illuminate\Support\Facades\Storage;

class CarouselRepository
{
    public function getAll()
    {
        try {
            return Carousel::orderBy('id', 'desc')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAllByPagination()
    {
        try {
            return Carousel::paginate(10);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getById($id)
    {
        try {
            return Carousel::find($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store($request)
    {
        try {
            $carousel = new Carousel();
            $carousel->title = $request->title;
            $carousel->description = $request->description;
            if ($request->file('image')) {
                $file = $request->file('image');
                $path = Storage::disk('s3')->put("carousel", $file);
                $carousel->image = $path;
            }
            $carousel->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($request, $id)
    {
        try {
            $carousel = Carousel::find($id);
            $carousel->title = $request->title;
            $carousel->description = $request->description;
            if ($request->file('image')) {
                if ($carousel->image) {
                    Storage::disk('s3')->delete($carousel->image);
                }
                $file = $request->file('image');
                $path = Storage::disk('s3')->put("carousel", $file);
                $carousel->image = $path;
            }
            $carousel->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $carousel = Carousel::find($id);
            if ($carousel->image) {
                Storage::disk('s3')->delete($carousel->image);
            }
            $carousel->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
}