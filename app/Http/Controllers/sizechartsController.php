<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Sizechart;

class sizechartsController extends Controller
{
    public function index()
    {
        return response(Sizechart::all()->jsonSerialize(), Response::HTTP_OK);
    }
}
