<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zip_codes;

class showZipCodes extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        //
        $zip_code = Zip_codes::find($id);
        $zip_code->federal_entity;
        $zip_code->settlements;
        $zip_code->municipality;
        return response()->json(
            $zip_code,
            200,[]);

    }
}
