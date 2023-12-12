<div>
    @if($this->expanded)
        <textarea wire:model="content" rows="4" cols="50">Type Here...</textarea>
        <div class="flex space-x-4 text-white font-bold">
            <button class="text-sm bg-blue-600 hover:bg-blue-700 rounded px-3" wire:click="save">Post</button>
            <button class="text-sm bg-red-600 hover:bg-red-700 rounded px-3" wire:click="collapse">Close</button>
        </div>
    @else
        <button class="text-white font-bold bg-blue-600 hover:bg-blue-700 px-4 py-1 rounded"  wire:click="expand">New Comment</button>
    @endif
</div>
