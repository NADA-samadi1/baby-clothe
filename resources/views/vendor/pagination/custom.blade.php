<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Styled Pagination</title>
  <style>
    .pagination {
      display: flex;
      justify-content: center;
      list-style: none;
      padding: 0;
    }

    .page-item {
      margin: 0 5px;
    }

    .circle {
      width: 30px;
      height: 30px;
      background-color: black; /* Circle background color */
      color: #fff; /* Circle text color */
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      font-size: 14px;
      text-decoration: none;
    }

    .arrow {
      font-size: 18px;
      color: #333; /* Arrow color */
      text-decoration: none;
    }

    .arrow:hover,
    .circle:hover {
      text-decoration: none;
      cursor: pointer;
      color: #262424
    }

    .disabled {
      pointer-events: none;
      opacity: 0.5; /* Reduced opacity for disabled elements */
    }
  </style>
</head>
<body>

@if($paginator->hasPages())
    <ul class="pagination justify-content-center">
        @if($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="arrow">&laquo; Previous</span>
            </li>
        @else
            <li class="page-item">
                <a class="arrow" href="{{$paginator->previousPageUrl()}}">&laquo; Previous</a>
            </li>
        @endif

        <!-- Loop through the pages -->
        @foreach($elements as $element)
            <!-- Case: Single page -->
            @if(is_string($element))
                <li class="page-item disabled">
                    <span class="circle">{{$element}}</span>
                </li>
            @endif

            <!-- Case: Multiple pages -->
            @if(is_array($element))
                @foreach($element as $page => $url)
                    @if($page == $paginator->currentPage())
                        <li class="page-item">
                            <span class="circle">{{$page}}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="circle" href="{{$url}}">{{$page}}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if($paginator->hasMorePages())
            <li class="page-item">
                <a class="arrow" href="{{$paginator->nextPageUrl()}}">Next &raquo;</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="arrow">Next &raquo;</span>
            </li>
        @endif
    </ul>
@endif

</body>
</html>
