<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\FreeShippingRule;
use App\Rules\OfferAmountAddRule;
use App\Rules\OfferAmountRule;
use App\Rules\OfferPercentRule;
use App\Rules\OfferRule;
use App\Rules\OrderMaxRule;
use App\Rules\PriceOfferRule;
use App\Rules\UniqueChildColorRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->input('is_shipping_free') == 1) {
            $this->merge(['shipping' => 0]);
        }

        if ($this->has('children') && is_array($this->children)) {
            $children = $this->children;
            foreach ($children as $index => $child) {
                if (isset($child['sizes']) && is_array($child['sizes'])) {
                    $children[$index]['sizes'] = array_map('intval', $child['sizes']);
                }
            }
            $this->merge(['children' => $children]);
        }
    }

    public function rules(): array
    {
        $product = $this->product;
        $productId = $product?->id;


        $oldProductImages = $product ? $product->images()->count() : 0;

        $deletedProductImages = $this->delete_ids
            ? count(array_filter(explode(',', $this->delete_ids)))
            : 0;

        $mustUploadProductImages = ($deletedProductImages >= $oldProductImages);

        $childrenRules = [];

        if (is_array($this->children)) {

            foreach ($this->children as $index => $child) {

                $childModel = $product
                    ? $product->children()->find($child['id'] ?? null)
                    : null;

                $oldChildImages = $childModel ? $childModel->images()->count() : 0;

                $deletedChildImages = isset($child['delete_ids'])
                    ? count(array_filter(explode(',', $child['delete_ids'])))
                    : 0;

                $mustUploadChildImages = ($deletedChildImages >= $oldChildImages);

                $childrenRules["children.$index.color_id"] = [
                    'required',
                    'exists:colors,id',
                    new UniqueChildColorRule($this->children, $index)
                ];

                $childrenRules["children.$index.sizes"] = [
                    'required',
                    'array',
                    'min:1',
                    'exists:sizes,id'
                ];


                $childrenRules["children.$index.images"] = [
                    $mustUploadChildImages ? 'required' : 'sometimes',
                    'array',
                    'min:1'
                ];

                $childrenRules["children.$index.images.*"] = [
                    $mustUploadChildImages ? 'required' : 'sometimes',
                    'image',
                    'mimes:jpg,jpeg,png,webp',
                    'max:5000'
                ];

                $childrenRules["children.$index.is_offer"] = ['required', 'boolean'];
                $childrenRules["children.$index.price"] = ['required', 'numeric', 'gt:1'];

                $childrenRules["children.$index.offer_price"] = [
                    'nullable',
                    'numeric',
                    'min:1',
                    "required_if:children.$index.is_offer,1",
                    "lt:children.$index.price",
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
                    ->where(fn($q) => $q->whereNull('parent_id')),
            ],


            'images' => [
                $mustUploadProductImages ? 'required' : 'sometimes',
                'array',
                'min:1'
            ],

            'images.*' => [
                $mustUploadProductImages ? 'required' : 'sometimes',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5000'
            ],

            "name.ar" => "required|string|max:255",
            "name.en" => "required|string|max:255",

            "content.ar" => "nullable|string|max:1000",
            "content.en" => "nullable|string|max:1000",


            'price' => ['required', 'numeric', 'gt:1'],
            'is_offer' => ['required', 'boolean', new OfferRule($this)],
            'offer_amount' => ['nullable', 'numeric', 'min:1', 'max:99', new OfferAmountRule($this)],
            'offer_amount_add' => [
                'nullable',
                'numeric',
                'min:1',
                'max:99',
                'required_with:offer_amount',
                new OfferAmountAddRule($this)
            ],
            'offer_price' => ['nullable', 'numeric', 'min:1', new PriceOfferRule($this)],

            'is_shipping_free' => ['required', 'boolean'],
            'shipping' => ['nullable', 'numeric', 'min:0', 'required_if:is_shipping_free,0'],

            'order_max' => ['required', 'numeric', 'min:1'],
            'brand_id' => 'nullable|exists:brands,id',
            'size_id' => 'nullable|exists:sizes,id',
            'categories' => ['required', 'array'],
            'categories.*' => ['required', 'exists:categories,id'],

            'order_id' => 'nullable|integer|min:1',
            'children' => ['required', 'array', 'min:1'],

        ], $childrenRules);
    }

    public function messages()
    {
        return [
            'children.*.color_id.required' => __("validation.required", ["attribute" => __("site.color")]),
            'children.*.sizes.required' => __("validation.required", ["attribute" => __("site.sizes")]),
            'children.*.sizes.min'      => __("validation.min.array", ["attribute" => __("site.sizes"), 'min' => 1]),
            'children.*.images.required' => __("validation.required", ["attribute" => __("site.images")]),
            'children.*.images.min' => __("validation.min.array", ["attribute" => __("site.images"), 'min' => 1]),

            'children.*.offer_price.lt' => __("validation.lt.numeric", [
                "attribute" => __("site.offer_price"),
                "value" => __("site.price")
            ]),
        ];
    }
}
