<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class GeneratorController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $result = [];

        if (array_empty(Storage::disk('local')->files())) {
            exit('Files doesn\'t exists!');
        }

        // Get files from Storage
        foreach (Storage::disk('local')->files() as $file) {
            if (Storage::disk('local')->exists('customer-channel.txt') && $file === 'customer-channel.txt') {
                $path = Storage::path('customer-channel.txt');
                $customer = $this->readFile($path);
                $result['customer'] = $customer;
            } elseif (Storage::disk('local')->exists('user-channel.txt') && $file === 'user-channel.txt') {
                $path = Storage::path('user-channel.txt');
                $user = $this->readFile($path);
                $result['user'] = $user;
            }
        }

        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * @param $path
     * @return array
     */
    private function readFile($path)
    {
        $contentsArr = file($path,FILE_IGNORE_NEW_LINES);

        $audioArr = [];
        $end = 0;
        $i = 0;

        foreach($contentsArr as $value) {
            if (preg_match('/silence_start: (\d+(\.|)\d+)/', $value, $startMatches )) {
                $audioArr[$i] = [$end,(double)$startMatches[1]];
                $i++;
            } elseif (preg_match('/silence_end: (\d+(\.|)\d+)/', $value, $endMatches )) {
                $end = (double)$endMatches[1];
            }
        }

        return $audioArr;
    }
}
