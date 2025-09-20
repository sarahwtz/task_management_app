<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TarefasExport implements FromCollection, WithHeadings, Withmapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Tarefa::all();
        return auth()->user()->tarefas()->get();
    }


public function headings():array{
    return [
        'Task ID',
        'Task',
        'Completion date'
       
    ];
    
  }

  public function map($line):array {
    return[
        $line->id,
        $line->tarefa,
        date('d/m/Y',strtotime($line->completion_date)),

    ];

  }
  
}



