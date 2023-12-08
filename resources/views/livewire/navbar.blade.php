<div class="bg-gray-800 py-4 px-4">
    <nav class="flex justify-between items-center">
        <a href="/posts" class="text-white font-bold bg-transparent hover:bg-gray-700 px-4 py-2 rounded" wire:navigate>Posts</a>
        <a href="/users" class="text-white font-bold bg-transparent hover:bg-gray-700 px-4 py-2 rounded" wire:navigate>Users</a>
        <a href="/account" class="text-white font-bold bg-transparent hover:bg-gray-700 px-4 py-2 rounded">Account</a>
        <a href="{{ route('posts.create') }}" class="text-white font-bold bg-transparent hover:bg-gray-700 px-4 py-2 rounded">New Post</a>
    </nav>
</div>
