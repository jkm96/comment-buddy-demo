@extends('app')

@section('content')

    <div class="max-w-2xl mx-auto py-8 space-y-10">
        <h1 class="text-3xl text-red-500 font-bold">🗨️ Comment Buddy Demo</h1>

        @if ($post)
            <div class="p-6 border bg-gray-700 shadow">
                <h2 class="text-xl text-red-500 font-semibold">{{ $post->title }}</h2>
                <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $post->content }}</p>

                <div class="mt-4">
                    <livewire:comment-section :post="$post"/>
                </div>

                @if(!auth()->check())
                    <livewire:auth-modal/>
                @endif
            </div>
        @else
            <p>No posts available. Please run the seeder.</p>
        @endif
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('login-successful', () => {
                window.location.reload();
            });

            Livewire.on('toast-message', (event) => {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                };

                const type = event.details.type || 'info';
                const message = event.details.message || '';

                switch (type) {
                    case 'success':
                        toastr.success(message);
                        break;
                    case 'error':
                        toastr.error(message);
                        break;
                    case 'warning':
                        toastr.warning(message);
                        break;
                    case 'info':
                    default:
                        toastr.info(message);
                }
            });
        });
    </script>

@endsection
