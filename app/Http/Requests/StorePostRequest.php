<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => ['required', 'min:8'],
            'image' => ['nullable', 'image'],
            'description' => ['required', 'min:15', 'max:255'],
            'content' => ['required', 'min:25'],
            'view' => ['required', 'integer', 'min:0']
        ];
    }

    //Thông báo lỗi
    public function messages()
    {
        return [
            'title.required' => "Tiêu đề không được để trống",
            'title.min' => "Tiêu đề phải ít nhất 8 ký tự",
            'image.image' => "File nhập phải là ảnh",
            'description.required' => "Mô tả không được để trống",
            'description.min' => "Mô tả phải ít nhất 15 ký tự",
            'description.max' => "Mô tả không được quá 255 ký tự",
            'content.required' => "Nội dung không được để trống",
            'content.min' => 'Nội dung phải ít nhất 25 ký tự',
            'view.required' => "Lượt xem không được để trống",
            'view.integer' => "Lượt xem phải là số nguyên",
            'view.min' => "Lượt xem phải >= 0",
        ];
    }
}
