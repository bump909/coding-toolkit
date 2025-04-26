<?php

namespace App\Console\Commands;

use App\Models\Cart;
use Illuminate\Console\Command;

class RemoveInactiveGuestCarts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-inactive-guest-carts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove inactive Session based carts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $carts = Cart::whereDoesntHave('user')->whereDate('created_at', '<', now()->subDay(1))->get();

        foreach ($carts as $cart) {
            $cart->cartItems()->delete();
            $cart->delete();
        }
    }
}
