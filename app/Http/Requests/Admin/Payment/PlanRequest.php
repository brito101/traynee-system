<?php

namespace App\Http\Requests\Admin\Payment;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {

        $this->merge([
            'amount' => str_replace(',', '.', str_replace('.', '', str_replace('R$ ', '', $this->amount)))
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:1|max:191',
            'interval' => 'required',
            'trial_days' => 'required|numeric|between:0,999999999',
            'amount' => 'required|numeric|between:0,999999999.99',
            'payment_methods' => 'required|in:1,2,3',
            'status' => 'required|in:0,1'
        ];
    }

    public function messages()
    {
        return [
            'amount.between' => 'O campo Valor deve ser entre R$ 0,00 e R$ 999.999.999,99.',
            'payment_methods.in' => 'O campo Métodos de Pagamento deve ser Boleto, Cartão de Crédito ou Boleto e Cartão de Crédito.'
        ];
    }
}
