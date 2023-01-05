<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;

class ColorController extends Controller
{

    public function index()
    {
        $colors = Color::all();
        return view('backend.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('backend.colors.create');
    }

    public function show(Color $color)
    {
        // $color = Color::find($id);
        return view('colors.show', compact('Color'));
    }

    public function store(ColorRequest $request)
    {
        $requestData = [
            'name' => $request->name,
            'color_code' => $request->color_code,
        ];

        Color::create($requestData);

        return redirect()
            ->route('colors.index')
            ->withMessage('Successfully Created');
    }

    public function edit(Color $color)
    {
        // $color = Color::find($id);
        return view('colors.edit', compact('color'));
    }

    public function update(ColorRequest $request, Color $color)
    {
        // $color = Color::find($id);

        $requestData = [
            'name' => $request->name,
            'color_code' => $request->color_code,
        ];

        $color->update($requestData);

        return redirect()
            ->route('colors.index')
            ->withMessage('Successfully Updated');
    }

    public function downloadPdf()
    {
        $colors = Color::all();
        $pdf = Pdf::loadView('colors.pdf', compact('colors'));
        return $pdf->download('Color-list.pdf');
    }

    public function destroy(Color $color)
    {
        // $color = Color::find($id);
        $color->delete();

        // Session::flash('message', 'Successfully deleted');
        // return redirect()
        //         ->route('colors.index')
        //         ->with('message', 'Successfully deleted');

        return redirect()
            ->route('colors.index')
            ->withMessage('Successfully deleted');
    }

    public function trash()
    {
        $colors = Color::onlyTrashed()->get();
        return view('colors.trash', compact('colors'));
    }

    public function restore($id)
    {
        $color = Color::onlyTrashed()->find($id);
        $color->restore();

        return redirect()
            ->route('colors.trash')
            ->withMessage('Successfully restored');
    }

    public function delete($id)
    {
        try {
            $color = Color::onlyTrashed()->find($id);
            $color->forceDelete();

            return redirect()
                ->route('colors.trash')
                ->withMessage('Successfully deleted');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
