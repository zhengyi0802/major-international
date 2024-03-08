<ul>
  @foreach($childs as $child)
    <li>
      <a href="{{ route('qalists.edit', $child->id); }}" >{{ $child->question }}</a>
      @if(count($child->childs()))
        @include('qalists.manageChild', ['childs' => $child->childs()])
      @endif
    </li>
  @endforeach
</ul>
