<?php

namespace App\Http\Controllers\Tukang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Tukang;
use App\Models\User;

class TukangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tukangId = 1; 
        $orders = Order::where('tukang_id', $tukangId)->get();
        return view('tukang.dashboard', compact('orders'));
    }
    public function acceptOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'accepted']);
        $order->histories()->create(['status' => 'accepted']);
        return back();
    }

    public function rejectOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'rejected']);
        $order->histories()->create(['status' => 'rejected']);
        return back();
    }

    public function updateStatus($id)
    {
        $order = Order::findOrFail($id);
        $newStatus = request('status');
        $order->update(['status' => $newStatus]);
        $order->histories()->create(['status' => $newStatus]);
        return back();
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
