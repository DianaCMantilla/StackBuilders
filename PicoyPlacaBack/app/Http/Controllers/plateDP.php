<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class plateDP extends Controller
{
    function getData(Request $request)
    {
        //gets the data submited
        $plate=$request->input('plate');
        $day=(int)($request->input('day'));
        $month=(int)($request->input('month'));
        $year=($request->input('year'));
        $hour=(int)($request->input('hour'));
        $minute=(int)($request->input('minute'));
        $numPlate=(int)substr($plate,strlen($plate)-1);//gets the last number of the plate
        $d=$this->calculateDay($day,$month,$year);//calculate which day of the week will be the date submited
        $message=$this->verifyDate($d,$numPlate,$hour,$minute);//verifys if the car can or cannot be on the road
        return $message;
    }

    function calculateDay($day, $month, $year)
    {
        $year=(int)substr($year,strlen($year)-2,strlen($year)-1);
        $codMes=array([0],[3],[3],[6],[1],[4],[6],[2],[5],[0],[3],[5]);//code for each month
        $x=($day+($codMes[$month-1])[0]+$year+(($year)/4)+6)%7;
        return $x;
    }

    function verifyDate($d,$numPlate,$hour,$minute)
    {
        $plateDays=array([1,2],[3,4],[5,6],[7,8],[9,0]);
        $plateD=$plateDays[$d-1];//gets the plates that cannot move depending on the day of the week
        $a=1;
        foreach ($plateD as $n)//compares the las number of the plate with the numbers restricted for that day
        {
            if($n==$numPlate)//if the plate is restricted for the day, it verifys the time
            {
                $a=$this->verifyTime($hour,$minute);
            }
        }
        return $a;
    }

    function verifyTime($hour,$minute)
    {
        $a=1;
        if($hour>=7 && $hour<=9)
        {
            if($hour==9 && $minute>30)
                $a=1;
            else
                $a=0;

        }
        elseif($hour>=16 && $hour<=19)
        {
            if($hour==19 && $minute>30)
                $a=1;
            else
                $a=0;
        }
        return $a;
    }
}
