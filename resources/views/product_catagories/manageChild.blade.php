<ul>
  @foreach($childs as $child)
    <li>
      <a href="{{ route('product_types.edit', $child->id); }}" >{{ $child->name }}</a>
      @if(count($child->childs()))
        @include('product_types.manageChild', ['childs' => $child->childs()])
      @endif
    </li>
  @endforeach
</ul>
