<?php

namespace App\Http\Guards;

use App\Models\Customer;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;

class CustomerGuard implements Guard
{
    protected $user;

    public function attempt($credentials): bool
    {
        $customer = Customer::where('email', $credentials['email'])->first();

        if (!$customer || !($credentials['password'] == $customer->password)) {
            return false;
        }

        $this->setUser($customer);
        return true;
    }

    public function check()
    {
        // TODO: Implement check() method.
    }

    public function guest()
    {
        // TODO: Implement guest() method.
    }

    public function id()
    {
        // TODO: Implement id() method.
    }

    public function validate(array $credentials = [])
    {
        // TODO: Implement validate() method.
    }

    public function hasUser()
    {
        // TODO: Implement hasUser() method.
    }

    public function user(): ?Authenticatable
    {
        return $this->user;
    }

    public function setUser(Authenticatable $user): void
    {
        $this->user = $user;
    }

}
