<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProgramCategoryRequest;
use App\Models\Backend\ProgramCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProgramCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $program_categories = ProgramCategory::paginate(10);

        $program_categories = DB::table('program_categories')->whereNull('deleted_at')->get();

        $program_categories_deleted = ProgramCategory::onlyTrashed()->get(); // returns 5 again


        return view('backend.program-categories.index', [
            'program_categories' => $program_categories,
            'program_categories_deleted' => $program_categories_deleted,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.program-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramCategoryRequest $request)
    {
        $data = $request->all();

        DB::insert(
            'INSERT INTO program_categories( name, description) VALUES (:name, :description)',
            [
                'name' => $request->name,
                'description' => $request->description,

            ]
        );
        $notification = array(
            'message' => 'Succeeded to Create Program Category',
            'alert-type' => 'success'
        );

        return redirect()->route('program-category.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramCategory $programCategory)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramCategory $programCategory)
    {
        return view('backend.program-categories.edit', [
            'item' => $programCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramCategoryRequest $request, $id)
    {
        // $programCategory->update($data);

        // DB::update(
        //     'UPDATE program_categories SET name = :name, description = :description WHERE id = :id',
        //     [
        //         'name' => $request->name,
        //         'description' => $request->description,
        //     ]
        // );

        DB::table('program_categories')->where('id', $id)->update(array(
            'name' => $request->name,
            'description' => $request->description,
        ));


        $notification = array(
            'message' => 'Succeeded to Update Program Category',
            'alert-type' => 'success'
        );
        return redirect()->route('program-category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('program_categories')
            ->where('id', $id)
            ->update(['deleted_at' => Carbon::now()]);

        $notification = array(
            'message' => 'Succeeded to Delete Program Category',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function restore($id)
    {
        ProgramCategory::where('id', $id)->withTrashed()->restore();

        $notification = array(
            'message' => 'Succeeded to Restore Program Category',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function forceDelete($id)
    {
        ProgramCategory::where('id', $id)->withTrashed()->forceDelete();

        $notification = array(
            'message' => 'Succeeded to Delete Program Category Permanently',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
