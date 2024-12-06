<div>
    <x-app-layout>
        <div class="bg-gradient-to-r from-cyan-100 to-red-100">
            <div class="hero py-20 md:pt-28 md:pb-24">
                <p class="px-3 py-1 text-sm font-semibold text-gray-700 mr-2 text-center mx-auto">
                    Article Category
                </p>
                <h2 class="text-5xl text-center font-bold">
                    {{$category->name}}
                </h2>
                <p class="text-center mt-4 text-md max-w-7xl m-auto">
                    {{$category->description}}
                </p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto pt-10 space-x-8 px-4">
            <div class="md:basis-3/4">
                <h2 class="font-semibold text-2xl">Latest Articles</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
                    @foreach ($article as $data )
                    <div class="max-w-full rounded overflow-hidden shadow-lg">
                        <a wire:navigate href="{{ route('article.page', $data->slug)}}" class="hover:text-slate-700">
                            <img class="w-full object-cover h-60 hover:scale-105" src="{{'storage/'.$data->image}}"
                                alt="{{$data->title}}">
                        </a>
                        <div class="px-6 py-4">
                            <a wire:navigate href="{{ route('article.page', $data->slug)}}" class="hover:text-slate-700">
                                <div class="font-bold text-xl mb-2">{{Str::limit($data->title, 60, '...')}}</div>
                            </a>
                            <p class="text-gray-700 text-base">
                                {{Str::limit($data->content, 75, '...')}}
                            </p>
                        </div>
                        <div class="px-6 pt-4 pb-6">
                            <span
                                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                {{$data->category->name}}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="py-8">
                    {{ $article->links() }}
                </div>
            </div>
        </div>

        <x-footer class="mt-8" />
    </x-app-layout>
</div>
