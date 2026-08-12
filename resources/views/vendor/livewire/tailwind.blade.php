@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <!-- Mobile Layout (Previous / Next Buttons only) -->
            <div class="flex justify-between flex-1 sm:hidden">
                <span>
                    @if ($paginator->onFirstPage())
                        <span class="relative inline-flex items-center px-3.5 py-1.5 text-xs font-semibold text-on-surface-variant/40 bg-white/[0.005] border border-white/10 rounded-md cursor-default select-none">
                            {!! __('pagination.previous') !!}
                        </span>
                    @else
                        <button type="button" 
                                wire:click="previousPage('{{ $paginator->getPageName() }}')" 
                                x-on:click="{{ $scrollIntoViewJsSnippet }}" 
                                wire:loading.attr="disabled" 
                                class="relative inline-flex items-center px-3.5 py-1.5 text-xs font-semibold text-on-surface-variant hover:text-on-surface bg-white/[0.01] hover:bg-white/5 border border-white/10 rounded-md transition-colors cursor-pointer disabled:opacity-50">
                            {!! __('pagination.previous') !!}
                        </button>
                    @endif
                </span>

                <span>
                    @if ($paginator->hasMorePages())
                        <button type="button" 
                                wire:click="nextPage('{{ $paginator->getPageName() }}')" 
                                x-on:click="{{ $scrollIntoViewJsSnippet }}" 
                                wire:loading.attr="disabled" 
                                class="relative inline-flex items-center px-3.5 py-1.5 text-xs font-semibold text-on-surface-variant hover:text-on-surface bg-white/[0.01] hover:bg-white/5 border border-white/10 rounded-md transition-colors cursor-pointer disabled:opacity-50">
                            {!! __('pagination.next') !!}
                        </button>
                    @else
                        <span class="relative inline-flex items-center px-3.5 py-1.5 text-xs font-semibold text-on-surface-variant/40 bg-white/[0.005] border border-white/10 rounded-md cursor-default select-none">
                            {!! __('pagination.next') !!}
                        </span>
                    @endif
                </span>
            </div>

            <!-- Desktop Layout (Full number bar) -->
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between gap-4">
                <div>
                    <p class="text-xs text-on-surface-variant/60 font-sans">
                        <span>{!! __('Showing') !!}</span>
                        <span class="font-bold text-on-surface">{{ $paginator->firstItem() }}</span>
                        <span>{!! __('to') !!}</span>
                        <span class="font-bold text-on-surface">{{ $paginator->lastItem() }}</span>
                        <span>{!! __('of') !!}</span>
                        <span class="font-bold text-on-surface">{{ $paginator->total() }}</span>
                        <span>{!! __('results') !!}</span>
                    </p>
                </div>

                <div>
                    <span class="relative z-0 inline-flex rounded-md border border-white/10 bg-white/[0.005] overflow-hidden">
                        
                        <!-- Previous Page Button Link -->
                        <span>
                            @if ($paginator->onFirstPage())
                                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                    <span class="relative inline-flex items-center px-2 py-1.5 text-xs font-semibold text-on-surface-variant/35 bg-transparent border-r border-white/10 cursor-default" aria-hidden="true">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            @else
                                <button type="button" 
                                        wire:click="previousPage('{{ $paginator->getPageName() }}')" 
                                        x-on:click="{{ $scrollIntoViewJsSnippet }}" 
                                        class="relative inline-flex items-center px-2 py-1.5 text-xs font-semibold text-on-surface-variant/80 hover:text-on-surface bg-transparent hover:bg-white/5 border-r border-white/10 transition-colors focus:outline-none cursor-pointer" 
                                        aria-label="{{ __('pagination.previous') }}">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @endif
                        </span>

                        <!-- Pagination Link Items -->
                        @foreach ($elements as $element)
                            <!-- Three Dots Separator -->
                            @if (is_string($element))
                                <span aria-disabled="true">
                                    <span class="relative inline-flex items-center px-3.5 py-1.5 text-xs font-semibold text-on-surface-variant/50 bg-transparent border-r border-white/10 cursor-default select-none">{{ $element }}</span>
                                </span>
                            @endif

                            <!-- Array Of Page Number Links -->
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <span aria-current="page">
                                                <span class="relative inline-flex items-center px-3.5 py-1.5 text-xs font-bold text-on-primary-container bg-primary-container border-r border-white/10 select-none">{{ $page }}</span>
                                            </span>
                                        @else
                                            <button type="button" 
                                                    wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" 
                                                    x-on:click="{{ $scrollIntoViewJsSnippet }}" 
                                                    class="relative inline-flex items-center px-3.5 py-1.5 text-xs font-semibold text-on-surface-variant/80 hover:text-on-surface bg-transparent hover:bg-white/5 border-r border-white/10 transition-colors focus:outline-none cursor-pointer" 
                                                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                {{ $page }}
                                            </button>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach

                        <!-- Next Page Button Link -->
                        <span>
                            @if ($paginator->hasMorePages())
                                <button type="button" 
                                        wire:click="nextPage('{{ $paginator->getPageName() }}')" 
                                        x-on:click="{{ $scrollIntoViewJsSnippet }}" 
                                        class="relative inline-flex items-center px-2 py-1.5 text-xs font-semibold text-on-surface-variant/80 hover:text-on-surface bg-transparent hover:bg-white/5 border-white/10 transition-colors focus:outline-none cursor-pointer" 
                                        aria-label="{{ __('pagination.next') }}">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @else
                                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                    <span class="relative inline-flex items-center px-2 py-1.5 text-xs font-semibold text-on-surface-variant/35 bg-transparent cursor-default" aria-hidden="true">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            @endif
                        </span>

                    </span>
                </div>
            </div>
        </nav>
    @endif
</div>
