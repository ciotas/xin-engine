<?php

namespace App\Observers;

use App\Models\Knowledge;

class KnowledgeObserver
{
    /**
     * Handle the Knowledge "created" event.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return void
     */
    public function created(Knowledge $knowledge)
    {
        $knowledge->tags()->searchable();
    }

    /**
     * Handle the Knowledge "updated" event.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return void
     */
    public function updated(Knowledge $knowledge)
    {
        $knowledge->tags()->searchable();
    }

    /**
     * Handle the Knowledge "deleted" event.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return void
     */
    public function deleted(Knowledge $knowledge)
    {
        //
    }

    /**
     * Handle the Knowledge "restored" event.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return void
     */
    public function restored(Knowledge $knowledge)
    {
        //
    }

    /**
     * Handle the Knowledge "force deleted" event.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return void
     */
    public function forceDeleted(Knowledge $knowledge)
    {
        //
    }
}
