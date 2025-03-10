<?php

namespace App\Http\Requests;

use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        return true;
/*      if($this->user_id == auth()->user()->id){
        return true;
       }else{
        return false;
       }  */
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $post =$this->route()->parameter('post');
       $rules = [
        'name' =>'required',
        'slug'=>'required|unique:posts',
        'status'=> 'required|in:1,2',
        'file'=>'image'
       ];

       if($post){
            $rules['slug'] ='required|unique:posts,slug,'.$post->id;
       }

       if($this-> status == 2){
        $rules= array_merge($rules,[
            'category_id'=> 'required',
            'tags'=> 'required',
            'extract'=> 'required',
            'body'=>'required'
                ]);

       }
       return $rules;
    }
}
