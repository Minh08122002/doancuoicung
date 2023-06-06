<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\itemtype;
use Illuminate\Pagination\Paginator;

class ItemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $itemTypeCount = ItemType::count();
        $itemType = ItemType::all();


        $status = $request->input('status');
        $name = $request->input('name');

        $query = ItemType::join('user', 'item_type.created_by', '=', 'user.id')
            ->select('item_type.*', 'user.name as created_by_name');

        if ($status !== null) {
            $query->where('item_type.status', $status);
        }

        if ($name !== null) {
            $query->where('item_type.name', $name);
        }

        $listItemType = $query->paginate(6);

        return view('quantrivien.item_layout', compact('listItemType'), ['itemTypeCount' => $itemTypeCount, 'itemType' => $itemType]);
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
}
