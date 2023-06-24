<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Illuminate\Http\JsonResponse;
use App\Models\Vehicle_number;
use App\Imports\NopolImport;
use Maatwebsite\Excel\Facades\Excel;
   
class NopolController extends BaseController
{
    public function getNopol(Request $request): JsonResponse
    {
        $qstring = $request->query();
        $nopol = $qstring['nopol'];
        $getData = Vehicle_number::where('nopol', 'like', "%$nopol%")->limit(10)->get();
        return $this->sendResponse($getData, 'success');
    }

    function truncateNopol(): JsonResponse
    {
        $tableTruncate = Vehicle_number::truncate();
        return $this->sendResponse([], 'success');
    }

    public function importNopol(Request $request): JsonResponse
    {
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		$file = $request->file('file');
        Excel::import(new NopolImport, $request->file('file'));

        return $this->sendResponse([], 'success');
    }
}