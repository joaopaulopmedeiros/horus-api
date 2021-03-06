<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TypeCvli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TypeCvliController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(
            'auth:api',
            ['except' => ['index']]
        );
    }

    public function index(){
        try {
            $typecvlis = TypeCvli::paginate(10);
            return response()->json($typecvlis);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|between:2,100',
                'image' => 'required|mimes:jpeg,png,svg'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 401);
            }

            $data = $request->only(['name', 'image']);

            $formatName = $this->formatImageName($data['image'], $data['name']);

            $data['image']->storeAs('public/types_cvlis', $formatName);

            $url = url(Storage::url("public/types_cvlis/{$formatName}"));

            $typeCvli = TypeCvli::create([
                'name' => $data['name'],
                'image' => $url,
            ]);

            return response()->json($typeCvli, 201);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    protected function formatImageName($image, $name){
        $name = join("-", explode(" ", $name));
        $name = strtolower($name);
        return "{$name}.{$image->extension()}";
    }

}
