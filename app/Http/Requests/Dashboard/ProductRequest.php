<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use App\Rules\Product\OfferRule;
use App\Rules\Product\FreeShippingRule;
use App\Rules\Product\UniqueChildSizeRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $productId = $this->route('product');
        return [
            'code' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'code')
                    ->ignore((int)$productId)
                    ->whereNull('parent_id'),
            ],
            'name.en' => 'required|string|max:255',
            'name.ar' => 'required|string|max:255',
            "content.ar" => "nullable|string|max:1000",
            "content.en" => "nullable|string|max:1000",
            "brand_id" => "required|exists:brands,id",

            "categories" => "required|array|min:1",
            "categories.*" => "required|exists:categories,id",

            "order_max" => "required|numeric|min:1",
            "order_limit" => "required|numeric|min:1",
            "size_id" => "required|exists:sizes,id",
            "order_id" => "required|numeric|min:0",
            "active" => "required|boolean",
            "feature" => "required|boolean",
            "is_new" => "required|boolean",
            "is_returned" => "required|boolean",
            "is_stock" => "required|boolean",
            "is_special" => "required|boolean",
            "is_filter" => "required|boolean",
            "is_sale" => "required|boolean",
            "is_late" => "required|boolean",
            "is_offer" => ['required', 'boolean', new OfferRule($this)],
            "is_shipping_free" => ['required', 'boolean', new FreeShippingRule($this)],
            "images" => $productId ? "nullable|array" : "required|array|min:1",
            "images.*" => $productId ? "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048" : "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "price" => "required|numeric|min:0",
            "offer_price" => ['required_if:is_offer,true', 'numeric', 'min:0', new OfferRule($this)],
            "link" => "required|string|max:50",

            'children' => ['nullable', 'array', new UniqueChildSizeRule()],
            'children.*.color_id' => ['required', 'exists:colors,id'],
            'children.*.sizes' => ['required', 'array'],
            'children.*.is_offer' => ['required', 'boolean'],
            'children.*.price' => ['required', 'numeric', 'min:1'],
            'children.*.offer_price' => ['nullable', 'numeric', 'min:1'],
            'children.*.images' => ['nullable', 'array'],
            'children.*.images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],


        ];
    }
    public function messages()
    {
        return [
            // الكود
            'code.required' => __("validation.required", ['attribute' => __('site.code')]),
            'code.string'   => __("validation.string", ['attribute' => __('site.code')]),
            'code.max'      => __("validation.max.string", ['attribute' => __('site.code'), 'max' => 255]),
            'code.unique'   => __("validation.unique", ['attribute' => __('site.code')]),

            // الاسم
            'name.ar.required' => __("validation.required", ['attribute' => __('site.name_ar')]),
            'name.en.required' => __("validation.required", ['attribute' => __('site.name_en')]),
            'name.ar.string'   => __("validation.string", ['attribute' => __('site.name_ar')]),
            'name.en.string'   => __("validation.string", ['attribute' => __('site.name_en')]),
            'name.ar.max'      => __("validation.max.string", ['attribute' => __('site.name_ar'), 'max' => 255]),
            'name.en.max'      => __("validation.max.string", ['attribute' => __('site.name_en'), 'max' => 255]),

            // المحتوى
            'content.ar.string' => __("validation.string", ['attribute' => __('site.content_ar')]),
            'content.en.string' => __("validation.string", ['attribute' => __('site.content_en')]),
            'content.ar.max'    => __("validation.max.string", ['attribute' => __('site.content_ar'), 'max' => 1000]),
            'content.en.max'    => __("validation.max.string", ['attribute' => __('site.content_en'), 'max' => 1000]),

            // البراند
            'brand_id.required' => __("validation.required", ['attribute' => __('site.brand')]),
            'brand_id.exists'   => __("validation.exists", ['attribute' => __('site.brand')]),

            // التصنيفات
            'categories.required' => __("validation.required", ['attribute' => __('site.categories')]),
            'categories.array'    => __("validation.array", ['attribute' => __('site.categories')]),
            'categories.min'      => __("validation.min.array", ['attribute' => __('site.categories'), 'min' => 1]),
            'categories.*.required' => __("validation.required", ['attribute' => __('site.category')]),
            'categories.*.exists'   => __("validation.exists", ['attribute' => __('site.category')]),

            // الحدود الرقمية
            'order_max.required' => __("validation.required", ['attribute' => __('site.order_max')]),
            'order_max.numeric'  => __("validation.numeric", ['attribute' => __('site.order_max')]),
            'order_max.min'      => __("validation.min.numeric", ['attribute' => __('site.order_max'), 'min' => 1]),

            'skip.required' => __("validation.required", ['attribute' => __('site.skip')]),
            'skip.numeric'  => __("validation.numeric", ['attribute' => __('site.skip')]),
            'skip.min'      => __("validation.min.numeric", ['attribute' => __('site.skip'), 'min' => 1]),

            'start.required' => __("validation.required", ['attribute' => __('site.start')]),
            'start.numeric'  => __("validation.numeric", ['attribute' => __('site.start')]),
            'start.min'      => __("validation.min.numeric", ['attribute' => __('site.start'), 'min' => 1]),

            'order_id.required' => __("validation.required", ['attribute' => __('site.order_id')]),
            'order_id.numeric'  => __("validation.numeric", ['attribute' => __('site.order_id')]),
            'order_id.min'      => __("validation.min.numeric", ['attribute' => __('site.order_id'), 'min' => 0]),

            // الفلاجز (Boolean)
            'active.required'  => __("validation.required", ['attribute' => __('site.active')]),
            'active.boolean'   => __("validation.boolean", ['attribute' => __('site.active')]),

            'featured.required' => __("validation.required", ['attribute' => __('site.featured')]),
            'featured.boolean'  => __("validation.boolean", ['attribute' => __('site.featured')]),

            'is_new.required' => __("validation.required", ['attribute' => __('site.is_new')]),
            'is_new.boolean'  => __("validation.boolean", ['attribute' => __('site.is_new')]),

            'is_returned.required' => __("validation.required", ['attribute' => __('site.is_returned')]),
            'is_returned.boolean'  => __("validation.boolean", ['attribute' => __('site.is_returned')]),

            'is_stock.required' => __("validation.required", ['attribute' => __('site.is_stock')]),
            'is_stock.boolean'  => __("validation.boolean", ['attribute' => __('site.is_stock')]),

            'is_special.required' => __("validation.required", ['attribute' => __('site.is_special')]),
            'is_special.boolean'  => __("validation.boolean", ['attribute' => __('site.is_special')]),

            'is_filter.required' => __("validation.required", ['attribute' => __('site.is_filter')]),
            'is_filter.boolean'  => __("validation.boolean", ['attribute' => __('site.is_filter')]),

            'is_sale.required' => __("validation.required", ['attribute' => __('site.is_sale')]),
            'is_sale.boolean'  => __("validation.boolean", ['attribute' => __('site.is_sale')]),

            'is_late.required' => __("validation.required", ['attribute' => __('site.is_late')]),
            'is_late.boolean'  => __("validation.boolean", ['attribute' => __('site.is_late')]),

            'is_offer.required' => __("validation.required", ['attribute' => __('site.is_offer')]),
            'is_offer.boolean'  => __("validation.boolean", ['attribute' => __('site.is_offer')]),

            'is_shipping_free.required' => __("validation.required", ['attribute' => __('site.is_shipping_free')]),
            'is_shipping_free.boolean'  => __("validation.boolean", ['attribute' => __('site.is_shipping_free')]),

            // الصور
            'images.required' => __("validation.required", ['attribute' => __('site.images')]),
            'images.array'    => __("validation.array", ['attribute' => __('site.images')]),
            'images.min'      => __("validation.min.array", ['attribute' => __('site.images'), 'min' => 1]),
            'images.*.image'  => __("validation.image", ['attribute' => __('site.image')]),
            'images.*.mimes'  => __("validation.mimes", ['attribute' => __('site.image')]),
            'images.*.max'    => __("validation.max.file", ['attribute' => __('site.image'), 'max' => 2048]),

            // السعر
            'price.required' => __("validation.required", ['attribute' => __('site.price')]),
            'price.numeric'  => __("validation.numeric", ['attribute' => __('site.price')]),
            'price.min'      => __("validation.min.numeric", ['attribute' => __('site.price'), 'min' => 0]),

            'offer_price.required_if' => __("validation.required_if", ['attribute' => __('site.offer_price'), 'other' => __('site.is_offer'), 'value' => 1]),
            'offer_price.numeric'     => __("validation.numeric", ['attribute' => __('site.offer_price')]),
            'offer_price.min'         => __("validation.min.numeric", ['attribute' => __('site.offer_price'), 'min' => 0]),

            // الأطفال
            'children.array' => __("validation.array", ['attribute' => __('site.children')]),

            'children.*.size_id.required' => __("validation.required", ['attribute' => __('site.child_size')]),
            'children.*.size_id.exists'   => __("validation.exists", ['attribute' => __('site.child_size')]),

            'children.*.is_offer.required' => __("validation.required", ['attribute' => __('site.child_is_offer')]),
            'children.*.is_offer.boolean'  => __("validation.boolean", ['attribute' => __('site.child_is_offer')]),

            'children.*.colors.required' => __("validation.required", ['attribute' => __('site.child_colors')]),
            'children.*.colors.array'    => __("validation.array", ['attribute' => __('site.child_colors')]),
            'children.*.colors.*.required' => __("validation.required", ['attribute' => __('site.child_color')]),
            'children.*.colors.*.string'   => __("validation.string", ['attribute' => __('site.child_color')]),
            'children.*.colors.*.max'      => __("validation.max.string", ['attribute' => __('site.child_color'), 'max' => 255]),

            'children.*.price.required' => __("validation.required", ['attribute' => __('site.child_price')]),
            'children.*.price.numeric'  => __("validation.numeric", ['attribute' => __('site.child_price')]),
            'children.*.price.min'      => __("validation.min.numeric", ['attribute' => __('site.child_price'), 'min' => 1]),

            'children.*.offer_price.numeric' => __("validation.numeric", ['attribute' => __('site.child_offer_price')]),
            'children.*.offer_price.min'     => __("validation.min.numeric", ['attribute' => __('site.child_offer_price'), 'min' => 1]),
        ];
    }
    public function withValidator($validator)
    {
        $validator->sometimes('children.*.images', 'required|array|min:1', function ($input) {
            if (!isset($input->children)) return false;

            foreach ($input->children as $child) {
                if (empty($child['id'])) {
                    return true;
                }
            }

            return false;
        });
    }
}
