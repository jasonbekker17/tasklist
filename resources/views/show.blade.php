
@extends('layouts.app')


@section('title',$task->title)
@section('content')

<div class="mb-4">
<a class="link" href="{{route('tasks.index')}}"> <- Back to all task</a>
</div>

<P class="mb-4 text-slate-700">
    {{$task->description}}
</P>

@if($task->long_description)
    <p class="mb-4 text-slate-700" >{{ $task->long_description}}</p>
@endif

<p class='mb-4 text-sm text-slate-500'>created {{ $task->created_at->diffForHumans() }}</p>

<p class='mb-4 text-sm text-slate-500'> updated {{ $task->updated_at->diffForHumans() }}</p>
<p class="mb-4">
    @if($task->completed)
    <span  class='font-medium text-green-500' class>completed</span>

    @else
   <span  class='font-medium text-red-500' class>not completed</span>
    @endif

</p>

<div class="flex  gap-2">
    <a class="btn" href="{{route('tasks.edit', ['task'=>$task->id])}}">
        Edit
    </a>

    <form  method="POST"  action="{{route('tasks.toggle-complete', ['task'=>$task])}}">
        @csrf
        @method('PUT')
        <button type="submit" class="btn">
            Mark as {{$task->completed ?'not completed ' : ' completed '}} 
        </button>


    </form>

    <form method="POST"  action="{{route('tasks.destroy',['task'=>$task->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">
            Delete Task
        </button>
    </form>
</div>
@endsection