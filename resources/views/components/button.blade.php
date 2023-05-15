<button type={{ $type }} onclick="@php echo $onclick; @endphp"
    class="@php echo "border font-bold border-white-500 bg-".$color."-800
        text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-orange-800 focus:outline-none
        focus:shadow-outline"; @endphp">{{ $label }}</button>
