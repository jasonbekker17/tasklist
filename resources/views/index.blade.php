@extends('layouts.app')

@section('title','The lists of tasks')

@section('content')


    
   @forelse ($tasks as $task)
        
       <div>
        <a href="{{ route('tasks.show',['task' =>$task->id]) }}">
        {{ $task->title }}
        
      </a>
      @empty
        <div>
            There are no tasks!
        </div>
       </div>
   
   @endforelse


@endsection