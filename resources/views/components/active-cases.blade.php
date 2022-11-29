<div class="active-cases">
  @foreach($cases as $case)
  <div class="py-1">
  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900">
        <x-active-case :case="$case"></x-active-case>
      </div>
  </div>
</div>
  @endforeach
</div>
