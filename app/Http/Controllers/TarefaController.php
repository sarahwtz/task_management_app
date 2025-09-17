<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user_id = auth()->user()->id;
       $tarefas = Tarefa::where('user_id', $user_id)->paginate(10);


       return view('task.index', ['tarefas' => $tarefas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
        [
            'tarefa' => 'required|string|max:200',
            'completion_date' => 'required|date',
        ],
        [
            'tarefa.required' => 'The task field must be filled.',
            'completion_date.required' => 'The completion date field must be filled.',
        ]
    );

    $validated['user_id'] = auth()->user()->id;

    //dd($validated);

    $tarefa = Tarefa::create($validated);

    $destinatario = auth()->user()->email;
    Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));

    return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
       // dd($tarefa);
       //dd($tarefa->getAttributes());
       return view('task.show', ['tarefa' => $tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        $user_id = auth()->user()->id;
    
        if($tarefa->user_id == $user_id) {
         return view('task.edit',['tarefa' => $tarefa]);
        }

        return redirect()->route('access.denied');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $user_id = auth()->user()->id;

    if ($tarefa->user_id != $user_id) {
        return redirect()->route('access.denied');
    }

   
    $validated = $request->validate(
        [
            'tarefa' => 'required|string|max:200',
            'completion_date' => 'required|date',
        ],
        [
            'tarefa.required' => 'The task field must be filled.',
            'completion_date.required' => 'The completion date field must be filled.',
        ]
    );

   
    $tarefa->update($validated);

    
    return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
}

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
