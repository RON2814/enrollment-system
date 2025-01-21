<?php

namespace App\Http\Controllers;

use App\Models\Roles\Student;
use App\Models\Checklist\Instructor;
use App\Models\Checklist\Course;
use App\Models\Program;
use App\Models\Section;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display the student evaluation page with student data.
     *
     * @return \Illuminate\View\View
     */

    public function advising()
    {
        // Fetch students who have an enrollment with 'under evaluation' status and related submitted data
        $students = Student::with([
            'program',
            'address',
            'user',
            'checklist.course',  // Fetch associated courses
            'checklist.instructor',  // Fetch associated instructors
            'enrollment'  // Fetch enrollment details
        ])
            ->whereHas('enrollment', function ($query) {
                $query->where('status', 'under evaluation');
            })
            ->get();

        $evalChecklist = $students->flatMap(function ($student) {
            return $student->checklist->filter(function ($checklist) {
                return $checklist->enrollment && $checklist->enrollment->status === 'under evaluation';
            });
        });

        // Return the view with the necessary data
        return view('department.advising', compact('students', 'evalChecklist'));
    }

    /**
     * Update student checklist and enrollment status to envaluated
     */
    public function advisingUpdate(Request $request)
    {
        $student = Student::where('student_number', $request->student_number)->firstOrFail();
        $checklist = $student->checklist->whereIn('course_code', $request->courses);

        $existingEnrollment = $student->enrollment->where('status', 'under evaluation')->first();

        // Extract the `id` from $existingEnrollment
        $existingEnrollmentId = $existingEnrollment['id'];

        // Update the `enrollment_id` in each entry of $checklist
        foreach ($checklist as &$item) {
            $item['enrollment_id'] = $existingEnrollmentId;
        }

        // Unset reference to avoid potential side effects
        unset($item);

        // Check if a section exists for the student's program and year level
        $section = Section::where('program_id', $student->program_id)
            ->where('year_level', $existingEnrollment->year_level)
            ->first();

        if (!$section) {
            // Create a new section if none exists
            $section = Section::create([
                'program_id' => $student->program_id,
                'year_level' => $existingEnrollment->year_level,
                'section' => 1,
                'current_student_enrolled' => 0,
                'max_capacity' => 5,
            ]);
        } else {
            if ($section->current_student_enrolled <= $section->max_capacity) {
                $section->increment('current_student_enrolled');
            } else {
                // Create a new section if the current one is full
                $section = Section::create([
                    'program_id' => $student->program_id,
                    'year_level' => $existingEnrollment->year_level,
                    'section' => $section->section + 1,
                    'current_student_enrolled' => 1,
                    'max_capacity' => 5,
                ]);
            }
        }

        $existingEnrollment->update(['status' => 'evaluated', 'section_id' => $section->id]);

        return redirect()->route('department.advising');
    }
}
