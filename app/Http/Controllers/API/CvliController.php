<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CvliFile;
use Illuminate\Http\Request;
use App\Models\Cvli;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CvliController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth:api');
    }*/

    public function index() {
        try {
            $users = Cvli::paginate(10);
            return response()->json($users);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'file' => 'mimes:jpeg,png,svg,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
                'longitude' => 'required|numeric',
                'latitude' => 'required|numeric',
                'cvlis_types_id' => 'required|numeric',
                'users_id' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->toJson(), 400);
            }

            DB::beginTransaction();

            $cvli = Cvli::create($validator->validated());

            CvliFile::create([
                'cvlis_id' => $cvli->id,
                'path' => ''
            ]);

            DB::commit();

            return response()->json([
                'message' => 'CVLI successfully registered',
                'cvli' => $cvli,
            ], 201);

        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
