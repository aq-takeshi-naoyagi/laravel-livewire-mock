<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <p>顧客名検索</p>
    <input type="text" wire:model.defer="word">
    <button type="button" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
            wire:click.prevent="openModal()">検索</button>


    <x-jet-modal wire:model="modalStatus">
        <x-slot name="slot">
            <div class="flex justify-between items-center border-b p-2 text-xl">
                <div></div>
                <h6 class="text-xl font-bold">タスク検索結果</h6>
                <button type="button" wire:click.prevent="closeModal()">✖</button>
            </div>
            <div class="p-10">
                <!-- content -->
                <form class="w-full">
{{--                    <div class="md:flex md:items-center mb-6">--}}
{{--                        <div class="md:w-1/3">--}}
{{--                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"--}}
{{--                                   for="inline-first-name">--}}
{{--                                名前--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        <div class="md:w-2/3">--}}
{{--                            <input--}}
{{--                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"--}}
{{--                                id="inline-first-name" type="text" value="" name="firstname" wire:model="firstname">--}}
{{--                            @error('firstname')--}}
{{--                            <span class="block sm:inline text-red-700">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div>
{{--                        <form wire:submit.prevent="render" method="GET">--}}
{{--                            <div>--}}

{{--                                <button>--}}
{{--                                    検索--}}
{{--                                </button>--}}
{{--                            </div>--}}


{{--                        </form>--}}



{{--                        <div>--}}
{{--                            @foreach ($posts as $post)--}}
{{--                                <form method="POST" action="/modaltest">--}}
{{--                                    <input type="submit" name={{$post->task}}>--}}
{{--                                </form>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}

                        <form method="post" action="modaltest">
                            @foreach ($posts as $post)
                                <td>{{ link_to_route('dashboard', $post->task, ['item' => $post->task]) }}</td>
                            @endforeach
                        </form>



                    </div>
                </form>
            </div>
        </x-slot>
    </x-jet-modal>
</div>
