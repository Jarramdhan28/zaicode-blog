<div class="mt-8">
    <h1 class="text-2xl font-semibold">Discussions</h1>
    @auth
        <div class="mt-4">
            <textarea wire:model="comment" name="comment" id="comment" class="w-full rounded-md border-cyan-200 focus-none"></textarea>
            <button wire:click="postComment" class="p-2 bg-black text-white px-6 rounded-md hover:bg-slate-900">Send</button>
        </div>
    @else
        <div class="mt-4">
            <a href="{{ route('login')}}" wire:navigate class="underline text-blue-900 text-xl">Login to Comments</a>
        </div>
    @endauth

    <div class="mt-10">
        @forelse ($this->comments as $comment)
            <div class="flex justify-start items-start gap-2 mt-6">
                <img src="{{ asset($comment->user->profile_photo_path)}}" alt="" class="rounded-full w-12 h-12">
                <p class="text-xl font-semibold">{{$comment->user->name}}</p>
                <p class="text-sm text-slate-500">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
            <div class="mt-3">
                <p>{{$comment->comment}}</p>
            </div>
        @empty
            <div class="mt-3 flex justify-center items-center text-md">
                <p class="text-slate-600">No Comments Posted</p>
            </div>
        @endforelse
    </div>

    <div class="my-4">
        {{ $this->comments->links() }}
    </div>
</div>
