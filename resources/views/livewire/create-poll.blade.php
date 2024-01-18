<div>
    <form wire:submit.prevent="createPoll">
        <label for="poll">Poll Title</label>
        <input type="text" id="poll" wire:model="title">

        <div class=" mt-4 mb-4">
            <button class="btn" wire:click.prevent="addOption">Add Option</button>
        </div>

        <div class="mt-4">
            @foreach($options as $index => $option)
                <div class="mb-4">
                    <label for="option{{ $index + 1 }}">Option {{ $index + 1 }}</label>
                    <div class="flex gap-2">
                        <input wire:model="options.{{ $index }}" id="option{{ $index + 1 }}" type="text">
                        <button class="btn" wire:click.prevent="removeOption({{ $index }})">Remove</button>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn">Create Poll</button>
    </form>
</div>
