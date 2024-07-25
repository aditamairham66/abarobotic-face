<?php

namespace App\Http\Controllers\Frontend\Face;

use App\Http\Controllers\Controller;
use App\Models\Face;
use App\Services\ApiT5CloudService;
use Illuminate\Http\Request;

class FaceController extends Controller
{
    public $cloudService;
    public function __construct(
        public Face $face,
    )
    {}

    function index() 
    {
        $face = $this->face->isActive()->first();
        if (!$face) {
            return abort(403, "Tidak ada scan wajah.");
        };
        
        $this->cloudService = new ApiT5CloudService(
            $face->img_face,
            $face->img_passport
        );
        $faceScore = $this->cloudService->getFaceScore();
        $faceStatus =  $this->cloudService->getFaceStatus($faceScore);
        
        return view('web.layout', [
            "face" => $face,
            "faceScore" => $faceScore,
            "status" => $faceStatus,
        ]);
    }
}
