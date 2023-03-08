@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <h2 class='text-xl mb-2'> Welcome, To Wonde </h2>
            <div class="mt-16 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border-2 border-blue-500">
                <div class='p-10'>
                    <h2 class='text-xl mb-2'> Welcome, Teacher!</h2>
                    <p class="mb-2">Lets make sure you are ready for the week.</p>

                    <form id="teacherSearch" action="{{url('/class')}}" method="post">
                        @csrf
                        <div class="w-full md:w-1/2 mt-5 mb-6 md:mb-0" >
                            <label for="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Teacher Id (Empolyee ID)</label>
                            <input required type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="A1249782776" id="teacherId" name="teacherId">
                        </div>
                        <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    </form>
                </div>
            </div>

            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">

                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
@endsection

