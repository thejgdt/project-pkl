<section {{ $attributes->merge(['class' => 'h-screen']) }}>
    <div class="mx-auto my-auto pt-16 sm:pt-24 lg:pt-32 py-8 sm:py-16 lg:py-24">
        {{ $slot }}
    </div>
</section>
