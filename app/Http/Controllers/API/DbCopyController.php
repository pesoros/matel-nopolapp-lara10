<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\JsonResponse;
use App\Models\Dbversion;
use Illuminate\Support\Str;
use Carbon\Carbon;
use File;
use URL;
   
class DbCopyController extends BaseController
{

    public function checkVersion(): JsonResponse
    {
        $getData = Dbversion::orderBy('created_at', 'desc')->first();
        return $this->sendResponse($getData, 'success');
    }

    public function copyingDB(Request $request): JsonResponse
    {
        $version = Str::random(5).'S'.Carbon::now()->timestamp;
        $fileName = $version.'.sqlite';
        $filePath = 'sqlite/'.$fileName;
        $urlPath = url('/').'/'.$filePath;
        File::copy(database_path('database.sqlite'), public_path($filePath));

        Dbversion::create([
            'version'       => $version,
            'path'          => $urlPath,
            'updated_by'    => $request->user()->name
        ]);


        return $this->sendResponse([
            'version'       => $version,
            'path'          => $urlPath,
            'updated_by'    => $request->user()->name
        ], 'success');
    }
}