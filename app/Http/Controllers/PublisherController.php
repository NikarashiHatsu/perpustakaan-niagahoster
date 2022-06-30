<?php

namespace App\Http\Controllers;

use App\DataTables\PublisherDataTable;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Models\Publisher;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PublisherDataTable $dataTable)
    {
        return $dataTable->render('dashboard.publisher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePublisherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublisherRequest $request)
    {
        try {
            \App\Models\Publisher::create($request->validated());
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to store data: ' . $th->getMessage());
        }

        return back()->with('success', 'Data stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        return view('dashboard.publisher.view', [
            'publisher' => $publisher,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        return view('dashboard.publisher.edit', [
            'publisher' => $publisher,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePublisherRequest  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        try {
            $publisher->update($request->validated());
        } catch (\Throwable $th) {
            return back()->with('error', 'Filed to update the data: ' . $th->getMessage());
        }

        return back()->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        try {
            $publisher->delete();
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to delete the data: ' . $th->getMessage());
        }

        return back()->with('success', 'Data deleted successfully');
    }
}
