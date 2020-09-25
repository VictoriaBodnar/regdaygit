<!--@if ($paginator->lastPage() > 1)
<div class="w3-bar w3-light-grey">
    <ul class="pagination">
  <li class=" w3-bar-item w3-button {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}"><a href="{{ $paginator->url(1) }}" class="w3-light-blue">Previous</a></li>  
   @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class=" w3-bar-item w3-button {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
  <li class=" w3-bar-item w3-button {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}"><a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="">Previous</a></li>
  </ul> 
</div>
@endif-->

<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($paginator->lastPage() > 1)
<div class="w3-bar">
    
        <li class=" w3-bar-item w3-button {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url(1) }}"> перша</a>
         </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
               $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class=" w3-bar-item w3-button{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        <li class=" w3-bar-item w3-button{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->lastPage()) }}">остання</a>
        </li>
    
</div>
@endif




