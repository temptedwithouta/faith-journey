<?php

namespace App\Http\Requests;

use Illuminate\Support\Collection;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexDevotionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'search' => ['sometimes', 'required', 'string', 'max:100'],
            'filterCategory' => ['sometimes', 'required', 'string', 'max:100'],
            'orderBy' => ['sometimes', 'required', 'string', 'max:100', Rule::in(['Newest', 'Most Popular', 'Oldest'])],
        ];
    }

    protected function passedValidation()
    {
        $validated = collect($this->validated());

        $this->replace($validated->when(
            $validated->has('filterCategory'),
            fn(Collection $collection, bool $value): Collection =>
            $collection->merge([
                'filter' => [
                    'filterCategory' => $collection->get('filterCategory'),
                ]
            ])->except('filterCategory')
        )->toArray());
    }
}
