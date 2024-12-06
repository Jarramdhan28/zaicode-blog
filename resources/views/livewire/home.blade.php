<div>
    <x-app-layout>
        {{-- Hero Section --}}
        <div class="bg-gradient-to-r from-cyan-100 to-red-100">
            <div class="hero py-36 md:py-60 max-w-7xl mx-auto">
                <h2 class="text-7xl text-center font-bold">
                   <span class="font-brush">Zaicode</span> is your ultimate destination for articles and tutorials
                </h2>
                <p class="text-center mt-4 text-md">
                    Resources on web application development. Whether you're a budding developer or a seasoned professional, our blog provides you with the latest trends and best practices
                </p>

                <div class="flex justify-center items-center mt-6">
                    <form action="#">
                        <input type="button" value="Get Started" class="bg-blue-500 px-10 py-4 rounded-full text-white">
                    </form>
                </div>
            </div>
        </div>

        {{-- Article --}}
        <div class="py-6 md:py-10 max-w-7xl mx-auto px-4">
            <h2 class="text-5xl font-semibold text-center">Article</h2>
            <p class="text-center">Code with Passion, Deliver with Precision</p>

            {{-- Article Card --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
                @foreach ($article as $data )
                    <div class="max-w-full rounded overflow-hidden shadow-lg">
                        <a wire:navigate href="{{ route('article.page', $data->slug)}}">
                            <img class="w-full object-cover h-60 hover:scale-105" src="{{asset('storage/'.$data->image)}}" alt="Sunset in the mountains">
                        </a>
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">
                                    <a wire:navigate href="{{ route('article.page', $data->slug)}}" class="hover:text-slate-700">
                                        {{Str::limit($data->title, 60, '...')}}
                                    </a>
                                </div>
                                <div class="text-gray-700 text-base">
                                    {!! Str::limit($data->content, 75, '...') !!}
                                </div>
                            </div>
                            <div class="px-6 pt-4 pb-6">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                    {{$data->category->name}}
                                </span>
                            </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- footer --}}
        <x-footer/>
    </x-app-layout>
</div>
