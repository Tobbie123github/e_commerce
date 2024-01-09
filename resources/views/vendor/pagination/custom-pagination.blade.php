@if ($paginator->hasPages())
    <ul class="pagination" style="width:80%; margin:1rem auto; display: flex; justify-content: space-between; list-style: none; padding-left: 0;">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <!-- Disabled state for first page -->
            <li style="background-color: #010101; color: #ffff; padding:0.6rem; border-radius: 8px; display:none" class="disabled"><span>Previous</span></li>
        @else
            <!-- Link to the previous page -->
            <li style="background-color: #010101; color: #ffff; padding:0.6rem; border-radius: 8px;"><a style="color: #ffff;" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a></li>
        @endif

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <!-- Link to the next page -->
            <li style="background-color: #010101; color: #ffff; padding:0.6rem; border-radius: 8px;" ><a style="color: #ffff;" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
        @else
            <!-- Disabled state for last page -->
            <li style="background-color: #010101; color: #ffff; padding:0.6rem; border-radius: 8px; display:none" class="disabled"><span>Next</span></li>
        @endif
    </ul>
@endif