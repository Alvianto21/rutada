<div class="flex flex-col items-center mt-4">
    @if ($paginator->hasPages())
        <span class="text-sm text-gray-700 dark:text-gray-400">
            Showing
            @if ($paginator->hasMorePages())
                <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->firstItem() }}</span>
                to
                <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->lastItem() }}</span>
            @else
                <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->firstItem() }}</span>
                to
                <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total() }}</span>
            @endif
            of
            <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total() }}</span>
            Entries
        </span>

        <div class="inline-flex mt-2 xs:mt-0">
            @if ($paginator->onFirstPage())
                <button disabled class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-s cursor-default dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                    Prev
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Prev
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Next
                </a>
            @else
                <button disabled class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e cursor-default dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Next
                </button>
            @endif
        </div>
    @endif
</div>