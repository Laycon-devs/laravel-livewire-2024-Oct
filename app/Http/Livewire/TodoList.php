<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;


class TodoList extends Component
{
    use WithPagination;
    public $newTodo;
    public $searchTodo;
    public $errorMsg;
    public $editingTodoId;
    public $editingTodoName;

    public function handleCreateTodo()
    {
        // validating
        $this->validate(['newTodo' => 'required|min:3|max:50']);
        // creating
        Todo::create(['name' => $this->newTodo]);
        // reseting
        $this->newTodo = '';
        $this->resetPage();
        // send msg
        session()->flash('success', 'Todo Created');
    }

    public function handleCheckTodo($todoId)
    {
        $todo = Todo::findOrFail($todoId);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function editTodo($todoCurrentId, $todoCurrentName)
    {
        try {
            $this->editingTodoId = $todoCurrentId;
            $this->editingTodoName = $todoCurrentName;
        } catch (Exception $e) {
            session()->flash('failed', 'Something went wrong Todo not available to edit');
        }
    }

    public function updateTodo($todoId)
    {
        $this->validate(['editingTodoName' => 'required|min:3|max:50']);
        $todo = Todo::findOrFail($todoId);
        $todo->update([
            'name' => $this->editingTodoName
        ]);
        $this->editingTodoId = null;
    }

    public function deleteTodo($todoId)
    {
        try {
            $todo = Todo::findOrFail($todoId);
            $todo->delete();
        } catch (Exception $e) {
            session()->flash('failed', 'Something went wrong try, again');
        }
    }

    public function render()
    {

        $todos = Todo::latest()->where('name', 'like', '%' . $this->searchTodo . '%')->paginate(5);
        if ($todos->isEmpty()) {
            $this->errorMsg = 'Not found, do you want to create it';
        } else {
            $this->errorMsg = '';
        }
        return view(
            'livewire.todo-list',
            [
                'todos' => $todos,
                '$errorMsg' => $this->errorMsg
            ]
        );
    }
}
