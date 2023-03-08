<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class ClassController extends Controller{

    public function getClassData(Request $request){
        $payload = array();
        $data = array();
        $teacherId = $request->teacherId;
        if($teacherId){
            try{
                $client = new \Wonde\Client(env('WONDE_KEY'));
                $school = $client->school(env('WONDE_SCHOOL'));
                //https://api.wonde.com/v1.0/schools/A1930499544/employees/<ID>?include=classes
                $employee = $school->employees->get($teacherId, ['classes']);
                if($employee){
                    foreach ($employee->classes->data as $class) {
                        $classObj = $school->classes->get($class->id, ['students', 'lessons.period']);
                        foreach($classObj->lessons->data as $period){
                            if(!in_array($period, $data)){
                                $data[$period->period->data->name . ':'.$class->description ] = $classObj->students->data;
                            }
                            else{
                                array_push($data[$period->period->data->name . ':'.$class->description ]['data'],$classObj->students->data);
                            }
                        }
                    }
                }
                else{
                    return view('schedule')->with('error', [
                        'error' => true,
                        'message' => 'Sorry, That id is not associated with an employee',
                    ]);
                }

                $payload['days'] =  self::sortResponseWeekPeriods($data);
                $payload['students'] =  self::sortResponseStudentDays($data);
                $payload['employee'] = (array) $employee;
                return view('schedule')->with('data', $payload);
            }
            catch(Exception $e){

                return view('schedule')->with('error', [
                    'error' => true,
                    'message' => 'Sorry, something has gone wrong. Please try again.',
                    'errorMsg' => $e
                ]);
            }
        }
        else{
            return view('schedule')->with('error', [
                'error' => true,
                'message' => 'Sorry, something has gone wrong. Please check the Id and try again.'
            ]);
        }

        dd('return');
        return;
    }

 // sort data into an array of days, by period for the students
    public function sortResponseWeekPeriods($data){
        //data structure
        $periods = ['1' => [], '2' => [], '3' => [], '4' => [], '5' => [], '6'=>[]];
        $days = array(
            'mon' => $periods,
            'tue' => $periods,
            'wed' => $periods,
            'thu' => $periods,
            'fri' => $periods,
        );
        foreach($data as $period => $students){
           $keys = explode(':',$period);
           $days[strtolower($keys[0])][$keys[1]]['students'] = $students;
           $days[strtolower($keys[0])][$keys[1]]['class'] = $keys[2];
        }
        return $days;
    }

    // sort data into an array of student, by days
    public function sortResponseStudentDays($data){
          //data structure
        $studentsSorted = array();
        $periods = ['1' => false, '2' => false, '3' => false, '4' => false, '5' => false, '6' => false];
        $info = array(
            'student' => [],
            'days' =>[
                'mon' => $periods,
                'tue' => $periods,
                'wed' => $periods,
                'thu' => $periods,
                'fri' => $periods,
            ]
        );
        foreach($data as $period => $students){
            $keys = explode(':',$period);
            foreach($students as $student ){
                if(array_key_exists($student->id, $studentsSorted)){
                    $studentsSorted[$student->id]['days'][strtolower($keys[0])][$keys[1]] = $keys[2];
                }
                else{
                    $studentsSorted[$student->id] = $info;
                    $studentsSorted[$student->id]['student'] = $student;
                }
            }
        }
        return $studentsSorted;
    }
}


//lessons
// +"id": "A148675934"
// +"mis_id": "36-2022-23251-60705"
// +"room": "A1817329959"
// +"period": "A711649210"
// +"period_instance_id": "60705"
// +"employee": "A1490920608"
// +"alternative": null
// +"start_at": {#395 ▶}
// +"end_at": {#396 ▶}
// +"day_number": null
// +"created_at": {#397 ▶}
// +"updated_at": {#398 ▶}
// }




// class

//{#898 ▼ // app/Http/Controllers/ClassController.php:13
//     +"id": "A701836220"
//     +"mis_id": "14636"
//     +"name": "11z/Ag1"
//     +"code": null
//     +"description": "11z/Ag1"
//     +"subject": "A1650569679"
//     +"alternative": null
//     +"restored_at": null
//     +"created_at": {#899 ▶}
//     +"updated_at": {#900 ▶}
//     +"meta": null
//   }
