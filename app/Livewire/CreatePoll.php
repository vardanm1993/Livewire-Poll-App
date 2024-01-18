<?php

namespace App\Livewire;

use App\Models\Poll;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = [''];

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

    public function createPoll()
    {
        Poll::create([
            'title' => $this->title,
        ])->options()->createMany(
            collect($this->options)
                ->map(fn($option) => ['name' => $option])
                ->all()
        );

        $this->reset('title', 'options');
    }
}
