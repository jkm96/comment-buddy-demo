<div>
    <p class="text-sm">
        <button wire:click="openAuthModal(true)" class=" hover:cursor-pointer underline">You must be logged in to comment.</button>
    </p>

    <div x-data="{ show: @entangle('showModal') }" x-cloak x-show="show"
         class="fixed inset-0 bg-opacity-40 backdrop-blur-sm flex items-center justify-center z-50">
        <div @click.away="$wire.closeModal()" class="bg-gray-600 w-96 p-4 rounded-sm">

            @if($isLogin)
                <h2 class="text-md font-semibold mb-2 ">Login</h2>

                <form wire:submit.prevent="loginUser">
                    <div class="mb-2">
                        <label for="email" class="block text-sm font-semibold text-left">Email</label>
                        <input type="email" id="email" wire:model="email"
                               class=" w-full p-2 text-sm border border-gray-500 rounded focus:outline-none
                                    focus:border-gray-400 focus:ring-1 focus:ring-gray-400 focus:ring-opacity-50"
                               required/>
                        @error('email') <span class="w-full text-red-500 text-xs text-left">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="password" class="block text-sm font-semibold text-left">Password</label>
                        <input type="password" id="password" wire:model="password"
                               class="w-full p-2 text-sm border border-gray-500 rounded focus:outline-none
                                    focus:border-gray-400 focus:ring-1 focus:ring-gray-400 focus:ring-opacity-50"
                               required/>
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-2 text-center">
                        <button type="submit"
                                class="bg-gray-800 w-full text-sm py-1.5 px-2 rounded-md flex items-center justify-center gap-2">
                            <span wire:loading.remove>Login</span>
                            <span wire:loading>
                                Loading...
                            </span>
                        </button>
                    </div>

                    <p class="text-xs text-center mt-3">
                        Don’t have an account?
                        <button wire:click="$set('isLogin', false)" class=" underline">Register</button>
                    </p>
                </form>
            @else
                <h2 class="text-md font-semibold mb-2 ">Register</h2>

                <form wire:submit.prevent="register">
                    <div class="mb-2">
                        <label for="name" class="block text-sm font-semibold  text-left">Name</label>
                        <input type="text" id="name" wire:model="name" required
                               class="w-full p-2 text-sm border border-gray-500 rounded focus:outline-none
                                    focus:border-gray-400 focus:ring-1 focus:ring-gray-400 focus:ring-opacity-50"/>
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="email" class="block text-sm font-semibold  text-left">Email</label>
                        <input type="email" id="email" wire:model="email" required
                               class="w-full p-2 text-sm border border-gray-500 rounded focus:outline-none
                                    focus:border-gray-400 focus:ring-1 focus:ring-gray-400 focus:ring-opacity-50"/>
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="password" class="block text-sm font-semibold  text-left">Password</label>
                        <input type="password" id="password" wire:model="password" required
                               class="w-full p-2 text-sm border border-gray-500 rounded focus:outline-none
                                    focus:border-gray-400 focus:ring-1 focus:ring-gray-400 focus:ring-opacity-50"/>
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-2 text-center">
                        <button type="submit"
                                class=" w-full text-sm py-1.5 px-2 rounded-md flex items-center justify-center gap-2">
                            <span wire:loading.remove>Register</span>
                            <span wire:loading>
                                Loading...
                            </span>
                        </button>
                    </div>

                    <p class="text-xs text-center mt-3">
                        Already have an account?
                        <button wire:click="$set('isLogin', true)" class=" underline">Login</button>
                    </p>
                </form>

            @endif
        </div>
    </div>
</div>
