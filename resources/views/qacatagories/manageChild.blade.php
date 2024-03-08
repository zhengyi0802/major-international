<ul>
  @foreach($childs as $child)
    <li>
      {{ $child->question }}
      @if(count($child->childs()))
        @include('qacatagories.manageChild', ['childs' => $child->childs()])
      @endif
    </li>
  @endforeach
</ul>
