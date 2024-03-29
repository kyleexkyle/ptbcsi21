@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Position</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#add_position">
                    <span class="text">Add Position</span>
                </a>
                <div class="table-responsive">
                    <table class="position-table table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Position</th>
                            <th>Rate</th>
                            <th>Morning In</th>
                            <th>Morning Out</th>
                            <th>Afternoon In</th>
                            <th>Afternoon Out</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($positions as $position)
                            <tr data-schedule="{{$position->schedule->working_days}}" data-id="{{$position->schedule->id}}">
                                <td>{{$position->position}}</td>
                                <td>{{$position->rate}}</td>
                                <td>{{ $time = \Carbon\Carbon::createFromFormat('G:i', $position->schedule->morning_in)->format('h:i A')}}</td>
                                <td>{{ $time = \Carbon\Carbon::createFromFormat('G:i', $position->schedule->morning_out)->format('h:i A')}}</td>
                                <td>{{ $time = \Carbon\Carbon::createFromFormat('G:i', $position->schedule->afternoon_in)->format('h:i A')}}</td>
                                <td>{{ $time = \Carbon\Carbon::createFromFormat('G:i', $position->schedule->afternoon_out)->format('h:i A')}}</td>
                                <td>
                                    <div class="flex">
                                        <a href="#" data-id="{{$position->id}}" title="test"
                                           class="btn btn-success btn-circle btn-sm m-auto edit_position">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="#" data-id="{{$position->id}}"
                                           class="btn btn-danger btn-circle btn-sm m-auto delete_position">
                                            <i class="fas fa-trash fa-sm"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

               @include('employee-management.position.partials.add_position')
               @include('employee-management.position.partials.edit_position')
               @include('employee-management.position.partials.delete_position')
    </div>
@endsection