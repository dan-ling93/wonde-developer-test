@extends('layouts.app')

@section('content')
    <div class="max-w-100 mx-auto p-6 lg:p-8">
        @if (@isset($error))
        <div class="mt-16 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border-2 border-red-500">
            <h1 class='text-xl mb-2'> {{$error['message']}}</h1>
        </div>
        @else
        <h1 class='text-3xl px-4 mb-2'> Hi, {{$data['employee']['forename']}}</h1>
        <div class="mt-16 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border-2 border-blue-500">
            <div class='p-10'>
                <h1 class='text-xl mb-2'> Here is your weekly schedule, with the students you will be teaching</h1>
                @foreach ($data['days'] as $day=>$period)
                <div class='mb-8'>
                    <h3 class="text-2xl">
                        {{ucfirst($day)}}
                    </h3>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="text-left pr-4 py-4 ">
                                        Period
                                    </th>
                                    <th scope="col" class="text-left pr-4 py-4 ">
                                        Class
                                    </th>
                                    <th scope="col" class="text-left pr-4 py-4">
                                        Students
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($period as $key => $value )

                                @if($value)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="text-left  py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{$key}}
                                    </th>
                                    <th scope="row" class="text-left  py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{$value['class']}}
                                    </th>
                                    <th scope="row" class="text-left  py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        @if($value)
                                            @foreach($value['students'] as $student)
                                                {{$student->forename . ','}}
                                            @endforeach
                                        @else
                                            --
                                        @endif
                                    </th>
                                </tr>
                                @else
                                <tr class="bg-white border-b">
                                    <th scope="row" class="text-left  py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{$key}}
                                    </th>
                                    <th scope="row" class="text-left  py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        --
                                    </th>
                                    <th scope="row" class="text-left  py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        --
                                    </th>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="mt-16 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border-2 border-blue-500">
            <div class='p-10'>
                <h1 class='text-xl mb-2'> Here is your schedule, by Students</h1>
                @foreach ($data['students'] as $student)
                <div class='mb-8'>
                    <h3 class="text-2xl">
                        {{$student['student']->forename .' '.$student['student']->surname }}
                    </h3>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-400">
                            @foreach ($student['days'] as $key => $value )
                                @if($value)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="text-left  py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{$key}}
                                    </th>
                                    @foreach ($value as $period => $class )
                                    <th scope="row" class="text-center  py-4 font-medium text-gray-900 whitespace-nowrap {{ $class ? 'bg-green-300' : 'bg-red-300' }}">
                                        Period {{$period}} {{$class? 'Class: '.$class: '--'}}
                                    </th>
                                    @endforeach
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">

            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
        @endif
    </div>
@endsection

