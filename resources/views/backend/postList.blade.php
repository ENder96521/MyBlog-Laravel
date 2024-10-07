<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight m-5">
            {{ __('PostList') }}
        </h2>
        <!-- 新增文章按鈕 -->
        <a href="{{ route('posts.create') }}" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800">
            新增文章
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- 表格 -->
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-gray-700 dark:text-gray-300">標題</th>
                            <th class="px-4 py-2 text-gray-700 dark:text-gray-300">作者</th>
                            <th class="px-4 py-2 text-gray-700 dark:text-gray-300">動作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="border px-4 py-2 text-gray-800 dark:text-gray-300">{{ $post->title }}</td>
                                <td class="border px-4 py-2 text-gray-800 dark:text-gray-300">{{ $post->author }}</td>
                                <td class="border px-4 py-2">
                                    <!-- 更新按鈕 -->
                                    <form action="{{ route('posts.edit', $post->id) }}" method="GET" style="display:inline-block;">
                                        <button type="submit" class="btn btn-secondary bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 dark:bg-green-700 dark:hover:bg-green-800">
                                            更新
                                        </button>
                                    </form>
                                    <!-- 刪除按鈕 -->
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 dark:bg-red-700 dark:hover:bg-red-800">
                                            刪除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- 分頁 -->
                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
