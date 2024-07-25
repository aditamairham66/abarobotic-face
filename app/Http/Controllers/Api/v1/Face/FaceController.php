<?php

namespace App\Http\Controllers\Api\v1\Face;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Face\FaceRequest;
use App\Http\Resources\Api\v1\Face\FaceResource;
use App\Services\ApiT5CloudService;
use App\Traits\ApiRespond;
use Illuminate\Http\Request;

class FaceController extends Controller
{
    use ApiRespond;

    public $cloudService;

    function index(FaceRequest $request) 
    {
        # get face score
        $this->cloudService = new ApiT5CloudService(
            $request->selfi,
            $request->passport
        );
        $faceScore = $this->cloudService->getFaceScore();

        broadcast(new \App\Events\T5CloudServiceEvent([
            "selfi" => $request->selfi,
            "passport" => $request->passport,
            "faceScore" => $faceScore,
            "faceStatus" => $this->cloudService->getFaceStatus($faceScore),
        ]));

        return $this->respondWithMessage(new FaceResource([
            "faceScore" => $faceScore,
        ]), 'Success');
    }
}
