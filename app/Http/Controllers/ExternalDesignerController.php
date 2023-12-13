<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\HelperFunctions;
use App\Models\User;
use App\Models\PermitLoadRejected;
use App\Models\{ EmailExtra, ExternalDesignerSupplier};
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;
use Notification;
use Illuminate\Support\Facades\Auth;
// use App\Notifications\TemporaryWorkNotification;
use App\Utils\Validations;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Notifications\PasswordResetNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;
use Illuminate\Support\Facades\View;

class ExternalDesignerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        abort_if(!$user->hasAnyRole(['admin', 'company']), 403);
        try {
            if ($request->ajax()) {
                if ($user->hasRole(['admin','company'])) {
                    $data = ExternalDesignerSupplier::where(['type'=>'designer','company_id'=>Auth::id()])->get();
                } 
                return Datatables::of($data)
                    ->removeColumn('id')
                    ->addColumn('company', function ($data) {
                        return $data->userCompany->name ?? '';
                    })
                    ->addColumn('action', function ($data) use ($user) {
                         $btn ='';
                        if ($user->hasRole(['admin','company'])) {
                            $btn .= '<div class="d-flex">
                                <button type="edit" value="edit" data-id="' . $data->id . '" class="edit_designer_details btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                            <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        </svg>
                                    </span>
                                </button>
                                <form method="POST" action="' . route('externalDesigners.destroy', $data->id) . '"  id="form_' . $data->id . '" >
                                    ' . method_field('Delete') . csrf_field() . '

                                    <button type="submit" id="' . $data->id . '" class="confirm1 btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                      <i class="fa fa-trash" aria-hidden="true"></i>
                                        <!--end::Svg Icon-->
                                    </button>
                                </form></div>
                                ';
                        }
                        return $btn;
                     })
                    ->rawColumns(['action'])
                    ->make(true);
            }

             return view('dashboard.designer.external_designers');
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }
    public function externalSuppliers(Request $request)
    {
        $user = auth()->user();
        abort_if(!$user->hasAnyRole(['admin', 'company']), 403);
        try {
            if ($request->ajax()) {
                if ($user->hasRole(['admin','company'])) {
                    $data = ExternalDesignerSupplier::where(['type'=>'supplier','company_id'=>Auth::id()])->get();
                } 
                return Datatables::of($data)
                    ->removeColumn('id')
                    ->addColumn('company', function ($data) {
                        return $data->userCompany->name ?? '';
                    })
                    ->addColumn('action', function ($data) use ($user) {
                         $btn ='';
                        if ($user->hasRole(['admin','company'])) {
                            $btn .= '<div class="d-flex">
                                <button type="edit" value="edit" data-id="' . $data->id . '" class="edit_designer_details btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                            <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        </svg>
                                    </span>
                                </button>
                                <form method="POST" action="' . route('externalDesigners.destroy', $data->id) . '"  id="form_' . $data->id . '" >
                                    ' . method_field('Delete') . csrf_field() . '

                                    <button type="submit" id="' . $data->id . '" class="confirm1 btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                      <i class="fa fa-trash" aria-hidden="true"></i>
                                        <!--end::Svg Icon-->
                                    </button>
                                </form></div>
                                ';
                        }
                        return $btn;
                     })
                    ->rawColumns(['action'])
                    ->make(true);
            }

             return view('dashboard.suppliers.external_suppliers');
        } catch (\Exception $exception) {
            dd($exception);
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $create = new ExternalDesignerSupplier();
            $create->email = $request->email;
            $create->type = $request->type;
            $create->company_id = Auth::id();
            if($create->save())
            {
                toastSuccess('Designer Added Successfully');
                return Redirect::back();
            }
        } catch(\Exception $exception){
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $externalDesignerDetails =ExternalDesignerSupplier::find($id);
        try {
            if (!empty($externalDesignerDetails)) {
                // $externalDesignerDetails->load('blocks'); // Eager load the blocks relationship
                $data = [
                    'status' => true,
                    'designer' => $externalDesignerDetails
                ];
                return response()->json($data);
            } else {
                $data = [
                    'status' => false,
                    'designer' => null
                ];
                return response()->json($data);
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       try{

        $update = ExternalDesignerSupplier::where('id',$id)->first();
        $update->email = $request->email;
        if($update->save())
        toastSuccess('Designer Updated Successfully');
        return Redirect::back();
       }
       catch (\Exception $exception) 
       {
          dd($exception);
        toastError('Something went wrong, try again');
        return Redirect::back();

       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $delete = ExternalDesignerSupplier::where('id',$id)->first();
            if($delete->delete())
            toastSuccess('Designer Deleted Successfully');
            return Redirect::back();
           }
           catch (\Exception $exception) 
           {
              dd($exception);
            toastError('Something went wrong, try again');
            return Redirect::back();
    
           }
    }
}
