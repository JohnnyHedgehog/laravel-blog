<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'title.string' => 'В данное поле необходимо ввести данные строчного типа',
            'content.required' => 'Это поле обязательно для заполнения',
            'content.string' => 'В данное поле необходимо ввести данные строчного типа',
            'preview_image.required' => 'Это поле обязательно для заполнения',
            'preview_image.file' => 'Необходимо выбрать файл',
            'main_image.required' => 'Это поле обязательно для заполнения',
            'main_image.file' => 'Необходимо выбрать файл',
            'category_id.required' => 'Это поле обязательно для заполнения',
            'category_id.integer' => 'id категории должен быть числом',
            'category_id.exist' => 'id категории должен существовать в базе данных',
            'tag_ids.array' => 'Необходимо отправить массив данных'
        ];
    }
}
