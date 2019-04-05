<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjSkill;

class ProjectController extends Controller
{
     public function addProject (Request $request)
    {
    	$titre = $request->input('titre');
    	$description = $request->input('description');
    	$ville = $request->input('ville');
    	$age = $request->input('age');
    	$nbr_folowers = $request->input('nbr_folowers');
    	$engagement = $request->input('engagement');
    	$user_id = $request->input('user_id');
    


    	$project = new Project;
    	$project->titre=$titre;
    	$project->description=$description;
    	$project->ville=$ville;
    	$project->age=$age;
    	$project->nbr_folowers=$nbr_folowers;
    	$project->engagement=$engagement;
    	$project->user_id=$user_id;



	
    	$project->save();


    	while(!$project->id){}

    	$skills = json_decode($request->input('skills'));



    	for($i=0; $i<count($skills);$i++)
    	{
    		$s= new ProjSkill;
    		$s->proj_id=$project->id;
    		$s->skill_id=$skills[$i]->id;
    		$s->save();

    	}

    	return $project;
 	}


 	public function updateProject(Request $request)
    {
        $id = $request->input('id');
       
       	$project = Project::find($id);
       	$titre = $request->input('titre');
    	$description = $request->input('description');
    	$ville = $request->input('ville');
    	$age = $request->input('age');
    	$nbr_folowers = $request->input('nbr_folowers');
    	$engagement = $request->input('engagement');
    	$user_id = $request->input('user_id');
    


    	$project->titre=$titre;
    	$project->description=$description;
    	$project->ville=$ville;
    	$project->age=$age;
    	$project->nbr_folowers=$nbr_folowers;
    	$project->engagement=$engagement;
    	$project->user_id=$user_id;

        
        $project->save();

        $skills = json_decode($request->input('skills'));


        $projskills = ProjSkill::where('proj_id','=',$id)->get();
        foreach ($projskills as $key => $value) {
        	$value->delete();
        }
		

    	for($i=0; $i<count($skills);$i++)
    	{
    		$s= new ProjSkill;
    		$s->proj_id=$project->id;
    		$s->skill_id=$skills[$i]->id;
    		$s->save();

    	}

    	
        return $project;
    }


 	public function deleteProject(Request $request)
 	{
 		$id = $request->input('id');



 		$project = Project::find($id);
 		$project->delete();

 		$skills = json_decode($request->input('skills'));
        $projskills = ProjSkill::where('proj_id','=',$id)->get();
        foreach ($projskills as $key => $value) {
        	$value->delete();
        }

 		return 'ok';
 	}

    public function showProjectByUserId(Request $request)
    {
        $user_id = $request->input('user_id');

        $projects = array();

        $project = Project::where('user_id','=',$user_id)->get();
        foreach ($project as $key => $value) {
        	$projects[]=$value;
        }

        return $projects;
    }




}


