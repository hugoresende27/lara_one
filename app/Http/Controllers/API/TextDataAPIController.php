<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TextData;
use Illuminate\Http\Request;

class TextDataAPIController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textData = TextData::all();
        return response()->json($textData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Not typically used for APIs
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'type' => 'required|string',
            'name' => 'required|string',
            'text' => 'required|string',
        ]);

        $textData = TextData::create([
            'type' => $request->type,
            'name' => $request->name,
            'text' => $request->text,
        ]);

        return response()->json($textData, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $textData = TextData::find($id);

        if ($textData) {
            return response()->json($textData);
        } else {
            return response()->json(['message' => 'Resource not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Not typically used for APIs
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string',
            'name' => 'required|string',
            'text' => 'required|string',
        ]);

        $textData = TextData::find($id);

        if ($textData) {
            $textData->update([
                'type' => $request->type,
                'name' => $request->name,
                'text' => $request->text,
            ]);

            return response()->json($textData);
        } else {
            return response()->json(['message' => 'Resource not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $textData = TextData::find($id);

        if ($textData) {
            $textData->delete();
            return response()->json(['message' => 'Resource deleted successfully']);
        } else {
            return response()->json(['message' => 'Resource not found'], 404);
        }
    }
}
