<?php

namespace App\Observers;

use App\Models\ModuleMenuTab;

class ModuleMenuTabObserver
{
    /**
     * Handle the ModuleMenuTab "created" event.
     *
     * @param  \App\Models\ModuleMenuTab  $moduleMenuTab
     * @return void
     */
    public function created(ModuleMenuTab $moduleMenuTab)
    {
        $moduleMenuTab->order = $moduleMenuTab->id;
    }

    /**
     * Handle the ModuleMenuTab "updated" event.
     *
     * @param  \App\Models\ModuleMenuTab  $moduleMenuTab
     * @return void
     */
    public function updated(ModuleMenuTab $moduleMenuTab)
    {
        //
    }

    /**
     * Handle the ModuleMenuTab "deleted" event.
     *
     * @param  \App\Models\ModuleMenuTab  $moduleMenuTab
     * @return void
     */
    public function deleted(ModuleMenuTab $moduleMenuTab)
    {
        //
    }

    /**
     * Handle the ModuleMenuTab "restored" event.
     *
     * @param  \App\Models\ModuleMenuTab  $moduleMenuTab
     * @return void
     */
    public function restored(ModuleMenuTab $moduleMenuTab)
    {
        //
    }

    /**
     * Handle the ModuleMenuTab "force deleted" event.
     *
     * @param  \App\Models\ModuleMenuTab  $moduleMenuTab
     * @return void
     */
    public function forceDeleted(ModuleMenuTab $moduleMenuTab)
    {
        //
    }
}
