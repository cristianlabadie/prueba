<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePollRequest;
use App\Poll;

class PollsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('polls.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePollRequest $request)
    {
        $poll = Poll::create($request->all());
        $message = '';
        if($request->score <= 6) {
            $message = '¿Por qué NO recomendaría la el proceso de selección?';
        } elseif ($request->score >= 7 && $request->score <= 8) {
            $message = "¿Qué podemos mejorar en el proceso de selección para que si lo recomiendes?";
        } elseif ($request->score >= 9) {
            $message = "Gracias por tu evaluación, nos puedes dejas tus comentarios o sugerencias a continuación";
        }
        return back()->with('info',$message);
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
