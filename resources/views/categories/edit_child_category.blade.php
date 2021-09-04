
  @php
      $value = null;
      for ($i = 0; $i < $childCategory->level; $i++) {
          $value .= '--';
      }
  @endphp
  <option value="{{ $childCategory->id }}" @if ($product->category_id == $childCategory->id) selected @endif>
      {{ $value . ' ' . $childCategory->getTranslation('name') }}</option>
  @if ($childCategory->categories)
      @foreach ($childCategory->categories as $childCategory)
          @include('categories.edit_child_category', ['child_category' => $childCategory])
      @endforeach
  @endif
