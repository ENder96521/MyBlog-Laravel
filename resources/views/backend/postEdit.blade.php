<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-5">
            {{ __('PostCreate') }}
        </h2>
        <!-- 新增文章按鈕 -->
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form id="createPostForm" action="/update-post" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{ $post->id }}">
                {{ csrf_field() }}
                <input type="hidden" name="content" id="hiddenContent">
                <h2 class="dark:text-white">author</h2>
                <input type="text" name="author" placeholder="Ender" value="{{ $post->author }}">
                <h2 class="dark:text-white">title</h2>
                <input type="text" name="title" class="w-full" value="{{ $post->title }}">
                <h2 class="dark:text-white">content</h2>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-5">
                    <div id="editor">{{ $post->content }}</div>
                </div>
                <button type="submit" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800">更新</button>
            </form>
        </div>
    </div>
</x-app-layout>
