<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use Cookie;


class PlantController extends Controller
{

    

    public function View(){

        $data = DB::Select('select * from plants');
        date_default_timezone_set("America/New_York");

        $dangerPlants = [];

        foreach($data as $plant){

            $time = $plant->lastWatered;
         
            $datetime1 = new DateTime();
            $datetime2 = new DateTime($time);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->d;
            $hrs = $days*24 + $interval->h;

            if($hrs>6){
                array_push($dangerPlants,$plant->name);

            }
            $dangerPlantsCount = count($dangerPlants);          
        }

        return view('welcome')->with('data',$data)->with('dangerPlants',$dangerPlants)->with('dangerPlantsCount',$dangerPlantsCount);

    }

    public function WaterPlant($id){

        $timeCheck = DB::Select('select * from plants where id = ?',[$id]);

        foreach($timeCheck as $timeCheck){
            $status = $timeCheck->status;
            $time = $timeCheck->lastWatered;
            

        }        

        DB::update('update times set status = ? where id = ?',[$status, $id]);
        DB::update('update times set time = ? where id = ?',[$time, $id]);
        
        date_default_timezone_set("America/New_York");

        $datetime1 = new DateTime();
        $datetime2 = new DateTime($time);
        $interval = $datetime1->diff($datetime2);
        // $elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
      
        $hrs = $interval->h*3600;
        $mins = $interval->i*60;
        $secs = $interval->s;

        $seconds = $hrs+$mins+$secs;

        if($seconds>30){


            sleep(10);

            DB::update('update plants set status = ? where id = ?',['Watered', $id]);
            DB::update('update plants set lastWatered = ? where id = ?',[$datetime1, $id]); 
            
            return back()->with('filledMsg','Plant watered');
        }

        else{
            return back()->with('errMsg','You cannot water a plant ');
        }
        
    }

    public function StopWaterPlant($id){
        
        $lstTime = DB::Select('select * from times where id=?',[$id]);
        foreach($lstTime as $data){

            $status = $data->status;
            $lasttime = $data->time;
        }
       

        DB::update('update plants set status = ? where id = ?',[$status, $id]);
        DB::update('update plants set lastWatered = ? where id = ?',[$lasttime, $id]);
        return back()->with('notfilledMsg','Plant watered stop');

       
       
    }
}
