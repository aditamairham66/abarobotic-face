<?php

namespace App\Http\Controllers\Api\v1\Face;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Face\FaceRequest;
use App\Http\Resources\Api\v1\Face\FaceResource;
use App\Models\Face;
use App\Services\ApiT5CloudService;
use App\Traits\ApiRespond;
use Illuminate\Http\Request;

class FaceController extends Controller
{
    use ApiRespond;

    public $cloudService;

    function index(FaceRequest $request) 
    {
        $face = Face::updateOrCreate([
            'status' => Face::STATUS_ACTIVE,
        ], [
            'status' => Face::STATUS_ACTIVE,
            'img_face' => $request->selfi,
            'img_passport' => $request->passport,
        ]);   

        # get face score
        $this->cloudService = new ApiT5CloudService(
            $face->img_face,
            $face->img_passport
        );

        return $this->respondWithMessage(new FaceResource([
            "faceScore" => $this->cloudService->getFaceScore(),
        ]), 'Success');
    }
}
