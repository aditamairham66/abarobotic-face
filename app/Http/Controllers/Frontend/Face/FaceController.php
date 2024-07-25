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
            $face = (object) [];
            $face->img_face = 'https://via.placeholder.com/500x500';
            $face->img_passport = 'https://via.placeholder.com/500x500';
        }
        
        $this->cloudService = new ApiT5CloudService(
            $face->img_face ?? '',
            $face->img_passport ?? '',
        );
        $faceScore = $this->cloudService->getFaceScore();
        $faceStatus =  $this->cloudService->getFaceStatus($faceScore);
        
        if ($face) {
            $face->img_face = $face->img_face ? "data:image/jpeg;base64,$face->img_face" : '';
            $face->img_passport = $face->img_passport ? "data:image/jpeg;base64,$face->img_passport" : '';
        }

        return view('web.layout', [
            "face" => $face,
            "faceScore" => $faceScore,
            "status" => $faceStatus,
        ]);
    }
}
