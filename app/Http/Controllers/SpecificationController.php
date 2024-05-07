<?php

namespace App\Http\Controllers;

use App\Models\PVSpecification;
use App\Models\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpecificationController extends Controller
{
    public function index()
    {
        $specifications = Specification::all();
        return view('backoffice.product.specification.index', [
            'specifications' => $specifications
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name.*' => 'required'
        ]);

        // dd($request->all());

        if (count($request->name) > 0) {
            foreach ($request->name as $item => $value) {
                $data2 = array(
                    'name' => $request->name[$item]
                );
                Specification::create($data2);
            }
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Tambah spesifikasi berhasil');
        return redirect('/backoffice/product/specification');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $specification = specification::find($id);
        $specification->name = $request->name;
        // dd($specification);
        $specification->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Ubah spesifikasi berhasil');
        return redirect('/backoffice/product/specification');
    }

    public function delete($id)
    {
        $specification = specification::find($id);
        $specification->specV()->delete();
        $specification->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Hapus spesifikasi berhasil');
        return redirect('/backoffice/product/specification');
    }

}