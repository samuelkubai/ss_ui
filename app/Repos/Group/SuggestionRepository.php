<?php

namespace app\Repos\Group;


use App\Course;
use App\Suggestion;
use App\Institution;


class SuggestionRepository
{

    /**
     * Get all institutions that the system has.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getInstitutions()
    {
        return Institution::all();
    }

    /**
     * Get all the courses that belong to a specific Institution.
     *
     * @param Institution $institution
     * @return mixed
     */
    public function getCoursesForInstitution(Institution $institution)
    {
        return $institution->courses()->get();
    }

    /**
     * Gets the group linked to the suggestion.
     *
     * @param Suggestion $suggestion
     * @internal param $suggestionId
     * @return mixed
     */
    public function getGroupForSuggestion(Suggestion $suggestion)
    {
        return $suggestion->group()->first();
    }

    /**
     * Provides a suggestion from the user's inputs.
     *
     * @param $courseId
     * @param $type
     * @param $year
     * @return mixed
     */
    public function getSuggestion($courseId, $type, $year)
    {
        $suggestion = $this->findSuggestion($courseId, $type, $year);

        if(!$suggestion)
        {
            return $this->createSuggestion($courseId, $type, $year);
        }

        return $suggestion;
    }

    /**
     * Retrieve a suggestion.
     * @param $course
     * @param $type
     * @param $year
     * @return mixed
     */
    protected function findSuggestion($course, $type, $year)
    {
        return Suggestion::where('intake_type', $type)
            ->where('intake_year', $year)
            ->where('course_id', $course)
            ->first();
    }

    /**
     * Creates a suggestion.
     *
     * @param $courseId
     * @param $type
     * @param $year
     * @return mixed
     */
    protected function createSuggestion($courseId, $type, $year)
    {
        $course = Course::find($courseId);

        $name = $course->name.$type.$year;

        $username = $course->slug.$type.$year;

        $description = 'This is a group for the students of the course '.$course->name .' of '.$type. ' in '.$year. '.';

        $group = $course->institution()->create([
            'name' => $name,
            'username' => $username,
            'description' => $description,
            'user_id' => \Auth::user()->id
        ]);

        return $group->suggestion()->create([
            'intake_type' => $type,
            'intake_year' => $year,
            'course_id' => $course->id,
        ]);
    }

} 