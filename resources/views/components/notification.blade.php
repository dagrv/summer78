<div x-data="{ body: '' }"
    x-show="body.length"
    x-cloak
    x-on:notification.window="body = $event.detail.body; setTimeout(() => body = '', $event.detail.timeout || 3500)"
    class="fixed inset-0 flex px-4 py-6 items-start pointer-events-none">
    <div class="w-full flex flex-col items-center space-y-4">
        <div class="max-w-sm w-full bg-black rounded-lg pointer-events-auto">
            <div class="p-4 flex items-center">
                <div class="ml-2 w-0 flex-1 text-lg text-white" x-text="body"></div>

                <button class="inline-flex text-gray-300" x-on:click="body = ''">
                    <span class="sr-only">Close</span>
                    <span class="text-3xl text-red-600">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>