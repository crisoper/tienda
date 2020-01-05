<?php
namespace App\Http\Controllers;

use App\Area;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!empty(request()->buscar)) 
        {
            $areas = Area::where('nombre', 'like', '%'.request()->buscar.'%')
                            ->with('areapadre')
                            ->paginate(10);
        }
        else
        {
            $areas = Area::with('areapadre')
                            ->paginate(10);
        }

        return view('areas.index', compact('areas'));
    }


    public function vistaarbol()
    {
        
        if (!empty(request()->buscar)) 
        {
            $areas = Area::where('nombre', 'like', '%'.request()->buscar.'%')
                            ->with('subareas')
                            ->get();
        }
        else
        {
            $areas = Area::whereNull('padre_id')
                            ->with('subareas')
                            ->get();
        }

        return view('general.areas.vistaarbol', compact('areas'));

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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
