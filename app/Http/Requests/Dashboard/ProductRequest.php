<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\FreeShippingRule;
use App\Rules\OfferAmountAddRule;
use App\Rules\OfferAmountRule;
use App\Rules\OfferPercentRule;
use App\Rules\OfferRule;
use App\Rules\OrderMaxRule;
use App\Rules\PriceOfferRule;
use App\Rules\UniqueChildColorRule; // 👈 استدعاء القاعدة الجديدة
use App\Rules\ValidServiceCategoriesRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        // if ($this->has('categories') && is_array($this->input('categories'))) {
        //     $cleanCategories = array_map(fn($id) => (int) $id, $this->input('categories'));
        //     $this->merge(['categories' => $cleanCategories]);
        // }
        $isShippingFree = $this->input('is_shipping_free');

        if ($isShippingFree === 1 || $isShippingFree === '1' || $isShippingFree === true) {
            $this->merge([
                'shipping' => 0,
            ]);
        }

        if ($this->has('children') && is_array($this->input('children'))) {
            $children = $this->input('children');
            foreach ($children as $index => $child) {
                if (isset($child['sizes']) && is_array($child['sizes'])) {
                    $children[$index]['sizes'] = array_map(fn($sizeId) => (int) $sizeId, $child['sizes']);
                }
            }
            $this->merge(['children' => $children]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productId = optional($this->product)->id;
        $childrenRules = [];

        if ($this->has('children') && is_array($this->input('children'))) {
            foreach ($this->input('children') as $index => $child) {
                $childrenRules["children.{$index}.color_id"] = [
                    'required',
                    'exists:colors,id',
                    new UniqueChildColorRule($this->input('children'), $index)
                ];

                $childrenRules["children.{$index}.sizes"] = [
                    'required',
                    'array',
                    'min:1',
                    'exists:sizes,id'
                ];

                $childrenRules["children.{$index}.images"] = [
                    'required',
                    'array',
                    'min:1',

                ];

                $childrenRules["children.{$index}.is_offer"] = ['required', 'boolean'];
                $childrenRules["children.{$index}.price"] = ['required', 'numeric', 'gt:1'];
                $childrenRules["children.{$index}.offer_price"] = [
                    'nullable',
                    'numeric',
                    'min:1',
                    "required_if:children.{$index}.is_offer,1",
                    "gt:children.{$index}.price",
                ];
            }
        }


        return array_merge([
            'code' => [
                'required',
                'string',
                'max:255',

                'regex:/^[A-Z0-9\-\_]+$/i',

                Rule::unique('products', 'code')
                    ->ignore($productId)
                    ->where(function ($query) {
                        return $query->whereNull('parent_id');
                    }),
            ],
            'images.*' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5000'],
            'children.*.images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5000'],
            "name.ar" => "required|string|max:255",
            "name.en" => "required|string|max:255",
            "content.ar" => "nullable|string|max:1000",
            "content.en" => "nullable|string|max:1000",

            'price' => ['required', 'numeric', 'gt:1'],

            'is_offer' => ['required', 'boolean', new OfferRule($this)],
            'offer_amount' => ['nullable', 'numeric', 'min:1', 'max:99', new OfferAmountRule($this)],
            'offer_amount_add' => ['nullable', 'numeric', 'min:1', 'max:99', 'required_with:offer_amount', new OfferAmountAddRule($this)],
            'offer_price' => ['nullable', 'numeric', 'min:1', new PriceOfferRule($this)],


            'is_shipping_free' => ['required', 'boolean'],
            'shipping' => ['nullable', 'numeric', 'min:0', 'required_if:is_shipping_free,0'],
            'order_max' => ['required', 'numeric', 'min:1'],

            'brand_id' => 'nullable|exists:brands,id',
            'size_id' => 'nullable|exists:sizes,id',

            'categories' => ['required', 'array'],
            'categories.*' => ['required',  'exists:categories,id'],

            'order_id' => 'nullable|integer|min:1',
            'children' => ['required', 'array', 'min:1'],

        ], $childrenRules);
    }



    public function messages()
    {
        $messages = parent::messages();

        $messages['children.*.color_id.required'] = __("validation.required", ["attribute" => __("site.color") . ' ' . __('site.for_child')]);
        $messages['children.*.sizes.required'] = __("validation.required", ["attribute" => __("site.sizes") . ' ' . __('site.for_child')]);
        $messages['children.*.sizes.min'] = __("validation.min.array", ["attribute" => __("site.sizes") . ' ' . __('site.for_child'), 'min' => 1]);
        $messages['children.*.images.required'] = __("validation.required", ["attribute" => __("site.images") . ' ' . __('site.for_child')]);
        $messages['children.*.images.min'] = __("validation.min.array", ["attribute" => __("site.images") . ' ' . __('site.for_child'), 'min' => 1]);

        $messages['unique_color_in_children'] = __('validation.unique_color_in_children');

        $messages['children.*.offer_price.gt'] = __("validation.gt.numeric", ["attribute" => __("site.offer_price"), "value" => __("site.price")]);


        return $messages;
    }
}
