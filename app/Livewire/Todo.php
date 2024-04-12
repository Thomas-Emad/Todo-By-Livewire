<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Todo as TodoModel;
use Livewire\WithPagination;

class Todo extends Component
{
    use withPagination;

    #[Rule('required|min:3|max:50')]
    public $title;

    public $search;

    public $editTodoID;
    #[Rule('required|min:3|max:50')]
    public $editTodoTitle;

    public function create()
    {
        $this->validateOnly('title');
        TodoModel::create([
            'title' => $this->title,
            'user_id' => Auth()->user()->id
        ]);
        $this->reset("title");
        $this->resetPage();
    }
    public function toggle($todoID)
    {
        $todo = TodoModel::find($todoID);
        $todo->update(['complate' => !$todo->complate]);
    }
    public function edit($todoID)
    {
        $this->editTodoID = $todoID;
        $this->editTodoTitle = TodoModel::find($todoID)->title;
    }
    public function cancel()
    {
        $this->reset("editTodoID", "editTodoTitle");
    }
    public function update($todoID)
    {
        $this->validateOnly("editTodoTitle");
        TodoModel::find($todoID)->update(['title' => $this->editTodoTitle]);
        $this->reset("editTodoID", "editTodoTitle");
        $this->resetPage();
    }
    public function delete($todoID)
    {
        TodoModel::find($todoID)->delete();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.todo', [
            'todos' => TodoModel::where("user_id", Auth()->user()->id)->where("title", "like", "%{$this->search}%")->paginate(5),
        ]);
    }
}
