@props(['sortDirection' => null, 'sortBy' => null, 'field' => null])

@if ($sortBy === $field)
    @if ($sortDirection === 'asc')
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="inline-flex text-blue-500 icon-tabler icons-tabler-outline icon-tabler-sort-ascending-letters">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M15 10v-5c0 -1.38 .62 -2 2 -2s2 .62 2 2v5m0 -3h-4" />
            <path d="M19 21h-4l4 -7h-4" />
            <path d="M4 15l3 3l3 -3" />
            <path d="M7 6v12" />
        </svg>
    @else
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="inline-flex text-blue-500 icon-tabler icons-tabler-outline icon-tabler-sort-descending-letters">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M15 21v-5c0 -1.38 .62 -2 2 -2s2 .62 2 2v5m0 -3h-4" />
            <path d="M19 10h-4l4 -7h-4" />
            <path d="M4 15l3 3l3 -3" />
            <path d="M7 6v12" />
        </svg>
    @endif
@endif