<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Course;
use App\Lesson;
use App\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCoursesController extends Controller
{
    public function __construct(){
        $this->middleware('has_plan');
    }
    public function index(){
        $courses = Course::where('published', 'true')->orderBy('id', 'desc')->with('topics')->paginate(9);
        return view('courses.index',  compact('courses'));
    }
    public function validateProgress($course_id, $topic_index, $lesson_index){
        
            $course_user = CourseUser::where(['user_id'=> Auth::id(), 'course_id'=>$course_id])->get();
            // Checked if passed arguments are existent
            $course = Course::where('id',$course_id)->with([
                'topics'=> function($q){
                    return $q->orderBy('created_at', 'asc')->with([
                        'lessons'=>function($r){
                            return $r->orderBy('created_at', 'asc')->get();
                        }
                    ])->get();
                }
            ])->get()[0];


        $is_last_lesson = false;


        // Check if user has already watched the course
        if(sizeof($course_user) > 0){
            // If user has an entry
            $course_user = $course_user[0];


            


            $last_topic_index = sizeof($course->topics) - 1;
            $last_topic = $course->topics[$last_topic_index];
        
            $last_lesson_index = sizeof($last_topic->lessons) - 1;

            if($topic_index == $last_topic_index && $lesson_index == $last_lesson_index){
                $is_last_lesson = true;
            }

            // If course's topic is existent
            // return $course->topics[$topic_index];
            if($lesson_index == -1){
                // Kung last na na lesson and niprevious pa jud si user
                $topic_index = $topic_index - 1;
                $curr_topic = $course->topics[$topic_index];
                
                $lesson_index = sizeof($curr_topic->lessons) - 1;
                $curr_lesson = $curr_topic->lessons[$lesson_index];
                
                $nextLesson = $lesson_index + 1;
                $prevLesson = $lesson_index - 1;

                return redirect('/courses/watch/'.$course_id.'/'.$topic_index.'/'.$lesson_index);

            }else{
                $curr_topic = $course->topics[$topic_index];

                // If topic's lesson is existent
                if(isset($curr_topic->lessons[$lesson_index])){
                    
                    $curr_lesson = $curr_topic->lessons[$lesson_index];

                    // Set lesson indices
                    $nextLesson = $lesson_index + 1;
                    $prevLesson = $lesson_index - 1;

                }else{

                    // If topic's lesson is non existent
                    $topic_index = $topic_index + 1;

                    if(isset($course->topics[$topic_index])){
                        $curr_topic = $course->topics[$topic_index];
                        // Set lesson index back to 0
                        $lesson_index = 0;
                        if(!isset($curr_topic->lessons[$lesson_index])){

                            // Check if indices represents the last part of the course

                            if($last_lesson_index == -1){
                                $topic_index - 1;
                                $curr_topic = $course->topics[$topic_index];
                                $lesson_index = sizeof($curr_topic->lessons) - 1;
                                return redirect('/courses/watch/'.$course_id.'/'.$topic_index.'/'.$lesson_index);
                            }

                        }
                        
                        $curr_lesson = $curr_topic->lessons[$lesson_index];
                        // Set lesson indices
                        $nextLesson = $lesson_index + 1;
                        $prevLesson = $lesson_index - 1;
                        
                        // Redirect page instead of returning view to update URL
                        return redirect('/courses/watch/'.$course_id.'/'.$topic_index.'/'.$lesson_index);
                    }else{

                        
                    }
                }
            }

        }else{

            // Check if the current lesson represents the last entry
            if(sizeof($course->topics) < 2){
                if(sizeof($course->topics[0]->lessons) < 2){
                    $is_last_lesson = true;
                }
            }
            // If user does not have an entry
            $course_user = CourseUser::create([
                'user_id'=>Auth::id(),
                'course_id'=>$course_id,
                'topic_index'=> 0,
                'lesson_index'=> 0
            ]);

            $curr_topic = $course->topics[$topic_index];
            $curr_lesson = $curr_topic->lessons[$lesson_index];
            $nextLesson = $lesson_index + 1;
            $prevLesson = $lesson_index - 1;

        }
        

        if($course_user->completed != 'true'){
            // Update CourseUser Entry
            $course_user = CourseUser::find($course_user->id);
            $course_user->course_id = $course_id;
            $course_user->topic_index = $topic_index;
            $course_user->lesson_index = $lesson_index;
            $course_user->save();
        }

        

        return view('courses.single_course', compact('is_last_lesson', 'course', 'curr_topic', 'curr_lesson', 'topic_index', 'lesson_index', 'prevLesson', 'nextLesson'));

    }













    public function completed ($course_id){
        $course = Course::find($course_id);
        $course_user = CourseUser::where(['course_id'=> $course_id, 'user_id'=> Auth::id()])->get()[0];
        if($course_user->completed == 'true'){
            return back()->with('error', 'Course already completed!');
        }
        CourseUser::where('course_id', $course_id)->update([
            'completed' => 'true'
        ]);
        return view('courses.completed', compact('course'));
    }
}





// $current_course = Course::where('id', $course_id)->with([
//     'topics'=>function($q){
//         $q->orderBy('name')->with([
//             'lessons'=> function($r){
//                 $r->orderBy('name')->get();
//             }
//         ])->get();
//     }
// ])->get();



// return view('courses.single_course', compact('current_course'));