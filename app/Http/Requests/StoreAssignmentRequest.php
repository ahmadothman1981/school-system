<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssignmentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'notes'=>['required','string', 'max:255'],
            'exam_date'=>['required','date'],
            'semester_id'=>['required'],
            'teacher_id'=>['required'],
            'subject_id'=>['required'],


        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الإسم مطلوب',
            'name.max' => 'الاسم يجب ان يكون اقل من 255 حرف.',
            'notes.required'=>'الرجاء كتابة المللاحظات المطلوبة ',
            'exam_date.required'=>'الرجاء اختيار التاريخ',
            'semester_id'=>'مطلوب اختيار اسم الفصل الدراسى',
            'teacher_id'=>'مطلوب اختيار مدرس المادة',
            'subject_id'=>'مطلوب اختيار المادة الدراسية',


        ];
    }
}
