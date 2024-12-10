<div>
    <x-app-layout>
        {{-- Hero Section --}}
        <div class="bg-gradient-to-r from-blue-200 to-red-100 rounded-lg">
            <div class="hero py-36 md:py-56 max-w-4xl mx-auto">
                <h2 class="text-6xl text-center font-bold">
                   Zaicode is your ultimate destination for articles and tutorials
                </h2>
                <p class="text-center mt-4 text-md">
                    Resources on web application development. Whether you're a budding developer or a seasoned professional, our blog provides you with the latest trends and best practices
                </p>

                <div class="flex justify-center items-center mt-6">
                    <a href="#article" class="bg-blue-600 rounded-lg py-2 px-4 text-white hover:bg-blue-700 transition duration-150 ease-in-out">Get Started</a>
                </div>
            </div>
        </div>

        {{-- Article --}}
        <div class="py-6 md:py-24 max-w-7xl mx-auto px-4" id="article">
            <h2 class="text-4xl font-semibold text-center">Best Article</h2>
            <p class="text-center">Code with Passion, Deliver with Precision</p>
            {{-- Article Card --}}
           <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-8">
                <div>  
                    <div class="max-w-full rounded overflow-hidden shadow-lg">
                        <a wire:navigate href="{{ route('article.page', $firstBestArticle->slug)}}">
                            <img class="w-full object-cover h-56 hover:scale-105 transition duration-150 ease-in-out" src="{{asset('storage/'.$firstBestArticle->image)}}" alt="Sunset in the mountains">
                        </a>
                            <div class="px-4 py-6">
                                <div class="text-xs font-semibold mb-2 text-gray-500">
                                    {{$firstBestArticle->user->name}} &middot; {{\Carbon\Carbon::parse($firstBestArticle->created_at)->format('D F Y')}}
                                </div>
                                <div class="font-bold text-xl mb-2">
                                    <a wire:navigate href="{{ route('article.page', $firstBestArticle->slug)}}" class="hover:text-slate-700">
                                        {{Str::limit($firstBestArticle->title, 60, '...')}}
                                    </a>
                                </div>
                                <div class="text-gray-700 text-base">
                                    {!! Str::limit($firstBestArticle->content, 130, '...') !!}
                                </div>
                            </div>
                            <div class="px-4 pb-6">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                    {{$firstBestArticle->category->name}}
                                </span>
                            </div>
                    </div>
                </div>

                <div>
                     <div class="grid grid-cols-1 gap-4">
                        @foreach ($bestArticle as $data )
                            <div class="max-w-full rounded overflow-hidden shadow-lg">
                                <div class="flex justify-start">
                                    <div>
                                        <a wire:navigate href="{{ route('article.page', $data->slug)}}">
                                            <img class="w-96 object-cover h-52 hover:scale-105 transition duration-150 ease-in-out" src="{{asset('storage/'.$data->image)}}" alt="{{$data->title}}">
                                        </a>
                                    </div>

                                    <div>
                                        <div class="px-4 py-4">
                                            <div class="text-xs font-semibold mb-2 text-gray-500">
                                                {{$data->user->name}} &middot; {{\Carbon\Carbon::parse($data->created_at)->format('D F Y')}}
                                            </div>
                                            <div class="font-bold text-xl mb-2">
                                                <a wire:navigate href="{{ route('article.page', $data->slug)}}" class="hover:text-slate-700">
                                                    {{Str::limit($data->title, 60, '...')}}
                                                </a>
                                            </div>
                                            <div class="text-gray-700 text-base">
                                                {!! Str::limit($data->content, 75, '...') !!}
                                            </div>
                                        </div>
                                        <div class="px-6 pb-4">
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                                {{$data->category->name}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
           </div>
        </div>

        {{-- Last Article --}}
        <div class="py-6 md:pt-6 pb-2 max-w-7xl mx-auto px-4" id="article">
            <h2 class="text-4xl font-semibold text-center">Latest Article</h2>
            <p class="text-center">Code with Passion, Deliver with Precision</p>

            {{-- Article Card --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
                @foreach ($article as $data )
                    <div class="max-w-full rounded overflow-hidden shadow-lg">
                        <a wire:navigate href="{{ route('article.page', $data->slug)}}">
                            <img class="w-full object-cover h-60 hover:scale-105 transition duration-150 ease-in-out" src="{{asset('storage/'.$data->image)}}" alt="Sunset in the mountains">
                        </a>
                            <div class="px-6 py-4">
                                 <div class="text-xs font-semibold mb-2 text-gray-500">
                                    {{$data->user->name}} &middot; {{\Carbon\Carbon::parse($data->created_at)->format('D F Y')}}
                                </div>
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

            <div class="flex justify-center my-6">
                <a wire:navigate href="{{ route('article')}}" class="bg-blue-600 hover:bg-blue-700 rounded-lg text-white py-2 px-4">See More</a>
            </div>
        </div>

        {{-- footer --}}
        <x-footer/>
    </x-app-layout>
</div>
