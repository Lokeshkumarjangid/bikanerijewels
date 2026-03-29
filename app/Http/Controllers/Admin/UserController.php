<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::select(
                    'id',
                    'business_name',
                    'first_name',
                    'last_name',
                    'email',
                    'mobile',
                    'status',
                    'created_at'
                )
            ->where('role','user')
            ->orderBy('created_at', 'desc');

            return DataTables::of($query)
                ->addIndexColumn()

                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-Y h:i A');
                })

                ->editColumn('status', function ($row) {

                    $checked = $row->status ? 'checked' : '';

                    return '
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input status-toggle" id="status'.$row->id.'" data-id="'.$row->id.'" '.$checked.'>
                            <label class="custom-control-label" for="status'.$row->id.'"></label>
                        </div>
                    ';
                })

                ->addColumn('action', function ($row) {
                    // return '
                    //     <a href="'.route('product.edit', $row->id).'" class="btn btn-sm btn-primary">
                    //         <i class="fas fa-edit"></i>
                    //     </a>
                    // ';
                })

                ->rawColumns(['status','action'])
                ->make(true);
        }
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $user = User::find($request->id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ]);
        }

        // 🔥 toggle status
        $user->status = $user->status ? 0 : 1;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Status updated successfully'
        ]);
    }
}
