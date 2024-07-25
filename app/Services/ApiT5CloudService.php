<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ApiT5CloudService
{
    private $apiUrl = 'http://115.247.46.118:8080/T5CloudService/1.0/verify';
    protected $probeFace;
    protected $galleryFace;

    public function __construct($probeFace, $galleryFace)
    {
        $this->probeFace = $probeFace;
        $this->galleryFace = $galleryFace;
    }

    public function getFaceScore()
    {
        // Membuat kunci cache yang unik berdasarkan data probeFace dan galleryFace
        $cacheKey = $this->getCacheKey();

        // Cek apakah hasil skor wajah sudah ada di cache
        return Cache::remember($cacheKey, now()->addMinutes(5), function () {
            // Jika tidak ada di cache, panggil API dan simpan hasilnya di cache
            return $this->fetchFaceScoreFromApi();
        });
    }

    private function fetchFaceScoreFromApi()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl, [
            'tid' => 'Verification_2',
            'response' => true,
            'faceThreshold' => 0.005,
            'fingerThreshold' => 0.002,
            'irisThreshold' => 0.002,
            'probeFace' => [
                'pos' => 'A',
                'data' => $this->probeFace
            ],
            'galleryFace' => [
                'pos' => 'F',
                'data' => $this->galleryFace
            ],
            'request_type' => 'Verification'
        ]);

        $body = $response->json();

        return $body['faceScore'] ?? null;
    }

    private function getCacheKey()
    {
        return 'faceScore_' . md5(json_encode($this->probeFace) . json_encode($this->galleryFace));
    }

    public function getFaceStatus(int $score): string
    {
        return $score >= 11 ? "GOOD" : "NOT GOOD";
    }
}
