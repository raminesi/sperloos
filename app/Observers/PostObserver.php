<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\PostLog;
use Illuminate\Support\Facades\Auth;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        if(Auth::user()){
            PostLog::create([
                'user_id' => Auth::user()->id,
                'post_id' => $post->id,
                'action' => "created"
            ]);
        }
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        PostLog::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'action' => "updated"
        ]);
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        PostLog::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'action' => "deleted"
        ]);
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        PostLog::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'action' => "restored"
        ]);
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        PostLog::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'action' => "forceDeleted"
        ]);
    }
}
