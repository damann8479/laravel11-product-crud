<div class="lg:container mx-auto text-right mt-5">
  @if(session('success'))
    <div class="border border-green-400 rounded-md inline px-5 py-2">
        {{ session('success') }}
        </div>
  @endif
</div>
