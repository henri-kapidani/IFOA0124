{{-- <button>{{ $attributes->get('start') . ' ' . $slot }}</button>
<button>{{ "$attributes->get('start') $slot" }}</button> --}}
<button {{ $attributes->class(['btn', 'ciao']) }}>{{ $attributes->get('start') }} {{ $slot }}</button>
