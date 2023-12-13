<div>
    @if($this->expanded_edit)
        <textarea wire:model="content" rows="1" cols="50">Type Here...</textarea>
        <div class="flex space-x-4 text-white font-bold">
            <button class="text-sm bg-blue-600 hover:bg-blue-700 rounded px-3" wire:click="save_edit">Save Changes</button>
            <button class="text-sm bg-red-600 hover:bg-red-700 rounded px-3" wire:click="collapse_edit">Close</button>
        </div>
    @else
        <button class="text-white font-bold bg-blue-600 hover:bg-blue-700 px-4 py-1 rounded text-xs"  wire:click="expand_edit">Edit Comment</button>
    @endif
</div>
