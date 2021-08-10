@if (session()->has('success'))
    {{--    javascript to timeout success display  x- indicates alpine--}}
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-blue-500 test-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        <p>{{ session('success') }}</p>
    </div>
@endif
