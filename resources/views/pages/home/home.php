<?php

use App\Models\Subscriber;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

new #[Layout('layouts::app')] #[Title('LINKINGROAD - Turn Every Comment Into Revenue | AI Social Automation')] class extends Component
{
    #[Validate('required|email|max:255')]
    public string $email = '';

    public bool $subscribed = false;
    public int $totalSubscribersCount = 1480;
    public string $billingCycle = 'yearly';
    public string $activeSolution = 'creators';

    public function mount(): void
    {
        $this->totalSubscribersCount = 1480 + Subscriber::count();
    }

    public function setBillingCycle(string $cycle): void
    {
        $this->billingCycle = $cycle;
    }

    public function setSolution(string $solution): void
    {
        $this->activeSolution = $solution;
    }

    public function subscribe(): void
    {
        $this->validate();

        Subscriber::firstOrCreate(
            ['email' => $this->email],
            [
                'ip_address' => request()->ip(),
                'status' => 'active',
            ]
        );

        $this->subscribed = true;
        $this->reset('email');
        $this->totalSubscribersCount++;
    }
};