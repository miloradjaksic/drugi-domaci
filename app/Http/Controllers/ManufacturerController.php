<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Exception;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Manufacturer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $manufacturer = Manufacturer::create($request->all());
            return response()->json($this->transformManufacturer($manufacturer));
        } catch (Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        return response()->json($this->transformManufacturer($manufacturer));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        try {
            $manufacturer->update($request->all());
            return response()->json($this->transformManufacturer($manufacturer));
        } catch (Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        try {
            $manufacturer->delete();
            return response()->noContent();
        } catch (Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }

    private function transformManufacturer(Manufacturer $manufacturer)
    {
        return [
            "id" => $manufacturer->id,
            "created_at" => $manufacturer->created_at,
            "updated_at" => $manufacturer->updated_at,
            "contact_email" => $manufacturer->contact_email,
            "pib" => $manufacturer->pib,
            "contact_phone" => $manufacturer->contact_phone,
            "models" => $manufacturer->models,
            "country" => $manufacturer->country
        ];
    }
}
