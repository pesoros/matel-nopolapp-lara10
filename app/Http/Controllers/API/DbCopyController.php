<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Carbon\Carbon;
use File;
use URL;
   
class DbCopyController extends BaseController
{
    public function copyingDB(Request $request): JsonResponse
    {
        $fileName = Str::random(5).'S'.Carbon::now()->timestamp.'.sqlite';
        $filePath = 'sqlite/'.$fileName;
        File::copy(database_path('database.sqlite'), public_path($filePath));
        $urlPath = url('/').'/'.$filePath;

        return $this->sendResponse($urlPath, 'success');
    }
}