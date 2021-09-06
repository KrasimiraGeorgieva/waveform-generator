<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GeneratorController extends Controller
{
    public function index()
    {
        if (array_empty(Storage::disk('local')->files())) {
            exit('Files doesn\'t exists!');
        }
        
    }
}
