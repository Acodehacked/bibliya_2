<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'language',
        'question_text',
        'options',
        'correct_answer',
        'explanation',
        'difficulty_id',
        'reference',
        'is_active',
    ];

    /**
     * Cast attributes to native types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array', // Cast JSON options to an array
    ];

    /**
     * Relationship with the Difficulty model.
     */
    public function questionCategory()
    {
        return $this->belongsTo(QuestionCategory::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function difficulty()
    {
        return $this->belongsTo(Difficulty::class);
    }
}
