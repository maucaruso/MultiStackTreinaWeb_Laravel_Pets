<?php

namespace App\Rules;

use App\Models\Adocao;
use Illuminate\Contracts\Validation\Rule;

class AdocaoUnicaPet implements Rule
{
    private int $petId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($petId)
    {
        $this->petId = $petId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $jaAdotouEssePet = Adocao::where('email', $value)->where('pet_id', $this->petId)->first();

        return !$jaAdotouEssePet;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Você já adotou esse PET';
    }
}
