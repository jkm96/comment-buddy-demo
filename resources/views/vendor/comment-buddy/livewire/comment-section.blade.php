<div class="comment-section my-2">
    @if($isAuthenticated)
        <form wire:submit.prevent="submit" class="mb-4 text-left">
            <textarea wire:model.defer="body" rows="2" class="w-full p-2 text-sm border border-gray-500 focus:outline-none
                                    focus:border-gray-400 focus:ring-1 focus:ring-gray-400 focus:ring-opacity-50" placeholder="Write a comment..."></textarea>
            @error('body') <p class="text-red-500 text-xs mb-1">{{ $message }}</p> @enderror

            <button type="submit"
                    class="bg-gray-900 text-white text-xs py-1 px-2 flex items-center justify-center gap-2">
                <span wire:loading.remove>Post Comment</span>
                <span wire:loading>
                   Loading...
                </span>
            </button>
        </form>
    @endif

    @forelse($comments as $comment)
        <livewire:comment-thread
            :comment="$comment"
            :depth="0"
            :key="'comment-'.$comment->id.'-'.$comment->updated_at"
        />
    @empty
        <p class="text-sm text-gray-500">No comments yet.</p>
    @endforelse
</div>
