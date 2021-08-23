<?php

namespace App\Http\Controllers;

use App\Models\Addoc;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PendingdocsController extends Controller
{
    public function outsdocs011()
    {
        return view('outsdocs.011C.index');
    }

    public function outsdocs017()
    {
        return view('outsdocs.017C.index');
    }

    public function outsdocsAPS()
    {
        return view('outsdocs.APS.index');
    }

}
