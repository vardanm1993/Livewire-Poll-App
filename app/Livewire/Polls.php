<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Polls extends Component
{
    protected $listeners = [
        'pollCreated' => 'render'
    ];

    public function render(): View
    {
        $polls = Poll::with('options.votes')->latest()->get();
        return view('livewire.polls', compact('polls'));
    }

    public function vote(Option $option): void
    {
        $option->votes()->create();
    }
}
