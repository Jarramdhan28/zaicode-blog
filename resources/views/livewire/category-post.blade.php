<div>
    <x-app-layout>
        <div class="bg-gradient-to-r from-cyan-100 to-red-100">
            <div class="hero py-20 md:pt-28 md:pb-24">
                <p class="px-3 py-1 text-sm font-semibold text-gray-700 mr-2 text-center mx-auto">
                    Zaicode
                </p>
                <h2 class="text-5xl text-center font-bold">
                    Article Categories
                </h2>
                <p class="text-center mt-4 text-md">
                    Resources on web application development. Whether you're a budding developer or a seasoned
                    professional, our
                    blog provides you with the latest trends and best practices
                </p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto pt-10 space-x-8 px-4">
            <div class="md:basis-3/4">
                <h2 class="font-semibold text-2xl">Latest Categories</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
                    @foreach ($category as $data )
                    <div class="max-w-full rounded overflow-hidden shadow-lg">
                        <a wire:navigate href="{{ route('category.page', $data->id)}}" class="hover:text-slate-700">
                            <img class="w-full object-cover h-60 hover:scale-105" src="{{'storage/'.$data->image}}" alt="Sunset in the mountains">
                        </a>
                        <div class="px-6 py-4">
                            <a wire:navigate href="{{ route('category.page', $data->id)}}" class="hover:text-slate-700">
                                <div class="font-bold text-xl mb-2">{{Str::limit($data->name, 60, '...')}}</div>
                            </a>
                            <p class="text-gray-700 text-base">
                                {{Str::limit($data->description, 75, '...')}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="py-8">
                    {{ $category->links() }}
                </div>
            </div>
        </div>

        <x-footer class="mt-8" />
    </x-app-layout>
</div>
