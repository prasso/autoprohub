<?php

namespace Prasso\AutoProHub;

class AutoProHubPanelManager
{
    /**
     * Get the AutoProHub resources.
     *
     * @return array
     */
    public function getAutoProHubResources(): array
    {
        return [
            \Prasso\AutoProHub\Filament\Resources\CustomerResource::class,
        ];
    }
}
