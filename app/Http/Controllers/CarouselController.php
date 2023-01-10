<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarouselRequest;
use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function create()
    {
        return view('backend.carousels.create');
    }

    public function uploadImage($image)
    {
        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d ') . time() . $originalName;
        $image->move(storage_path('app/public/carousels'), $fileName);
        return $fileName;
    }
    public function store(CarouselRequest $request)
    {
        $fileName = $this->uploadImage($request->file('image'));

        $formData = [
            'name' => $request->name,
            "description" => $request->description,
            'image' => $fileName
        ];


        Carousel::create($formData);
        return redirect()
            ->route('carousels.create')
            ->withMessage('Successfully Created');
    }
}
