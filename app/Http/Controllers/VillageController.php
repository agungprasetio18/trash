<?php

namespace App\Http\Controllers;

use App\Repositories\VillageRepository;

use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function search(Request $request, VillageRepository $village)
    {
        return $village->search($request->name);
    }
}
