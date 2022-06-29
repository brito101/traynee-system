<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['status', 'vacancy_id', 'trainee'];

    /** Relationships */
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    /** Aux */
    public function getTrainee()
    {
        $trainee = User::find($this->trainee);
        $pathImg = url('storage/users/' . $trainee->photo);
        return "<p class=\"m-0 p-0\"><img src=\"{$pathImg}\" class=\"img-circle img-fluid elevation-2 mr-2\" style=\"object-fit: cover; aspect-ratio: 1; width: 50px;\">{$trainee->name} ({$trainee->email})</p>";
    }

    public function getCompability()
    {
        $listAcadmics = [];
        $academics = Academic::where('user_id', $this->trainee)->get();
        $vacancy = Vacancy::find($this->vacancy_id);
        $trainee = User::find($this->trainee);
        foreach ($academics as $academic) {
            $listAcadmics['area'] = $academic->course['name'];
        }

        $listExtraCourses = [];
        $extras = Extra::where('user_id', $this->trainee)->get();
        foreach ($extras as $extra) {
            $listExtraCourses['area'] = $extra->course['name'];
        }

        $points = 0;
        /** curso acadêmicos */
        foreach (array_values($listAcadmics) as $val) {
            if (strpos($vacancy->courses, $val) !== false) {
                $points += 1;
            }
        }

        /** curso extracurricular */
        foreach (array_values($listExtraCourses) as $val) {
            if (strpos($vacancy->courses, $val) !== false) {
                $points += 1;
            }
        }

        /** escolaridade */
        if (strpos(implode(", ", array_values($trainee->academics->pluck('scholarity_id')->toArray())), (string)$vacancy->scholarity_id) !== false) {
            $points += 1;
        }

        /** disponibilidade */
        if (strpos(implode(", ", array_values($trainee->academics->pluck('availability')->toArray())), $vacancy->period) !== false) {
            $points += 1;
        }

        /** estado */
        if ($vacancy->state == $trainee->state) {
            $points  += 0.5;
        }

        /** cidade e estado */
        if ($vacancy->city == $trainee->city) {
            $points  += 0.5;
        }

        return $points * 20 . "%";
    }
}
