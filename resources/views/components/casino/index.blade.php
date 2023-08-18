<div
    class="block md:bg-[url(https://img.traveltriangle.com/blog/wp-content/uploads/2018/09/hong-kong-casinos-cover.jpg)] h-full">
    <div class="backdrop-blur-md h-screen ">
        <div class="bg-black w-full absolute inset-x-0 md:relative md:bg-transparent md:h-fit ">
            <img src="/images/logo.png" alt="Casino"
                class="w-1/2 px-4 py-2 md:max-w-xs md:px-0 md:py-5 md:block md:mx-auto " />
            <div class="relative">
                <img src="/images/banner.png" alt="Casino" class="md:hidden" />
                <div
                    class="absolute text-white text-2xl top-[10%]  font-medium px-4 md:relative md:mx-auto md:text-center ">
                    {{ __('TOP 5 Real Money Online Casino Bonus List!') }}</div>
                <div class="hidden md:flex text-white text-sm text-center  place-content-center mt-6">
                    {{ __('Play online slots for real money at trusted online casinos is Europe. Claim your exclusive welcome bonus and start playing slots today!') }}'
                </div>
                <div
                    class="absolute bg-gray-800 opacity-70 bottom-14 inset-x-0 py-4 md:relative md:bg-transparent md:opacity-100 md:bottom-auto">
                    <p class="text-white font-bold md:text-center px-4">{{ __('10,302 Claimed Bonuses And Counting!') }}
                    </p>
                </div>
            </div>
            <p id="message"
                class="text-green-500 py-2 font-medium text-center fixed top-6 right-3 md:relative md:top-auto md:right-auto"
                style="display: none;"></p>
            {{-- mobile --}}
            <x-casino.casino-mobile :casinos="$casinos" />
            {{-- desktop --}}
            <x-casino.casino-desktop :casinos="$casinos" />
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const messageElement = document.getElementById('message');
        const buttons = document.querySelectorAll('.play-button');

        buttons.forEach(button => {
            button.addEventListener('click', async () => {
                const buttonId = button.getAttribute('data-button-id');
                const ipAddress = '{{ request()->ip() }}';
                const currentDate = new Date().toISOString();

                try {
                    const response = await fetch('/save-click', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            button_id: buttonId,
                            user_ip: ipAddress,
                            datetime: currentDate
                        }),
                    });

                    const data = await response.json();
                    const message = data.message;
                    messageElement.textContent = message;
                    messageElement.style.display = 'block';

                    setTimeout(() => {
                        messageElement.style.display = 'none';
                    }, 5000);
                } catch (error) {
                    console.log('Error:', error);
                }
            });
        });
    });
</script>
