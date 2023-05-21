<nav class="flex flex-wrap justify-center mb-3">
    @component('components.button', [
        'type' => 'button',
        'route' => 'cardRegistrationView',
        'color' => 'blue',
        'label' => 'Register card',
    ])
    @endcomponent
    @component('components.button', [
        'type' => 'button',
        'route' => 'cardCollection',
        'color' => 'green',
        'label' => 'My collection',
    ])
    @endcomponent
</nav>
