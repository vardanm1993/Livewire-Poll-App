<?php

namespace App\Livewire;

use App\Models\Poll;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = [''];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:3|max:50'
    ];

    protected $messages = [
        'options.*' => "The option field must be at least 3 to 50 characters and can't be empty "
    ];

    public function render(): View
    {
        return view('livewire.create-poll');
    }

    public function addOption(): void
    {
        $this->options[] = '';
    }

    public function removeOption($index): void
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function createPoll(): void
    {
        $this->validate();

        Poll::create([
            'title' => $this->title,
        ])->options()->createMany(
            collect($this->options)
                ->map(fn($option) => ['name' => $option])
                ->all()
        );

        $this->reset('title', 'options');

        $this->dispatch('pollCreated');
    }
}
