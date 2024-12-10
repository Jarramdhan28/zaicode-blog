<div>
    <x-app-layout>
        <div class="max-w-4xl mx-auto pt-20">
            <div class="pt-8">
                <div class="flex justify-center items-center gap-2">
                    <div>
                        <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">{{$article->category->name}}</span>
                    </div>
                    <div>
                        &middot;
                    </div>
                    <div>
                        <p>{{\Carbon\Carbon::parse($article->created_at)->format('F Y')}}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <h2 class="text-5xl font-bold text-center">{{$article->title}}</h2>
                </div>
            </div>

            <div class="w-4/5 m-auto">
                <img src="{{asset('storage/'.$article->image)}}" class="object-cover m-auto w-full rounded-lg">
            </div>

            <div class="flex justify-between items-center mt-8">
                <div class="flex justify-start items-center gap-2">
                    <img src="{{ $article->user->profile_photo_path ? asset('storage/' . $article->user->profile_photo_path) : url('https://dummyimage.com/300x300&text=zaicode') }}" alt="" class="w-10 rounded-full">
                    {{$article->user->name}}
                </div>
                <div class="pt-2">
                    <livewire:like-button :key="'likebutton-' . $article->id" :$article />
                </div>
            </div>


            <div class="text-lg pt-4 prose max-w-4xl">
                {!! \Illuminate\Support\Str::markdown($article->content) !!}
            </div>

            {{-- komentar --}}
            <livewire:article-comments :key="'comments-' . $article->id" :$article />
        </div>
        <x-footer/>
    </x-app-layout>
</div>
