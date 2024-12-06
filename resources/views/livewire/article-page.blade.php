<div>
    <x-app-layout>
        <div class="max-w-4xl mx-auto pt-20">
            <div class="w-4/5 m-auto">
                <img src="{{asset('storage/'.$article->image)}}" class="object-cover m-auto w-full">
            </div>

            <div class="pt-8">
                <p class="pb-2">{{$article->user->name}} - {{\Carbon\Carbon::parse($article->created_at)->format('D F Y')}}</p>
                <h2 class="text-4xl font-bold">{{$article->title}}</h2>
                <div class="pt-2">
                    <livewire:like-button :key="'likebutton-' . $article->id" :$article />
                </div>
            </div>

            <div class="text-lg pt-4 prose max-w-4xl">
                {!! \Illuminate\Support\Str::markdown($article->content) !!}
            </div>

            <div class="mt-6">
                <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">{{$article->category->name}}</span>
            </div>

            {{-- komentar --}}
            <livewire:article-comments :key="'comments-' . $article->id" :$article />
        </div>
        <x-footer/>
    </x-app-layout>
</div>
