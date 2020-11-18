<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Denunciation;
use App\Models\DenunciationHasCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DenunciationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $denunciations = Denunciation::paginate(10);
            return response()->json($denunciations);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
            $validator = Validator::make($request->all(), [
                'cvlis_id' => 'required|numeric',
                'users_id' => 'required|numeric',
                'criteria' => 'sometimes',
                'description' => 'sometimes|string'
            ]);

            if ($validator->fails()) {
                return response()->json(["error" => $validator->errors()->toJson()], 400);
            }

            DB::beginTransaction();

            $denunciation = Denunciation::create($validator->validated());

            $criteria = $request->criteria;

            if($criteria) {
                foreach($criteria as $item) {
                    DenunciationHasCriteria::create([
                        'denunciations_id' => $denunciation->id,
                        'denunciations_criteria_id' => $item,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'message' => 'Denunciation successfully registered',
                'denunciation' => $denunciation,
            ], 201);
        }  catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $denunciation = Denunciation::findOrFail($id);
            return response()->json($denunciation);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
