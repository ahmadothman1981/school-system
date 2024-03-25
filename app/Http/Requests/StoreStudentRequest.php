<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
class StoreStudentRequest extends FormRequest
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'numeric' ],
            'address' => ['required', 'string', 'max:255'],
            'date_of_birth'=>['required','date'],
            'image'=>'extensions:png,jpg,jpeg',
            'notes'=>['string', 'max:255'],
            'semester_id'=>['required']
           
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'الإسم مطلوب',
            'name.max' => 'الاسم يجب ان يكون اقل من 255 حرف.',
            'email.required' => 'الإيميل مطلوب.',
            'email.email' => 'من فضلك ادخل ايميل صحيح',
            'email.unique' => 'الايميل مستخدم من قبل',
            'phone.required' => ' رقم التليفون مطلوب .',
            'phone.numeric' => 'منفضلك ادخل رقم تليفون صحيح.',
            'date_of_birth.required'=>'تاريخ الميلاد مطلوب',
            'image.extensions' => 'الصورة يجب ان تكون بامتداد png jpg jpeg .',
            'semester_id'=>'مطلوب اختيار الفصل الدراسى'


        ];
    }
}
