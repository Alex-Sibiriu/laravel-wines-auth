<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WineRequest extends FormRequest
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
      'winery' => 'required|min:3|max:500',
      'wine' => 'required|min:3|max:100',
      'rating_average' => 'required|max:4',
      'rating_reviews' => 'required|max:15',
      'location' => 'required|min:3|max:100',
      'image' => 'required|min:3|max:255',
    ];
  }

  public function messages(): array
  {
    return [
      'winery.required' => 'Inserire una vigna di provenienza',
      'winery.min' => 'La vigna deve contenere almeno :min caratteri',
      'winery.max' => 'La vigna non deve contenere più di :max caratteri',

      'wine.required' => 'Inserire un nome',
      'wine.min' => 'Il nome deve contenere almeno :min caratteri',
      'wine.max' => 'Il nome non deve contenere più di :max caratteri',

      'rating_average.required' => 'Inserire un voto medio',
      'rating_average.max' => 'Il voto medio non deve contenere più di :max caratteri',

      'rating_reviews.required' => 'Inserire il numero di recensioni',
      'rating_reviews.max' => 'Il numero di recensioni non deve contenere più di :max caratteri',

      'location.required' => 'Inserire un luogo di origine',
      'location.min' => 'Il luogo di origine deve contenere almeno :min caratteri',
      'location.max' => 'Il luogo di origine non deve contenere più di :max caratteri',

      'image.required' => 'Inserire una immagine',
      'image.min' => 'L\'immagine deve contenere almeno :min caratteri',
      'image.max' => 'L\'immagine non deve contenere più di :max caratteri',
    ];
  }
}
