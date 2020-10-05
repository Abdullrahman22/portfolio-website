<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(6);
        return response() -> json($projects);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $project = Project::where('slug', $slug ) -> first();
        $projectId = $project->id;
        /*========== Next and Previous Button ==========*/
        $nextProject     = Project::where('id', '=', $projectId + 1)->get();
        $previousProject = Project::where('id', '=', $projectId - 1)->get();
        /*========== Return Json ==========*/
        return response() -> json(
            compact( "project" , "nextProject" , "previousProject" )
        );

    }

}
