<nav class="flex flex-wrap justify-center mb-3">
    @component('components.button', [
        'type' => 'button',
        'onclick' => '',
        'color' => 'blue',
        'label' => 'Find Cards',
    ])
    @endcomponent
    @component('components.button', [
        'type' => 'button',
        'onclick' => '',
        'color' => 'green',
        'label' => 'My collection',
    ])
    @endcomponent
</nav>
